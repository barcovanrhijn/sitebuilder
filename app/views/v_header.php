<!DOCTYPE html>
<html lang="en">
    <head>
    <title><?php echo $meta_title ?></title> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">
    <script src="js/script.js"></script>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
    async defer></script>
    <link rel="stylesheet" href="css/style.css">
    <meta name="format-detection" content="telephone=no">
    <?php echo $meta_tag ?>
    
    </head>

<body>
<div class="mx-auto">
 
<?php
include_once "app/views/templates/default/templates-sections/ts_rowcol.php";

if ($notify !==""){
    
        echo row($notify); 

} 

if ($header !==""){    
    
    echo row($header);

}
?>

</div>