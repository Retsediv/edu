@extends('templates.page')

@section('page_title', 'Головна')

@section('page')


<!-- TO-DO LIST -->
<section class="ui seven wide column segment">
    <h3 class="ui header">Список справ</h3>

    <div class="ui relaxed divided list todo-list">
        @foreach($tasks as $task)
            <div class="item {{ $task->progress }}">
                <input value="{{ $task->id }}" name="taskDone" type="hidden">

                <div class="content" style="float: left;">
                    <a class="header">{{ $task->name }}</a>

                    <div class="description">{{ $task->deadline }}</div>
                </div>
                <div class="tools" style="float: right">
                    <i class="fa fa-check checkmark icon" id="done"></i>
                    <i class="fa fa-remove remove icon" id="remove"></i>
                </div>
            </div>
        @endforeach
    </div>


    <button class="ui right plus icon button" style="float: right;"><a href="{{ route('tasks') }}"><i
                    class="right arrow icon"></i>
            Добавити</a>
    </button>


</section>

<section class="ui seven wide column">
    @foreach($events as $event)
        <div class="ui card">
            <div class="content">
                <div class="header">{{ $event->name }}</div>
                <div class="description">
                    <p> {{ $event->description }}</p>
                </div>
            </div>
            <div class="extra content">
                {{ $event->data_range }}
            </div>
            @endforeach

        </div>


</section>


@stop