<?php 

function input($name,$purpose='contact',$wrap_tag='div',$wrap_class='form-group',$validationMsg=""){
  include_once "app/views/templates/default/html/wrap.php";
  include_once "app/views/templates/default/html/forms/label.php";
  
  //Label
  $label = label($name,$purpose);

  //Validation
  $validation = "Please fill out a valid response to this field";
  if ($validationMsg !== ""){$validation = $validationMsg;}

  $input ='
    '. $label . '
    <input type="text" name="'. $name .'" class="form-control" id='. $purpose . $name . '" placeholder='. $name .'>
    <div class="invalid-feedback">
    ' . $validation . '
    </div>
  ';
$input = wrap($input,$wrap_tag,$wrap_class,''); 

return $input;
}