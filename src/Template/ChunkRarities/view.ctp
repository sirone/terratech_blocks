<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ChunkRarity $chunkRarity
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Chunk Rarity'), ['action' => 'edit', $chunkRarity->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Chunk Rarity'), ['action' => 'delete', $chunkRarity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $chunkRarity->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Chunk Rarities'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Chunk Rarity'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Chunks'), ['controller' => 'Chunks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Chunk'), ['controller' => 'Chunks', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="chunkRarities view large-9 medium-8 columns content">
    <h3><?= h($chunkRarity->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($chunkRarity->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($chunkRarity->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($chunkRarity->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($chunkRarity->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Chunks') ?></h4>
        <?php if (!empty($chunkRarity->chunks)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Image Url') ?></th>
                <th scope="col"><?= __('Sell Price') ?></th>
                <th scope="col"><?= __('Refined Chunk Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($chunkRarity->chunks as $chunks): ?>
            <tr>
                <td><?= h($chunks->id) ?></td>
                <td><?= h($chunks->name) ?></td>
                <td><?= h($chunks->description) ?></td>
                <td><?= h($chunks->image_url) ?><img src="/<?= h($chunks->image_url) ?>"></td>
                <td><?= h($chunks->sell_price) ?></td>
                <td><?= h($chunks->refined_chunk_id) ?></td>
                <td><?= h($chunks->created) ?></td>
                <td><?= h($chunks->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Chunks', 'action' => 'view', $chunks->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Chunks', 'action' => 'edit', $chunks->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Chunks', 'action' => 'delete', $chunks->id], ['confirm' => __('Are you sure you want to delete # {0}?', $chunks->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
