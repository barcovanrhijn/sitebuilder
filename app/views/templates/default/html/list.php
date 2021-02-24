<?php
include_once('app/views/templates/default/html/html.php');

//ul - extends wrap
//wrap a li in a ul with predefined class.
//if type = menu it will use bootstrap nav class
//if you're outputting a tags use the wrap function instead
function ul($listItems,$listClass){
    return wrap($listItems,'ul',$listClass);
}
//li extends wrap
//creates a link, wraps it in a li
//accepts class of your choice
function li($text,$li_class,$link,$link_class){
    //create link
    $a = '
    <a href="' .$link. '" class="'. $link_class . '">'. $text .' </a>
    ';

    //create li
    $html = wrap($a,'li',$li_class,$link);

    return $html;
}