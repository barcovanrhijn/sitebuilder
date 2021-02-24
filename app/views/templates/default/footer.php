<?php

/**
 * footer
 * 
 * Currently displays copyright
 * 
 * @todo Add layout with contact form
 * @todo Add layout with map
 * @todo Add layout with content map and contact form
 * @todo Add layout with content only
 *
 * @param  mixed $companyName
 * @return void
 */
function footer($companyName){
  //  $copyright ='&copy' . ' ' . $companyName . ' ' . date("Y");
$date = date("Y");

$copyright = ' 
    <div class="container text-center">
        &copy; ' . ' ' . $companyName . ' ' . $date . '
    </div>
';

$html = '<footer class="footer pt-3 pb-5">'
. $copyright . '
</footer>';

return $html;
}
