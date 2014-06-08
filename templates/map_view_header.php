<link rel="stylesheet" href="css/leaflet.css" />
<script src="js/leaflet.js"></script>
<link href="css/style_panel.css" rel="stylesheet" type="text/css" />
<link href="css/jquery.contextMenu.css" rel="stylesheet" type="text/css" />
<script src="js/mapapp.js"></script>
<script src="js/jquery.contextMenu.js"></script>
<script src="js/jquery.ui.position.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<title><?php echo $lang['title_map_view']; ?></title>

<script type="text/javascript">
    $(document).ready(function(){
        $(".trigger").click(function(){
            $(".panel").toggle("fast");
            $(this).toggleClass("active");
            return false;
        });
    });
</script>