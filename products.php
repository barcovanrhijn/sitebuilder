<?php

//debug on
ini_set('display_errors', 1);

include_once "app/includes/boolean.php";

/*Fetch API Data */

//include api functions
include("app/includes/api_fetch.php");

// Home Page Data //
$home = api_fetch($api_home,$api_auth);

// Home Page Data //
$settings = api_fetch($api_settings,$api_auth);

// Products Data //
$products = api_fetch($api_articles,$api_auth);
$pr = "pr_";

$active = $settings->{$pr . 'active'};

include "header.php";
//Header Area
$header = headArea($articles,$pr,$home,'mp_');
//Meta
$meta_tag = metaData($pr,$articles);
$meta_title = metaTitle($pr,$articles);

//Notify Announcement
$notify = notify($pr,$articles);

//Footer
include "footer.php";

//include views
include("app/views/v_header.php");
include("app/views/v_nav.php");
include("app/views/v_products.php");
include("app/views/v_footer.php");