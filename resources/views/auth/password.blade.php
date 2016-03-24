@extends('templates.auth')
@section('auth-block')
    <div>
        <h1>{{ trans('auth.passReset') }}</h1>

        <p>{{ trans('auth.passResetDesc') }}</p>

        {!! Form::open(['route' => 'password', 'method' => 'post']) !!}

        <div class="field-wrap">
            <label>
                {{ trans('auth.email') }}<span class="req">*</span>
            </label>
            <input name="email" type="email" value="{{ old('email') }}" required="required" autofocus="autofocus" />
        </div>

        <button class="button button-block"/>{{ trans('auth.sendEmail') }}</button>

        {!! Form::close() !!}

        @if(isset($status))
            @foreach($status as $status)
                <p>{!! $status !!}</p>
            @endforeach
        @endif
    </div>
@stop
