<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

/**
 * Corporations Controller
 *
 * @property \App\Model\Table\CorporationsTable $Blocks
 *
 * @method \App\Model\Entity\Block[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CorporationsController extends AppController
{
    /**
     * View method
     *
     * @param string|null $id Corporation id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $corporation = $this->Corporations->get($id, ['fields'=>['id','identifier','name','image_url']]);
        $this->set('corporation', $corporation);
        $this->set('_jsonOptions', ~JSON_PRETTY_PRINT);
        $this->set('_serialize', 'corporation');
    }
}
