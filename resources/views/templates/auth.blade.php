<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="<?php echo csrf_token(); ?>">
    <title>Index page</title>
    <link rel="stylesheet" href="{{ URL::asset('css/auth.css') }}">

</head>
<body>
    <div class="conteiner">
        <div class="row">

            <div class="form">

                <ul class="tab-group">
                    <li class="tab {{ Html::is_active('auth/login') }}"><a href="{{ route('login') }}">Увійти</a></li>
                    <li class="tab {{ Html::is_active('auth/register') }}"><a href=" {{ route('register') }}">Зареєструватись</a></li>
                </ul>

                <div class="tab-content">

                    @yield('auth-block')

                    @if($errors->has())
                        @foreach ($errors->all() as $error)
                            <div style="color: #fff; font-weight: bold; padding: 5px;">{{ $error }}</div>
                        @endforeach
                    @endif

                </div><!-- tab-content -->

            </div> <!-- /form -->

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
    <script src="{{ URL::asset('js/dev/auth.js') }}"></script>
</body>
</html>




