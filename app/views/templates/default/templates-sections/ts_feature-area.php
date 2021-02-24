
<?php
//debug on
ini_set('display_errors', 1);

include 'app/views/templates/default/template-parts/tp_feature1col.php';
include "app/views/templates/default/templates-sections/ts_rowcol.php";

function feature_area(&$obj,$pr){
$feature_area = "";
for ($i=1; $i<4; $i++){
    $ft = feature1col($obj,$pr,$i);
    $row = row($ft,'py-1');
    $feature_area = $feature_area . ' ' . $row;
}
return $feature_area;
}
