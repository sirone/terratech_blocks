<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Block $block
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Blocks'), ['action' => 'index']) ?></li>
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
<div class="blocks form large-9 medium-8 columns content">
    <?= $this->Form->create($block) ?>
    <fieldset>
        <legend><?= __('Add Block') ?></legend>
        <?php
            echo $this->Form->control('identifier');
            echo $this->Form->control('category_id', ['options' => $categories]);
            echo $this->Form->control('rarity_id', ['options' => $rarities]);
            echo $this->Form->control('corporation_id', ['options' => $corporations]);
            echo $this->Form->control('grade');
            echo $this->Form->control('name');
            echo $this->Form->control('description');
            echo $this->Form->control('image_url');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
