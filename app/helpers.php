<?php

/**
 * Return random color from array. (Uses in views)
 *
 * @return mixed
 */
function getRandomColor(){
    $color = ['green', 'red', 'yellow', 'black', 'pink', 'orange', 'olive', 'teal', 'violet', 'purple', 'brown', 'grey', ''];
    $index = array_rand($color, 1);

    return $color[$index];
}