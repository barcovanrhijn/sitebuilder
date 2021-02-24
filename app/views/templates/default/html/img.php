<?php 
/** img template part 
 * 
 * Creates a responsive image with a link optionally wrapped in a div
 * 
 * wrap_tag eg div will wrap the img tag in a div wrapper with your chosen class
 * 
 * @src string
 * @imgAlt string
 * @imgClass string
 * @imgLink sting
 * @wrap_tag string - Fill in anything here to enable wrapping
 * @wrap_class string
 */
function img($src,$imgAlt,$imgClass,$imgLink,$wrapInTag,$wrapClass,$responsive=1,$id="",$style=""){
//$img_rounded,$img_shadow
//responsive img 
if (yes($responsive)){$img_class = 'img-fluid mx-auto ' . $imgClass;}else {$img_class = $imgClass;}

//inline styles 
$inlineStyle ="";
if (!empty($style)){$inlineStyle = 'style="' . $style . '"';}

//img tag
$img = '
<img src="' . $src . '" class="' . $img_class . '" ' . $inlineStyle . ' '. 'focusable="false" role="img" aria-label="image" alt="' .  $imgAlt .'">';

//a wrapper
if(!empty($imgLink) && $imgLink !== " "){
   $img = wrap($img,'a',' ',$imgLink); 
}

//div wrapper
if($wrapInTag !==""){
        $html = wrap($img,'div',$wrapClass,"");
}
else {
        $html = $img;
}


return $html;

}