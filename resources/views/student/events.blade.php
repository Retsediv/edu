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

    <div class="clear"></div>


    @allowed('events.create')
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Добавити нову подію</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
                <div class="box-body">
                    <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Назва</label>

                        <div class="col-sm-10">
                            <input class="form-control" id="inputName" placeholder="Як ви назвете подію?" type="text">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Дата проведення</label>

                        <div class="input-group col-sm-10">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input class="form-control pull-right active" id="reservation" type="text">
                        </div>
                        <!-- /.input group -->
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Детальний опис</label>

                        <div class="col-sm-10">
                            <textarea id="wswj"></textarea>
                        </div>
                        <!-- /.input group -->
                    </div>


                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-right">Добавити</button>
                </div>
                <!-- /.box-footer -->
            </form>

        </div>
    @endallowed

</section>
<!-- /.content -->

@stop