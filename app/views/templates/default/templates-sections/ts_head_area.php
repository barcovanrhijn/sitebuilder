<?php
//Header - Show Hero or Splash
function headArea(&$obj,$pr){

    $html = "";
    if (yes($obj->{$pr . 'hero'})){
        //Show Hero
        include 'app/views/templates/default/hero.php';
        $hero_h1_text = $obj->{$pr . 'hero_header'};
        $hero_text = "";//$obj->"";//not implimented
        $hero_btn_text = $obj->{$pr . 'hero_btn_txt'};
        $hero_btn_link = $obj->{$pr . 'hero_btn_url'};
        $hero_img = $obj->{$pr . 'header_img'};
        $hero_logo = "";
        $hero_logo_alt = "";
        $hero_logo_link ="#";
        $hero_logo_show = $obj->{$pr . 'hero_logo_display'};
        $hero_h1_bg = $obj->{$pr . 'hero_header_bg_display'};
        $hero_logo_width = $obj->{$pr . 'hero_logo_width'};
        $hero_bg_color = $obj->{$pr . 'hero_header_bg_color'} ?? '#fafa';
        //function logo($imgSrc,$imgAlt,$imgClass="",$imgMaxWidth="",$link_url="",$wrap_tag="",$img_wrap_class=""){
        $html = hero($hero_h1_text,$hero_text,$hero_img,$hero_btn_text,$hero_btn_link,$hero_logo,$hero_logo_link,$hero_logo_show,$hero_h1_bg,$hero_logo_width);
        }else {
        //Show Splash
        include ('app/views/templates/default/splash.php');
        $splash  = $obj->{$pr . 'splash_img'};
        $html = splash($splash,'',''); 
        }
        return $html;
    }