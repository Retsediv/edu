<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edu project</title>
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
            @yield('main')
        </div>
    </div>
    <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->
@include('templates.footer')

<script src="{{ URL::asset("js/vue/vue.js") }} "></script>
<script src="{{ URL::asset('js/vue/vue-resource.js') }} "></script>

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
            language : 'uk',
            selector: "#wswj"
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

        $('.ui.dropdown').dropdown();
    });


</script>
</body>
</html>
