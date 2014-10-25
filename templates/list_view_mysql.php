<?php
session_start();
$admin = false;
if(isset($_SESSION['admin'])){
    $admin = $_SESSION['admin'];
}
?>
<div id="logo-block">
    <img src="img/logo.png" style="width:50px;height:60px;float:left;margin-right:15px;">
    <div class="site-name">NAMAZ.kg</div>
    <span class="title"><?php  echo $lang['title_list_view']; ?></span>
</div>
<div id="lang"><a href="language.php?lang=ru">ru</a> | <a href="language.php?lang=en">en</a> | <a href="language.php?lang=kg">kg</a></div>
<div id="page-map">
    <a href="index.php" style="line-height: 40px;"><img src="img/map-icon.png" style="width:40px;height:40px;float:left;margin-right:15px;"><?php echo $lang['page_map'];?></a>
</div>

<div class="search"><div class="search-box"><div class="search-title">Поиск:</div><input type="text" id="search" /></div></div>

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
                        data-id="<?php echo $place->id; ?>"
                        data-lat="<?php echo $place->latitude; ?>" 
                        data-lng="<?php echo $place->longitude; ?>" 
                        data-type="<?php echo $place->type; ?>" 
                        data-name="<?php echo $place->name; ?>"
                        data-addr="<?php echo $place->address; ?>"
                        data-desc="<?php echo $place->description; ?>"
                        data-gender="<?php echo $place->gender; ?>"
                        data-status="<?php echo $place->status; ?>"><?php echo $i.". $placeTypeStr - <span class='place-name'>".$place->name."</span>"; ?></a></h2>
                <p>
                    <span class="address"><?php echo $lang['place_address'].': '.$place->address; ?></span><br>
                    <span class="description"><?php echo $lang['place_description'].': '.$place->description; ?></span><br>
                    <?php if($place->status == 'unconfirmed'){ echo '<span>Статус:<span style="color:red;"> Не подтвержден</span></span>'; } ?>
                </p>
            </div>
            <?php if($admin){ ?>
            <div class="admin"><a class="edit-place">Изменить</a></div>
            <?php } ?>
        </div>
    </li>
<?php 
$i++; 
} 
?>
</ul>
</div>
