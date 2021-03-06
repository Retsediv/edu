/*
* Script for main registration and login form
*/
$(document).ready(function(){
    // Form script
    $('div.field-wrap').each(function(){
        if ($(this).find('input').val() !== ''){
            $(this).find('label').addClass('active');
        }
    });

    if ($('label').val() != '') {
        $(this).addClass('active highlight');
    }

    $('.form').find('input, textarea').on('keyup blur focus select', function (e) {

        var $this = $(this),
            label = $this.prev('label');

        if (e.type === 'select') {
            if ($this.val() === '') {
                label.removeClass('active highlight');
            } else {
                label.addClass('active highlight');
            }

        } else if (e.type === 'keyup') {
            if ($this.val() === '') {
                label.removeClass('active highlight');
            } else {
                label.addClass('active highlight');

            }

        } else if (e.type === 'blur') {
            if( $this.val() === '' ) {
                label.removeClass('active highlight');
            } else {
                label.removeClass('highlight');
            }
        } else if (e.type === 'focus') {

            if( $this.val() === '' ) {
                label.removeClass('highlight');
            }
            else if( $this.val() !== '' ) {
                label.addClass('highlight');
            }
        }

        label.addClass('active highlight');

    });

    /* End script for reg. form  */

    /* Ajax requests */
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=csrf-token]').attr('content')}
    });

    $('select#region').change(function(){
        var region_id = $(this).val();
        $.ajax({
            url: "/api/area/get/" + region_id,  // /{regionId
            cache: false,
            type: "GET",

            success: function(objects) { insertItems('select#area', objects) }
        });
    });

    $('select#area').change(function(){
        var area_id = $(this).val();
        $.ajax({
            url: "/api/town/get/" + area_id,
            cache: false,
            type: "GET",

            success: function(objects) { insertItems('select#town', objects) }
        });
    });

    $('select#town').change(function(){
        var town_id = $(this).val();
        $.ajax({
            url: "/api/school/get/" + town_id,
            cache: false,
            type: "GET",

            success: function(objects) { insertItems('select#school', objects) }
        });
    });

    $('select#school').change(function(){
        var school_id = $(this).val();
        $.ajax({
            url: "/api/class/get/" + school_id,
            cache: false,
            type: "GET",

            success: function(objects) { insertItems('select#class', objects); console.log(objects) }
        });
    });

    // Функція для вставки результатів ajax запитів
    function insertItems(where, items){
        list = '<option value="" disabled selected>  </option>';
        for(var i = 0; i < items.length; i++) {
            list += '<option value="' + items[i].id + '">' + items[i].name + '</option>';
        }
        $(where).html(list);


    }
});

