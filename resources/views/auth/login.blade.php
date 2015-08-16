@extends('templates.auth')
@section('auth-block')
<div id="login">
    <h1>Увійдіть у свій профіль</h1>

    {!! Form::open(['route' => 'login', 'method' => 'post']) !!}

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
        <input name="password" type="password" required="required" />
    </div>

    <p class="forgot"><a href="{{ route('password') }}">Забули пароль?</a></p>

    <button class="button button-block"/>Увійти</button>

    {!! Form::close() !!}

</div>

@stop