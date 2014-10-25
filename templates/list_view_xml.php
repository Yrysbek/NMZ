<div id="logo-block">
    <img src="img/logo.png" style="width:50px;height:60px;float:left;margin-right:15px;">
    <div class="site-name">NAMAZ.kg</div>
    <span class="title"><?php echo $lang['title_list_view']; ?></span>
</div>
<div id="lang"><a href="language.php?lang=ru">ru</a> | <a href="language.php?lang=en">en</a> | <a href="language.php?lang=kg">kg</a></div>
<div id="page-map">
    <a href="index.php" style="line-height: 40px;"><img src="img/map-icon.png" style="width:40px;height:40px;float:left;margin-right:15px;"><?php echo $lang['page_map']; ?></a>
</div>

<div class="search"><div class="search-box"><div class="search-title">Поиск:</div><input type="text" id="search" /></div></div>

<div class="panel" style="position: fixed;">
    <p><?php echo $lang['list_help_content']; ?></p>
</div>
<a class="trigger" href="#" style="position: fixed;"><?php echo $lang['btn_help']; ?></a>

<?php

include_once 'model/config.php';
$PointsCollection = array();

if(DATASOURCE == "xml"){
    include 'model/PrayerPlaceCollection.php';

    $xmlfile = 'points/geopoints.xml';
    $PlacesCollection = getPointsCollectionFromFile($xmlfile);
    $PointsCollection = $PlacesCollection->GetItems();
}
else if(DATASOURCE == "mysql"){
    
}
$i=1;?>
<div class="list-block">
<ul class="map-list">
<?php foreach($PointsCollection as $place):
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
<?php $i++; endforeach ?>
</ul>
</div>
