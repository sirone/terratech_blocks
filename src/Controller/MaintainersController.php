<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Maintainers Controller
 *
 * @property \App\Model\Table\MaintainersTable $Maintainers
 *
 * @method \App\Model\Entity\Maintainer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MaintainersController extends AppController
{
    /**
     * ログイン
     * @return \Cake\Http\Response|null
     */
    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Username or password is incorrect'));
        }
    }

    /**
     * ログアウト
     * @return \Cake\Http\Response|null
     */
    public function logout()
    {
      return $this->redirect($this->Auth->logout());
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $maintainers = $this->paginate($this->Maintainers);

        $this->set(compact('maintainers'));
    }

    /**
     * View method
     *
     * @param string|null $id Maintainer id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $maintainer = $this->Maintainers->get($id, [
            'contain' => []
        ]);

        $this->set('maintainer', $maintainer);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $maintainer = $this->Maintainers->newEntity();
        if ($this->request->is('post')) {
            $maintainer = $this->Maintainers->patchEntity($maintainer, $this->request->getData());
            if ($this->Maintainers->save($maintainer)) {
                $this->Flash->success(__('The maintainer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The maintainer could not be saved. Please, try again.'));
        }
        $this->set(compact('maintainer'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Maintainer id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $maintainer = $this->Maintainers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $maintainer = $this->Maintainers->patchEntity($maintainer, $this->request->getData());
            if ($this->Maintainers->save($maintainer)) {
                $this->Flash->success(__('The maintainer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The maintainer could not be saved. Please, try again.'));
        }
        $this->set(compact('maintainer'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Maintainer id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $maintainer = $this->Maintainers->get($id);
        if ($this->Maintainers->delete($maintainer)) {
            $this->Flash->success(__('The maintainer has been deleted.'));
        } else {
            $this->Flash->error(__('The maintainer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
