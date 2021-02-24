<?php 
include_once "app/views/templates/default/html/wrap.php";
//Extends img
function logo($imgSrc,$imgAlt,$imgClass="",$imgMaxWidth="",$link_url="",$wrap_tag="",$img_wrap_class=""){
   
    $wrap_class = 'col-xs-12 m-xs-auto py-xs-2 col-md-6 py-md-3 col-lg-4 py-lg-4' . $img_wrap_class;

    $html = "";
    //responsive img 
    $img_class = 'img-fluid mx-auto ' . $imgClass; ;//featurette-image
    
    $img_width = "";
    if (!empty($imgMaxWidth)){
            $img_width = 'style="max-width:' . $imgMaxWidth . 'vw;";' ;
    }

    //img tag 
    if (!empty($imgSrc)){
        $img = '
         <img src="' . $imgSrc . '" class="' . $img_class . '" ' . $img_width .'" focusable="false" role="img" aria-label="image" alt="' .  $imgAlt .'">';
    
                //wrapper
        if(!empty($link_url) && $link_url !== " "){
                $img = wrap($img,'a',' ',$link_url); 
        }
        
        //div wrapper
        if(!empty($wrap_tag) && $wrap_tag !== " "){
                $html = wrap($img,'div',$wrap_class,"");
        }
        else {
                $html = $img;
        }


    }
    

    
    
    return $html;
    
    }