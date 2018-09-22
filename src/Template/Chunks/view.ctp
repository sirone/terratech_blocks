<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Chunk $chunk
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Chunk'), ['action' => 'edit', $chunk->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Chunk'), ['action' => 'delete', $chunk->id], ['confirm' => __('Are you sure you want to delete # {0}?', $chunk->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Chunks'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Chunk'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Refined Chunks'), ['controller' => 'Chunks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Refined Chunk'), ['controller' => 'Chunks', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Chunk Categories'), ['controller' => 'ChunkCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Chunk Category'), ['controller' => 'ChunkCategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Chunk Rarities'), ['controller' => 'ChunkRarities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Chunk Rarity'), ['controller' => 'ChunkRarities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Component Tiers'), ['controller' => 'ComponentTiers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Component Tier'), ['controller' => 'ComponentTiers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Recipes'), ['controller' => 'Recipes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Recipe'), ['controller' => 'Recipes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="chunks view large-9 medium-8 columns content">
    <h3><?= h($chunk->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Identifier') ?></th>
            <td><?= h($chunk->identifier) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($chunk->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image Url') ?></th>
            <td><?= h($chunk->image_url) ?><img src="/<?= h($chunk->image_url) ?>"></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Refined Chunk') ?></th>
            <td><?= $chunk->has('refined_chunk') ? $this->Html->link($chunk->refined_chunk->name, ['controller' => 'Chunks', 'action' => 'view', $chunk->refined_chunk->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Chunk Category') ?></th>
            <td><?= $chunk->has('chunk_category') ? $this->Html->link($chunk->chunk_category->name, ['controller' => 'ChunkCategories', 'action' => 'view', $chunk->chunk_category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Chunk Rarity') ?></th>
            <td><?= $chunk->has('chunk_rarity') ? $this->Html->link($chunk->chunk_rarity->name, ['controller' => 'ChunkRarities', 'action' => 'view', $chunk->chunk_rarity->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Component Tier') ?></th>
            <td><?= $chunk->has('component_tier') ? $this->Html->link($chunk->component_tier->name, ['controller' => 'ComponentTiers', 'action' => 'view', $chunk->component_tier->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($chunk->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sell Price') ?></th>
            <td><?= $this->Number->format($chunk->sell_price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($chunk->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($chunk->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($chunk->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Recipes') ?></h4>
        <?php if (!empty($chunk->recipes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Block Id') ?></th>
                <th scope="col"><?= __('Chunk Id') ?></th>
                <th scope="col"><?= __('Need') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($chunk->recipes as $recipes): ?>
            <tr>
                <td><?= h($recipes->id) ?></td>
                <td><?= h($recipes->block_id) ?></td>
                <td><?= h($recipes->chunk_id) ?></td>
                <td><?= h($recipes->need) ?></td>
                <td><?= h($recipes->created) ?></td>
                <td><?= h($recipes->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Recipes', 'action' => 'view', $recipes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Recipes', 'action' => 'edit', $recipes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Recipes', 'action' => 'delete', $recipes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recipes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
