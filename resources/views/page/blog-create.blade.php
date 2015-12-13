@extends('templates.page')

@section('page_title', 'Добавити нову статтю')

@section('page')
    <div class="container ui">
        {!! Form::open(['method' => 'post', 'route' => 'blog.create', 'class' => 'ui form']) !!}
        <br>
        <div class="ui grid twelve column aligned center">

            <div class="field ui column wide twelve full-width" style="margin: 0; width: 100% !important;">
                <label for="title" class="col-sm-2 control-label">Заголовок</label>

                <input name="title" class="form-control" id="title" placeholder="Заголовок.."
                       type="text" required="required">
            </div>

            <div class="field ui column wide twelve" style="margin: 0;  width: 100% !important;">
                <label for="body" class="col-sm-2 control-label">Детальний опис</label>
                <textarea id="wswj" name="body"></textarea>
            </div>

        </div>

        <button type="submit" class="ui right plus icon button" style="margin-top: 10px;"><i class="refresh icon"></i>Добавити
        </button>

        {!! Form::close() !!}
    </div>
@stop