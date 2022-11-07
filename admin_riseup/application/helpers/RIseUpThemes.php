<?php
if (!isset($_SESSION['Theme'])) {
    $_SESSION['Theme'] = 1;
}
    if ($_SESSION['Theme']) {
        ?>
<style type="text/css">
    :root{
    --lit-color-back : #ED88361F;
    --lit-color: #ED8836;
    --lit-bc-color: #ffffff;
    --lit-title-tcolor: #222327;
    --lit-tcolor: #dfdfdf;
    --lit-border-color: #2223271f;
    --lit-color-dec: #222327bd;
    --lit-color-dec-b: #22232770;
    --lit-bgt-color: #22232720;
    --lit-img-text: linear-gradient(#22232700, #222327cc 65%, #222327);
    --lit-inset-data: inset 5px 5px 9px 0px #2223270f;
}
</style>
    <?php
    }else{ ?>
<style type="text/css">
    :root{
    --lit-color-back : #ED88361F;
    --lit-color: #ED8836;
    --lit-bc-color: #222327;
    --lit-title-tcolor: #ffffff;
    --lit-tcolor: #dfdfdf;
    --lit-border-color: #ffffff1a;
    --lit-color-dec: #ffffffbd;
    --lit-color-dec-b: #ffffff70;
    --lit-bgt-color: #ffffff20;
    --lit-img-text: linear-gradient(#ffffff00, #ffffffcc 65%, #ffffff);

    --lit-inset-data: inset 5px 5px 9px 0px #ffffff0f;
}
</style>
    <?php
}
?>