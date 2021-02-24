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
$products_active = yes($settings->pr_active);
$articles_active = yes($settings->ar_active);
$about_active = yes($about->ap_active);
$contact_active = yes($contact->cp_active);

//nav_build creates an array with menu items 
function nav_build($position,$active,$url,$custom_page_name,$page_name){
//Menu link text override if custom_page_name is specified
if (!empty($custom_page_name)){$link_text = $custom_page_name;}else{$link_text = $page_name;}
if (yes($active)){
  //classes for the a and li tags are inserted here. TODO move into the menu-items template part.
  //$menu_item = li($page_name,'nav-item',$url,'nav-link'); //ul li tags
  $menu_item = a($url,$page_name,'nav-link text-light');
  return $menu_item;
}
}

// Build menu items
// NB Home menu text should be defined before including this section 
include_once "app/includes/common/text_formatting.php";

$menu_items = "";
$menu_item = nav_build(1,$home_active,'/',$home->mp_menu_tab_txt ?? '','Home');
  if ($menu_item !== ""){$menu_items = $menu_items . PHP_EOL . TAB3 . $menu_item;}

$menu_item = nav_build(2,$products_active,'products.php',$products->pr_menu_tab_txt ?? '','Products'); //$products_active not defined
  if ($menu_item !== ""){$menu_items = $menu_items . PHP_EOL . TAB3 . $menu_item;}

$menu_item = nav_build(3,$articles_active,'articles.php',$articles->ar_menu_tab_txt ?? '','Articles');//c($articles,'ar_menu_tab_txt')); //$articles_active not defined
  if ($menu_item !== ""){$menu_items = $menu_items . PHP_EOL . TAB3 . $menu_item;}

$menu_item = nav_build(3,$about_active,'about.php',$about->ap_menu_tab_txt ?? '','About');
  if ($menu_item !== ""){$menu_items = $menu_items . PHP_EOL . TAB3 . $menu_item;}

$menu_item = nav_build(3,$contact_active,'contact.php',$contact->ar_menu_tab_txt ?? '','Contact');
  if ($menu_item !== ""){$menu_items = $menu_items . PHP_EOL . TAB3 . $menu_item;}

//articles loop - add articles
//prodcuts loop - add products

//debug
//echo $menu_items;

// Wrap menu items 
include ('app/views/templates/default/navbar.php');
    $navitems = wrap($menu_items,'div','navbar-nav mr-auto');

//Create Navbar 
//function navbar($navItems,$logoSrc,$brand,$displayNavText="0",$displayNavlogo="0"){
$nav = navbar($navitems,$home->mp_logo && '',$home->mp_company_name && '',"0","0");
//debug


/*
//sticky-top
<!-- Image and text -->
<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="#">
    <img src="/docs/4.5/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
    Bootstrap
  </a>
</nav>
*/
