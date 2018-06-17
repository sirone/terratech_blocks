<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * InformationCategories Controller
 *
 * @property \App\Model\Table\InformationCategoriesTable $InformationCategories
 *
 * @method \App\Model\Entity\InformationCategory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InformationCategoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $informationCategories = $this->paginate($this->InformationCategories);

        $this->set(compact('informationCategories'));
    }

    /**
     * View method
     *
     * @param string|null $id Information Category id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $informationCategory = $this->InformationCategories->get($id, [
            'contain' => ['Information']
        ]);

        $this->set('informationCategory', $informationCategory);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $informationCategory = $this->InformationCategories->newEntity();
        if ($this->request->is('post')) {
            $informationCategory = $this->InformationCategories->patchEntity($informationCategory, $this->request->getData());
            if ($this->InformationCategories->save($informationCategory)) {
                $this->Flash->success(__('The information category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The information category could not be saved. Please, try again.'));
        }
        $this->set(compact('informationCategory'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Information Category id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $informationCategory = $this->InformationCategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $informationCategory = $this->InformationCategories->patchEntity($informationCategory, $this->request->getData());
            if ($this->InformationCategories->save($informationCategory)) {
                $this->Flash->success(__('The information category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The information category could not be saved. Please, try again.'));
        }
        $this->set(compact('informationCategory'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Information Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $informationCategory = $this->InformationCategories->get($id);
        if ($this->InformationCategories->delete($informationCategory)) {
            $this->Flash->success(__('The information category has been deleted.'));
        } else {
            $this->Flash->error(__('The information category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
