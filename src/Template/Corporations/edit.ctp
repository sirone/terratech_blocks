<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Corporation $corporation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $corporation->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $corporation->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Corporations'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="corporations form large-9 medium-8 columns content">
    <?= $this->Form->create($corporation) ?>
    <fieldset>
        <legend><?= __('Edit Corporation') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('image_url');
            echo $this->Form->control('is_planned');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
