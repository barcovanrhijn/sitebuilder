
<?php
//debug on
ini_set('display_errors', 1);

include('app/views/templates/default/html/html.php');
//$imgPosition takes left or right in lower case.



/**
 * paragraph
 *
 * @param  mixed $obj
 * @param  mixed $pr
 * @param  mixed $i
 * @return void
 */
function paragraph(&$obj,$pr,$i){
  $heading = $obj->{$pr . "body_header_" . $i};
  $text = $obj->{$pr . "body_" . $i};
  $img = $obj->{$pr . "img_" . $i};
  $imgAlt = $obj->{$pr . 'img_alt_txt_' . $i};
  $imgPosition = $obj->{$pr . 'img_pos_' . $i};
  $img_url = " ";
  $img_rounded =  $obj->{$pr . 'img_' . $i . '_rounded'};
  $img_shadow = $obj->{$pr . 'img_' . $i . '_shadow'};

  $imgPosition = strtolower($imgPosition);
  $img_wrap_class = 'col-xs-12 py-xs-2';
  $img_class = 'featurette-image'; //img-fluid mx-auto (included by default in img)
  $text_wrap_class = 'col-xs-12 py-xs-2 ';

  $img_area = " ";
  $text_area = "text area empty";
  $heading_area = "heading area empty";
 
  //Show image if specified
  if (!empty($img)){ 
    //img($src,$imgAlt,$imgClass,$imgLink,$wrapInTag,$wrapClass,$responsive=1,$id="",$style=""){
    $img_area = img($img,$imgAlt,$img_class,$img_url,'div',$img_wrap_class,1,'','max-height=100%;');
    
  } 
  
  //Show heading if specified
  $h2 = "";
  if(!empty($heading)){
    $h2=heading($heading,'h2','featurette-heading','','');
  }
  //Show text if specified
  $p = "";
  if(!empty($text)){
    $p = p($text,'lead','','');
  }
  //Build Text Area if there is a heading or text to display
  if (!empty($heading_area) || !empty($text_area)){
    $content = $h2 .' '.  $p;
    $text_area = wrap($content,'div',$text_wrap_class,$url='');
  }

  if ($imgPosition == 'left'){
    $html = 
      $img_area .  
     $text_area; 
  } elseif ($imgPosition == 'right'){
    $html = 
    $text_area . 
    $img_area;
  } else {
    $html = 
      $img_area .  
      $text_area; 
      
  }  


  return $html;

};   