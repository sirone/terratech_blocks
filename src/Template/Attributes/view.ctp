<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Attribute $attribute
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Attribute'), ['action' => 'edit', $attribute->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Attribute'), ['action' => 'delete', $attribute->id], ['confirm' => __('Are you sure you want to delete # {0}?', $attribute->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Attributes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Attribute'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Blocks'), ['controller' => 'Blocks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Block'), ['controller' => 'Blocks', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="attributes view large-9 medium-8 columns content">
    <h3><?= h($attribute->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($attribute->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($attribute->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($attribute->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($attribute->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Blocks') ?></h4>
        <?php if (!empty($attribute->blocks)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Identifier') ?></th>
                <th scope="col"><?= __('Category Id') ?></th>
                <th scope="col"><?= __('Rarity Id') ?></th>
                <th scope="col"><?= __('Attribute Id') ?></th>
                <th scope="col"><?= __('Grade') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Image Url') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($attribute->blocks as $blocks): ?>
            <tr>
                <td><?= h($blocks->id) ?></td>
                <td><?= h($blocks->identifier) ?></td>
                <td><?= h($blocks->category_id) ?></td>
                <td><?= h($blocks->rarity_id) ?></td>
                <td><?= h($blocks->attribute_id) ?></td>
                <td><?= h($blocks->grade) ?></td>
                <td><?= h($blocks->name) ?></td>
                <td><?= h($blocks->description) ?></td>
                <td><?= h($blocks->image_url) ?></td>
                <td><?= h($blocks->created) ?></td>
                <td><?= h($blocks->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Blocks', 'action' => 'view', $blocks->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Blocks', 'action' => 'edit', $blocks->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Blocks', 'action' => 'delete', $blocks->id], ['confirm' => __('Are you sure you want to delete # {0}?', $blocks->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
