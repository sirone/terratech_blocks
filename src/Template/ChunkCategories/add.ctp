<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ChunkCategory $chunkCategory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Chunk Categories'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="chunkCategories form large-9 medium-8 columns content">
    <?= $this->Form->create($chunkCategory) ?>
    <fieldset>
        <legend><?= __('Add Chunk Category') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
