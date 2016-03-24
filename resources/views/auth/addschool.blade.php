@extends('templates.auth')
@section('auth-block')
    <div id="login">
        <h1>{{ trans('auth.addSchoolBtn') }}</h1>
        <!--<div class="rules">
            <p>Правила:</p>
            <ul>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>-->

        {!! Form::open(['route' => 'addschool', 'method' => 'post']) !!}

        <div class="top-row">
            <div class="field-wrap">
                <label>
                    {{ trans('auth.name') }}<span class="req">*</span>
                </label>
                <input name="name" type="text" value="{{ old('name') }}" required="required" autofocus="autofocus" />
            </div>

            <div class="field-wrap">
                <label>
                    {{ trans('auth.lastName') }}<span class="req">*</span>
                </label>
                <input name="last_name" type="text" value="{{ old('last_name') }}" required="required" />
            </div>
        </div>

        <div class="field-wrap">
            <label>
                {{ trans('auth.email') }}<span class="req">*</span>
            </label>
            <input name="email" type="email" value="{{ old('email') }}" required="required" />
        </div>

        <div class="field-wrap">
        <span class="field-desc">
            {{ trans('auth.whoAreYou') }}
        </span>
            <select name="role" type="select" value="{{ old('role') }}" required="required">
                @foreach($roles as $role)
                    <option value="{{ $role->id }}"> {{ $role->role_name }} </option>
                @endforeach
            </select>
        </div>

        <div class="field-wrap">
        <span class="field-desc">
            {{ trans('auth.whatRegion') }}
        </span>
            <select name="region" id="region" type="select" value="{{ old('region') }}" required="required">
                <option disable value="">{{ trans('auth.chooseRegion') }}</option>
                @foreach($regions as $region)
                    <option value="{{ $region->id }}"> {{ $region->name }} </option>
                @endforeach
            </select>
        </div>

        <div class="field-wrap">
        <span class="field-desc">
            {{ trans('auth.whatArea') }}
        </span>
            <select name="area" id="area" type="select" value="{{ old('area') }}" required="required">        </select>
        </div>

        <div class="field-wrap">
        <span class="field-desc">
            {{ trans('auth.whatTown') }}
        </span>
            <select name="town" id="town" type="select" value="{{ old('town') }}" required="required">        </select>
        </div>

        <div class="field-wrap">
        <span class="field-desc">
            {{ trans('auth.whatSchool') }}
        </span>
            <input name="school" id="school" type="select" value="{{ old('school') }}" required="required">        </input>
        </div>

        <div class="field-wrap">
            <label>
                {{ trans('auth.pass') }}<span class="req">*</span>
            </label>
            <input name="password" type="password" required="required" />
        </div>

        <div class="field-wrap">
            <label>
                {{ trans('auth.passRetry') }}<span class="req">*</span>
            </label>
            <input name="password_confirmation" type="password" required="required" />
        </div>

        <button type="submit" class="button button-block"/>{{ trans('auth.addSchoolBtn') }}</button>

        {!! Form::close() !!}

    </div>

@stop