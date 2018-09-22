<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Recipe $recipe
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Recipe'), ['action' => 'edit', $recipe->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Recipe'), ['action' => 'delete', $recipe->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recipe->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Recipes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Recipe'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Blocks'), ['controller' => 'Blocks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Block'), ['controller' => 'Blocks', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Chunks'), ['controller' => 'Chunks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Chunk'), ['controller' => 'Chunks', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="recipes view large-9 medium-8 columns content">
    <h3><?= h($recipe->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Block') ?></th>
            <td><?= $recipe->has('block') ? $this->Html->link($recipe->block->name, ['controller' => 'Blocks', 'action' => 'view', $recipe->block->id]) : '' ?><?php if ($recipe->has('block')) : ?><img src="/<?= $recipe->block->image_url?>"><?php else : ?><?php endif; ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Chunk') ?></th>
            <td><?= $recipe->has('chunk') ? $this->Html->link($recipe->chunk->name, ['controller' => 'Chunks', 'action' => 'view', $recipe->chunk->id]) : '' ?><?php if ($recipe->has('chunk')) : ?><img src="/<?= $recipe->chunk->image_url?>"><?php else : ?><?php endif; ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($recipe->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Need') ?></th>
            <td><?= $this->Number->format($recipe->need) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($recipe->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($recipe->modified) ?></td>
        </tr>
    </table>
</div>
