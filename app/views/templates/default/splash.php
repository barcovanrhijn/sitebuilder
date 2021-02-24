<?php
//debug on
ini_set('display_errors', 1);
include_once 'app/views/templates/default/html/img.php';

function splash($src,$imgAlt,$link){
$html = "";
if ($imgAlt ==""){$imgAlt = "Header Image";}
  if (!empty($src)){
    $html = img($src,$imgAlt,"splash",$link,"","",1,"Splash",'min-width:100vw;');
  }
  
  return $html;
}
