<?php

function btn($btn_text,$btn_link,$btn_class,$btn_wrap_tag,$btn_wrap_class){
    $btn = "";
    if (!empty($btn_text)){
        $btn = '
        <a class="' . $btn_class . '" href="'. $btn_link .'" role="button">' . $btn_text . '</a>
        ';
        //Button Text empty remove button
    }
        return $btn;
}