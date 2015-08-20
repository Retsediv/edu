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
        {!! Form::open(['method' => 'post', 'route' => 'task.create', 'class' => 'form-horizontal']) !!}
        <div class="box-body">
            <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">Назва</label>

                <div class="col-sm-10">
                    <input name="name" class="form-control" id="inputName" placeholder="Що саме ви хочете зробити?" type="text" required="required">
                </div>
            </div>

            <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">Сроки</label>

                <div class="col-sm-10">
                    <input name="deadline" class="form-control" id="inputDeadLine" placeholder="За скільки часу ви маєте це виконати?" type="text" required="required">
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-info pull-right">Добавити</button>
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