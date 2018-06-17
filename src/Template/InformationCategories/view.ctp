<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InformationCategory $informationCategory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Information Category'), ['action' => 'edit', $informationCategory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Information Category'), ['action' => 'delete', $informationCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $informationCategory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Information Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Information Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Information'), ['controller' => 'Information', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Information'), ['controller' => 'Information', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="informationCategories view large-9 medium-8 columns content">
    <h3><?= h($informationCategory->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($informationCategory->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($informationCategory->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($informationCategory->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($informationCategory->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Information') ?></h4>
        <?php if (!empty($informationCategory->information)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Information Category Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($informationCategory->information as $information): ?>
            <tr>
                <td><?= h($information->id) ?></td>
                <td><?= h($information->title) ?></td>
                <td><?= h($information->description) ?></td>
                <td><?= h($information->information_category_id) ?></td>
                <td><?= h($information->created) ?></td>
                <td><?= h($information->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Information', 'action' => 'view', $information->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Information', 'action' => 'edit', $information->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Information', 'action' => 'delete', $information->id], ['confirm' => __('Are you sure you want to delete # {0}?', $information->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
