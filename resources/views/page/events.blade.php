@extends('templates.page')

@section('page_title', 'Найближчі події та свята')

@section('page')
    <div class="ui grid container sixteen wide column">
        @foreach($events as $event)
            <div class="ui card five wide column" style="margin: 10px 10px 0 0;">
                <div class="content">
                    @if($event->authorCheck($user))
                        <a href="{{ route('events.delete', ['id' => $event->id]) }}" style="float: right;">
                        <i class="close icon"></i>
                        </a>
                    @endif
                    <div class="header">{{ $event->name }}</div>
                    <div class="description">
                        <p> {!! $event->description !!}</p>
                    </div>
                </div>
                <div class="extra content">
                    {{ $event->data_range }}
                </div>
            </div>
        @endforeach

    </div>


    @allowed('event.create')
    <div class="ui sixteen wide column segment container">

        @include('partitials.error')

        <h3 class="box-title">Добавити нову подію</h3>

        <!-- /.box-header -->
        <!-- form start -->
        {!! Form::open(['method' => 'post', 'route' => 'events', 'class' => 'ui form']) !!}
        <div class="ui grid twelve column aligned center">

            <div class="field ui column wide nine" style="margin: 0;">
                <label for="inputName" class="col-sm-2 control-label">Назва</label>

                <input name="name" class="form-control" id="inputName" placeholder="Як ви назвете подію?"
                       type="text" required="required">
            </div>

            <div class="field ui column wide nine" style="margin: 0;">
                <label for="inputName" class="col-sm-2 control-label">Дата проведення</label>

                <input name="dateRange" class="form-control pull-right active" id="reservation" type="text"
                       required="required">

            </div>

            <div class="field ui column wide nine" style="margin: 0;">
                <label for="description" class="col-sm-2 control-label">Детальний опис</label>
                <textarea id="wswj" name="description"></textarea>
            </div>

        </div>

        <button type="submit" class="ui right plus icon button" style="margin-top: 10px;">
            <i class="refresh icon"></i>Добавити
        </button>

        {!! Form::close() !!}

        <!-- /.box-body -->

    </div>

    </div>
    @endallowed


@stop