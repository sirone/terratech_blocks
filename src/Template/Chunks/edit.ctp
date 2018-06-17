<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Chunk $chunk
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $chunk->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $chunk->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Chunks'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Chunk Rarities'), ['controller' => 'ChunkRarities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Chunk Rarity'), ['controller' => 'ChunkRarities', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="chunks form large-9 medium-8 columns content">
    <?= $this->Form->create($chunk) ?>
    <fieldset>
        <legend><?= __('Edit Chunk') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('description');
            echo $this->Form->control('image_url');
            echo $this->Form->control('sell_price');
            echo $this->Form->control('refined_chunk_id');
            echo $this->Form->control('chunk_rarity_id', ['options' => $chunkRarities]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
