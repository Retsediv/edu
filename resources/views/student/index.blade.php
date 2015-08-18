@extends('templates.dashboard')


@section('main')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Page Header
        <small>Optional description</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Your Page Content Here -->

    <!-- TODO LIST -->
    <div class="col-sm-6">
    <div class="box box-primary">
        <div style="cursor: move;" class="box-header ui-sortable-handle">
            <i class="ion ion-clipboard"></i>

            <h3 class="box-title">To Do List</h3>

            <div class="box-tools pull-right">
                <ul class="pagination pagination-sm inline">
                    <li><a href="#">«</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">»</a></li>
                </ul>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <ul class="todo-list ui-sortable">
                <li class="">
                    <!-- drag handle -->
                      <span class="handle ui-sortable-handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                    <!-- checkbox -->
                    <input value="" name="" type="checkbox">
                    <!-- todo text -->
                    <span class="text">Design a nice theme</span>
                    <!-- Emphasis label -->
                    <small class="label label-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
                    <!-- General tools such as edit or delete-->
                    <div class="tools">
                        <i class="fa fa-edit"></i>
                        <i class="fa fa-trash-o"></i>
                    </div>
                </li>
                <li class="">
                      <span class="handle ui-sortable-handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                    <input value="" name="" type="checkbox">
                    <span class="text">Make the theme responsive</span>
                    <small class="label label-info"><i class="fa fa-clock-o"></i> 4 hours</small>
                    <div class="tools">
                        <i class="fa fa-edit"></i>
                        <i class="fa fa-trash-o"></i>
                    </div>
                </li>
                <li class="">
                      <span class="handle ui-sortable-handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                    <input value="" name="" type="checkbox">
                    <span class="text">Let theme shine like a star</span>
                    <small class="label label-warning"><i class="fa fa-clock-o"></i> 1 day</small>
                    <div class="tools">
                        <i class="fa fa-edit"></i>
                        <i class="fa fa-trash-o"></i>
                    </div>
                </li>
                <li class="">
                      <span class="handle ui-sortable-handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                    <input value="" name="" type="checkbox">
                    <span class="text">Let theme shine like a star</span>
                    <small class="label label-success"><i class="fa fa-clock-o"></i> 3 days</small>
                    <div class="tools">
                        <i class="fa fa-edit"></i>
                        <i class="fa fa-trash-o"></i>
                    </div>
                </li>
                <li>
                      <span class="handle ui-sortable-handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                    <input value="" name="" type="checkbox">
                    <span class="text">Check your messages and notifications</span>
                    <small class="label label-primary"><i class="fa fa-clock-o"></i> 1 week</small>
                    <div class="tools">
                        <i class="fa fa-edit"></i>
                        <i class="fa fa-trash-o"></i>
                    </div>
                </li>
                <li>
                      <span class="handle ui-sortable-handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                    <input value="" name="" type="checkbox">
                    <span class="text">Let theme shine like a star</span>
                    <small class="label label-default"><i class="fa fa-clock-o"></i> 1 month</small>
                    <div class="tools">
                        <i class="fa fa-edit"></i>
                        <i class="fa fa-trash-o"></i>
                    </div>
                </li>
            </ul>
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix no-border">
            <button class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button>
        </div>
    </div>

    </div>

    <div class="col-md-6 col-sm-12 col-xs-4">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Новий рік!</h3>

                <div class="pull-right event-date">28.12.2015</div>
            </div>

            <div class="box-body">
                Цього року свято Нового Року пройде незвично. До нашої школи приїдуть Дід Мороз.
            </div>
        </div>
    </div>



</section>
<!-- /.content -->

@stop