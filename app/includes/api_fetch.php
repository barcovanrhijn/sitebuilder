<?php

//debug on
ini_set('display_errors', 1);

include 'app/config/init.php';
include 'app/includes/log.php';

// Authorization string values are part of init.php
$api_auth = '?passkey=' .$passkey. '&site_id=' .$site_id. '';

//API Endpoints (filenames)
$api_home = 'get_main_page.php'; 
$api_contact = 'get_contact_page.php';
$api_about = 'get_about_page.php';
$api_footer = 'get_footer.php';
$api_testimonials = 'get_testimonials.php';
$api_products = 'get_product_pages.php';
$api_articles = 'get_article_pages.php';
$api_settings = 'get_settings.php';

/** c function aka SEE - shows you the value of an object after checking for errors and logging results.
* @param object => $obj  
* @param object val => $val
* Checks for errors i.e. value does not exist.
* returns the value of the key
* logs any errors to the logfile 
 */

// todo check if 
function c($obj,$val){ //obj here is the key name
$result = "";
    if(isset($obj)){
        if(isset($val)){
            if (property_exists($obj,$val)){    
            //remove whitespace before or after & return the value
            $result = (trim($obj->$val));
            }
        }  
    }

return $result;
};

/** 
 * 
 */
/*
function  (){
    //img src with path i.e. for image links
    filter_var(trim($url), FILTER_VALIDATE_URL, FILTER_FLAG_PATH_REQUIRED);
    
    //url 
    filter_var(trim($url), FILTER_SANITIZE_URL, FILTER_VALIDATE_URL);
    
    //email
    filter_var(trim($email), FILTER_VALIDATE_EMAIL);
    
    //numeric
    is_int();
    //body text
    //preserve newline
    str_replace("\n","[NEWLINE]",$v);
    $text = filter_var(trim($text),FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_BACKTICK);
    //filter_var($v, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH | FILTER_FLAG_STRIP_BACKTICK);
    // replace newline
    str_replace("[NEWLINE]","\n",$v);
    // replace \n with <br> 
    $text-live = nl2br($text);
    // telephone
    filter_var(trim($tel), FILTER_VALIDATE_URL, FILTER_FLAG_PATH_REQUIRED);

return " ";
};
*/

/** cStr function - shows you the value of an object after checking for errors and logging results.
* @param object $obj  
* @param string  $val
* Checks for errors i.e. value does not exist.
* logs any errors to the logfile 
 */
function cStr($value){
    $result = " ";
        if(isset($value)){
            //write_log($value . "we have data");
            $result = $value;    
        }else{
            write_log($value . "is unset - does it exist in api?");
            $result = " ";
        }
return $result;
}

/** Fetches and decodes the api json
 *  @param string $apiEndpoint expects the middle part of the url i.e. "get_main_page.php" variables $api_home 
 *  @param string $apiAuth expects the username & password string $apu_auth by default
 *  returns json or empty in case there is no json
 *  These variables are defined at the top of this file */


function api_fetch($apiEndpoint,$apiAuth)
{
    // API BASE URL
    //$api_url = 'http://bdmdatafeeds.dev1/api/';
    $api_url = 'https://bdmdatafeeds.com/api/';
    
    $apiStr = $api_url . $apiEndpoint . $apiAuth;
    $json = file_get_contents ($apiStr);
        if (isset($json)) {
            //  - Decode JSON data 
            $data = json_decode($json);
            /*debug*/
            //var_dump($testimonial);

            //check error code 0, 1, 2 & log any errors
            $error_level = api_errorLevel($data,$apiEndpoint);
            if ( $error_level == "ok")
                return $data;
            } 
        else {
            write_log ('Invalid JSon - API Call to endpoint'. $apiEndpoint .'returned invalid JSON while calling' . $apiStr );
            write_log ('Falling back to local data');
            return null;}
};

function api_local($apiEndpoint)
{
    $api_local = 'app/data/' . $site_id . '/';
    $filename = str_replace(".php", ".json", $apiEndpoint);
    $apiStr = $api_local . $filename;
    $json = file_get_contents($apiStr);

    if (isset($json)) {
        //  - Decode JSON data 
        $data = json_decode($json);
        /*debug*/
        //var_dump($testimonial);

        //check error code 0, 1, 2 & log any errors
        $error_level = api_errorLevel($data,$apiEndpoint);
        if ( $error_level == "ok")
            return $data;
        } 
    else {
        write_log('Error Decoding Local Json data for' . $apiEndpoint . 'at' . $apiStr);
        return null;}
}

/** Determines API errorlevel & Writes a log entry
 *  @param object 
 */

function api_errorLevel ($object,$apiEndpoint){
    if (isset($object->errorcode)){
        switch ($object->errorcode) {
            case 0:
                write_log("api called - ok");
                return 'ok';
                break;
            case 1:
                write_log("Your Site Key is invalid for Site ID:" . $site_id ." - please check your config");
                return 'err';
                break;
            case 2:
                write_log("Your Pass Key is invalid for Site ID:" . $site_id ." -please check your config");
                return 'err';
                break;
            case 3:
                write_log("API Endpoint at " . $apiEndpoint . "-- No Records to Display");
                return '';
                break;
        }
        write_log(var_dump($object) . "Errorcode field does not exist");
    }
}
