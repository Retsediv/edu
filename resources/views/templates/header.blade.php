<div class="ui menu inverted">
    <a href="{{ URL::route('home') }}" target="_blank" class="home item"><b>GLOBOS</b>UA</a>

    <div class="right menu">
        <a class="item">
            <i class="mail icon"></i> Повідомлення
        </a>

        <a class="item" id="user-popup">
            <i class="user icon"></i> Профіль
        </a>

        <a class="item" href="{{ URL::route('logout') }}">
            <i class="sign out icon"></i> Вийти
        </a>
    </div>

    <!-- HEADER USER POPUP -->
    <div class="ui user-header-popup popup bottom left transition hidden">
        <div class="ui one column relaxed equal height divided grid">
            <div class="column">
                <h4 class="ui header">{{ $user->name }}</h4>

                <div class="ui">
                    <p>
                        {{ $user->name }} {{ $user->last_name }} - {{ $user->roles()->first()->role_name }}
                        <small>Зареєстрований {{ $user->created_at }}</small>
                    </p>

                </div>
            </div>
        </div>
    </div>

    <!-- END HEADER USER POPUP -->
</div>