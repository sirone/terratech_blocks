<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ChunkRarity $chunkRarity
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $chunkRarity->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $chunkRarity->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Chunk Rarities'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Chunks'), ['controller' => 'Chunks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Chunk'), ['controller' => 'Chunks', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="chunkRarities form large-9 medium-8 columns content">
    <?= $this->Form->create($chunkRarity) ?>
    <fieldset>
        <legend><?= __('Edit Chunk Rarity') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
