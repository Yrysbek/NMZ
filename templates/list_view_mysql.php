<div id="logo-block">
    <div id="logo-image"></div>
    <span class="title"><?php  echo $lang['title_list_view']; ?></span>
</div>
<div id="lang"><a href="language.php?lang=ru">ru</a> | <a href="language.php?lang=en">en</a> | <a href="language.php?lang=kg">kg</a></div>
<div id="page-map"><a href="index.php"><?php echo $lang['page_map'];?></a></div>


<div class="panel" style="position: fixed;">
    <p><?php echo $lang['list_help_content']; ?></p>
</div>
<a class="trigger" href="#" style="position: fixed;"><?php echo $lang['btn_help']; ?></a>

<div class="list-block">
<ul class="map-list">
<?php

include_once 'model/config.php';
include_once 'model/DbConnection.php';
$type = "all";
$gender = "all";
$sql = "SELECT "
        . "`P`.`ID` as `id`, "
        . "`P`.`NAME` as name, "
        . "`ADDRESS` as `address`, "
        . "`DESCRIPTION` as `description`, "
        . "`LATITUDE` as `latitude`, "
        . "`LONGITUDE` as `longitude`, "
        . "`G`.`NAME` AS `gender`, "
        . "`T`.`NAME` AS `type`, "
        . "`S`.`NAME` AS `status` "
        . "FROM `places` AS `P` "
        . "INNER JOIN `types` AS `T` ON `T`.`ID` = `P`.`TYPE` "
        . "INNER JOIN `gender` AS `G` ON `G`.`ID` = `P`.`GENDER` "
        . "INNER JOIN `status` AS `S` ON `S`.`ID` = `P`.`STATUS` ";
//. "WHERE 1 = 1 "
//. (($gender != 'all') ? "AND (`G`.`NAME` = 'joint' OR `G`.`NAME` = LOWER('$gender')) " : " ")
//. (($type != 'all') ? "AND `T`.`NAME` = LOWER('$type') " : " ")
//. "ORDER BY (ABS( $lat - `LATITUDE` ) + ABS( $lng -  `LONGITUDE` )) "
//. "LIMIT 0, 30"

$query = mysql_query($sql) or die("error on selecting data");
$i=1;

while($place = mysql_fetch_object($query)){
    $placeTypeStr = "";
    switch ($place->type){
        case "mosque":
            $placeTypeStr = $lang['place_type_mosque'];
            break;
        case "proom":
            $placeTypeStr = $lang['place_type_prroom'];
            break;
    }
    ?>
    <li>
        <div class="li-block">
            <div class="li-content">
                <h2><a class="place-name" 
                        data-lat="<?php echo $place->latitude; ?>" 
                        data-lng="<?php echo $place->longitude; ?>" 
                        data-type="<?php echo $place->type; ?>" 
                        data-name="<?php echo $place->name; ?>"
                        data-addr="<?php echo $place->address; ?>"
                        data-desc="<?php echo $place->description; ?>"
                        data-gender="<?php echo $place->gender; ?>"><?php echo $i.". $placeTypeStr - ".$place->name; ?></a></h2>
                <p>
                    <span class="address"><?php echo $lang['place_address'].': '.$place->address; ?></span><br>
                    <span class="description"><?php echo $lang['place_description'].': '.$place->description; ?></span>
                </p>
            </div>
            <div class="clear"></div>
        </div>
    </li>
<?php 
$i++; 
} 
?>
</ul>
</div>
<script>
$(document).ready(function(){
    
    $('.li-content').click(function(e){ 
        var lat = $(this).find('a').attr('data-lat');
        var lng = $(this).find('a').attr('data-lng');
        var type = $(this).find('a').attr('data-type');
        var gender = $(this).find('a').attr('data-gender');
        var name = $(this).find('a').attr('data-name');
        var desc = $(this).find('a').attr('data-desc');
        var addr = $(this).find('a').attr('data-addr');
        var title = $(this).find('a').text();
        
        $(this).paulund_modal_box({
            title: title,
            name: name,
            lat: lat,
            lng: lng,
            type: type,
            gender: gender,
            description: desc,
            address: addr
        });
    });
    
});
</script>
