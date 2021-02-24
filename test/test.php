<?php
//navbar loop - creates a navbar 

//debug on
ini_set('display_errors', 1);

/*Fetch API Data */

//include api functions
include_once("app/includes/api_fetch.php");
//include html template parts
include_once('app/views/templates/default/html/html.php');

// Home Page Data //
$home = api_fetch($api_home,$api_auth);
// About Page Data //
$about = api_fetch($api_about,$api_auth);
// Contact Page Data //
$contact = api_fetch($api_contact,$api_auth);
// Products Page Data //
$products = api_fetch($api_products,$api_auth);
// Articles Page Data //
$articles = api_fetch($api_articles,$api_auth);
// Articles & Products Category Page Data //
$settings = api_fetch($api_settings,$api_auth);

//Menu items - check if marked active
include_once('app/includes/boolean.php');
$home_active = 1;
echo $settings->pr_active ?? 'pr active is not defined';
echo $settings->ar_active ?? 'ar active is not defined';