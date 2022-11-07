<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>RiseUp</title>
    <link rel="icon" href="<?=URLROOT?>/images/riseup.png" type="image/icon type">
    <link rel="stylesheet" type="text/css" href="<?=URLROOT?>/css/riseup.css">
    <link rel="stylesheet" type="text/css" href="<?=URLROOT?>/css/riseup-font.css">
    <script src="<?=URLROOT?>/script/jquery.js"></script>
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
</html>