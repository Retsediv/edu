<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar three wide column">

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
                    <img src="http://placehold.it/175x150" class="img-circle" alt="User Image">
                </div>

                <p class="text-center text-bold">{{ $user->name  }} {{ $user->last_name }}</p>
            </div>

            <a class="item {{ Html::is_active('/') }}" href="{{ URL::route('home') }}">
                <i class="home icon"></i> Головна
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

            <div class="ui dropdown item">
                More
                <i class="dropdown icon"></i>

                <div class="menu">
                    <a class="item"><i class="edit icon"></i> Edit Profile</a>
                    <a class="item"><i class="globe icon"></i> Choose Language</a>
                    <a class="item"><i class="settings icon"></i> Account Settings</a>
                </div>
            </div>
        </div>

    </section>
    <!-- /.sidebar -->
</aside>