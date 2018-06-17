<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Rarities Controller
 *
 * @property \App\Model\Table\RaritiesTable $Rarities
 *
 * @method \App\Model\Entity\Rarity[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RaritiesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $rarities = $this->paginate($this->Rarities);

        $this->set(compact('rarities'));
    }

    /**
     * View method
     *
     * @param string|null $id Rarity id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rarity = $this->Rarities->get($id, [
            'contain' => ['Blocks']
        ]);

        $this->set('rarity', $rarity);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rarity = $this->Rarities->newEntity();
        if ($this->request->is('post')) {
            $rarity = $this->Rarities->patchEntity($rarity, $this->request->getData());
            if ($this->Rarities->save($rarity)) {
                $this->Flash->success(__('The rarity has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rarity could not be saved. Please, try again.'));
        }
        $this->set(compact('rarity'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Rarity id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rarity = $this->Rarities->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rarity = $this->Rarities->patchEntity($rarity, $this->request->getData());
            if ($this->Rarities->save($rarity)) {
                $this->Flash->success(__('The rarity has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rarity could not be saved. Please, try again.'));
        }
        $this->set(compact('rarity'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Rarity id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rarity = $this->Rarities->get($id);
        if ($this->Rarities->delete($rarity)) {
            $this->Flash->success(__('The rarity has been deleted.'));
        } else {
            $this->Flash->error(__('The rarity could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
