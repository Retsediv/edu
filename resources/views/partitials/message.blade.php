@if (Session::has('flash_notification.message'))
    <div class="ui message {{ Session::get('flash_notification.level') }}">
        <i class="close icon"></i>
        {{ Session::get('flash_notification.message') }}
    </div>
@endif

