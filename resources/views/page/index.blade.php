@extends('templates.dashboard')


@section('main')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Головна
    </h1>
    <!-- TODO: хлібні крошки
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol>-->
</section>

<!-- Main content -->
<section class="content">

    <!-- Your Page Content Here -->
    <section class="left-section col-sm-6 col-sm-12">
        <!-- TO-DO LIST -->
        <div class="">
            <div class="box box-primary">
                <div style="cursor: move;" class="box-header ui-sortable-handle">
                    <i class="ion ion-clipboard"></i>

                    <h3 class="box-title">Список справ</h3>
                    <!-- TODO: пагінація завдань -->
                    <!--<div class="box-tools pull-right">
                        <ul class="pagination pagination-sm inline">
                            <li><a href="#">«</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">»</a></li>
                        </ul>
                    </div>-->
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
                <div class="box-footer clearfix no-border">
                    <a href="{{ route('tasks') }}"><button class="btn btn-default pull-right"><i class="fa fa-plus"></i>Добавити</button></a>
                </div>
            </div>
        </div>
    </section>


    <section class="left-section col-sm-6 col-sm-12">
        @foreach($events as $event)
            <div class="col-md-6 col-sm-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ $event->name }}</h3>

                        <div class="pull-right event-date">{{ $event->data_range }}</div>
                    </div>

                    <div class="box-body">
                        {{ $event->description }}
                    </div>
                </div>
            </div>
        @endforeach
    </section>



</section>
<!-- /.content -->

@stop