<?php
//debug on
ini_set('display_errors', 1);

function meta($obj,$prefix){

$meta_title = $obj->{$prefix . 'meta_title'}; 
$meta_description = $obj->{$prefix . 'meta_description'};
$meta_keywords = $obj->{$prefix . 'meta_keywords'};

if (!empty($descr) && !empty($keyw)){
$html='
  <meta charset="UTF-8">
  <meta name="description" content="'. $meta_description .'">
  <meta name="keywords" content="' . $meta_keywords . '">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">';
} else {
  $html = " ";
}


return $html;
}



