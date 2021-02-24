<?php 
function announcement (&$obj,$pr='mp_'){

  $text = $obj->{$pr . 'announcement'} ?? "";
  $background = $obj->{$pr . 'announcement_bg_color'} ?? '#ffc107' ;

  if ($text == "" || $text == " "){
    $html = "";
  } else 
  {$html= '<div class="announcement" role="announcement" style="background-color:'.$background.'">
    ' . $text . '
    </div>';
  }

return $html;
}