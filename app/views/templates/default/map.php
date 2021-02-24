<?php
function map(&$obj,$pr="cp_"){
    //data
    $show_map = $obj->{$pr . 'map_active'} ?? 1;
    $map_size = $obj->{$pr . 'map_size'} ?? 400;
    $map_h2_text = $obj->{$pr . 'map_heading_txt'} ?? "";
    $map_embed_code = $obj->{$pr . 'map_embedCode'};

    //debug
    // $show_map =1;
    // $map_embed_code = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d832.0866295359727!2d18.725319829197343!3d-33.4663279987981!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1dcce10def880589%3A0x825684d742895326!2sThe%20Rustic%20Chic!5e0!3m2!1sen!2sza!4v1598030654573!5m2!1sen!2sza';    
    // $map_size = 400;

    $map = "";
    if (yes($show_map)){
        include_once "app/views/templates/default/html/heading.php";
        $h2 = heading($map_h2_text,'h2','','','');
    //Map
    $html='
    <div class="col-sm-12 col-md-4 my-5 mx-2">
        ' . $h2 .'
        <div class="map-container">
        <iframe src="'. $map_embed_code .'" width="'. $map_size .'px" height="'. $map_size .'px" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" class="map"></iframe>
        </div>
    </div>
    ';
    }
    else {$html="";}
return $html;
}