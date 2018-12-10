<a href="#" id="top"></a>

<ul>
<?php foreach (array_keys($converted) as $id) : ?>
    <li><a href="#<?= ltrim($id,'$') ?>"><?= ltrim($id,'$') ?></a></li>
<?php endforeach; ?>
</ul>

<p>以下、対訳一覧</p>
<?php foreach ($converted as $index => $translates) : ?>
<?php $table_name=ltrim($index,'$'); ?>
<table id="<?= $table_name ?>">
    <thead>
        <td><a href="#" class="copy" data-source="<?= $table_name ?>"><?= $table_name ?></a><a href="#top">⇑</a></td>
    </thead>
    <?php foreach ($translates as $translate) : ?>
    <tr>
        <?php $translate = str_replace(["\t","'"], ['</td><td>',"\\'"], $translate); ?>
        <td><?= $translate; ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<?php endforeach; ?>
<script>
    $('.copy').click(function(e) {
        e.preventDefault();
        copyToClipboard($(this).data('source'));
    });
    function copyToClipboard(tableId){
        window.getSelection().removeAllRanges();

        var range = document.createRange();
        var node = document.getElementById(tableId);
        var dupNode = node.cloneNode(true).children[0];
        range.selectNode(node);
        window.getSelection().addRange(range);
        node.children[0].remove()
        document.execCommand('copy');
        node.prepend(dupNode);
        window.getSelection().removeAllRanges();
    }
</script>
