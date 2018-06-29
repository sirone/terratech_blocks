<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

/**
 * Recipes Controller
 *
 * @property \App\Model\Table\RecipesTable $Recipes
 *
 * @method \App\Model\Entity\Recipe[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RecipesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $recipes = $this->Recipes->find('all')->select(['id','block_id','chunk_id','need']);
        $this->set('recipes', $recipes);
        $this->set('_jsonOptions', ~JSON_PRETTY_PRINT);
        $this->set('_serialize', 'recipes');
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
        $recipe = $this->Recipes
            ->find('all')
            ->select(['id', /*'block_id','chunk_id',*/'need',
                /*'Blocks.id','Blocks.name','Blocks.image_url',*/
                'Chunks.id','Chunks.name','Chunks.description','Chunks.image_url','Chunks.sell_price',
                'ChunkRarities.id','ChunkRarities.name'
            ])
            ->where(['block_id =' => $id])
            ->contain(['Chunks' => ['ChunkRarities']]);
        $this->set('recipe', $recipe);
        $this->set('_jsonOptions', ~JSON_PRETTY_PRINT);
        $this->set('_serialize', 'recipe');
    }
}
