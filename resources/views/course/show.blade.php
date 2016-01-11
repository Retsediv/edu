@extends('templates.page')

@section('page_title', $course->title)

@section('page')
    <div class="container ui padding-top">

        <div class="ui grid">
            <div class="three wide column">
                <div class="ui vertical fluid tabular menu">
                    @foreach($lessons as $lesson)
                    <a class="item"
                       href="{{ route('lesson.get', ['id' => $lesson->id]) }}"> {{ $lesson->title }}
                    </a>
                    @endforeach
                </div>
            </div>
            <div class="thirteen wide stretched column">
                <div class="ui segment">
                    Це перша сторінка. Тут не буде уроків, а лише ваша статистика.(Dev)
                </div>
            </div>
        </div>

    </div>
@stop