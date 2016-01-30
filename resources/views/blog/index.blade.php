@extends('templates.page')

@section('page_title', 'Блог')

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

        @allowed('blog.create')

        <a href="{{ URL::route('blog.create') }}" style="color: #fff;" class="margin-bottom">
            <button class="positive ui button full-width-btn {{ getRandomColor() }}">
                Добавити нову статтю
            </button>
        </a>

        @endallowed

        <br>
        <article class="ui segment" v-for="post in posts">
            <h2 class="ui header"><a href="/blog/@{{ post.id }}">@{{ post.title }}</a></h2>

            <p>@{{{ post.body }}}</p>
        </article>

        <div class="ui buttons" style="display: flex;">
            <button class="ui button" v-show="prev_link" v-on:click="loadNewPosts(prev_link)">Назад</button>
            <div class="or" v-show="prev_link && next_link"></div>
            <button class="ui positive button" v-show="next_link" v-on:click="loadNewPosts(next_link)">Вперед</button>
        </div>

    </div>

@stop