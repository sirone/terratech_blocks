<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Chunk[]|\Cake\Collection\CollectionInterface $chunks
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Chunk'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Chunk Categories'), ['controller' => 'ChunkCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Chunk Category'), ['controller' => 'ChunkCategories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Chunk Rarities'), ['controller' => 'ChunkRarities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Chunk Rarity'), ['controller' => 'ChunkRarities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Component Tiers'), ['controller' => 'ComponentTiers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Component Tier'), ['controller' => 'ComponentTiers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Recipes'), ['controller' => 'Recipes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Recipe'), ['controller' => 'Recipes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="chunks index large-9 medium-8 columns content">
    <h3><?= __('Chunks') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('identifier') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('image_url') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sell_price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('refined_chunk_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('chunk_category_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('chunk_rarity_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('component_tier_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($chunks as $chunk): ?>
            <tr>
                <td><?= $this->Number->format($chunk->id) ?></td>
                <td><?= h($chunk->identifier) ?></td>
                <td><?= h($chunk->name) ?></td>
                <td><?= h($chunk->image_url) ?><img src="<?= h($chunk->image_url) ?>"></td>
                <td>฿฿<?= $this->Number->format($chunk->sell_price) ?></td>
                <td><?= $chunk->has('refined_chunk') ? $this->Html->link($chunk->refined_chunk->name, ['controller' => 'Chunks', 'action' => 'view', $chunk->refined_chunk->id]) : '' ?></td>
                <td><?= $chunk->has('chunk_category') ? $this->Html->link($chunk->chunk_category->name, ['controller' => 'ChunkCategories', 'action' => 'view', $chunk->chunk_category->id]) : '' ?></td>
                <td><?= $chunk->has('chunk_rarity') ? $this->Html->link($chunk->chunk_rarity->name, ['controller' => 'ChunkRarities', 'action' => 'view', $chunk->chunk_rarity->id]) : '' ?></td>
                <td><?= $chunk->has('component_tier') ? $this->Html->link($chunk->component_tier->name, ['controller' => 'ComponentTiers', 'action' => 'view', $chunk->component_tier->id]) : '' ?></td>
                <td><?= h($chunk->created) ?></td>
                <td><?= h($chunk->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $chunk->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $chunk->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $chunk->id], ['confirm' => __('Are you sure you want to delete # {0}?', $chunk->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
