@extends('templates.dashboard')

@section('main')
<!-- Content Header (Page header) -->
<div class="ui segment">
    <h1>
        @yield('page_title', 'Сторінка...')
    </h1>
</div>

<!-- Main content -->
<div class="page-content ui grid">
    <!-- Your Page Content Here -->
    @yield('page')
</div>

@stop
