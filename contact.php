<?php
//debug on
ini_set('display_errors', 1);
//boolean
include_once('app/includes/boolean.php');

/*Fetch API Data */

//include api functions
include("app/includes/api_fetch.php");

// Contact Page Data //
$contacts = api_fetch($api_contact,$api_auth);
$pr = 'cp_';

$active = $contacts->{$pr . 'active'};

$home = api_fetch($api_home,$api_auth);

/*Create template parts */
include 'app/views/templates/default/html/html.php';

include "header.php";
//Header Area
$header = headArea($contact,'cp_',$home,'mp_');
//Meta
$meta_tag = metaData('cp_',$contact);
$meta_title = metaTitle('cp_',$contact);
//Notify Announcement
$notify = notify('cp_',$contact);

//Logo
include_once 'app/views/templates/default/logo.php';
// function logo($logoImg,$logoAlt,$logoClass="",$logoMaxWidth="",$logoLink="",$logoWrapTag="",$logoWrapClass=""){
$logo_max_width = $obj->{$pr . 'logo_max_width'} ?? 30;
$logo_display = $obj->{$pr . 'logo_display'} ?? 30;

    $cp_logo = "";
    if (yes($logo_display))
    {
    $cp_logo = logo($logo,$company_name,$logo_max_width,'/',); //Need api field for logo size
    }   

//contact details
$email = c($contacts,'cp_email');
$tel1 = c($contacts,'cp_tel');
$tel2 = c($contacts,'cp_tel2');
$address = c($contacts,'cp_address');
$office_hours =  c($contacts,'cp_business_hours');
$company_name = c($home,'mp_company_name');


//Contact details
include ('app/views/templates/default/contactdetails.php');
$contact_details = contactDetails($company_name,$tel1,$tel2,$address,$office_hours);

//contact Form
include 'app/views/templates/default/contactform.php';
$form = contactForm($contact,'cp_');

//Map
include 'app/views/templates/default/map.php';
$map = map($contact,"cp_");

//Footer
include "footer.php";


//include views
include("app/views/v_header.php");
include("app/views/v_nav.php");
include("app/views/v_contact.php");
include("app/views/v_footer.php");

?>