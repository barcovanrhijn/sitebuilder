<?php

//debug on
ini_set('display_errors', 1);

/*Fetch API Data */

//include api functions
include("app/includes/api_fetch.php");

// Home Page Data //
$home = api_fetch($api_home,$api_auth);

// Articles Data //
$articles = api_fetch($api_home,$api_auth);
//
// if (ar_active) ;
/*
"ar_article_id"
"ar_active"
"ar_verify"
"ar_menu_tab_txt"

"ar_heading_1":"This is the first Article",
"ar_img_1"
ar_img_alt_1"
"ar_img_pos_1"
"ar_txt_1"

"ar_header":"Article Page 1"
"ar_header_bg"
"ar_header_bg_display"
"ar_header_btn_txt"
"ar_header_btn_url"
"ar_header_img"
"ar_hero"
"ar_announcement"



"ar_meta_keywords"
*/



//Template Parts
include ('app/views/templates/default/html/html.php');


//Footer
include ('app/views/templates/default/footer.php');
$company_name = c($home,'mp_company_name');
$footer = footer($company_name);


//include views
include("app/views/v_header.php");
include("app/views/v_nav.php");
include("app/views/v_articles.php");
include("app/views/v_footer.php");