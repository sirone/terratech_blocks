<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Block $block
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Block'), ['action' => 'edit', $block->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Block'), ['action' => 'delete', $block->id], ['confirm' => __('Are you sure you want to delete # {0}?', $block->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Blocks'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Block'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rarities'), ['controller' => 'Rarities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rarity'), ['controller' => 'Rarities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Corporations'), ['controller' => 'Corporations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Corporation'), ['controller' => 'Corporations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Block Attributes'), ['controller' => 'BlockAttributes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Block Attribute'), ['controller' => 'BlockAttributes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Recipes'), ['controller' => 'Recipes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Recipe'), ['controller' => 'Recipes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="blocks view large-9 medium-8 columns content">
    <h3><?= h($block->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Identifier') ?></th>
            <td><?= h($block->identifier) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= $block->has('category') ? $this->Html->link($block->category->name, ['controller' => 'Categories', 'action' => 'view', $block->category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rarity') ?></th>
            <td><?= $block->has('rarity') ? $this->Html->link($block->rarity->name, ['controller' => 'Rarities', 'action' => 'view', $block->rarity->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Corporation') ?></th>
            <td><?= $block->has('corporation') ? $this->Html->link($block->corporation->name, ['controller' => 'Corporations', 'action' => 'view', $block->corporation->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($block->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image Url') ?></th>
            <td><?= h($block->image_url) ?><img src="/<?= h($block->image_url) ?>"></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($block->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Grade') ?></th>
            <td><?= $this->Number->format($block->grade) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($block->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($block->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($block->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Block Attributes') ?></h4>
        <?php if (!empty($block->block_attributes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Block Id') ?></th>
                <th scope="col"><?= __('Attribute Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($block->block_attributes as $blockAttributes): ?>
            <tr>
                <td><?= h($blockAttributes->id) ?></td>
                <td><?= h($blockAttributes->block_id) ?></td>
                <td><?= h($blockAttributes->attribute_id) ?></td>
                <td><?= h($blockAttributes->created) ?></td>
                <td><?= h($blockAttributes->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'BlockAttributes', 'action' => 'view', $blockAttributes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'BlockAttributes', 'action' => 'edit', $blockAttributes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'BlockAttributes', 'action' => 'delete', $blockAttributes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $blockAttributes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Recipes') ?></h4>
        <?php if (!empty($block->recipes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Block Id') ?></th>
                <th scope="col"><?= __('Chunk Id') ?></th>
                <th scope="col"><?= __('Need') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($block->recipes as $recipes): ?>
            <tr>
                <td><?= h($recipes->id) ?></td>
                <td><?= h($recipes->block_id) ?></td>
                <td><?= h($recipes->chunk_id) ?></td>
                <td><?= h($recipes->need) ?></td>
                <td><?= h($recipes->created) ?></td>
                <td><?= h($recipes->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Recipes', 'action' => 'view', $recipes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Recipes', 'action' => 'edit', $recipes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Recipes', 'action' => 'delete', $recipes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recipes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
