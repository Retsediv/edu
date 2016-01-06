@extends('templates.page')
@section('page_title', 'Тестування триває. <small>(Не перезагружайте сторінку і не виходьте з браузера)</small>')

@section('page')
    <div class="container ui poll" id="poll" style="margin: 25px 0;">
        <button class="ui blue basic button poll-btn" v-bind:class="showPoll ? 'hide' : 'show'" v-on:click="update">Розпочати</button>

        <div class="poll-block" v-bind:class="showPoll ? 'show' : 'hide'" >

        <div class="ui olive progress">
            <div class="bar"></div>
        </div>
        <input type="hidden" id="test-id" value="{{ $id }}">


        <div class="question">
            <h3>@{{ currentQuestion.body }}</h3>

            <div class="ui form">
                <div class="grouped fields">

                    <div class="field" v-for="answer in currentAnswer">
                        <div class="ui radio checkbox">
                            <input name="answer" class="" type="radio" id="answer-radio @{{ answer.id }}">
                            <label>@{{ answer.answer }}</label>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="ui bottom attached green button" id="accept" tabindex="0" v-on:click="accept">Прийняти</div>

        <pre>@{{ $data | json }}</pre>

    </div>

@stop