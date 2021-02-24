<?php

//Heading Function
//Creates a heading with the level and class of your choice.
//Optionally wraps it in a tag and class of your choice.
//Returns html

function heading($text,$heading_tag,$class,$wrap_tag,$wrap_class){
    $h = '
    <'.$heading_tag .' class="'.$class.'">'. $text .'</'.$heading_tag .'>    
    ';
    if (!empty($wrap_tag)){
        $html = wrap($h,$wrap_tag,$wrap_class);
    }
    else $html = $h;
return $html;
}