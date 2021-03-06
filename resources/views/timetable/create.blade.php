@extends('templates.page')

@section('page_title', 'Розклад уроків')

@section('page')
    <section class="left-section col-sm-12">
        <!-- TO-DO LIST -->
        <div class="">
            <div class="box box-primary" style="padding: 5px;">
                <br />

                {!! Form::open(["method" => "post", "route" => "timetable.create"]) !!}

                    @for($i = 0; $i<5; $i++)

                    <table class="timetable timetable-edit ui table celled">
                        <thead><tr>
                            <th style="width: 100%; text-align: center;" colspan="3">
                                Понеділок
                                <div class="tools"><i class="plus icon green" id="all"></i></div>
                            </th>
                        </tr></thead>
                        <thead><tr>
                            <th style="width: 5%">№</th>
                            <th style="width: 80%">Урок</th>
                            <th style="width: 10%; min-width: 100px;">Аудиторія</th>
                        </tr></thead>

                        @for($j = 1; $j<=4; $j++)
                        <tr>
                            <td>{{ $j }}</td>
                            <td>
                                <input style="width: 90%; float: left;" class="form-control timetable-input" name="lessons[{{ $i }}][]" placeholder="Classroom" type="text">
                                <div class="tools">
                                    <i class="minus icon red" id="all"></i>
                                </div>
                            </td>
                            <td><input class="form-control timetable-input" name="classroom[{{ $i }}][]" placeholder="Classroom" type="text"></td>
                        </tr>
                        @endfor
                    </table>
                    @endfor

                    <!-- /.box-body -->
                        <button type="submit" class="ui left plus icon button" style="margin-top: 10px;"><i class="refresh icon"></i>Вперед</button>
                {!! Form::close() !!}

            </div>
        </div>
    </section>

</section>
<!-- /.content -->

@stop