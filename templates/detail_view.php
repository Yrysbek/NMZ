<?php

$place_id = $_GET["id"];
if(!isset($place_id)){
    return;
}

include_once 'model/config.php';
include_once 'model/DbConnection.php';
$sql = "SELECT "
        . "`P`.`ID` as `id`, "
        . "`P`.`NAME` as `name`, "
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
        . "INNER JOIN `status` AS `S` ON `S`.`ID` = `P`.`STATUS` "
. "WHERE `P`.`id` = '$place_id' ";
//. (($gender != 'all') ? "AND (`G`.`NAME` = 'joint' OR `G`.`NAME` = LOWER('$gender')) " : " ")
//. (($type != 'all') ? "AND `T`.`NAME` = LOWER('$type') " : " ")
//. "ORDER BY (ABS( $lat - `LATITUDE` ) + ABS( $lng -  `LONGITUDE` )) "
//. "LIMIT 0, 30"

$query = mysql_query($sql);

$place = mysql_fetch_object($query);
?>
<div class="container" data-type="<?php echo $place->type; ?>" data-gender="<?php echo $place->gender; ?>"
     data-status="<?php echo $place->status; ?>" data-lat="<?php echo $place->latitude; ?>" data-lng="<?php echo $place->longitude; ?>">
    <div class="header block">
        <div class="holder">
            <div id="logo-block">
                <img src="img/logo.png" style="width:50px;height:60px;float:left;margin-right:15px;">
                <div class="site-name">NAMAZ.kg</div>
                <span class="title"><?php echo $lang['title_list_view']; ?></span>
            </div>
            <div id="lang"><a href="language.php?lang=ru">ru</a> | <a href="language.php?lang=en">en</a> | <a href="language.php?lang=kg">kg</a></div>
            <!--div id="page-map">
                <a href="index.php" style="line-height: 40px;"><img src="img/map-icon.png" style="width:40px;height:40px;float:left;margin-right:15px;"><?php echo $lang['page_map']; ?></a>
            </div-->
        </div>
    </div>
    <div class="name block">
        <div class="holder">
            <span class="text-name"><?php echo $place->name; ?></span>
        </div>
    </div>
    <div class="map block">
        <div id="map"></div>
    </div>
    <div class="details block">
        <div class="holder">
            <div class="images">
                <form id="upload" method="post" action="upload/upload.php" enctype="multipart/form-data">
                    <div id="drop">
                        Drop Here

                        <a>Browse</a>
                        <input type="file" name="upl" multiple />
                    </div>

                    <ul>
                        <!-- The file uploads will be shown here -->
                    </ul>

                </form>

                <!-- JavaScript Includes -->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
                <script src="upload/assets/js/jquery.knob.js"></script>

                <!-- jQuery File Upload Dependencies -->
                <script src="upload/assets/js/jquery.ui.widget.js"></script>
                <script src="upload/assets/js/jquery.iframe-transport.js"></script>
                <script src="upload/assets/js/jquery.fileupload.js"></script>

                <!-- Our main JS file -->
                <script src="upload/assets/js/script.js"></script>

                <!-- Google web fonts -->
                <link href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700" rel='stylesheet' />
                
                <link href="upload/assets/css/style.css" rel="stylesheet" />
            </div>
            <div class="place-info">
                <table>
                    <tr>
                        <td>Информация:</td>
                        <td><a href="/edit.php?id=<?php echo $place->id; ?>">Изменить</td>
                    </tr>
                    <tr>
                        <td>Название:</td>
                        <td><?php echo $place->name; ?></td>
                    </tr>
                    <tr>
                        <td>Адрес:</td>
                        <td><?php echo $place->address; ?></td>
                    </tr>
                    <tr>
                        <td>Примечание:</td>
                        <td><?php echo $place->description; ?></td>
                    </tr>
                    <tr>
                        <td>Тип:</td>
                        <td><?php echo $place->type; ?></td>
                    </tr>
                    <tr>
                        <td>Гендер:</td>
                        <td><?php echo $place->gender; ?></td>
                    </tr>
                    <tr>
                        <td>Статус:</td>
                        <td><?php echo $place->status; ?></td>
                    </tr>
                    <tr>
                        <td>Вуду</td>
                        <td><?php echo $place->name; ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>