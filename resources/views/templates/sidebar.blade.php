<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar three wide column">

    @yield('sidebar_menu')

    <section class="sidebar">
        <div class="ui vertical menu">
            <div class="item">
                <div class="ui icon input">
                    <input placeholder="Пошук..." type="text">
                    <i class="inverted circular search link icon"></i>
                </div>
            </div>

            <div class="item user-info-sidebar">
                <div class="user-image">
                    <img src="http://semantic-ui.com/images/avatar2/large/matthew.png" class="img-circle" alt="Зображення користувача" style="width: 175px;">
                </div>

                <p class="text-center text-bold">{{ $user->name  }} {{ $user->last_name }}</p>
            </div>

            <a class="item {{ Html::is_active('/') }}" href="{{ URL::route('home') }}">
                <i class="home icon"></i> Головна
            </a>
            <a class="item {{ Html::is_active('courses') }}" href="{{ URL::route('courses') }}">
                <i class="book icon"></i> Курси
            </a>
            <a class="item {{ Html::is_active('tasks') }}" href="{{ URL::route('tasks') }}">
                <i class="check circle icon"></i> Список справ
            </a>
            <a class="item {{ Html::is_active('events') }}" href="{{ URL::route('events') }}">
                <i class="pin icon"></i> Події
            </a>
            <a class="item {{ Html::is_active('timetable') }}" href="{{ URL::route('timetable') }}">
                <i class="table icon"></i> Розклад уроків
            </a>
            <a class="item {{ Html::is_active('poll') }}" href="{{ URL::route('poll') }}">
                <i class="book icon"></i> Тестування
            </a>
            <a class="item {{ Html::is_active('blog') }}" href="{{ URL::route('blog') }}">
                <i class="book icon"></i> Блог
            </a>


            {{-- If user is director --}}
            @if($user->roles()->first()->role_slug == "director")
                <br />

                <a class="item {{ Html::is_active('/admin/users') }}" href="{{ URL::route('admin.users') }}">
                    <i class="table icon"></i> Модерування учасників
                </a>

                <a class="item {{ Html::is_active('/admin/classes') }}" href="{{ URL::route('admin.classes') }}">
                    <i class="table icon"></i> Модерування класами
                </a>
            @endif

            {{--<div class="ui dropdown item">--}}
                {{--DropDown--}}
                {{--<i class="dropdown icon"></i>--}}

                {{--<div class="menu">--}}
                    {{--<a class="item"><i class="edit icon"></i>Переглянути</a>--}}
                    {{--<a class="item"><i class="globe icon"></i>Власні курси</a>--}}
                    {{--<a class="item"><i class="settings icon"></i> Account Settings</a>--}}
                {{--</div>--}}
            {{--</div>--}}

        </div>

    </section>
    <!-- /.sidebar -->
</aside>