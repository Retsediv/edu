@extends('templates.dashboard')

@section('main')

        <!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Ваш список справ
    </h1>
</section>

<!-- Main content -->
<section class="content col-md-12">

        <div class="box box-primary">
            <div style="cursor: move;" class="box-header ui-sortable-handle">
                <i class="ion ion-clipboard"></i>

                <h3 class="box-title">Завжди плануйте та записуйте, для того щоб не забути та виконувати все вчасно</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <ul class="todo-list ui-sortable">
                    @foreach($tasks as $task)
                        <li class="{{ $task->progress }}">
                            <!-- drag handle -->
                          <span class="handle ui-sortable-handle">
                            <i class="fa fa-ellipsis-v"></i>
                            <i class="fa fa-ellipsis-v"></i>
                          </span>
                            <!-- todo text -->
                            <input  value="{{ $task->id }}" name="taskDone" type="checkbox" class="hidden">

                            <span class="text">{{ $task->name }}</span>
                            <!-- Emphasis label -->
                            <small class="label label-success"><i class="fa fa-clock-o"></i> {{ $task->deadline }} </small>
                            <!-- General tools such as edit or delete-->
                            <div class="tools">
                                <i class="fa fa-check" id="done"></i>
                                <a href="{{ route('task.edit', [$task->id]) }}"><i class="fa fa-edit" id="edit"></i></a>
                                <i class="fa fa-remove" id="remove"></i>
                            </div>
                        </li>
                    @endforeach


                </ul>
            </div>
            <!-- /.box-body -->
        </div>
    <div class="clear"></div>


    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Бажаєте запланувати щось?</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        @if(isset($editask))
            {!! Form::model($editask, ['method' => 'patch', 'route' => ['task.edit', $editask->id], 'class' => 'form-horizontal']) !!}
        @else
            {!! Form::open(['method' => 'post', 'route' => 'task.create', 'class' => 'form-horizontal']) !!}
        @endif
        <div class="box-body">

            <div class="form-group">
                {!! Form::label('name', 'Назва', ['class' => 'col-sm-2 control-label']) !!}

                <div class="col-sm-10">
                    {!! Form::text('name', Input::old('name'), ['placeholder' => 'Що саме ви хочете зробити?', 'required', 'class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('deadline', 'Сроки', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    {!! Form::text('deadline', Input::old('deadline'), ['placeholder' => 'За скільки часу ви маєте це виконати?', 'required', 'class' => 'form-control']) !!}
                </div>
            </div>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            @if(isset($editask))
                <button type="submit" class="btn btn-info pull-right">Оновити</button>
            @else
                <button type="submit" class="btn btn-info pull-right">Добавити</button>
            @endif

        </div>
        <!-- /.box-footer -->

        @if($errors->has())
            @foreach ($errors->all() as $error)
                <div style="font-weight: bold; padding: 5px;">{{ $error }}</div>
            @endforeach
        @endif

        {!! Form::close() !!}

    </div>

</section>
<!-- /.content -->

@stop