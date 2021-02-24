<?php
use com\bdmdata\common as Common;

include "app/includes/common/Forms.Class.php";
include "app/includes/common/Mail.Class.php";

//debug on
ini_set('display_errors', 1);

// define variables and set to empty values
$name = $surname = $email = $tel = $mobile = $message = "";

// $cf = new Common\Form;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // if ($_POST["name"]=="") {
    //     $nameErr = "Name is required";
    //   } else {
       // $name = cf::validateName($_POST["name"]);
    // }

        // if ($_POST["name"]=="") {
    //     $nameErr = "Name is required";
    //   } else {
    $name = $_POST["name"];
      // }
    

    $surname = $_POST["surname"];

    // if ($_POST["email"]=="") {
    // $emailErr = "Email is required";
    // $email = "";
    // } else { 
    if (isset($_POST["email"])){  
    $email = $_POST["email"];
    }
    // }
    
    // if ($_POST["comment"]=="") {
    // $comment = "";
    // } else {
    if (isset($_POST["comment"])){  
    $message = $_POST["comment"];
    }
    
  }


?>
<!doctype HTML>
<html>
<body>
<?php 
// include "app/includes/common/mail.php";
// $From = 'webmaster@atservice.co.za';
// $Recipient = 'barco@atservice.co.za';
// $Subject =  $name . 'has filled out your contact form';
// $Body ='
// Hi, 

// You have a new message submitted on your website. 

// Name ' . $name . ' '. $surname
// 'Email' .$email . ' ' .
// 'Tel' . $tel . ' ' . 
// 'Cel' . $mobile . ' ' . 
// 'Message' .  $message;

// $Signature = PHP_EOL. 'New Message from - domain Contact Form';

// $cf_mail = new Common\Email($From,$Recipient,$Subject,$Body,$Signature);
// $cf_mail->send();

include "app/includes/log.php";

//debug
// if ($_SERVER["REQUEST_METHOD"] == "POST"){
// echo "Name " . $_POST['name'];
// echo "Surname " . $_POST['surname'];
// echo "Email " . $_POST['email'];
// echo "Tel " . $_POST['tel'];
// echo "Cel " . $_POST['mobile'];
// echo "Message " . $_POST['message'];
// Print All Messages
// print_r($_POST);

echo "Name " . $name . PHP_EOL;
echo "Surname " . $surname . PHP_EOL;
echo "Email " . $email . PHP_EOL;
echo "Tel " . $tel . PHP_EOL;
echo "Cel " . $mobile . PHP_EOL;
echo "Message " . $message . PHP_EOL;

write_log('new message '. ' ' . $_POST['name'] . ' ' . $_POST['surname']);
// }
?>
</body>
</html>