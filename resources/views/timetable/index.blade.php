@extends('templates.dashboard')


@section('main')

        <!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
       Розклад уроків
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
    <section class="left-section col-sm-12">
        <!-- TO-DO LIST -->
        <div class="">
            <div class="box box-primary" style="padding: 5px;">
                <br />

                <table class="timetable table table-bordered">

                    <tr>
                        <th style="width: 100%" colspan="3">Понеділок</th>
                    </tr>
                    <tr>
                        <th style="width: 5%">№</th>
                        <th style="width: 70%">Урок</th>
                        <th style="width: 25%">Аудиторія</th>
                    </tr>
                    <tr>
                        <td>1.</td>
                        <td>Update software</td>
                        <td>Some thing</td>
                    </tr>
                    <tr>
                        <td>1.</td>
                        <td>Update software</td>
                        <td>Some thing</td>
                    </tr>
                </table>

                <table class="timetable table table-bordered">

                    <tr>
                        <th style="width: 100%" colspan="3">Понеділок</th>
                    </tr>
                    <tr>
                        <th style="width: 5%">№</th>
                        <th style="width: 70%">Урок</th>
                        <th style="width: 25%">Аудиторія</th>
                    </tr>
                    <tr>
                        <td>1.</td>
                        <td>Update software</td>
                        <td>Some thing</td>
                    </tr>
                    <tr>
                        <td>1.</td>
                        <td>Update software</td>
                        <td>Some thing</td>
                    </tr>
                </table>

                <table class="timetable table table-bordered">

                    <tr>
                        <th style="width: 100%" colspan="3">Понеділок</th>
                    </tr>
                    <tr>
                        <th style="width: 5%">№</th>
                        <th style="width: 70%">Урок</th>
                        <th style="width: 25%">Аудиторія</th>
                    </tr>
                    <tr>
                        <td>1.</td>
                        <td>Update software</td>
                        <td>Some thing</td>
                    </tr>
                    <tr>
                        <td>1.</td>
                        <td>Update software</td>
                        <td>Some thing</td>
                    </tr>
                </table>

                <table class="timetable table table-bordered">

                    <tr>
                        <th style="width: 100%" colspan="3">Понеділок</th>
                    </tr>
                    <tr>
                        <th style="width: 5%">№</th>
                        <th style="width: 70%">Урок</th>
                        <th style="width: 25%">Аудиторія</th>
                    </tr>
                    <tr>
                        <td>1.</td>
                        <td>Update software</td>
                        <td>Some thing</td>
                    </tr>
                    <tr>
                        <td>1.</td>
                        <td>Update software</td>
                        <td>Some thing</td>
                    </tr>
                </table>

                <table class="timetable table table-bordered">

                    <tr>
                        <th style="width: 100%" colspan="3">Понеділок</th>
                    </tr>
                    <tr>
                        <th style="width: 5%">№</th>
                        <th style="width: 70%">Урок</th>
                        <th style="width: 25%">Аудиторія</th>
                    </tr>
                    <tr>
                        <td>1.</td>
                        <td>Update software</td>
                        <td>Some thing</td>
                    </tr>
                    <tr>
                        <td>1.</td>
                        <td>Update software</td>
                        <td>Some thing</td>
                    </tr>
                </table>
                <!-- /.box-body -->
                <div class="box-footer clearfix no-border">
                    <a href="{{ route('timetable.create') }}"><button class="btn btn-default pull-right"><i class="fa fa-plus"></i>Змінити</button></a>
                </div>
            </div>
        </div>
    </section>



</section>
<!-- /.content -->

@stop