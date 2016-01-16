@extends('templates.page')

@section('page_title', 'Стаття')

@section('sidebar_menu')
    <div class="ui vertical menu blog">
        <h3 class="ui center aligned header">Категорії</h3>
        <a class="item {{ Html::is_active('/') }}" href="{{ URL::route('home') }}">
            <i class="home icon"></i> Головна
        </a>
    </div>
@stop

@section('page')
    <div class="container ui" id="blog">
        <br>
        <article class="ui segment">
            @if($post->authorCheck($user))
                <a href="{{ route('blog.edit', ['id' => $post->id]) }}" style="display: block; float: right;">
                    <button class="ui right labeled icon button"><i class="edit icon"></i> Редагувати </button>
                </a>
                <a href="{{ route('blog.delete', ['id' => $post->id]) }}" style="display: block; float: right;">
                    <button class="ui right labeled icon button"><i class="delete icon"></i> Видалити </button>
                </a>
            @endif

            <h2 class="ui header"><a href="#">{{ $post->title }}</a></h2>

            <p>{!! $post->body !!}</p>
        </article>


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


@stop