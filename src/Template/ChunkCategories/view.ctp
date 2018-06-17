<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ChunkCategory $chunkCategory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Chunk Category'), ['action' => 'edit', $chunkCategory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Chunk Category'), ['action' => 'delete', $chunkCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $chunkCategory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Chunk Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Chunk Category'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="chunkCategories view large-9 medium-8 columns content">
    <h3><?= h($chunkCategory->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($chunkCategory->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($chunkCategory->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($chunkCategory->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($chunkCategory->modified) ?></td>
        </tr>
    </table>
</div>
