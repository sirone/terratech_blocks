<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Maintainer $maintainer
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $maintainer->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $maintainer->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Maintainers'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="maintainers form large-9 medium-8 columns content">
    <?= $this->Form->create($maintainer) ?>
    <fieldset>
        <legend><?= __('Edit Maintainer') ?></legend>
        <?php
            echo $this->Form->control('username');
            echo $this->Form->control('password');
            echo $this->Form->control('email');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
