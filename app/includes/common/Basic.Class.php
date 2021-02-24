<?php
namespace com\bdmdata\common;


/**
 * Basic
 * 
 * Adds logfile functionality to all classes
 */
class Basic{

    function write_log($message){
        $logfile = fopen("log.txt", "a") or die("Unable to open log file!");
        fwrite($logfile, date("Y/m/d"). ' ' . date("h:i:sa") . ' -- ' . $message . PHP_EOL );
     }
}