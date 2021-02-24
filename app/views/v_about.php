<div class="mx-auto px-5">

<?php //Rows

if (yes($active)){
    if ($feature !==""){

        echo $feature;
    
    }
} 
else {
    header('Location: ' . $site_base_url . '/index.php', true, 302);
    exit;
}
?>

</div> <!-- container -->
