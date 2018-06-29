<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

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
        $blocks = $this->Blocks->find('all')->select(['id','identifier','name','description']);
        $queries = $this->request->getQueryParams();
        $wheres ['corporation_id']= $queries['corporation_id'] ?? '';
        $wheres ['category_id']= $queries['category_id'] ?? '';
        $wheres ['grade']= $queries['grade'] ?? '';
        $wheres = array_filter($wheres, 'strlen');
        $blocks->where($wheres)->cache(function ($q) {
            return 'blocks-' . md5(serialize($q->clause('where')));
        });
        $this->set('blocks', $blocks);
        $this->set('_jsonOptions', ~JSON_PRETTY_PRINT);
        $this->set('_serialize', 'blocks');
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
            'contain' => ['Categories', 'Rarities', 'Corporations'],
            'fields' => ['id', /*'identifier',*/'category_id','rarity_id','corporation_id','grade','name','description','image_url','purchase_price','sale_price',
                'Categories.id',/*'Categories.identifier',*/'Categories.name','Categories.image_url',
                'Rarities.id',/*'Rarities.identifier',*/'Rarities.name','Rarities.image_url',
                'Corporations.id',/*'Corporations.identifier',*/'Corporations.name','Corporations.image_url',
            ]
        ]);
        $this->set('block', $block);
        $this->set('_jsonOptions', ~JSON_PRETTY_PRINT);
        $this->set('_serialize', 'block');
    }
}
