<?php

function meta($description,$keywords){
$desc = cstr($description);
$keyw = cstr($keywords);

if (!empty($descr) && !empty($keyw)){
$html='
  <meta charset="UTF-8">
  <meta name="description" content="'. $desc .'">
  <meta name="keywords" content="' . $keyw . '">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">';
} else {
  $html = " ";
}


return $html;
}
