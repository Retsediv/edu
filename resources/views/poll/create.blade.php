@extends('templates.page')
@section('page_title', 'Новий тест')

@section('page')
    <div class="container ui poll padding-bottom" id="pollCreate">

        {!! Form::open(['method' => 'post', 'route' => 'poll.create', 'class' => 'ui form fifteen wide column']) !!}
        <div class="field">
            <label for="title">Назва</label>
            <input type="text" id="title" name="title" placeholder="Назва тесту" required="required">
        </div>

        <div class="field">
            <label for="wswj">Опис</label>
            <textarea id="wswj" name="description" placeholder="Невеликий опис тестування" ></textarea>
        </div>
        <hr />

        <div class="ui segment" v-for="range in range">
            <div class="field">
                <label for="questions">Яке запитання?</label>
                <input type="text" id="questions" name="questions[@{{ range }}][name]" placeholder="Яке запитання?" required="required">

                <label>Відповіді(правильну відзначити):</label>
                <div class="fields inline" v-for="id in [1,2,3,4]">
                    <div class="field">
                        <input type="radio" name="questions[@{{ range }}][correct]" checked="false" value="@{{ id }}" tabindex="0" class="hidden">
                    </div>
                    <div class="field">
                        <input type="text" name="questions[@{{ range }}][answers][]" placeholder="відповідь..." required="required">
                    </div>
                </div>
            </div>
        </div>

        <div id="add" v-on:click="add" class="ui button {{ getRandomColor() }}">Ще одне питання</div>
        <div id="remove" v-on:click="remove" class="ui button {{ getRandomColor() }}">Видалити останнє</div>

        {{--<pre>@{{ $data | json }}</pre>--}}

        <hr />
        <div class="field">
            <label for="per_page">К-сть питань, які буде проходити користувач із загальної кількості(якщо усі, то введіть їх кількість)</label>
            <input type="text" id="per_page" name="per_page" placeholder="Кількість" required="required">
        </div>

        <div class="ui segment">
            <div class="field">
                <div class="ui checkbox">
                    <input type="checkbox" name="allowed" tabindex="0" class="hidden">
                    <label>Дозволити проходити тест усім. (Корисно, коли ви хочете включити це тестування в урок у вашому курсі і не хочете, щоб інші користувачі мали змогу перед тим пройти його)</label>
                </div>
            </div>
        </div>

        <div class="ui segment">
            <div class="field">
                <div class="ui checkbox">
                    <input type="checkbox" name="retry" tabindex="0" class="hidden">
                    <label>Дозволити проходити тест кілька разів. (не слід відзначати, якщо хочете включити це тестування в урок у вашому курсі )</label>
                </div>
            </div>
        </div>

        <button type="submit" class="ui button {{ getRandomColor() }}">Відіслати</button>
        {!! Form::close() !!}
    </div>
@stop