<?php

Html::macro('is_active', function($route)
{
    if(Request::is($route . '/*') OR Request::is($route)) {
        return "active";
    }
});