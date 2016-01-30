<?php

/**
 * Return random color from array. (It used in views)
 *
 * @return mixed
 */
function getRandomColor(){
    $color = ['green', 'red', 'black', 'pink', 'orange', 'teal', 'violet', 'brown', 'grey', ''];
    $index = array_rand($color, 1);

    return $color[$index];
}