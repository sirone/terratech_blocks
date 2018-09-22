<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Block[]|\Cake\Collection\CollectionInterface $blocks
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Block'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rarities'), ['controller' => 'Rarities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rarity'), ['controller' => 'Rarities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Corporations'), ['controller' => 'Corporations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Corporation'), ['controller' => 'Corporations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Block Attributes'), ['controller' => 'BlockAttributes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Block Attribute'), ['controller' => 'BlockAttributes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Recipes'), ['controller' => 'Recipes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Recipe'), ['controller' => 'Recipes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="blocks index large-9 medium-8 columns content">
    <h3><?= __('Blocks') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('identifier') ?></th>
                <th scope="col"><?= $this->Paginator->sort('category_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rarity_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('corporation_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('grade') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('image_url') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($blocks as $block): ?>
            <tr>
                <td><?= $this->Number->format($block->id) ?></td>
                <td><?= h($block->identifier) ?></td>
                <td><?= $block->has('category') ? $this->Html->link($block->category->name, ['controller' => 'Categories', 'action' => 'view', $block->category->id]) : '' ?></td>
                <td><?= $block->has('rarity') ? $this->Html->link($block->rarity->name, ['controller' => 'Rarities', 'action' => 'view', $block->rarity->id]) : '' ?></td>
                <td><?= $block->has('corporation') ? $this->Html->link($block->corporation->name, ['controller' => 'Corporations', 'action' => 'view', $block->corporation->id]) : '' ?></td>
                <td><?= $this->Number->format($block->grade) ?></td>
                <td><?= h($block->name) ?></td>
                <td><?= h($block->image_url) ?><img src="<?= h($block->image_url) ?>"></td>
                <td><?= h($block->created) ?></td>
                <td><?= h($block->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $block->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $block->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $block->id], ['confirm' => __('Are you sure you want to delete # {0}?', $block->id)]) ?>
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
