
<?php
//debug on
ini_set('display_errors', 1);

include 'app/views/templates/default/template-parts/tp_feature1col.php';
include "app/views/templates/default/templates-sections/ts_rowcol.php";

function paragraph_area(&$obj,$pr){
$paragraph_area = "";
for ($i=1; $i<4; $i++){
    $ft = feature1col($obj,$pr,$i);
    $row = row($ft,'py-1');
    $paragraph_area = $paragraph_area . ' ' . $row;
}
return $paragraph_area;
}
