<?php 


function label($name,$purpose='contact'){

$label ='
    <label for="'. $purpose . $name . '">' . $name . '</label>
   ';


return $label;
}