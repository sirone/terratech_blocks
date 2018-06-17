<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Block[]|\Cake\Collection\CollectionInterface $blocks
 */
?>
<?php
$grades = [1=>1,2=>2,3=>3,4=>4,5=>5];
/* https://github.com/Rydgel/Fake-images-please/blob/master/app/main.py */
$fake_img = 'https://fakeimg.pl/220x220/666%2C64/fff%2C128/?text=%C3%97&font_size=140';
?>
<style>
.bd-highlight {
  background-color: rgba(86,61,124,.15);
  border: 1px solid rgba(86,61,124,.15);
}
</style>
<h3><?= __('Blocks') ?></h3>
<?php $this->Form->create(null); ?>
<!-- たぶん flexbox の使い方を間違えてる気がするんだけど、フロントの人ではないので多めに見てください m(_ _)m -->
<div class="d-flex flex-column align-content-stretch">
    <div class="d-flex">
        <div class="p-3 col-1 bd-highlight">企業</div>
        <div class="p-1 col-2 bd-highlight"><?= $this->Form->select('corporation', $corporations, ['empty'=>true,'id'=>'select_corporations']); ?></div>
        <div class="p-3 col-2 bd-highlight">ブロック種別</div>
        <div class="p-1 col-1 bd-highlight"><?= $this->Form->select('categories', $categories, ['empty'=>true,'id'=>'select_categories']); ?></div>
        <div class="p-3 col-2 bd-highlight">グレード</div>
        <div class="p-1 col-1 bd-highlight"><?= $this->Form->select('grades', $grades, ['empty'=>true,'id'=>'select_grades']); ?></div>
        <div class="p-3 col-2 bd-highlight">生産個数</div>
        <div class="p-1 col-1 bd-highlight"><?= $this->Form->control('number_of_needs',['type'=>'text', 'default'=>1, 'label'=>false, 'maxlength'=>2, 'id'=>'number_of_needs']); ?></div>
    </div>
    <div class="d-flex">
        <div class="p-3 col-2 bd-highlight">和名</div>
        <div class="p-2 col-10 bd-highlight"><?= $this->Form->select('blocks', $blocks, ['id'=>'select_blocks']); ?></div>
    </div>
    <div class="d-flex">
        <div class="p-3 col-2 bd-highlight">英名</div>
        <div class="p-2 col-10 bd-highlight"></div>
    </div>
    <div class="d-flex" style="height: 300px">
        <div class="p-0 col-2 bd-highlight d-flex flex-wrap">
            <div class="p-0 col-12 bd-highlight" id="out_block">
                <img src="<?= $fake_img ?>">
            </div>
        </div>
        <?php $nums = ['Ⅰ','Ⅱ','Ⅲ','Ⅳ','Ⅴ'] ?>
        <?php for ($i=0; $i<5; $i++) : ?>
        <div class="p-0 col-2 bd-highlight d-flex flex-wrap">
            <div class="d-flex col-12 bd-highlight"><?= $nums[$i] ?></div>
            <div class="d-flex">
                <div class="col-9 bd-highlight" id="out_chunk_<?= $i ?>"><img src="<?= $fake_img ?>"></div>
                <div class="col-3 bd-highlight" id="out_chunk_need_<?= $i ?>">-</div>
                <div style="display:none" id="out_original_need_<?= $i ?>"></div>
            </div>
            <div class="d-flex col-12 bd-highlight" id="out_chunk_name_<?= $i ?>">-</div>
            <div class="d-flex col-12 bd-highlight" id="out_chunk_rarity_<?= $i ?>">-</div>
        </div>
        <?php endfor; ?>
    </div>
    <div class="d-flex" style="height: 300px">
        <div class="p-0 col-2 bd-highlight">
            <div class="d-flex">
                <div class="col-3 bd-highlight"><small>企業</small></div>
                <div class="col-3 bd-highlight"><small>レアリティ</small></div>
                <div class="col-3 bd-highlight"><small>種別</small></div>
                <div class="col-3 bd-highlight"><small>グレード</small></div>
            </div>
            <div class="d-flex">
                <div class="p-0 col-3 bd-highlight" id="out_corporation"><img src="<?= $fake_img ?>"></div>
                <div class="p-0 col-3 bd-highlight" id="out_rarity"><img src="<?= $fake_img ?>"></div>
                <div class="p-0 col-3 bd-highlight" id="out_category"><img src="<?= $fake_img ?>"></div>
                <div class="col-3 bd-highlight" id="out_grade">1</div>
            </div>
        </div>
        <?php for ($i=0; $i<5; $i++) : ?>
        <div class="p-0 col-2 bd-highlight d-flex flex-wrap">
            <div class="d-flex col-12 bd-highlight"><?= $i+1 ?></div>
            <div class="d-flex">
                <div class="col-9 bd-highlight"><img src="<?= $fake_img ?>"></div>
                <div class="col-3 bd-highlight">-</div>
            </div>
            <div class="d-flex col-12 bd-highlight">-</div>
        </div>
        <?php endfor; ?>
    </div>
    <div class="d-flex align-content-stretch" style="height: 300px">
        <div class="p-0 col-2 bd-highlight">
            <div class="d-flex align-content-stretch">
                <div class="col-6 bd-highlight">買値</div>
                <div class="col-6 bd-highlight">売値</div>
            </div>
            <div class="d-flex align-content-stretch">
                <div class="col-6 bd-highlight" id="purchace_value">฿฿0</div>
                <div class="col-6 bd-highlight" id="scrap_value">฿฿0</div>
            </div>
        </div>
        <?php for ($i=5; $i<10; $i++) : ?>
        <div class="p-0 col-2 bd-highlight d-flex flex-wrap">
            <div class="d-flex col-12 bd-highlight"><?= $i ?></div>
            <div class="d-flex">
                <div class="col-8 bd-highlight"><img src="<?= $fake_img ?>"></div>
                <div class="col-4 bd-highlight">-</div>
            </div>
            <div class="d-flex col-12 bd-highlight">-</div>
        </div>
        <?php endfor; ?>
    </div>
