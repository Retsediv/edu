@extends('templates.page')

@section('page_title', 'Розклад уроків')

@section('page')
    <section class="left-section col-sm-12">
        <!-- TO-DO LIST -->
        <div class="">
            <div class="box box-primary" style="padding: 5px;">
                <br />

                @for($i = 0; $i<5; $i++)
                <table class="timetable ui table celled">
                    <thead><tr>
                        <th style="width: 100%" colspan="3">Понеділок</th>
                    </tr></thead>
                    <thead><tr>
                        <th style="width: 5%">№</th>
                        <th style="width: 70%">Урок</th>
                        <th style="width: 25%">Аудиторія</th>
                    </tr></thead>
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
                @endfor




                    <a href="{{ route('timetable.create') }}">
                        <button class="ui left plus icon button" style="margin-top: 10px;"><i class="refresh icon"></i>Змінити</button>
                    </a>

            </div>
        </div>
    </section>



</section>
<!-- /.content -->

@stop