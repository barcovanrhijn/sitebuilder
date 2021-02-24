<?php

//data


//debug on
ini_set('display_errors', 1);
//boolean
include_once('app/includes/boolean.php');

/*Fetch API Data */

//include api functions
include("app/includes/api_fetch.php");

// Home Page Data //
$home = api_fetch($api_home,$api_auth);

include ('app/views/templates/default/logo.php');
$logoSrc = c($home,'mp_logo');


//Header - Show Hero or Splash
$header = "";
if (yes(1)){
    //Show Hero
    include 'app/views/templates/default/hero.php';
    //include 'app/views/templates/default/hero-new.php';
    // $hero_h1_text = "Happiness today";
    // $hero_text = "we supply a wide range of products that make you happy";
    // $hero_btn_text = "";
    // $hero_btn_link = "/contact.php";
    // $hero_img = c($home,'mp_header_img');
    // $hero_logo_src = $logoSrc;
    // $hero_logo_alt = "This is our logo. Do you like it?";
    // $hero_logo_link ="#";
    // $hero_logo_show = "1";
    // $hero_h1_bg = '1';
    // $hero_logo_width = '10';
    $hero_h1_text = $home->mp_header;
    $hero_text = c($home,'mp_header_text');
    $hero_btn_text = c($home,'mp_header_btn_txt');
    $hero_btn_link = c($home,'mp_header_btn_url');
    $hero_img = c($home,'mp_header_img');
    $hero_logo_src = c($home,'mp_logo');
    $hero_logo_alt = c($home, 'mp_company_name');
    $hero_logo_link ="#";
    $hero_logo_show = c($home,'mp_logo_display');
    $hero_h1_bg = c($home,'mp_header_bg_display');
    $hero_logo_width = c($home,'hero_logo_width');
    //function logo($imgSrc,$imgAlt,$imgClass="",$imgMaxWidth="",$link_url="",$wrap_tag="",$img_wrap_class=""){
    $header = hero($hero_h1_text,$hero_text,$hero_img,$hero_btn_text,$hero_btn_link,$hero_logo_src,$hero_logo_link,$hero_logo_show,$hero_h1_bg,$hero_logo_width);
    }else {
    //Show Splash
    include ('app/views/templates/default/splash.php');
    $splash  = c($home,'mp_header_img');
    $header = splash($splash,'',''); 
}


//scaffolding
$notify="";
$meta_tag="";

//Footer
include ('app/views/templates/default/footer.php');
$company_name = c($home,'mp_company_name');
$footer = footer($company_name);


include "app/views/v_header.php";
include "app/views/v_footer.php";
//logo 


//header


//header-bg


//text

//background