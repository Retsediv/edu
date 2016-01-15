@if($errors->has())
<div class="ui negative message">
    <ul>
        @foreach ($errors->all() as $error)
            <li> {{ $error }} </li>
        @endforeach
    </ul>
</div>
@endif