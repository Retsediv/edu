@extends('templates.page')

@section('page_title', 'Тестування')

@section('page')
    <div class="container ui padding-top">

        @allowed('test.create')
            <a href="{{ URL::route('poll.create') }}" style="color: #fff;">
                <button class="ui button {{ getRandomColor() }}" style="width: 100%; display: block; margin-bottom: 20px;">
                    Добавити новий тест
                </button>
            </a>
        @endallowed

        <div class="ui four cards">

            @foreach($tests as $test)
                <div class="card">
                    <div class="content">
                        <div class="header">{{ $test->title }}</div>
                        <hr />
                        <p>{!! $test->description !!}</p>
                    </div>
                    <div class="extra content">
                        <p class="text-right">{{ $user->getUserFullNameById($test->user_id) }}</p>
                    </div>

                    <a href="{{ route('poll.one', ['id' => $test->id]) }}">
                        <div class="ui bottom attached button {{ getRandomColor() }}"><i class="checkmark icon"></i> Пройти тестування </div>
                    </a>
                </div>
            @endforeach

        </div>


    </div>

@stop