</div>
<div id="result"></div>

<script>
$(function($) {
    function ajax_get_request($parameters, $done, $fail) {
        $.ajax($parameters)
        .done( (data) => $done(data) )
        .fail( (data) => $fail(data) )
    }

    function blocks_request() {
        var queries = {
            corporation_id : $('#select_corporations').val(),
            category_id : $('#select_categories').val(),
            grade : $('#select_grades').val(),
        };
        ajax_get_request({
                url:'api/blocks/.json?'+$.param(queries),
                type:'GET',
            }, function (data) {
                $('#select_blocks option').remove();
                for (var key in data) {
                    $('#select_blocks').append($('<option>').val(data[key].id).text(data[key].name));
                }
                block_request(data[0].id);
            }, function (data) {console.log(data)}
        );
    }

    function block_request(id) {
        ajax_get_request({
                url:'api/blocks/'+id+'.json?',
                type:'GET',
            }, function (data) {block_apply(data)
            }, function (data) {console.log(data)
        });
    }

    function block_apply(data) {
        $('#out_corporation img').attr('src',data.corporation.image_url);
        $('#out_rarity img').attr('src',data.rarity.image_url);
        $('#out_category img').attr('src',data.category.image_url);
        $('#out_block img').attr('src',data.image_url);
        $('#out_grade').html(data.grade);
        recipe_request(data.id);
    }

    function recipe_request(block_id) {
        ajax_get_request({
                url:'api/recipes/'+block_id+'.json?',
                type:'GET',
            }, function (data) {
                recipe_apply(data);
                console.log('recipe applied');
                console.log(data);
            }, function (data) {console.log('can\'t applied!'+data)}
        );
    }

    function recipe_apply(data) {
        for (var i=0; i<5; i++) {
            $('#out_chunk_'+i+' img').attr('src','<?= $fake_img ?>');
            $('#out_chunk_name_'+i).html('-');
            $('#out_chunk_rarity_'+i).html('-');
            $('#out_chunk_need_'+i).html('1');
            $('#out_original_need_'+i).html('0');
        }
        for (var key in data) {
            $('#out_chunk_'+key+' img').attr('src',data[key].chunk.image_url);
            $('#out_chunk_name_'+key).html(data[key].chunk.name);
            $('#out_chunk_rarity_'+key).html(data[key].chunk.chunk_rarity.name);
            $('#out_chunk_need_'+key).html(data[key].need);
            $('#out_original_need_'+key).html(data[key].need);
        }
    }

    function update_number_of_need() {
        var need = $('#number_of_needs').val();
        for (var i=0; i<5; i++) {
            $original_need = $('#out_original_need_'+i).html();
            $('#out_chunk_need_'+i).html($original_need*need);
        }
    }

    <?php /* 「企業」の選択時に発動 */ ?>
    $('#select_corporations').change(function() {
        blocks_request();
    });
    <?php /* 「ブロック種別」の選択時に発動 */ ?>
    $('#select_categories').change(function() {
        blocks_request();
    });
    <?php /* 「グレード」の選択時に発動 */ ?>
    $('#select_grades').change(function() {
        blocks_request();
    });
    <?php /* 「必要個数」の選択時に発動 */ ?>
    $('#number_of_needs').keyup(function() {
        update_number_of_need();
    });
    <?php /* 「ブロック」の選択時に発動 */ ?>
    $('#select_blocks').change(function() {
        var block_id = $('#select_blocks option:selected').val()
        block_request(block_id);
        recipe_request(block_id);
    });
});
</script>