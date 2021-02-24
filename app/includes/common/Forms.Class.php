<?php
namespace com\bdmdata\common;

require_once "app/includes/common/Basic.Class.php";

/**
 * Form
 * 
 * Validates Form Data & Sanitizes data
 * 
 */
class Form extends Basic {

/**
 * safe
 * 
 * ###Sanitizes data
 * Removes spaces
 * Strips slashes
 * Removes html special characters
 *
 * @param  mixed $data
 * @return mixed $data - Sanitized
 */
function safe($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
}

// function __construct($From,$Recipient,$Subject,$Body,$Signature){
//     $this->$Recipient = $Recipient;
//     $this->$Subject = $Subject;
//     $this->$Body = $Body;
//     $this->$Signature = $Signature;
//     $this->$From = $From;
//  }


function validateName($name){
    $nameErr ="";
    $name = safe($name);
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
        $nameErr = "Only letters and white space allowed";
    }
    return $nameErr;
}

function validateSurname($surname){
    $surnameErr ="";
    $surname = safe($surname);
    if (!preg_match("/^[a-zA-Z-' ]*$/",$surname)) {
        $surnameErr = "Only letters and white space allowed";
    }
    return $surnameErr;
}

function validateTelephone($telephone){
    $telephoneErr ="";
         // Allow +, - and . in phone number
         $filtered_phone_number = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
         // Remove "-" from number
         $phone_to_check = str_replace("-", "", $filtered_phone_number);
         // Check the lenght of number
         // This can be customized if you want phone number from a specific country
         if (strlen($phone_to_check) < 10 || strlen($phone_to_check) > 14) {
            $telephoneErr = "Invalid Telephone format";
         }
    return $telephoneErr;
}

function validateEmail($email){
    $emailErr ="";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailErr = "Invalid email format";
    }
  return $emailErr;  
}

function validateMessage($message){
    $messageErr ="";
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
        $messageErr = "Only letters and white space allowed";
    }
  return $messageErr;  
}


}