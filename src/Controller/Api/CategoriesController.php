<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

/**
 * Categories Controller
 *
 * @property \App\Model\Table\CategoriesTable $Blocks
 *
 * @method \App\Model\Entity\Block[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CategoriesController extends AppController
{
    /**
     * View method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $category = $this->Categories->get($id, ['fields'=>['id','identifier','name','image_url']]);
        $this->set('category', $category);
        $this->set('_jsonOptions', ~JSON_PRETTY_PRINT);
        $this->set('_serialize', 'category');
    }
}
