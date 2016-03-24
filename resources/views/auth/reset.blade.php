@extends('templates.auth')
@section('auth-block')
    <div>
        <h1>{{ trans('auth.newPass') }}</h1>

        <p>{{ trans('auth.newPassDesc') }}</p>
        {!! Form::open(['route' => 'reset', 'method' => 'post']) !!}
        <input type="hidden" name="token" value="{{ $token }}">

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
            <input name="password" type="password" required="required" autofocus="autofocus" />
        </div>

        <div class="field-wrap">
            <label>
                {{ trans('auth.passRetry') }}<span class="req">*</span>
            </label>
            <input name="password_confirmation" type="password" required="required" autofocus="autofocus" />
        </div>

        <button class="button button-block"/>{{ trans('auth.resetPassBtn') }}</button>

        {!! Form::close() !!}

        @if(isset($status))
            @foreach($status as $status)
                <p>{!! $status !!}</p>
            @endforeach
        @endif
    </div>
@stop
