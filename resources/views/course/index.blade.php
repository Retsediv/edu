@extends('templates.page')

@section('page_title', 'Курси')

@section('page')
    <div class="container ui">

        @allowed('course.create')

        <a href="{{ URL::route('courses.create') }}" style="color: #fff;">
            <button class="full-width-btn ui button margin {{ getRandomColor() }}" style="margin: 15px 0">
                Додати новий курс
            </button>
        </a>

        @endallowed


        <div class="ui special cards three column grid" style="padding: 0 35px;">
        @foreach($courses as $course)
            <div class="column">
            <div class="fluid card ui ">
                <div class="blurring dimmable image">
                    <div class="ui dimmer">
                        <div class="content">
                            <div class="center">
                                <div class="ui inverted button">
                                    @if($user->isUserMemberOfCourse($course->id, $user))
                                        <a href="{{ route('courses.get', ['id' => $course->id]) }}">Переглянути</a>
                                    @else
                                        <a href="{{ route('courses.join', ['id' => $course->id]) }}">Приєднатися</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <img src="{{ $course->image }}">
                </div>
                <div class="content">
                    <a class="header" href="{{ route('courses.get', ['id' => $course->id]) }}">{{ $course->title }}</a>
                    <div class="meta">
                        <span class="date">{{ date_format($course->created_at, 'd-Y-m' ) }}</span>
                        <br />
                        <span class="author" style="float: right;">Автор: {{ \App\Models\Course::getAuthorFullName($course) }}</span>
                    </div>
                    <div class="description">
                        {!! $course->description !!}
                    </div>
                </div>
                <div class="extra content">
                    <a>
                        <i class="users icon"></i>
                        @if($course->members()->get()->count())
                            {{ $course->members()->get()->count() }} слухачів(а)
                        @else
                            Ще нікого немає. Будь першим!
                        @endif
                    </a>

                    <a style="text-align: right; display: block;">
                        <i class="browser icon"></i>
                        @if($course->lessons()->get()->count())
                            {{ $course->lessons()->get()->count() }} уроків(а)
                        @else
                            Вчитель ще не добавив жодного уроку.
                        @endif
                    </a>


                </div>
                @if($user->isAuthor($course))
                    <a href="{{ route('lesson.create', ['courseId' => $course->id]) }}">
                        <div class="ui bottom attached button black"><i class="add icon"></i>Додати урок</div>
                    </a>
                @endif
            </div>

            </div>
        @endforeach
        </div>
    </div>
@stop