<?php

function a($link,$text,$class){
    $html = '<a class="'.$class.'" href="'.$link.'">'.$text.'</a>';
    return $html;
}