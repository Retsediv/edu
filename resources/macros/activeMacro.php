<?php

Html::macro('is_active', function($route)
{
    if(Request::is($route . '/*') OR Request::is($route)) {
        return "active";
    }
});

Html::macro('is_active_lesson', function($route)
{

    if(Request::fullUrl() == $route){
        return "active";
    }
});