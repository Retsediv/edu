@extends('templates.page')

@section('page_title', 'Список справ')

@section('page')


    <div id="tasks">
        <div class="ui sixteen wide column">

            <h3 class="box-title">Завжди плануйте та записуйте, для того щоб не забути та виконувати все вчасно</h3>


            <!-- /.box-header -->
            <div class="ui relaxed divided list todo-list segment">
                <br/>

                <div v-for="task in tasks" class="item @{{ task.progress }}">
                    <div class="content form ui" style="float: left;">
                        <a class="header" v-on:dblclick="editTask = task" v-show="editTask != task">@{{ task.name }}</a>
                        <input type="text" class="form-controll" v-model="editTask.name" v-show="editTask == task" v-on:keyup.13="taskEdit(task, editTask)">

                        <div class="description">@{{ task.deadline }}</div>
                    </div>
                    <div class="tools" style="">
                        <i class="fa fa-check checkmark icon" id="done" v-on:click="taskDone(task)"></i>
                        <!--<a href=""><i class="fa fa-edit edit icon" id="edit"></i></a>-->
                        <i class="fa fa-remove remove icon" id="remove" v-on:click="taskRemove(task)"></i>
                    </div>
                </div>
                <br/>

            </div>
            <!-- /.box-body -->
        </div>


        <div class="ui sixteen wide column segment">

            <h3 class="box-title">Бажаєте запланувати щось?</h3>

            <!-- /.box-header -->
            <!-- form start -->

            {!! Form::open(['class' => 'ui form', 'v-on:submit.prevent' => 'addTask']) !!}

            <div class="ui grid twelve column aligned center">

                <div class="field ui column wide nine" style="margin: 0;">
                    {!! Form::label('name', 'Назва', ['class' => '']) !!}

                    <div class="ui">
                        {!! Form::text('name', Input::old('name'), ['placeholder' => 'Що саме ви хочете зробити?', 'required', 'class' => 'form-control', 'v-model' => 'newTask.name']) !!}
                    </div>
                </div>

                <div class="field ui column wide nine">
                    {!! Form::label('deadline', 'Сроки', ['class' => '']) !!}
                    <div class="ui">
                        {!! Form::text('deadline', Input::old('deadline'), ['placeholder' => 'За скільки часу ви маєте це виконати?', 'required', 'class' => 'form-control', 'v-model' => 'newTask.deadline']) !!}
                    </div>
                </div>

            </div>
            <!-- /.box-body -->


            <button type="submit" class="ui right plus icon button" style="margin-top: 10px;">
                <i class="right arrow icon"></i>Додати
            </button>

            @if($errors->has())
                @foreach ($errors->all() as $error)
                    <div style="font-weight: bold; padding: 5px;">{{ $error }}</div>
                @endforeach
            @endif

            {!! Form::close() !!}

        </div>

    </div>

@stop