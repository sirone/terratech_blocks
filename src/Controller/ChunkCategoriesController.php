<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ChunkCategories Controller
 *
 * @property \App\Model\Table\ChunkCategoriesTable $ChunkCategories
 *
 * @method \App\Model\Entity\ChunkCategory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ChunkCategoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $chunkCategories = $this->paginate($this->ChunkCategories);

        $this->set(compact('chunkCategories'));
    }

    /**
     * View method
     *
     * @param string|null $id Chunk Category id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $chunkCategory = $this->ChunkCategories->get($id, [
            'contain' => []
        ]);

        $this->set('chunkCategory', $chunkCategory);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $chunkCategory = $this->ChunkCategories->newEntity();
        if ($this->request->is('post')) {
            $chunkCategory = $this->ChunkCategories->patchEntity($chunkCategory, $this->request->getData());
            if ($this->ChunkCategories->save($chunkCategory)) {
                $this->Flash->success(__('The chunk category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The chunk category could not be saved. Please, try again.'));
        }
        $this->set(compact('chunkCategory'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Chunk Category id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $chunkCategory = $this->ChunkCategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $chunkCategory = $this->ChunkCategories->patchEntity($chunkCategory, $this->request->getData());
            if ($this->ChunkCategories->save($chunkCategory)) {
                $this->Flash->success(__('The chunk category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The chunk category could not be saved. Please, try again.'));
        }
        $this->set(compact('chunkCategory'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Chunk Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $chunkCategory = $this->ChunkCategories->get($id);
        if ($this->ChunkCategories->delete($chunkCategory)) {
            $this->Flash->success(__('The chunk category has been deleted.'));
        } else {
            $this->Flash->error(__('The chunk category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
