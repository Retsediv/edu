<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edu project</title>
    <meta name="csrf-token" content="<?php echo csrf_token(); ?>">

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ URL::asset('/css/semantic.min.css') }}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ URL::asset('vendor/popup.min.css') }}">

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



<!-- REQUIRED JS SCRIPTS -->
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>

<script src="{{ URL::asset('js/semantic.min.js') }}"></script>
<script src="{{ URL::asset('vendor/popup.min.js') }}"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
<!-- MAIN DEV SCRIPT -->
<script src="{{ URL::asset('js/dev/main.js') }}"></script>
<script>
    $(document).ready(function () {

        tinymce.init({
            selector: "#wswj"
        });


        $('#user-popup').popup({
            popup: $('.user-header-popup'),
            position : 'bottom right',
            on: 'click',
            delay: { show: 150, hide: 800 }
        });
    });


</script>
</body>
</html>
