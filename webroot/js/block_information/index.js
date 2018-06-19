'use strict';
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
        .done( (response, status, jqXHR) => $done(response, status, jqXHR) )
        .fail( (status, jqXHR, errorThrown) => $fail(status, jqXHR, errorThrown) )
    }

    function blocks_request() {
        let queries = {
            corporation_id : $('#select_corporations').val(),
            category_id : $('#select_categories').val(),
            grade : $('#select_grades').val(),
        };
        ajax_get_request({
                url:'api/blocks/.json?'+$.param(queries),
                type:'GET',
            }, function (response, status, jqXHR) {
                $('#select_blocks option').remove();
                for (let key in response) {
                    $('#select_blocks').append($('<option>').val(response[key].id).text(response[key].name));
                }
                if (response[0] != undefined) {
                    block_request(response[0].id);
                }
            }, function (status, jqXHR, errorThrown) {
                console.log(errorThrown);
            }
        );
    }

    function block_request(id) {
        ajax_get_request({
                url:'api/blocks/'+id+'.json?',
                type:'GET',
            }, function (response, status, jqXHR) {
                block_apply(response);
            }, function (status, jqXHR, errorThrown) {
                console.log('can\'t applied!'+errorThrown);
            }
        );
    }

    function block_apply(data) {
        $('#out_corporation img').attr('src',data.corporation.image_url);
        $('#out_corporation').attr({'data-toggle':'tooltip','title': data.corporation.name});
        $('#out_rarity img').attr('src',data.rarity.image_url);
        $('#out_rarity').attr({'data-toggle':'tooltip','title': data.rarity.name});
        $('#out_category img').attr('src',data.category.image_url);
        $('#out_category').attr({'data-toggle':'tooltip','title': data.category.name});
        $('#out_block img').attr('src',data.image_url);
        $('#out_block').attr({'data-toggle':'tooltip','title': data.description.replace(/([！。？!?｡])/g, '$1\r\n')});
        $('#out_grade').html(data.grade);
        recipe_request(data.id);
        chunk_request(data.id);
    }

    function recipe_request(block_id) {
        ajax_get_request({
                url:'api/recipes/'+block_id+'.json?',
                type:'GET',
            }, function (response, status, jqXHR) {
                recipe_apply(response);
            }, function (status, jqXHR, errorThrown) {
                console.log('can\'t applied!'+errorThrown);
            }
        );
    }

    function recipe_apply(data) {
        for (let i=0; i<5; i++) {
            $('#out_recipe_'+i+' img').attr('src','img/Site.png');
            $('#out_recipe_'+i).removeAttr('data-toggle').removeAttr('title');
            $('#out_recipe_name_'+i).html('-');
            $('#out_recipe_rarity_'+i).html('-');
            $('#out_recipe_need_'+i).html('-');
            $('#out_recipe_original_need_'+i).html('0');
        }
        for (let key in data) {
            $('#out_recipe_'+key+' img').attr('src',data[key].chunk.image_url);
            $('#out_recipe_'+key).attr({'data-toggle':'tooltip','title': data[key].chunk.name+'\r\n'+data[key].chunk.description.replace(/([！。？!?｡])/g, '$1\r\n')});
            $('#out_recipe_name_'+key).html(data[key].chunk.name);
            $('#out_recipe_rarity_'+key).html(data[key].chunk.chunk_rarity.name);
            $('#out_recipe_need_'+key).html(data[key].need);
            $('#out_recipe_original_need_'+key).html(data[key].need);
        }
    }

    function update_number_of_needs() {
        const need = $('#number_of_needs').val();
        for (let i=0; i<5; i++) {
            const original = $('#out_recipe_original_need_'+i).html();
            if ((original*need) > 0) {
                $('#out_recipe_need_'+i).html(original*need);
            }
        }
    }

    function reset_number_of_needs() {
        $('#number_of_needs').val(1);
        for (let i=0; i<5; i++) {
            $('#out_recipe_need_'+i).html('-');
        }
    }

    function update_chunk_number_of_needs() {
        const need = $('#number_of_needs').val();
        for (let i=0; i<10; i++) {
            const original = $('#out_chunk_original_need_'+i).html();
            if ((original*need) > 0) {
                $('#out_chunk_need_'+i).html(original*need);
            }
        }
    }

    function reset_chunk_number_of_needs() {
        $('#number_of_needs').val(1);
        for (let i=0; i<10; i++) {
            $('#out_chunk_need_'+i).html('-');
        }
    }

    function chunk_request(block_id) {
        ajax_get_request({
                url:'api/chunks/'+block_id+'.json?',
                type:'GET',
            }, function (response, status, jqXHR) {
                chunk_apply(response);
            }, function (status, jqXHR, errorThrown) {
                console.log('can\'t applied!'+errorThrown);
            }
        );
    }

    function chunk_apply(data) {
        for (let i=0; i<10; i++) {
            $('#out_chunk_'+i+' img').attr('src','img/Site.png');
            $('#out_chunk_'+i).removeAttr('data-toggle');
            $('#out_chunk_'+i).removeAttr('title');
            $('#out_chunk_name_'+i).html('-');
            $('#out_chunk_rarity_'+i).html('-');
            $('#out_chunk_need_'+i).html('-');
            $('#out_chunk_original_need_'+i).html('0');
        }
        for (let key in data) {
            $('#out_chunk_'+key+' img').attr('src',data[key].image_url);
            $('#out_chunk_'+key).attr({'data-toggle':'tooltip','title': data[key].name+'\r\n'+data[key].description.replace(/([！。？!?｡])/g, '$1\r\n')});
            $('#out_chunk_name_'+key).html(data[key].name);
            $('#out_chunk_need_'+key).html(data[key].need);
            $('#out_chunk_original_need_'+key).html(data[key].need);
        }
    }

    /* 「企業」の選択時に発動 */
    $('#select_corporations').change(function() {
        blocks_request();
        reset_number_of_needs();
        reset_chunk_number_of_needs();
    });
    /* 「ブロック種別」の選択時に発動 */
    $('#select_categories').change(function() {
        blocks_request();
        reset_number_of_needs();
        reset_chunk_number_of_needs();
    });
    /* 「グレード」の選択時に発動 */
    $('#select_grades').change(function() {
        blocks_request();
        reset_number_of_needs();
        reset_chunk_number_of_needs();
    });
    /* 「必要個数」の選択時に発動 */
    $('#number_of_needs').keyup(function() {
        update_number_of_needs();
        update_chunk_number_of_needs();
    });
    /* 「ブロック」の選択時に発動 */
    $('#select_blocks').change(function() {
        reset_number_of_needs();
        reset_chunk_number_of_needs();
        const block_id = $('#select_blocks option:selected').val();
        block_request(block_id);
        recipe_request(block_id);
        chunk_request(block_id);
    });
});