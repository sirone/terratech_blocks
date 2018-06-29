<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Maintainer $maintainer
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Maintainer'), ['action' => 'edit', $maintainer->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Maintainer'), ['action' => 'delete', $maintainer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $maintainer->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Maintainers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Maintainer'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="maintainers view large-9 medium-8 columns content">
    <h3><?= h($maintainer->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($maintainer->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($maintainer->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($maintainer->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($maintainer->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($maintainer->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($maintainer->modified) ?></td>
        </tr>
    </table>
</div>
