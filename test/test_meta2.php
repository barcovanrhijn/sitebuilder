<?php
//debug on
ini_set('display_errors', 1);
include "app/views/templates/default/html/meta2.php";
$json = '{"mp_meta_title":"The MP meta title","mp_meta_description":"Main page meta description","mp_meta_keywords":"mpkeyphpwords"}';
$home1 = json_decode($json);


$prefix = "mp_";
//$meta_title = $home1->{$prefix . 'meta_title'}; 
// $meta_description = c($obj, $prefix . 'meta_description');
// $meta_keywords = c($obj,$prefix . 'meta_keywords');

$meta = meta($home1,'mp_');

//echo $meta;
echo $meta ;

