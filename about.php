<?php
//debug on
ini_set('display_errors', 1);

//boolean
include_once('app/includes/boolean.php');

/*Fetch API Data */

//include api functions
include("app/includes/api_fetch.php");

// Home Page Data //
$home = api_fetch($api_home,$api_auth);

// About Data //
$about = api_fetch($api_about,$api_auth);
$pr = 'ap_';

$active = $about->{$pr . 'active'};

/*Create template parts */
include ('app/views/templates/default/html/html.php');

include "header.php";

//Header Area
$header = headArea($about,$pr,$home,'mp_');
//Meta
$meta_tag = metaData($pr,$about);
$meta_title = metaTitle($pr,$about);

// //Notify Announcement
// $notify = notify($pr,$about);
$notify = "";


//Feature areas
include "app/views/templates/default/templates-sections/ts_feature-area.php";
$feature = feature_area($about,$pr);

//Footer
include "footer.php";


//include views
include("app/views/v_header.php");
include("app/views/v_nav.php");
include("app/views/v_about.php");
include("app/views/v_footer.php");
?>