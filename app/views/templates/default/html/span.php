<?php

function span($inner_text,$wrap_class='',$style=''){
    
    //style
    $s = "";
    if ($style !==""){
    $s = 'style="'. $style .';"';
    }
    //class
    $c = "";
    if ($wrap_class !==""){
    $c = 'class="' . $wrap_class .';"';
    }
    
    $html = '
        <span ' . $c . ' ' . $s . '  >' . $inner_text . '</span>
        ';
    return $html;
}