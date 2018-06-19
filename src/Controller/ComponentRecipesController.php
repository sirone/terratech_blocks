<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ComponentRecipes Controller
 *
 * @property \App\Model\Table\ComponentRecipesTable $ComponentRecipes
 *
 * @method \App\Model\Entity\ComponentRecipe[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ComponentRecipesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Chunks', 'NeedChunks']
        ];
        $componentRecipes = $this->paginate($this->ComponentRecipes);

        $this->set(compact('componentRecipes'));
    }

    /**
     * View method
     *
     * @param string|null $id Component Recipe id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $componentRecipe = $this->ComponentRecipes->get($id, [
            'contain' => ['Chunks', 'NeedChunks']
        ]);

        $this->set('componentRecipe', $componentRecipe);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $componentRecipe = $this->ComponentRecipes->newEntity();
        if ($this->request->is('post')) {
            $componentRecipe = $this->ComponentRecipes->patchEntity($componentRecipe, $this->request->getData());
            if ($this->ComponentRecipes->save($componentRecipe)) {
                $this->Flash->success(__('The component recipe has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The component recipe could not be saved. Please, try again.'));
        }
        $chunks = $this->ComponentRecipes->Chunks->find('list', ['limit' => 200]);
        $needChunks = $this->ComponentRecipes->NeedChunks->find('list', ['limit' => 200]);
        $this->set(compact('componentRecipe', 'chunks', 'needChunks'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Component Recipe id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $componentRecipe = $this->ComponentRecipes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $componentRecipe = $this->ComponentRecipes->patchEntity($componentRecipe, $this->request->getData());
            if ($this->ComponentRecipes->save($componentRecipe)) {
                $this->Flash->success(__('The component recipe has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The component recipe could not be saved. Please, try again.'));
        }
        $chunks = $this->ComponentRecipes->Chunks->find('list', ['limit' => 200]);
        $needChunks = $this->ComponentRecipes->NeedChunks->find('list', ['limit' => 200]);
        $this->set(compact('componentRecipe', 'chunks', 'needChunks'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Component Recipe id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $componentRecipe = $this->ComponentRecipes->get($id);
        if ($this->ComponentRecipes->delete($componentRecipe)) {
            $this->Flash->success(__('The component recipe has been deleted.'));
        } else {
            $this->Flash->error(__('The component recipe could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
