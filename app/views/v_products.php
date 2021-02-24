
<div class="mx-auto px-5"><?php //container ?>

<?php //Rows
if ($active){
    echo row('<p style="padding: 50px 0 50px 0;">This page was unintentionally left blank</p>');
    }
    else {
        header('Location: ' . $site_base_url . '/index.php', true, 302);
        exit;
    }
?>

</div> <!-- container -->