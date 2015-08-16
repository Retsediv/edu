@extends('templates.auth')
@section('auth-block')
    <div>
        <h1>Новий пароль</h1>

        <p>Введіть свій email та новий пароль. Після цього натисність на кнопку і завершіть відновлення доступу до аккаунту. </p>
        {!! Form::open(['route' => 'reset', 'method' => 'post']) !!}

        <div class="field-wrap">
            <label>
                Email<span class="req">*</span>
            </label>
            <input name="email" type="email" value="{{ old('email') }}" required="required" autofocus="autofocus" />
        </div>

        <div class="field-wrap">
            <label>
                Пароль<span class="req">*</span>
            </label>
            <input name="password" type="password" required="required" autofocus="autofocus" />
        </div>

        <div class="field-wrap">
            <label>
                Повторіть пароль<span class="req">*</span>
            </label>
            <input name="password_confirmation" type="password" required="required" autofocus="autofocus" />
        </div>

        <button class="button button-block"/>Відновити пароль</button>

        {!! Form::close() !!}

        @if(isset($status))
            @foreach($status as $status)
                <p>{!! $status !!}</p>
            @endforeach
        @endif
    </div>
@stop
