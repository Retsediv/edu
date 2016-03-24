@extends('templates.auth')
@section('auth-block')
<div id="login">
    <h1>{{ trans('auth.signInHead') }}</h1>

    {!! Form::open(['route' => 'login', 'method' => 'post']) !!}

    <div class="field-wrap">
        <label>
            {{ trans('auth.email') }}<span class="req">*</span>
        </label>
        <input name="email" type="email" value="{{ old('email') }}" required="required" autofocus="autofocus" />
    </div>

    <div class="field-wrap">
        <label>
            {{ trans('auth.pass') }}<span class="req">*</span>
        </label>
        <input name="password" type="password" required="required" />
    </div>

    <div class="field-wrap field-check">
        <input type="checkbox" name="remember" id="remember">
        <label for="remember">{{ trans('auth.rememberMe') }}</label>
    </div>


    <p class="forgot"><a href="{{ route('password') }}">{{ trans('auth.forgetPass') }}</a></p>

    <button class="button button-block"/>{{ trans('auth.signIn') }}</button>

    {!! Form::close() !!}

</div>

@stop