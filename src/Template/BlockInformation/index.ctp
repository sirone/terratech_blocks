<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Block[]|\Cake\Collection\CollectionInterface $blocks
 */
?>
<?php
echo $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.5.1/css/iziModal.min.css', ['block'=>true]);
echo $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.5.1/js/iziModal.js', ['block'=>true]);
$grades = [1=>1,2=>2,3=>3,4=>4,5=>5];
/* https://github.com/Rydgel/Fake-images-please/blob/master/app/main.py */
$fake_img = 'https://fakeimg.pl/220x220/666%2C64/fff%2C128/?text=%C3%97&font_size=140';
?>
<style>
.bd-highlight {
  background-color: rgba(86,61,124,.15);
  border: 1px solid rgba(86,61,124,.15);
}

button:hover, button:focus, .button:hover, .button:focus {
    background-color: rgba(0, 0, 0, 0.01);
}
</style>
<?php foreach ($information_list as $information): ?>
<div class="information_modal" data-izimodal-group="information-list" data-iziModal-title="<?= $information->title ?>" data-iziModal-subtitle="<?= $information->information_category->name ?> <?= $information->reserved_at ?>">
    <?= $information->description; ?>
    <nav>
        <button data-izimodal-prev="" class="p-1">前のニュース</button><button data-izimodal-next="" class="p-1">次のニュース</button>
    </nav>
</div>
<?php endforeach; ?>
<h3><?= __('Information') ?></h3>
<a href="#" data-izimodal-open=".information_modal">更新情報</a>

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
        <?php $nums = ['Ⅰ','Ⅱ','Ⅲ','Ⅳ','Ⅴ'] ?><?php // インデックス ?>
        <?php for ($i=0; $i<5; $i++) : ?>
        <div class="p-0 col-2 bd-highlight d-flex flex-wrap">
            <div class="d-flex col-12 bd-highlight justify-content-center align-items-center font-weight-bold"><?= $nums[$i] ?></div><?php // インデックス ?>
            <div class="d-flex">
                <div class="col-7 bd-highlight p-0" id="out_chunk_<?= $i ?>"><img src="<?= $fake_img ?>"></div><?php // 素材画像 ?>
                <div class="col-5 bd-highlight align-self-stretch text-center font-weight-bold" id="out_chunk_need_<?= $i ?>">-</div><?php // 素材の必要数 ?>
                <div style="display:none" id="out_original_need_<?= $i ?>"></div>
            </div>
            <div class="d-flex col-12 bd-highlight justify-content-center align-items-center" id="out_chunk_name_<?= $i ?>">-</div><?php // 素材名 ?>
            <div class="d-flex col-12 bd-highlight justify-content-center align-items-center" id="out_chunk_rarity_<?= $i ?>">-</div><?php // 素材のレアリティ ?>
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
                <div class="p-0 col-3 bd-highlight" id="out_corporation"><img src="<?= $fake_img ?>"></div><?php // 企業ロゴ ?>
                <div class="p-0 col-3 bd-highlight" id="out_rarity"><img src="<?= $fake_img ?>"></div><?php // レアリティ画像 ?>
                <div class="p-0 col-3 bd-highlight" id="out_category"><img src="<?= $fake_img ?>"></div><?php // カテゴリ画像 ?>
                <div class="col-3 bd-highlight" id="out_grade">1</div><?php // グレード値 (ライセンス？) ?>
            </div>
                <div class="d-flex align-content-stretch">
                    <div class="col-6 bd-highlight">買値</div>
                    <div class="col-6 bd-highlight">売値</div>
                </div>
                <div class="d-flex align-content-stretch">
                    <div class="col-6 bd-highlight" id="purchace_value">฿฿0</div><?php // 買値 ?>
                    <div class="col-6 bd-highlight" id="scrap_value">฿฿0</div><?php // 売値 ?>
                </div>
        </div>
        <?php for ($i=0; $i<5; $i++) : ?>
        <div class="p-0 col-2 bd-highlight d-flex flex-wrap">
            <div class="d-flex col-12 bd-highlight justify-content-center align-items-center">必要資材<?= $i+1 ?></div><?php // インデックス ?>
            <div class="d-flex">
                <div class="col-7 bd-highlight p-0"><img src="<?= $fake_img ?>"></div><?php // 必要となるコンポーネントの画像 ?>
                <div class="col-5 bd-highlight align-self-stretch text-center font-weight-bold">-</div><?php // 必要個数 ?>
            </div>
            <div class="d-flex col-12 bd-highlight justify-content-center align-items-center">-</div><?php // 必要となるコンポーネントの名前 ?>
        </div>
        <?php endfor; ?>
    </div>
    <div class="d-flex align-content-stretch" style="height: 300px">
        <div class="p-0 col-2 bd-highlight">　
        </div>
        <?php for ($i=5; $i<10; $i++) : ?>
        <div class="p-0 col-2 bd-highlight d-flex flex-wrap">
            <div class="d-flex col-12 bd-highlight justify-content-center align-items-center">必要資材<?= $i+1 ?></div><?php // インデックス ?>
            <div class="d-flex">
                <div class="col-7 bd-highlight p-0"><img src="<?= $fake_img ?>"></div><?php // 必要となるコンポーネントの画像 ?>
                <div class="col-5 bd-highlight align-self-stretch text-center font-weight-bold">-</div><?php // 必要個数 ?>
            </div>
            <div class="d-flex col-12 bd-highlight justify-content-center align-items-center">-</div><?php // 必要となるコンポーネントの名前 ?>
        </div>
        <?php endfor; ?>
    </div>
</div>

<script>
$(function($) {
    $('.information_modal').iziModal({
        group: 'information-list',
        loop: true,
        radius: 8,
        top: 80,
        timeout: 500000,
        timeoutProgressbar: true,
        pauseOnHover: true,
        headerColor: '#116d76',
    });

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
                if (data[0] != undefined) {
                    block_request(data[0].id);
                }
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