<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Освітній майданчий</title>
    <meta name="csrf-token" id="token" content="<?php echo csrf_token(); ?>">

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ URL::asset('/css/vendor.css') }}">

    <link rel="stylesheet" href="{{ URL::asset('/css/main.css') }}">
</head>

<body>
<div class="wrapper">

    <!-- Content Wrapper. Contains page content -->
    @header()
    <div class="content-wrapper ui grid">
        @include('templates.sidebar')

        <div class="thirteen wide column">
            @include('partitials.message')
            @yield('main')
        </div>
    </div>
    <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->
@include('templates.footer')

<!-- JS SCRIPTS -->
<script src="{{ URL::asset('/js/main.js') }}"></script>

<script src="{{ URL::asset('/js/blog.js') }}"></script>

<script src="{{ URL::asset('/js/poll.js') }}"></script>

<script src="{{ URL::asset('/js/pollCreate.js') }}"></script>


<script>
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
    });


</script>
</body>
</html>
