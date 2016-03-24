@extends('templates.page')

@section('page_title', 'Головна')

@section('page')


        <!-- TO-DO LIST -->
<section class="ui eight wide column segment piled load">
    <h3 class="ui header">Список справ</h3>

    <div class="ui relaxed divided list todo-list" id="tasks">

        <div v-for="task in tasks" class="item @{{ task.progress }}">
            <div class="content form ui" style="float: left;">
                <a class="header" v-on:dblclick="editTask = task" v-show="editTask != task">@{{ task.name }}</a>
                <input type="text" class="form-controll" v-model="editTask.name" v-show="editTask == task"
                       v-on:keyup.13="taskEdit(task, editTask)">

                <div class="description">@{{ task.deadline }}</div>
            </div>
            <div class="tools" style="">
                <i class="fa fa-check checkmark icon" id="done" v-on:click="taskDone(task)"></i>
                <!--<a href=""><i class="fa fa-edit edit icon" id="edit"></i></a>-->
                <i class="fa fa-remove remove icon" id="remove" v-on:click="taskRemove(task)"></i>
            </div>
        </div>
    </div>


    <button class="ui eight plus icon button" style="float: right;"><a href="{{ route('tasks') }}">
            <i class="right arrow icon"></i>
            Додати</a>
    </button>


</section>

<section class="ui seven wide column">
    @foreach($events as $event)
        <div class="ui card">
            <div class="content">
                <div class="header">{{ $event->name }}</div>
                <div class="description">
                    <p> {!! $event->description !!}</p>
                </div>
            </div>
            <div class="extra content">
                {{ $event->data_range }}
            </div>

        </div>
    @endforeach
</section>

<section class="ui sixteen wide column">
    <div class="ui segment">
        <h2>Ваша успішність</h2>

        <canvas id="mark-chart" height="500" class="full-width"></canvas>
    </div>
</section>

@stop