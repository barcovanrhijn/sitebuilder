<?php

/**
 * row
 *
 * @param  string $columns - a string of columns you want to insert into the row
 * @param  mixed $class - Any padding or margin classes you want to add. Default: Class="row"
 * @return void
 */
function row($columns,$class=""){
    $c = 'row ' . ' ' . $class;
    $row = wrap($columns,'div','row');
return $row;
}

/**
 * col
 *
 * @param  mixed $content - the content you want to put in the column
 * @param  mixed $class - you need to specify classes like col-md5 and px-2 here nothing assumed
 * @return void
 */
function col($content,$class){
    $col = wrap($content,'div',$class);
return $col;
}