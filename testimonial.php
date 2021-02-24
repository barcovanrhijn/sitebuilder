<?php
//debug on
ini_set('display_errors', 1);

/*Fetch API Data */

//include api functions
include_once "app/includes/api_fetch.php";

// Testimonial Data //
$tm = api_fetch($api_testimonials,$api_auth);

// Create Testimonial
include 'app/views/templates/default/testimonial.php';

$pr = 'tm_';
$testimonials = testimonials($tm,$pr);
