@extends('templates.page')

@section('page_title', 'Тестування')

@section('page')
    <div class="container ui" style="margin: 25px 0;">

        @foreach($tests as $test)
        <div class="ui card twelve wide column" style="width: 100%;">
            <div class="content">
                <div class="header">{{ $test->title }}</div>
                <p>{{ $test->description }}</p>
            </div>
            <div class="extra content">
                {{ $test->created_at }}

                <a href="poll/{{ $test->id }}">Пройти</a>
            </div>
        </div>

        @endforeach

    </div>

@stop