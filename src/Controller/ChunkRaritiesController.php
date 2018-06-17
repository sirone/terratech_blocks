<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ChunkRarities Controller
 *
 * @property \App\Model\Table\ChunkRaritiesTable $ChunkRarities
 *
 * @method \App\Model\Entity\ChunkRarity[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ChunkRaritiesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $chunkRarities = $this->paginate($this->ChunkRarities);

        $this->set(compact('chunkRarities'));
    }

    /**
     * View method
     *
     * @param string|null $id Chunk Rarity id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $chunkRarity = $this->ChunkRarities->get($id, [
            'contain' => ['Chunks']
        ]);

        $this->set('chunkRarity', $chunkRarity);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $chunkRarity = $this->ChunkRarities->newEntity();
        if ($this->request->is('post')) {
            $chunkRarity = $this->ChunkRarities->patchEntity($chunkRarity, $this->request->getData());
            if ($this->ChunkRarities->save($chunkRarity)) {
                $this->Flash->success(__('The chunk rarity has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The chunk rarity could not be saved. Please, try again.'));
        }
        $this->set(compact('chunkRarity'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Chunk Rarity id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $chunkRarity = $this->ChunkRarities->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $chunkRarity = $this->ChunkRarities->patchEntity($chunkRarity, $this->request->getData());
            if ($this->ChunkRarities->save($chunkRarity)) {
                $this->Flash->success(__('The chunk rarity has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The chunk rarity could not be saved. Please, try again.'));
        }
        $this->set(compact('chunkRarity'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Chunk Rarity id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $chunkRarity = $this->ChunkRarities->get($id);
        if ($this->ChunkRarities->delete($chunkRarity)) {
            $this->Flash->success(__('The chunk rarity has been deleted.'));
        } else {
            $this->Flash->error(__('The chunk rarity could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
