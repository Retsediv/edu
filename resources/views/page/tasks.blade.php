@extends('templates.page')

@section('page_title', 'Список справ')

@section('page')



    <div class="ui sixteen wide column">

        <h3 class="box-title">Завжди плануйте та записуйте, для того щоб не забути та виконувати все вчасно</h3>


        <!-- /.box-header -->
        <div class="ui relaxed divided list todo-list segment">
            @foreach($tasks as $task)
                <div class="item {{ $task->progress }}">
                    <input value="{{ $task->id }}" name="taskDone" type="hidden">

                    <div class="content" style="float: left;">
                        <a class="header">{{ $task->name }}</a>

                        <div class="description">{{ $task->deadline }}</div>
                    </div>
                    <div class="tools" style="">
                        <i class="fa fa-check checkmark icon" id="done"></i>
                        <a href="{{ route('task.edit', [$task->id]) }}"><i class="fa fa-edit edit icon"
                                                                           id="edit"></i></a>
                        <i class="fa fa-remove remove icon" id="remove"></i>
                    </div>
                </div><br/>
            @endforeach

        </div>
        <!-- /.box-body -->
    </div>



    <div class="ui sixteen wide column segment">

        <h3 class="box-title">Бажаєте запланувати щось?</h3>

        <!-- /.box-header -->
        <!-- form start -->
        @if(isset($editask))
            {!! Form::model($editask, ['method' => 'patch', 'route' => ['task.edit', $editask->id], 'class' => 'ui form']) !!}
        @else
            {!! Form::open(['method' => 'post', 'route' => 'task.create', 'class' => 'ui form']) !!}
        @endif
        <div class="ui grid twelve column aligned center">

            <div class="field ui column wide nine" style="margin: 0;">
                {!! Form::label('name', 'Назва', ['class' => '']) !!}

                <div class="ui">
                    {!! Form::text('name', Input::old('name'), ['placeholder' => 'Що саме ви хочете зробити?', 'required', 'class' => 'form-control']) !!}
                </div>
            </div>

            <div class="field ui column wide nine">
                {!! Form::label('deadline', 'Сроки', ['class' => '']) !!}
                <div class="ui">
                    {!! Form::text('deadline', Input::old('deadline'), ['placeholder' => 'За скільки часу ви маєте це виконати?', 'required', 'class' => 'form-control']) !!}
                </div>
            </div>

        </div>
        <!-- /.box-body -->

        @if(isset($editask))
            <button type="submit" class="ui right plus icon button" style="margin-top: 10px;"><i class="refresh icon"></i>Оновити</button>
        @else
              <button type="submit" class="ui right plus icon button" style="margin-top: 10px;"><i class="right arrow icon"></i>Добавити</button>
        @endif



        @if($errors->has())
            @foreach ($errors->all() as $error)
                <div style="font-weight: bold; padding: 5px;">{{ $error }}</div>
            @endforeach
        @endif

        {!! Form::close() !!}

    </div>



@stop