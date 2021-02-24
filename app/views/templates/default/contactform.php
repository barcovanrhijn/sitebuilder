<?php
// post url submit 
// validation?
// msgbox?
include_once "app/config/init.php";

function contactForm(&$obj,$pr="cp_"){

  //Data
  $show_form = $obj->{$pr . 'form'} ?? 1;
  $form_header_text = $obj->{$pr . 'form_header_txt'} ?? "";
  $form_submit_text = $obj->{$pr . 'form_submit_txt'} ?? "Send";
  $form_tel = $obj->{$pr . 'form_field_tel'} ?? 1;
  $form_mobile = $obj->{$pr . 'form_field_mobile'} ?? 0;
  $form_email = $obj->{$pr . 'form_field_email'} ?? 0;
  $form_comment = $obj->{$pr . 'form_field_comment'} ?? 0;
  $form_commen_name = $obj->{$pr . 'form_field_comment_name'} ?? 0;

  include_once "app/views/templates/default/html/heading.php";
  include_once "app/views/templates/default/html/forms/input.php";
  //Heading 
  if ($form_header_text !== ""){$h2 = header($form_header_text,'h2','','','');}else{$h2="";}
  //Name
  $name = input('Name','name');
  //Surname
  $surname = input('Surname','surname');
  //Tel
  $tel = '';
  if (yes($form_tel)){
    $tel = input('Telephone','contact');
  }
  //Mobile
  $mobile ='';
  if (yes($form_mobile)){
    $mobile = input('Mobile','mobile');
  }
  //Email
  $email = '';
  if (yes($form_email)){
    $email = input('Email','email');
  }
  //Message
  $message = '';
  if (yes($form_comment)){
    $message = input($form_comment_name,'message');
  }
  if ($form_submit_text==""){$form_submit_text="Send";}

  //Submit
  global $Google_Recaptcha_Site_Key;
  if ($Google_Recaptcha_Site_Key !== ""){
  $submit = '<button type="submit" class="btn btn-primary g-recaptcha" data-sitekey="' . $Google_Recaptcha_Site_Key . '"  data-callback="onSubmit">' . $form_submit_text .'</button>';
  }
  else
  {
  $submit = '<button type="submit" class="btn btn-primary">' . $form_submit_text .'</button>';
  }

$html='
  ' . $h2 . '
 <form id="form" class="needs-validation" novalidate action="form-post.php" method="post">
 <div class="row">
    <div class="col-md-6 mb-3">
    '. $name .'
    </div>
    <div class="col-md-6 mb-3">
    '. $surname .'
    </div>
  </div>
  '. $email .'
  '. $tel .'
  '. $mobile .'
  '. $message .'
  '. $submit . '
</form>

';
return $html;
}

?>