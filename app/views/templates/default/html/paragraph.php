<?php
//Paragraph Function
//Creates a heading with the level and class of your choice.
//Optionally wraps it in a tag and class of your choice.
//Returns html

function p($text,$class,$wrap_tag,$wrap_class){
    $p = '
    <p class="'.$class.'">'. $text .'</p>    
    ';
    if (!empty($wrap_tag)){
        $html = wrap($p,$wrap_tag,$wrap_class);
    }
    else $html = $p;
return $html;
}