<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ComponentRecipe[]|\Cake\Collection\CollectionInterface $componentRecipes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Component Recipe'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Chunks'), ['controller' => 'Chunks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Chunk'), ['controller' => 'Chunks', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="componentRecipes index large-9 medium-8 columns content">
    <h3><?= __('Component Recipes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('chunk_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('need_chunk_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($componentRecipes as $componentRecipe): ?>
            <tr>
                <td><?= $this->Number->format($componentRecipe->id) ?></td>
                <td><?= $componentRecipe->has('chunk') ? $this->Html->link($componentRecipe->chunk->name, ['controller' => 'Chunks', 'action' => 'view', $componentRecipe->chunk->id]) : '' ?></td>
                <td><?= $this->Number->format($componentRecipe->need_chunk_id) ?></td>
                <td><?= h($componentRecipe->created) ?></td>
                <td><?= h($componentRecipe->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $componentRecipe->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $componentRecipe->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $componentRecipe->id], ['confirm' => __('Are you sure you want to delete # {0}?', $componentRecipe->id)]) ?>
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
