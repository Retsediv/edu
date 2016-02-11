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

            <div>
                <img src="{{ Url::asset('images/logo.png') }}" style="display: block; margin: 0 auto; width: 30%;">
            </div>
            <div class="form">
                <ul class="tab-group non-margin">
                    <li class="tab {{ Html::is_active('addschool') }}"><a style="width: 100%;" class="full-width" href="{{ route('addschool') }}">Добавити новий навчальний заклад</a></li>
                </ul>
                <ul class="tab-group non-margin">
                    <li class="tab {{ Html::is_active('auth/login') }}"><a href="{{ route('login') }}">Увійти</a></li>
                    <li class="tab {{ Html::is_active('auth/register') }}"><a href=" {{ route('register') }}">Зареєструватись</a></li>
                </ul>

                <div class="tab-content">

                    @yield('auth-block')

                @include('partitials.error')

                </div><!-- tab-content -->


            </div> <!-- /form -->

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
    <script src="{{ URL::asset('js/auth.js') }}"></script>
</body>
</html>




