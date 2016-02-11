$(document).ready(function () {

    tinymce.init({
        theme: "modern",
        skin: 'light',
        height: 500,
        language : 'uk',
        selector: "#wswj",
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools'
        ],
        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: 'print preview media | forecolor backcolor emoticons',
        image_advtab: true,
        templates: [
            { title: 'Test template 1', content: 'Test 1' },
            { title: 'Test template 2', content: 'Test 2' }
        ],
        content_css: [
            '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
            '//www.tinymce.com/css/codepen.min.css'
        ]
    });


    $('#user-popup').popup({
        popup: $('.user-header-popup'),
        position : 'bottom right',
        on: 'click',
        delay: { show: 150, hide: 800 }
    });

    $('.special.cards .image').dimmer({
        on: 'hover'
    });

    $('.message .close').on('click', function() {
        $(this).closest('.message').transition('fade');
    });

    $('.ui.dropdown').dropdown();

    jQuery.extend(jQuery.fn.pickadate.defaults,
        {monthsFull:["січень","лютий","березень","квітень","травень","червень","липень","серпень","вересень","жовтень","листопад","грудень"],
            monthsShort:["січ","лют","бер","кві","тра","чер","лип","сер","вер","жов","лис","гру"],
            weekdaysFull:["неділя","понеділок","вівторок","середа","четвер","п‘ятниця","субота"],
            weekdaysShort:["нд","пн","вт","ср","чт","пт","сб"],today:"сьогодні",clear:"викреслити",
            firstDay:1,format:"dd mmmm yyyy p.",formatSubmit:"yyyy/mm/dd",
            clear:"викреслити"});


    $('.datepicker').pickadate()

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

