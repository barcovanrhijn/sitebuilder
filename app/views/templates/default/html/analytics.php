<?php

/**
 * analytics
 * 
 * Generate Analytics code
 *
 * @param  mixed $trackingId - Google Analytics Tracking ID
 * @return string Analitics block with tracking id for inclusion in head
 */
include_once "app/views/templates/default/html/analytics.php";

function analytics($trackingId)
{
  $GoogleAnalytics ='';
    if ($trackingId){
      $tracking='
      <!-- Global Site Tag (gtag.js) - Google Analytics -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=' . $trackingId . '"></script>
      <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag(\'js\', new Date());
        gtag(\'config\', '. $trackingId .');
      </script>
      ';
    }
   return $GoogleAnalytics;
}