<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Corporation $corporation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Corporation'), ['action' => 'edit', $corporation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Corporation'), ['action' => 'delete', $corporation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $corporation->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Corporations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Corporation'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="corporations view large-9 medium-8 columns content">
    <h3><?= h($corporation->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($corporation->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image Url') ?></th>
            <td><?= h($corporation->image_url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($corporation->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($corporation->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($corporation->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Planned') ?></th>
            <td><?= $corporation->is_planned ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
