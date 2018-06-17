<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Corporations Controller
 *
 * @property \App\Model\Table\CorporationsTable $Corporations
 *
 * @method \App\Model\Entity\Corporation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CorporationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $corporations = $this->paginate($this->Corporations);

        $this->set(compact('corporations'));
    }

    /**
     * View method
     *
     * @param string|null $id Corporation id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $corporation = $this->Corporations->get($id, [
            'contain' => []
        ]);

        $this->set('corporation', $corporation);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $corporation = $this->Corporations->newEntity();
        if ($this->request->is('post')) {
            $corporation = $this->Corporations->patchEntity($corporation, $this->request->getData());
            if ($this->Corporations->save($corporation)) {
                $this->Flash->success(__('The corporation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The corporation could not be saved. Please, try again.'));
        }
        $this->set(compact('corporation'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Corporation id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $corporation = $this->Corporations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $corporation = $this->Corporations->patchEntity($corporation, $this->request->getData());
            if ($this->Corporations->save($corporation)) {
                $this->Flash->success(__('The corporation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The corporation could not be saved. Please, try again.'));
        }
        $this->set(compact('corporation'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Corporation id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $corporation = $this->Corporations->get($id);
        if ($this->Corporations->delete($corporation)) {
            $this->Flash->success(__('The corporation has been deleted.'));
        } else {
            $this->Flash->error(__('The corporation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
