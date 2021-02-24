<?php
//debug on
ini_set('display_errors', 1);

include_once "app/includes/api_fetch.php";

// Footer Page Data //
$footer = api_fetch($api_footer,$api_auth);
$pr = 'ft_';

// Home Page Data //
$home = api_fetch($api_home,$api_auth);

//Footer
include ('app/views/templates/default/footer.php');
$company_name = c($home,'mp_company_name');
$footer = footer($company_name);