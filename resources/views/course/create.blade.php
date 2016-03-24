@extends('templates.page')

@section('page_title', 'Курси')

@section('page')
    <div class="container ui">

        <div class="ui sixteen wide column segment container piled">

            <h3 class="box-title">Додати новий курс</h3>

            <!-- form start -->
            {!! Form::open(['method' => 'post', 'route' => 'courses.create', 'class' => 'ui form', 'files' => true]) !!}
            <div class="ui grid twelve column aligned center">

                <div class="field ui column wide nine" style="margin: 0;">
                    <label for="inputName" class="col-sm-2 control-label">Назва</label>

                    <input name="title" class="form-control" id="inputName" placeholder="Як ви назвете ваш курс?"
                           type="text" required="required">
                </div>

                <div class="field ui column wide nine" style="margin: 0;">
                    <label for="description" class="col-sm-2 control-label">Детальний опис</label>
                    <textarea id="wswj" name="description"></textarea>
                </div>

                <div class="field ui column wide nine" style="margin: 0;">
                    <label for="image" class="col-sm-2 control-label">Завантажте картинку</label>
                    {!! Form::file('image', ['required' => 'required'])  !!}
                </div>

            </div>

            <button type="submit" class="ui plus icon primary button" style="margin-top: 10px;">
                <i class="plus icon"></i>Додати
            </button>

            {!! Form::close() !!}
            <!-- form close -->

            <!-- /.box-footer -->

            @if($errors->has())
                @foreach ($errors->all() as $error)
                    <div style="font-weight: bold; padding: 5px;">{{ $error }}</div>
                @endforeach
            @endif


        </div>
    </div>
@stop