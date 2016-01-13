@extends('templates.page')

@section('page_title',  $currentLesson->title )

@section('page')
    <div class="container ui padding-top">

        <div class="ui grid">
            <div class="three wide column">
                <div class="ui vertical fluid tabular menu">
                    @foreach($lessons as $lesson)
                        <a class="item {{ Html::is_active_lesson( route('lesson.get', ['id' => $lesson->id])) }}"
                           href="{{ route('lesson.get', ['id' => $lesson->id]) }}"> {{ $lesson->title }}
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="thirteen wide stretched column">
                <div class="ui segment">
                    @if($user->isAuthor($currentLesson->course()->get()->first()))
                        <a href="{{ route('lesson.edit', ['id' => $currentLesson->id]) }}" style="display: block; float: right;"><button class="ui right labeled icon button"><i class="edit icon"></i> Редагувати </button></a>
                    @endif

                    {!! $currentLesson->body !!}

                </div>
            </div>

            <div class="fifteen wide column">
                <div id="disqus_thread"></div>
                <script>
                    (function() {  // DON'T EDIT BELOW THIS LINE
                        var d = document, s = d.createElement('script');

                        s.src = '//laravelapp.disqus.com/embed.js';

                        s.setAttribute('data-timestamp', +new Date());
                        (d.head || d.body).appendChild(s);
                    })();
                </script>
            </div>
        </div>

    </div>
@stop