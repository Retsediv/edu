<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Освітня платформа Globos</title>
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
<script src="{{ URL::asset('/js/poll.js') }}"></script>

</body>
</html>
