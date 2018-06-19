<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;
use Cake\ORM\TableRegistry;

/**
 * Chunks Controller
 *
 * @property \App\Model\Table\ChunksTable $Blocks
 *
 * @method \App\Model\Entity\Chunk[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ChunksController extends AppController
{
    /**
     * View method
     *
     * @param integer|null $id Block id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->Recipes = TableRegistry::get('recipes');
        $recipes = $this->Recipes
            ->find('all')
            ->select(['id', /*'block_id','chunk_id',*/'need',
                /*'Blocks.id','Blocks.name','Blocks.image_url',*/
                'Chunks.id','Chunks.name','Chunks.description','Chunks.image_url','Chunks.component_tier_id',
                /*'ChunkRarities.id',*/'ChunkRarities.name',
                /*'ChunkCategories.id',*/'ChunkCategories.name',
            ])
            ->where(['block_id =' => $id])
            ->contain(['Chunks' => ['ChunkRarities', 'ChunkCategories']]);

        $ary_chunks = [];
        foreach ($recipes as $recipe) {
            // レシピに必要な個数分回す.
            for ($i=0; $i<$recipe->need; $i++) {
                $ary_chunks = $this->need_chunks($recipe->chunk->id, $ary_chunks);
            }
        }

        if (empty($ary_chunks)) {
            $this->set('chunks', []);
            $this->set('_jsonOptions', ~JSON_PRETTY_PRINT);
            $this->set('_serialize', 'chunks');
            return;
        }

        $chunk_ids = array_keys($ary_chunks);
        $chunks = $this->Chunks
            ->find('all')
            ->where(['id IN'=>$chunk_ids]);
        foreach ($chunks as $chunk) {
            $chunk->need = $ary_chunks[$chunk->id];
        }

        $this->set('chunks', $chunks);
        $this->set('_jsonOptions', ~JSON_PRETTY_PRINT);
        $this->set('_serialize', 'chunks');
    }

    private function need_chunks($chunk_id, array $chunks) {
        // 既に chunks に 調べたい chunk_id があるなら調べる必要がないので返す.
        if (isset($chunks[$chunk_id])) {
            $chunks[$chunk_id] += 1;
            return $chunks;
        }
        $chunk = $this->Chunks->get($chunk_id);
        // これ以上掘り下げるレシピがないなら chunks を返す.
        // component_tier_id が null ということは、部品メーカーでは作れない材料、つまり原料である)
        if (is_null($chunk->component_tier_id)) {
            $chunks[$chunk->id]=1;
            return $chunks;
        }

        // 取得した chunk の構成原料をさらに調べる.
        $this->ComponentRecipes = TableRegistry::get('component_recipes');
        $need_components = $this->ComponentRecipes->find('all')
            ->where(['chunk_id'=>$chunk->id]);
        foreach ($need_components as $component) {
            $chunks = $this->need_chunks($component->need_chunk_id, $chunks);
        }
        return $chunks;
    }

}
