<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Corporation[]|\Cake\Collection\CollectionInterface $corporations
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Corporation'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="corporations index large-9 medium-8 columns content">
    <h3><?= __('Corporations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('image_url') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_planned') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($corporations as $corporation): ?>
            <tr>
                <td><?= $this->Number->format($corporation->id) ?></td>
                <td><?= h($corporation->name) ?></td>
                <td><?= h($corporation->image_url) ?><img src="<?= h($corporation->image_url) ?>"></td>
                <td><?= h($corporation->is_planned) ?></td>
                <td><?= h($corporation->created) ?></td>
                <td><?= h($corporation->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $corporation->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $corporation->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $corporation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $corporation->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
