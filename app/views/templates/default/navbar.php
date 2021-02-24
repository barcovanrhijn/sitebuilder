<?php

// TODO
// Add default menu
// Add logo menu
// Add sticky menu
// Add footer menu

//display_nav_text en display_nav_logo en nav_logo size 
//todo impliment $navType,$sticky
function navbar($navItems,$navLogo="",$navText="",$displayNavText="0",$displayNavlogo="0",$NavLogoSize="30"){
$hamburger_size = '28px'; //Defines padding round hamburger. Padding is x/y in Bootstrap4
  //$brand = 'Brand';
//define logo_area
if(!empty($navLogo) && $displayNavLogo = 1){
  $logo_area = '<img src="'. $navLogo .'" width="'.$NavLogoSize . '" height="'. $NavLogoSize .'" class="d-inline-block align-top" alt="" loading="lazy">';
}else $logo_area = "";

if(!empty($navText) && $displayNavText = 1){
  $text_area = $navText;
}
else {
  $text_area = "";
}

$brand = "";
if ($logo_area !=="" && $text_area !==""){
$brand ='
  <a class="navbar-brand align-middle" href="/">
  ' .$logo_area .' 
  '. $text_area .'
  </a>
';
}


 $html= '
    <div class="col">
    <nav class="navbar navbar-expand-md navbar-light bg-info">
        ' . $brand . '
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon" style="border-color: rgb(255,102,203);padding: '. $hamburger_size . ' !important;"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav" style="padding-top: 5px;">
        ' . $navItems .' 
        </div>
      </nav>
    </div>
  ';
//todo a rogue is output just after this template part. 
    return $html;
};