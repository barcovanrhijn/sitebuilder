<div class="mx-auto px-5 pt-5">

<?php

if ($active){
    if ($cp_logo !==""){

        echo row($cp_logo);

    }

    if ($contact_details !==""){

        echo row($contact_details);
        
        }

    if ($map !==""){

        echo row(col($map,'col-sm-12 col-md-6 mx-auto my-4') . PHP_EOL .col($form,'col-sm-12 col-md-6 mx-auto my-4'));
        
    }
    else
    {
        echo row(col($form,'col-sm-12 col-md-6 mx-auto my-4 bg-light  px-5 py-5'));
    }
}
else {
    header('Location: ' . $site_base_url . '/index.php', true, 302);
    exit;
}
?>
</div><?php //container class?>