<?php
//handles json arrays 

/**
 * @param string path - can be relative or absolute with file name 
 */
function readJson($ReadPath){
$filepath = './persons.txt';
$json_string = file_get_contents($filepath);
$json = json_decode($json_string, true);
return $json;
}

/**
 * @param string obj - should be a json object
 * @param string path - can be relative can be relative or absolute with file name 
 */
//writes json to a specified path with filename
function writeJson($obj,$writePath){
$json = json_encode($obj);
file_put_contents($writePath, $json);
return $json;
}

//loop through named items 
//key can be an id
function getJsonVal($key,$val,$json_array){
    foreach($json_array as $elem) {
        echo($elem[$key]. ", ".$elem[$val] );
        }
}