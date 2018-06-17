<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ComponentTier $componentTier
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Component Tier'), ['action' => 'edit', $componentTier->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Component Tier'), ['action' => 'delete', $componentTier->id], ['confirm' => __('Are you sure you want to delete # {0}?', $componentTier->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Component Tiers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Component Tier'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="componentTiers view large-9 medium-8 columns content">
    <h3><?= h($componentTier->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($componentTier->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($componentTier->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($componentTier->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($componentTier->modified) ?></td>
        </tr>
    </table>
</div>
