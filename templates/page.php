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
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v2.0";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<?php
include $content; 
?>
</body>
</html>

