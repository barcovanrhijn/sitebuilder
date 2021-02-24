<?php 


function label($name,$purpose='contact',$wrap_tag='div',$wrap_class='form-group',$validationMsg=""){
  include_once "app/views/templates/default/html/wrap.php";

  $validation = "Please fill out a valid response to this field";
  if ($validationMsg !== ""){$validation = $validationMsg;}
$label ='
    <label for="'. $purpose . $name . '">$name</label>
    <input type="text" name="'. $name .'" class="form-control" id='. $purpose . $name . '" placeholder='. $name .'>
    <div class="invalid-feedback">
    ' . $validation . '
    </div>
  ';
$label = wrap($label,$wrap_tag,$wrap_class,''); 

return $label;
}