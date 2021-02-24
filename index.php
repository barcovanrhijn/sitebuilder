<?php
//debug on
ini_set('display_errors', 1);
//boolean
include_once 'app/includes/boolean.php';

/*Fetch API Data */

//include api functions
include "app/includes/api_fetch.php";

// Home Page Data //
$home = api_fetch($api_home,$api_auth);
$pr = 'mp_';

/*Create template parts */
include_once 'app/views/templates/default/html/html.php';

include "header.php";

$pr = 'mp_';
//Header Area
$header = headArea($home,$pr,$home,$pr);
//Meta
$meta_tag = metaData($pr,$home);
$meta_title = metaTitle($pr,$home);

//Notify Announcement
$notify = notify($pr,$home);

//Feature areas
include "app/views/templates/default/templates-sections/ts_feature-area.php";
$feature = feature_area($home,$pr);

//Testimonials
include 'testimonial.php';

//Footer
include "footer.php";

//include views
include("app/views/v_header.php");
include("app/views/v_nav.php");
include("app/views/v_index.php");
include("app/views/v_footer.php");
?>