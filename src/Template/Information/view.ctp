<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Information $information
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Information'), ['action' => 'edit', $information->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Information'), ['action' => 'delete', $information->id], ['confirm' => __('Are you sure you want to delete # {0}?', $information->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Information'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Information'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Information Categories'), ['controller' => 'InformationCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Information Category'), ['controller' => 'InformationCategories', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="information view large-9 medium-8 columns content">
    <h3><?= h($information->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($information->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Information Category') ?></th>
            <td><?= $information->has('information_category') ? $this->Html->link($information->information_category->name, ['controller' => 'InformationCategories', 'action' => 'view', $information->information_category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($information->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reserved At') ?></th>
            <td><?= h($information->reserved_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($information->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($information->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($information->description)); ?>
    </div>
</div>
