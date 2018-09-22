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
        <li><?= $this->Html->link(__('List Refined Chunks'), ['controller' => 'Chunks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Refined Chunk'), ['controller' => 'Chunks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Chunk Categories'), ['controller' => 'ChunkCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Chunk Category'), ['controller' => 'ChunkCategories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Chunk Rarities'), ['controller' => 'ChunkRarities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Chunk Rarity'), ['controller' => 'ChunkRarities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Component Tiers'), ['controller' => 'ComponentTiers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Component Tier'), ['controller' => 'ComponentTiers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Recipes'), ['controller' => 'Recipes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Recipe'), ['controller' => 'Recipes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="chunks form large-9 medium-8 columns content">
    <?= $this->Form->create($chunk) ?>
    <fieldset>
        <legend><?= __('Edit Chunk') ?></legend>
        <?php
            echo $this->Form->control('identifier');
            echo $this->Form->control('name');
            echo $this->Form->control('description');
            echo $this->Form->control('image_url');
            echo $this->Form->control('sell_price');
            echo $this->Form->control('refined_chunk_id', ['options' => $refinedChunks, 'empty' => true]);
            echo $this->Form->control('chunk_category_id', ['options' => $chunkCategories]);
            echo $this->Form->control('chunk_rarity_id', ['options' => $chunkRarities]);
            echo $this->Form->control('component_tier_id', ['options' => $componentTiers, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
