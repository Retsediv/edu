@extends('templates.page')

@section('page_title', 'Добавте новий урок')

@section('page')
    <div class="container ui">

        <div class="ui sixteen wide column segment container piled">

            <h3 class="box-title">Добавити новий урок для курсу: {{ $course->title }}</h3>

            <!-- form start -->
            {!! Form::open(['method' => 'post', 'route' => ['lesson.create', $course->id], 'class' => 'ui form', 'files' => true]) !!}
            <div class="ui grid twelve column aligned center">

                <div class="field ui column wide fifteen" style="margin: 0;">
                    <label for="inputName" class="col-sm-2 control-label">Назва уроку</label>

                    <input name="title" class="form-control" id="inputName" placeholder="Як ви назвете цей урок?"
                           type="text" required="required">
                </div>

                <div class="field ui column wide fifteen" style="margin: 0;">
                    <label for="published_at" class="col-sm-2 control-label">Дата публікації</label>

                    <input name="published_at" class="form-control datepicker" id="#datepicker" placeholder="Дата публікації..."
                           type="text" required="required">
                </div>

                <div class="field ui column wide fifteen" style="margin: 0;">
                    <label for="body" class="col-sm-2 control-label">Детальна інформація(д/з)</label>
                    <textarea id="wswj" name="body"></textarea>
                </div>

                <div class="field ui column wide fifteen" style="margin: 0;">
                    <label for="test_id" class="col-sm-2 control-label">Тест, який учні повинні будуть пройти(автором повинні бути ви)</label>
                    <select name="test_id" id="test_id">
                        <option value="0"></option>
                        @foreach($tests as $test)
                            <option value="{{ $test->id }}">{{ $test->title }}</option>
                        @endforeach
                    </select>
                </div>

            </div>

            <button type="submit" class="ui plus icon primary button" style="margin-top: 10px;">
                <i class="plus icon"></i>Добавити
            </button>

            {!! Form::close() !!}
                    <!-- form close -->

            <!-- /.box-footer -->

            @include('partitials.error')

        </div>
    </div>
@stop