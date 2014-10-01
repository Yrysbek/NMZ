<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
    session_start();
    if($_SESSION['lang'] == 'en') { include("lang/en.php"); }
    else if($_SESSION['lang'] == 'kg') { include("lang/kg.php"); }
    else { include("lang/ru.php"); }
?>
<html>
	<head>
            <script src="js/jquery-1.11.1.min.js"></script>
            <script src="js/jquery.paulund_modal_box.js"></script>
            <script src="js/jquery.paulund_modal_box_edit.js"></script>
            <link rel="shortcut icon" href="img/logo.ico" />
            <meta content="text/html;charset=utf-8" http-equiv="Content-Type" />
	    <script src="analyticstracking.js"></script>
            <?php include $header;?>
	</head>
<body>
<?php
include $content; 
?>
</body>
</html>

