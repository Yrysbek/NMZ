<script src="js/leaflet.js" type="text/javascript"></script>
<script src="js/list.js" type="text/javascript"></script>
<script src="js/jquery.paulund_modal_box_edit.js" type="text/javascript"></script>
<link href="css/leaflet.css" rel="stylesheet" type="text/css"/>
<link href="css/style_panel.css" rel="stylesheet" type="text/css" />
<link href="css/style_list.css" rel="stylesheet" type="text/css"/>
<title><?php echo $lang['title_list_view']; ?></title>

<script type="text/javascript">
    $(document).ready(function(){
        $(".trigger").click(function(){
            $(".panel").toggle("fast");
            $(this).toggleClass("active");
            return false;
        });
    });
</script>