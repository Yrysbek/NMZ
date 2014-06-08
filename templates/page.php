<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
    session_start();
    if($_SESSION['lang'] == 'en') { include("lang/en.php"); }
    else if($_SESSION['lang'] == 'kg') { include("lang/kg.php"); }
    else { include("lang/ru.php"); }
?>
<html>
	<head>
            <link rel="shortcut icon" href="img/logo.ico" />
            <meta content="text/html;charset=utf-8" http-equiv="Content-Type" />
            <link rel="stylesheet" href="css/leaflet.css" />
            <script src="js/leaflet.js"></script>
            <link href="css/style.css" rel="stylesheet" type="text/css" />
            <link href="css/style_panel.css" rel="stylesheet" type="text/css" />
            <link href="css/jquery.contextMenu.css" rel="stylesheet" type="text/css" />
            <script src="js/jquery-1.10.2.js"></script>
            <script src="js/mapapp.js"></script>
            <script src="js/jquery.contextMenu.js"></script>
            <script src="js/jquery.ui.position.js"></script>
            <title><?php echo $lang['title'];?></title>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-51520056-1', 'url.ph');
	  ga('send', 'pageview');

	</script>
        <script type="text/javascript">
            $(document).ready(function(){
                $(".trigger").click(function(){
                    $(".panel").toggle("fast");
                    $(this).toggleClass("active");
                    return false;
                });
            });
        </script>
	</head>
<body>
<?php
include $content; 
?>
</body>
</html>

