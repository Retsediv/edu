@extends('templates.page')

@section('page_title', 'Поставте оцінку слухачу курсу')

@section('page')
    <div class="container ui">

        <div class="ui sixteen wide column segment container piled">

            <h3 class="box-title">Поставити оцінку слухачу курсу: {{ $course->title }}</h3>

            <!-- form start -->
            {!! Form::open(['method' => 'post', 'route' => ['mark.store', $course->id], 'class' => 'ui form']) !!}
            <div class="ui grid twelve column aligned center">

                <div class="field ui column wide fifteen" style="margin: 0;">
                    <label for="lesson_id" class="col-sm-2 control-label">Урок:</label>

                    <select name="lesson_id" id="lesson_id">
                        <option value="0"></option>
                        @foreach($lessons as $lesson)
                            <option value="{{ $lesson->id }}">{{ $lesson->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="field ui column wide fifteen" style="margin: 0;">
                    <label for="user_id" class="col-sm-2 control-label">Слухач:</label>

                    <select name="user_id" id="user_id">
                        <option value="0"></option>
                        @foreach($members as $member)
                            <option value="{{ $member->id }}">{{ $member->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="field ui column wide fifteen" style="margin: 0;">
                    <label for="mark" class="col-sm-2 control-label">Оцінка</label>

                    <input name="mark" class="form-control" id="mark" placeholder="..."
                           type="text" required="required">
                </div>

                <div class="field ui column wide fifteen" style="margin: 0;">
                    <label for="description" class="col-sm-2 control-label">Примітка..</label>

                    <input name="description" class="form-control" id="description" placeholder="..."
                           type="text" required="required">
                </div>


            </div>

            <button type="submit" class="ui plus icon primary button" style="margin-top: 10px;">
                <i class="plus icon"></i>Поставити
            </button>

            {!! Form::close() !!}
                    <!-- form close -->

            <!-- /.box-footer -->

            @include('partitials.error')

        </div>
    </div>
@stop