<?php
namespace com\bdmdata\common;

require_once "app/includes/common/Basic.Class.php";

/**
 * Email
 * 
 * Compiles and sends one or more emails
 */
class Email extends Basic{
//TODO create template here
// add config variable for from email address and to email address
// add email messages
 public $Body;
 public $Subject;
 public $Heading; 
 public $Signature; 
 public $Recipient; 
 public $From;

 function __construct($From,$Recipient,$Subject,$Body,$Signature){
    $this->$Recipient = $Recipient;
    $this->$Subject = $Subject;
    $this->$Body = $Body;
    $this->$Signature = $Signature;
    $this->$From = $From;
 }

 function __destruct() {
    write_log(get_class($this). ' exiting');
 }
 
 /**
  * send
  *
  * Sends the email defined when the class was constructed. 
  *
  * @return void
  */
 function send(){
    $Message = $Body . PHP_EOL . $Signature; 
    $Headers = array(
        'From' => 'webmaster@atservice.co.za',
        'Reply-To' => 'webmaster@atservice.co.za',
        'X-Mailer' => 'PHP/' . phpversion()
    );
    write_log('Contact Form Submitted ' . $Message);
    mail($this->$Recipient, $this->$Subject, $Message,$Headers);

    
 }
}


