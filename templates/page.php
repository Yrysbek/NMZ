<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
    if($_SESSION['lang'] == 'en') { include("lang/en.php"); }
    else if($_SESSION['lang'] == 'kg') { include("lang/kg.php"); }
    else { include("lang/ru.php"); }
?>
<html>
	<head>
            <script src="js/jquery-1.11.1.min.js"></script>
            <script src="js/jquery.paulund_modal_box.js"></script>
            <script src="js/jquery.paulund_modal_box_add.js"></script>
            <link rel="shortcut icon" href="img/logo.ico" />
            <meta content="text/html;charset=utf-8" http-equiv="Content-Type" />
	    <!--script src="analyticstracking.js"></script-->
            <link href='http://fonts.googleapis.com/css?family=Ubuntu:400,700' rel='stylesheet' type='text/css'>
            <?php include $header;?>
	</head>
<body>
    <!-- Yandex.Metrika counter -- >
    <script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter26267172 = new Ya.Metrika({id:26267172,
                        webvisor:true,
                        clickmap:true,
                        trackLinks:true,
                        accurateTrackBounce:true,
                        trackHash:true});
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
            s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else {
                f();
            }
        })(document, window, "yandex_metrika_callbacks");
    </script>
    <noscript><div><img src="//mc.yandex.ru/watch/26267172" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
    <div id="fb-root"></div>
    <!--script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v2.0";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script-->
<?php
include $content; 
?>
</body>
</html>

