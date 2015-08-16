@extends('templates.auth')
@section('auth-block')
    <div>
        <h1>Відновлення паролю</h1>

        <p>Введіть свій email і натисніть на кнопку. Після цього ми відішлемо вам лист, у якому буде посилання за яким вам потрібно перейти і продовжити відновлення паролю</p>

        {!! Form::open(['route' => 'password', 'method' => 'post']) !!}

        <div class="field-wrap">
            <label>
                Email<span class="req">*</span>
            </label>
            <input name="email" type="email" value="{{ old('email') }}" required="required" autofocus="autofocus" />
        </div>

        <button class="button button-block"/>Надіслати лист</button>

        {!! Form::close() !!}

        @if(isset($status))
            @foreach($status as $status)
                <p>{!! $status !!}</p>
            @endforeach
        @endif
    </div>
@stop
