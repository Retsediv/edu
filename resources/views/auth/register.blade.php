@extends('templates.auth')
@section('auth-block')
<div id="signup">
    <h1>Безкоштовна реєстрація</h1>

    {!! Form::open(['route' => 'register', 'method' => 'post']) !!}

    <div class="top-row">
        <div class="field-wrap">
            <label>
                Ім'я<span class="req">*</span>
            </label>
            <input name="name" type="text" value="{{ old('name') }}" required="required" autofocus="autofocus" />
        </div>

        <div class="field-wrap">
            <label>
                Прізвище<span class="req">*</span>
            </label>
            <input name="last_name" type="text" value="{{ old('last_name') }}" required="required" />
        </div>
    </div>

    <div class="field-wrap">
        <label>
            Email<span class="req">*</span>
        </label>
        <input name="email" type="email" value="{{ old('email') }}" required="required" />
    </div>

    <div class="field-wrap">
        <span class="field-desc">
            Хто ви?
        </span>
        <select name="role" type="select" value="{{ old('role') }}" required="required">
            @foreach($roles as $role)
                <option value="{{ $role->id }}"> {{ $role->role_name }} </option>
            @endforeach
        </select>
    </div>

    <div class="field-wrap">
        <span class="field-desc">
            З якої ви області?
        </span>
        <select name="region" id="region" type="select" value="{{ old('region') }}" required="required">
            <option disable value="">Оберіть свою область</option>
            @foreach($regions as $region)
                <option value="{{ $region->id }}"> {{ $region->name }} </option>
            @endforeach
        </select>
    </div>

    <div class="field-wrap">
        <span class="field-desc">
            Який район?
        </span>
        <select name="area" id="area" type="select" value="{{ old('area') }}" required="required">        </select>
    </div>

    <div class="field-wrap">
        <span class="field-desc">
            З якого ви міста/села?
        </span>
        <select name="town" id="town" type="select" value="{{ old('town') }}" required="required"></select>
    </div>

    <div class="field-wrap">
        <span class="field-desc">
            З якого ви навчального закладу?
        </span>
        <select name="school" id="school" type="select" value="{{ old('school') }}" required="required"></select>
    </div>

    <div class="field-wrap">
        <span class="field-desc">
            В якому класі ви навчаєтеся?
        </span>
        <select name="class" id="class" type="select" value="{{ old('class') }}" required="required"></select>
    </div>

    <div class="field-wrap">
        <label>
            Пароль<span class="req">*</span>
        </label>
        <input name="password" type="password" required="required" />
    </div>

    <div class="field-wrap">
        <label>
            Повторіть пароль<span class="req">*</span>
        </label>
        <input name="password_confirmation" type="password" required="required" />
    </div>

    <button type="submit" class="button button-block"/>Розпочати</button>

    {!! Form::close() !!}

</div>
@stop