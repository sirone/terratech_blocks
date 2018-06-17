<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rarity $rarity
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $rarity->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $rarity->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Rarities'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Blocks'), ['controller' => 'Blocks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Block'), ['controller' => 'Blocks', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="rarities form large-9 medium-8 columns content">
    <?= $this->Form->create($rarity) ?>
    <fieldset>
        <legend><?= __('Edit Rarity') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('image_url');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
