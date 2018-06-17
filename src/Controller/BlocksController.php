<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Blocks Controller
 *
 * @property \App\Model\Table\BlocksTable $Blocks
 *
 * @method \App\Model\Entity\Block[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BlocksController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Categories', 'Rarities', 'Corporations']
        ];
        $blocks = $this->paginate($this->Blocks);

        $this->set(compact('blocks'));
    }

    /**
     * View method
     *
     * @param string|null $id Block id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $block = $this->Blocks->get($id, [
            'contain' => ['Categories', 'Rarities', 'Corporations', 'BlockAttributes', 'Recipes']
        ]);

        $this->set('block', $block);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $block = $this->Blocks->newEntity();
        if ($this->request->is('post')) {
            $block = $this->Blocks->patchEntity($block, $this->request->getData());
            if ($this->Blocks->save($block)) {
                $this->Flash->success(__('The block has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The block could not be saved. Please, try again.'));
        }
        $categories = $this->Blocks->Categories->find('list', ['limit' => 200]);
        $rarities = $this->Blocks->Rarities->find('list', ['limit' => 200]);
        $corporations = $this->Blocks->Corporations->find('list', ['limit' => 200]);
        $this->set(compact('block', 'categories', 'rarities', 'corporations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Block id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $block = $this->Blocks->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $block = $this->Blocks->patchEntity($block, $this->request->getData());
            if ($this->Blocks->save($block)) {
                $this->Flash->success(__('The block has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The block could not be saved. Please, try again.'));
        }
        $categories = $this->Blocks->Categories->find('list', ['limit' => 200]);
        $rarities = $this->Blocks->Rarities->find('list', ['limit' => 200]);
        $corporations = $this->Blocks->Corporations->find('list', ['limit' => 200]);
        $this->set(compact('block', 'categories', 'rarities', 'corporations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Block id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $block = $this->Blocks->get($id);
        if ($this->Blocks->delete($block)) {
            $this->Flash->success(__('The block has been deleted.'));
        } else {
            $this->Flash->error(__('The block could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
