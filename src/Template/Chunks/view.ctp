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
        <li><?= $this->Html->link(__('List Chunk Rarities'), ['controller' => 'ChunkRarities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Chunk Rarity'), ['controller' => 'ChunkRarities', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="chunks view large-9 medium-8 columns content">
    <h3><?= h($chunk->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($chunk->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image Url') ?></th>
            <td><?= h($chunk->image_url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Chunk Rarity') ?></th>
            <td><?= $chunk->has('chunk_rarity') ? $this->Html->link($chunk->chunk_rarity->name, ['controller' => 'ChunkRarities', 'action' => 'view', $chunk->chunk_rarity->id]) : '' ?></td>
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
            <th scope="row"><?= __('Refined Chunk Id') ?></th>
            <td><?= $this->Number->format($chunk->refined_chunk_id) ?></td>
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
</div>
