<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Studio</title>
    <link rel="icon" href="<?=RISEUP?>/images/riseup.png" type="image/icon type">
    <link rel="stylesheet" type="text/css" href="http://riseup.lit/css/riseup.css">
    <link rel="stylesheet" type="text/css" href="/css/studio_riseup.css">
</head>
<?php
    include "../application/helpers/RiseUpThemes.php";
?>
<body>

<div class="container">  
    <div class="lit-main-header"><?php include("../application/view/layouts/includes/Header.php"); ?></div>
    <div class="lit-main-f">
    <div class="lit-main-sidebar"><?php include("../application/view/layouts/includes/SideBar.php"); ?></div>
    <div class="lit-main-content"><?php include("../application/view/layouts/pages/".$data['File']); ?></div>
    </div>
    <div class="lit-main-footer"><?php include("../application/view/layouts/includes/Footer.php"); ?></div>
</div>

</body>
<script src="/script/jquery.js"></script>
</html>