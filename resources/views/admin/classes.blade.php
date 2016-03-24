@extends('templates.page')

@section('page_title', 'Модерування учнями школи')

@section('page')
    <div class="container ui" id="admin-classes" >
        <br>
        <table class="ui compact celled table text-center">
            <thead>
            <tr>
                <th v-on:click="sortBy('name')"><a href="#">Назва класу</a></th>
                <th v-on:click="sortBy('count')"><a href="#">Кількість учнів</a></th>
                <th><a href="#"></a></th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="class in classes | orderBy sortKey reverse">
                <td>@{{ class.name }}</td>
                <td>@{{ class.count }}</td>
                <td v-on:click="removeClass(class)"><a href="#"><strong>Видалити</strong></a></td>
            </tr>
            </tbody>
        </table>

        <div class="ui sixteen wide column segment">

            <h3 class="box-title">Додати новий клас?</h3>

            {!! Form::open(['class' => 'ui form', 'v-on:submit.prevent' => 'addClass']) !!}

            <div class="ui grid twelve column aligned center">

                <div class="field ui column wide nine" style="margin: 0;">
                    {!! Form::label('name', 'Назва', ['class' => '']) !!}

                    <div class="ui">
                        {!! Form::text('name', Input::old('name'), ['placeholder' => 'Яка назва класу?', 'required', 'class' => 'form-control', 'v-model' => 'newClass.name']) !!}
                    </div>
                </div>

            </div>

            <button type="submit" class="ui right plus icon button" style="margin-top: 10px;">
                <i class="right arrow icon"></i>Додати
            </button>

            {!! Form::close() !!}

        </div>
    </div>

@stop