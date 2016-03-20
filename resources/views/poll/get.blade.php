@extends('templates.page')
@section('page_title', 'Тестування триває. <small>(Не перезавантажуйте сторінку і не виходьте з браузера)</small>')

@section('page')
    <div class="container ui poll" id="poll" style="margin: 25px 0;">
        <button class="ui blue basic button poll-btn" v-bind:class="showPoll ? 'hide' : 'show'" v-on:click="update">Розпочати</button>

        <div class="poll-block" v-bind:class="showPoll ? 'show' : 'hide'" >

        <div class="ui teal progress" id="poll-progress-bar" data-value="@{{ Math.round(count / 2) + 1 }}" data-total="@{{ last }}">
            <div class="bar"></div>
            <div class="label">Прогрес тестування</div>
        </div>

        <input type="hidden" id="test-id" value="{{ $id }}">
        <input type="hidden" id="lesson-id" value="{{ $lessonId }}">

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

        {{--<pre>@{{ $data | json }}</pre>--}}

    </div>

@stop