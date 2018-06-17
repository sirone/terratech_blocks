<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ComponentTiers Controller
 *
 * @property \App\Model\Table\ComponentTiersTable $ComponentTiers
 *
 * @method \App\Model\Entity\ComponentTier[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ComponentTiersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $componentTiers = $this->paginate($this->ComponentTiers);

        $this->set(compact('componentTiers'));
    }

    /**
     * View method
     *
     * @param string|null $id Component Tier id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $componentTier = $this->ComponentTiers->get($id, [
            'contain' => []
        ]);

        $this->set('componentTier', $componentTier);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $componentTier = $this->ComponentTiers->newEntity();
        if ($this->request->is('post')) {
            $componentTier = $this->ComponentTiers->patchEntity($componentTier, $this->request->getData());
            if ($this->ComponentTiers->save($componentTier)) {
                $this->Flash->success(__('The component tier has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The component tier could not be saved. Please, try again.'));
        }
        $this->set(compact('componentTier'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Component Tier id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $componentTier = $this->ComponentTiers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $componentTier = $this->ComponentTiers->patchEntity($componentTier, $this->request->getData());
            if ($this->ComponentTiers->save($componentTier)) {
                $this->Flash->success(__('The component tier has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The component tier could not be saved. Please, try again.'));
        }
        $this->set(compact('componentTier'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Component Tier id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $componentTier = $this->ComponentTiers->get($id);
        if ($this->ComponentTiers->delete($componentTier)) {
            $this->Flash->success(__('The component tier has been deleted.'));
        } else {
            $this->Flash->error(__('The component tier could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
