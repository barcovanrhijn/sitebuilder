<?php
//include api functions
include_once "app/includes/api_fetch.php";
include_once "app/config/init.php";

// Home Page Data //
$home = api_fetch($api_home,$api_auth);
//Logo
$logo = $home->mp_logo;
$companyname = $home->mp_company_name;

//Generate analytics

include "app/views/templates/default/html/analytics.php";

$analytics = analytics($Google_Analytics_Tracking_Id);

//meta
function metaData($pr,&$obj){
$meta_description = $obj->{$pr . 'meta_description'};
$meta_keywords = $obj->{$pr . 'meta_keywords'};
$meta_tag = meta($meta_description,$meta_keywords);
return $meta_tag;
}

function metaTitle ($pr,&$obj){
    $meta_title = $obj->{$pr . 'meta_title'}; 
    return $meta_title;
}

// Announcement
include 'app/views/templates/default/announcement.php';
function notify($pr,&$obj)
{
    $notify = announcement($obj->{$pr . 'announcement'});
    return $notify;
}


//Header - Show Hero or Splash
function headArea(&$obj,$pr,&$logoObj,$logoPr){

    $html = "";
    if (yes($obj->{$pr . 'hero'})){
        //Show Hero
        include "app/views/templates/default/hero.php";
        $html = hero($obj,$pr,$logoObj,$logoPr);
      }
        else {
        //Show Splash
        include ('app/views/templates/default/splash.php');
        $splash  = $obj->{$pr . 'splash_img'};
        $html = splash($splash,'',''); 
        }
        return $html;
}

//Menu
include ('navbar.php');

