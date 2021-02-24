<?php
function article_list(&$obj){
    $i = 1;
    $obj1 = $obj;

    foreach($json as $elem) {
        echo( $elem['name']." - ".$elem['favourite']['colour'] );
        echo("<br/>");
        }
    foreach ($obj1 as $o){
       // if "ar_active"
    echo $o->{'ar_heading'. $i};
    echo $o->{'ar_img'.$i};
    echo $o->{'ar_img_alt'.$i};
    echo $o->{'ar_img_pos' .$i};
    echo $o->{'ar_txt'. $i};
    $i++;
    }

}

