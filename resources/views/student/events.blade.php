@extends('templates.dashboard')

@section('main')

        <!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Найближчі події та свята
    </h1>
</section>

<!-- Main content -->
<section class="content col-md-12">


    @foreach($events as $event)
        <div class="col-md-6 col-sm-12 col-xs-4">
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

    <div class="clear"></div>


    @allowed('events.create')
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Добавити нову подію</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {!! Form::open(['method' => 'post', 'route' => 'events', 'class' => 'form-horizontal']) !!}
                <div class="box-body">
                    <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Назва</label>

                        <div class="col-sm-10">
                            <input name="name" class="form-control" id="inputName" placeholder="Як ви назвете подію?" type="text" required="required">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Дата проведення</label>

                        <div class="input-group col-sm-10">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input name="dateRange" class="form-control pull-right active" id="reservation" type="text" required="required">
                        </div>
                        <!-- /.input group -->
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Детальний опис</label>

                        <div class="col-sm-10">
                            <textarea id="wswj" name="description"></textarea>
                        </div>
                        <!-- /.input group -->
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
    @endallowed

</section>
<!-- /.content -->

@stop