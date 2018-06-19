<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Block[]|\Cake\Collection\CollectionInterface $blocks
 */
?><?php
echo $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.5.1/css/iziModal.min.css', ['block'=>true]);
echo $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.5.1/js/iziModal.js', ['block'=>true]);
echo $this->Html->script('block_information/index.js', ['block'=>true]);
$grades = [1=>1,2=>2,3=>3,4=>4,5=>5];
/* https://github.com/Rydgel/Fake-images-please/blob/master/app/main.py */
$fake_img = 'img/Site.png';
?>

<style>
.bd-highlight {
<?= $this->Html->style([
        'background-color' => 'rgba(120,86,124,.12)',
        'border' => '1px solid rgba(30,30,124,.1)'
    ]);
?>
}
.stroke {
<?= $this->Html->style([
        'color' => '#fff',
        'text-stroke' => '2px #000',
        '-webkit-text-stroke' => '2px #000'
    ]);
?>
}
button:hover, button:focus, .button:hover, .button:focus {
<?= $this->Html->style([
        'background-color' => 'rgba(0, 0, 0, 0.01)',
    ]);
?>
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
    <div class="d-flex" style="height: 300px">
        <div class="p-0 col-2 bd-highlight d-flex flex-wrap">
            <div class="p-0 col-12 bd-highlight" id="out_block">
                <img src="<?= $fake_img ?>" width="190px">
            </div>
        </div>
        <?php $nums = ['Ⅰ','Ⅱ','Ⅲ','Ⅳ','Ⅴ'] ?><?php // インデックス ?>
        <?php for ($i=0; $i<5; $i++) : ?>
        <div class="p-0 col-2 bd-highlight d-flex flex-wrap">
            <div class="d-flex col-12 bd-highlight justify-content-center align-items-center font-weight-bold"><?= $nums[$i] ?></div><?php // インデックス ?>
            <div class="d-flex w-100">
                <div class="col-12 bd-highlight p-0" id="out_recipe_<?= $i ?>">
                    <span class="font-weight-bold stroke position-absolute" id="out_recipe_need_<?= $i ?>" style="right:0;bottom:0;font-size:3em;">-</span>
                    <img src="<?= $fake_img ?>" width="150px">
                </div><?php // 素材画像 ?>
                <div class="invisible" id="out_recipe_original_need_<?= $i ?>"></div><?php // 元の必要個数. ($('#number_of_needs') によって変更されるので) ?>
            </div>
            <div class="d-flex col-12 bd-highlight justify-content-center align-items-center small" id="out_recipe_name_<?= $i ?>">-</div><?php // 素材名 ?>
            <div class="d-flex col-12 bd-highlight justify-content-center align-items-center text-muted" id="out_recipe_rarity_<?= $i ?>">-</div><?php // 素材のレアリティ ?>
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
        <div class="d-flex flex-wrap p-0 col-2 bd-highlight">
            <div class="d-flex col-12 bd-highlight justify-content-center align-items-center">必要資材<?= $i+1 ?></div><?php // インデックス ?>
            <div class="d-flex w-100">
                <div class="col-12 bd-highlight p-0" id="out_chunk_<?= $i ?>">
                    <span class="font-weight-bold stroke position-absolute" id="out_chunk_need_<?= $i ?>" style="right:0;bottom:0;font-size:3em;">-</span>
                    <div class="invisible" id="out_chunk_original_need_<?= $i ?>"></div><?php // 元の必要個数. ($('#number_of_needs') によって変更されるので) ?>
                    <img src="<?= $fake_img ?>" width="150px">
                </div><?php // 必要となるコンポーネントの画像 ?>
            </div>
            <div class="d-flex col-12 bd-highlight justify-content-center align-items-center small" id="out_chunk_name_<?= $i ?>">-</div><?php // 必要となるコンポーネントの名前 ?>
        </div>
        <?php endfor; ?>
    </div>
    <div class="d-flex align-content-stretch" style="height: 300px">
        <div class="p-0 col-2 bd-highlight">　
        </div>
        <?php for ($i=5; $i<10; $i++) : ?>
        <div class="p-0 col-2 bd-highlight d-flex flex-wrap">
            <div class="d-flex col-12 bd-highlight justify-content-center align-items-center">必要資材<?= $i+1 ?></div><?php // インデックス ?>
            <div class="d-flex w-100">
                <div class="col-12 bd-highlight p-0" id="out_chunk_<?= $i ?>">
                    <span class="font-weight-bold stroke position-absolute" id="out_chunk_need_<?= $i ?>" style="right:0;bottom:0;font-size:3em;">-</span>
                    <div class="invisible" id="out_chunk_original_need_<?= $i ?>"></div><?php // 元の必要個数. ($('#number_of_needs') によって変更されるので) ?>
                    <img src="<?= $fake_img ?>" width="150px">
                </div><?php // 必要となるコンポーネントの画像 ?>
            </div>
            <div class="d-flex col-12 bd-highlight justify-content-center align-items-center small" id="out_chunk_name_<?= $i ?>">-</div><?php // 必要となるコンポーネントの名前 ?>
        </div>
        <?php endfor; ?>
    </div>
</div>