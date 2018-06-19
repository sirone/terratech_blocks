<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ComponentRecipe $componentRecipe
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $componentRecipe->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $componentRecipe->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Component Recipes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Chunks'), ['controller' => 'Chunks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Chunk'), ['controller' => 'Chunks', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="componentRecipes form large-9 medium-8 columns content">
    <?= $this->Form->create($componentRecipe) ?>
    <fieldset>
        <legend><?= __('Edit Component Recipe') ?></legend>
        <?php
            echo $this->Form->control('chunk_id', ['options' => $chunks]);
            echo $this->Form->control('need_chunk_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
