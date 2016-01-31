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

                    @if($user->isAuthor($course))
                        <a class="item"
                           href="{{ route('mark.show', ['CourseId' => $course->id]) }}">Поставити оцінку
                        </a>
                    @endif
                </div>
            </div>
            <div class="thirteen wide stretched column">
                <div class="ui segment">
                    <h2>Ваші оцінки:</h2>

                    @foreach($marks as $mark)
                        <div style="margin: 5px">
                            <p style="margin: 0">Оцінка за урок: {{ $mark->lesson->title }}: {{ $mark->mark }}%</p>
                            <small>{{ $mark->description }}</small>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
@stop