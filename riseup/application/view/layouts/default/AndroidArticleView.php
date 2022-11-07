<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>RiseUp</title>
    <link rel="icon" href="/images/riseup.png" type="image/icon type">
    <link rel="stylesheet" type="text/css" href="/css/riseup.css">
    <link rel="stylesheet" type="text/css" href="/css/riseup-font.css">
    <script src="/script/jquery.js"></script>
</head>

<body>
    <?php
    include "../application/helpers/RiseUpThemes.php";
?>
<div style="white-space: pre-wrap;overflow-x: hidden;
    height: 90vh;
    overflow-y: auto;
    flex: 1;">
<?=$data['Post_Article']?>
</div>
</body>
</html>