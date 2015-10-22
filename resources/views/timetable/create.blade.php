@extends('templates.dashboard')

@section('main')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Розклад уроків</h1>
</section>

<!-- Main content -->
<section class="content">

    <!-- Your Page Content Here -->
    <section class="left-section col-sm-12">
        <!-- TO-DO LIST -->
        <div class="">
            <div class="box box-primary" style="padding: 5px;">
                <br />

                {!! Form::open(["method" => "post", "route" => "timetable.create"]) !!}

                    @for($i = 0; $i<5; $i++)

                    <table class="timetable timetable-edit table table-bordered">
                        <tr>
                            <th style="width: 100%; text-align: center;" colspan="3">
                                Понеділок
                                <!-- General tools such as edit or delete-->
                                <div class="tools"><i class="fa fa-plus" id="add" data-id="{{ $i }}"></i></div>
                            </th>
                        </tr>
                        <tr>
                            <th style="width: 5%">№</th>
                            <th style="width: 70%">Урок</th>
                            <th style="width: 25%">Аудиторія</th>
                        </tr>

                        @for($j = 1; $j<rand(1,6); $j++)
                        <tr>
                            <td>{{ $j }}</td>
                            <td>
                                <input style="width: 90%; float: left;" class="form-control timetable-input" name="lessons[{{ $i }}][]" placeholder="Classroom" type="text">
                                <div class="tools">
                                    <i class="fa fa-remove" id="remove"></i>
                                </div>
                            </td>
                            <td><input class="form-control timetable-input" name="classroom[{{ $i }}][]" placeholder="Classroom" type="text"></td>
                        </tr>
                        @endfor
                    </table>
                    @endfor

                    <!-- /.box-body -->
                    <div class="box-footer clearfix no-border">
                        <button type="submit" id="done" class="btn btn-info pull-right">Змінити</button>
                    </div>
                {!! Form::close() !!}

            </div>
        </div>
    </section>

</section>
<!-- /.content -->

@stop