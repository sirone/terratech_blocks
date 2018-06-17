<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InformationCategory $informationCategory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Information Categories'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Information'), ['controller' => 'Information', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Information'), ['controller' => 'Information', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="informationCategories form large-9 medium-8 columns content">
    <?= $this->Form->create($informationCategory) ?>
    <fieldset>
        <legend><?= __('Add Information Category') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
