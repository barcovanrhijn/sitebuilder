<?php
//debug on
ini_set('display_errors', 1);
include_once 'app/includes/boolean.php';
include_once 'app/views/templates/default/html/btn.php';
include_once "app/views/templates/default/html/heading.php";
include_once "app/views/templates/default/html/wrap.php";
include_once "app/views/templates/default/html/span.php";
include_once "app/views/templates/default/logo.php";
include_once "app/views/templates/default/html/paragraph.php";

//$logo should be the logo link/src.
function hero(&$obj,$pr,&$logoObj,$logoPr){
  
  //Data
  $hero_logo_src=$logoObj->{$logoPr . 'logo'};
  $hero_logo_alt=$logoObj->{$logoPr . 'company_name'};;

  $hero_logo_link="#";
  $hero_h1_text = $obj->{$pr . 'hero_header'};
  $hero_h1_bg = $obj->{$pr . 'hero_header_bg_display'};
  $hero_text = "";//$obj->"";//not implimented
  $hero_btn_text = $obj->{$pr . 'hero_btn_txt'};
  $hero_btn_link = $obj->{$pr . 'hero_btn_url'};
  $hero_img = $obj->{$pr . 'hero_img'};
  $hero_logo_show = $obj->{$pr . 'hero_logo_display'};
  $hero_logo_width = $obj->{$pr . 'hero_logo_width'};
  $hero_bg_color = $obj->{$pr . 'hero_header_bg_color'} ?? '#fafa';

  //build button
  $btn_class = 'btn btn-primary btn-lg';
  $hero_btn = btn($hero_btn_text,$hero_btn_link,$btn_class,'p','');

  //build h1 heading
    //hero_h1_text background
    $h1_bg ="";
    if (yes($hero_h1_bg)){$h1_bg='Background-color:'. $hero_bg_color;}
    $hero_h1_text_class = 'display-3 text-white py-0';
    $hero_text_class = 'text-white';

    //hero_h1
    $span = span($hero_h1_text,'hero-heading',$h1_bg);
    $h1 = heading($span,'h1',$hero_h1_text_class,'','');

  //Build Paragraph Text
  $p = p($hero_text,$hero_text_class,"","");

  //build logo
  $logo = logo($hero_logo_src,$hero_logo_alt,'',$hero_logo_width,$hero_logo_link,'div','');

  //Show logo if the image and logoShow boolean value is set.
  if (yes($hero_logo_show))
  {
    $html = '
    <div class="col">
      <div id="hero" class="hero" style="background-image:url('. $hero_img .');">
      <div class="row">
          '. $logo . '  
       <div class="col-xs-12 col-md-6>
          <div class="container">
           ' . $h1 . '
           ' . $p . '
          '. $hero_btn .'
          </div>
        </div> 
        </div><?php //row ?>
      </div>
    </div>
    ';
  
  
  //Show without logo
  }else
  {
    $html = '
    <div class="col">
    <div class="container">
     <div id="hero" class="hero" style="background-image:url('. $hero_img .');">
          <div class="container">
            ' . $h1 . '
            ' . $p . '
          '. $hero_btn .'
          </div>
        </div> 
      </div>
    </div>
    </div>
    ';
  }

    
  
  
  return $html;
}
  