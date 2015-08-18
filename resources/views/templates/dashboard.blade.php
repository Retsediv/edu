<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>AdminLTE 2 | Dashboard</title>
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ URL::asset('/css/app.css') }}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css"/>

    <link rel="stylesheet"
          href="http://bootstrap-wysiwyg.github.io/bootstrap3-wysiwyg/dist/bootstrap3-wysihtml5.min.css">

    <link rel="stylesheet" href="{{ URL::asset('/css/main.css') }}">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="skin-black sidebar-mini">
<div class="wrapper">

    <!-- Content Wrapper. Contains page content -->
    @header()
    @sidebar()
    <div class="content-wrapper">
        @yield('main')
    </div>
    <!-- /.content-wrapper -->

    @include('templates.aside')

</div>
<!-- ./wrapper -->
@include('templates.footer')



<!-- REQUIRED JS SCRIPTS -->

<!-- AdminLTE App, JQuery, Bootstrap js, etc.. -->
<script src="{{ URL::asset('js/app.js') }}"></script>
<script src="{{ URL::asset('js/dev/main.js') }}"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<script>
    $(document).ready(function () {
        $('#reservation').daterangepicker({ locale: { format: 'MM.DD.YYYY' } });
    });

</script>
</body>
</html>
