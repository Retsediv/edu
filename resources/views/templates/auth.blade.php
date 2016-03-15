<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="<?php echo csrf_token(); ?>">
    <title>Globos | Українська платформа дистанційного навчання</title>
    <link rel="stylesheet" href="{{ URL::asset('css/auth.css') }}">

    <meta name="author" content="Andrij Zhuravchak">
</head>
<body>
    <div class="container">
        <div class="row">

            <div>
                <img src="{{ Url::asset('images/logo.png') }}" style="display: block; margin: 0 auto; width: 30%;">
            </div>
            <div class="form">
                <ul class="tab-group non-margin">
                    <li class="tab {{ Html::is_active('addschool') }}"><a style="width: 100%;" class="full-width" href="{{ route('addschool') }}">Додати новий навчальний заклад</a></li>
                </ul>
                <ul class="tab-group non-margin">
                    <li class="tab {{ Html::is_active('auth/login') }}"><a href="{{ route('login') }}">Увійти</a></li>
                    <li class="tab {{ Html::is_active('auth/register') }}"><a href=" {{ route('register') }}">Зареєструватись</a></li>
                </ul>

                <div class="tab-content">

                    <div class="auth-error">
                        @include('partitials.error')
                    </div>

                    @yield('auth-block')


                </div><!-- tab-content -->


            </div> <!-- /form -->

        </div>
    </div>

    <script src="{{ URL::asset('js/auth.js') }}"></script>
</body>
</html>




