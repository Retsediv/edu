<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ $user->name  }} {{ $user->last_name }}</p>
                <!-- Status
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                -->
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Пошук...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Меню</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="{{ Html::is_active('/') }}"><a href="{{ URL::route('home') }}"><i class="fa fa-link"></i> <span>Головна</span></a></li>
            <li class="{{ Html::is_active('events') }}"><a href="{{ URL::route('events') }}"><i class="fa fa-link"></i> <span>Події</span></a></li>
            <li class="{{ Html::is_active('tasks') }}"><a href="{{ URL::route('tasks') }}"><i class="fa fa-link"></i> <span>Список справ</span></a></li>
            <li class="{{ Html::is_active('timetable') }}"><a href="{{ URL::route('timetable') }}"><i class="fa fa-link"></i> <span>Розклад уроків</span></a></li>
            <li class="treeview">
                <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span> <i
                            class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#">Link in level 2</a></li>
                    <li><a href="#">Link in level 2</a></li>
                </ul>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>