<?php
//navbar loop - creates a navbar 

//debug on
ini_set('display_errors', 1);

/*Fetch API Data */

//include api functions
include_once("app/includes/api_fetch.php");

// Contact Page Data //
$contacts = api_fetch($api_contact,$api_auth);

// echo c($contacts,'cp_email');
// echo "<br><br>";
// echo c($contacts,'cp_tel');
// echo "<br><br>";
// echo c($contacts,'cp_tel2');
// echo "<br><br>";
// echo c($contacts,'cp_address');
// echo "<br><br>";
// echo c($contacts,'cp_business_hours');
// echo "<br><br>";

//Contact details template part
include "app/views/templates/default/contactdetails.php";
// ($bizName,$tel1,$tel2,$address,$officehours);
$html1 = contactDetails('','','0214321234','','');
echo $html1;