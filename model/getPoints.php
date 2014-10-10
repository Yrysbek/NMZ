<?php

include_once("xmlCreator.php");
include_once 'config.php';
//sleep(2);

$gender = $_GET["gender"];
$count = $_GET["count"];
$lat = $_GET["lat"];
$lng = $_GET["lng"];
$type = $_GET["type"];

if(!isset($gender) || !isset($type)){
    return;
}
if(DATASOURCE == 'xml'){
    
    include_once("PrayerPlaceCollection.php");
    
    $xmlfile = '../points/geopoints.xml';
    $PlacesCollection = getPointsCollectionFromFile($xmlfile);
    $allPointsCount = count($PlacesCollection->GetItems());
    $SortedPrayerPlaceArray = array();

    if(isset($_GET["lat"]) && isset($_GET["lng"])){
        $mypos = new MyPosition();
        $mypos::$latitude = $lat;
        $mypos::$longitude = $lng;

        $PlacesCollection->Sort();
        $SortedPrayerPlaceArray = $PlacesCollection->GetItems();
    }

    if(!isset($_GET['count'])){
        $SortedPrayerPlaceArray = $PlacesCollection->GetItems();
        $count = $allPointsCount;
    }

    $dom = new DOMDocument('1.0', 'utf-8');
    $points = $dom->createElement('points');
    for($i=0, $j=0; $j<$count; $i++){
        if($i == $allPointsCount){
            break;
        }
        if($SortedPrayerPlaceArray[$i]->gender == "joint" || $SortedPrayerPlaceArray[$i]->gender == $gender || $gender == "all"){
            if($SortedPrayerPlaceArray[$i]->type == $type || $type == "all"){
                $point = $dom->createElement('point');
                $points->appendChild($point);
                $point = generatePointTagFromPrayerPlaceObject($SortedPrayerPlaceArray[$i], $dom, $point);
                $j++;
            }
        }
    }
    $dom->appendChild($points);
    echo $dom->saveXML();
} elseif(DATASOURCE == 'mysql') {
    include_once 'DbConnection.php';

    $sql = mysql_query("SELECT "
                            . "`P`.`NAME`, "
                            . "`ADDRESS`, "
                            . "`DESCRIPTION`, "
                            . "`LATITUDE`, "
                            . "`LONGITUDE`, "
                            . "`G`.`NAME` AS `GENDER`, "
                            . "`T`.`NAME` AS `TYPE`, "
                            . "`S`.`NAME` AS `STATUS` "
                        . "FROM `places` AS `P` "
                            . "INNER JOIN `types` AS `T` ON `T`.`ID` = `P`.`TYPE` "
                            . "INNER JOIN `gender` AS `G` ON `G`.`ID` = `P`.`GENDER` "
                            . "INNER JOIN `status` AS `S` ON `S`.`ID` = `P`.`STATUS` "
                        . "WHERE 1 = 1 "
                                .(($gender != 'all')?"AND (`G`.`NAME` = 'joint' OR `G`.`NAME` = LOWER('$gender')) ":" ") 
                                .(($type != 'all')?"AND `T`.`NAME` = LOWER('$type') ":" ")
                        . "ORDER BY (ABS( $lat - `LATITUDE` ) + ABS( $lng -  `LONGITUDE` )) "
                        . (($count > 0)?"LIMIT 0, $count":" "));
    
    $dom = new DOMDocument('1.0', 'utf-8');
    $points = $dom->createElement('points');
    while($row = mysql_fetch_array($sql)){
        $point = $dom->createElement('point');
        $points->appendChild($point);
        $point = generatePointTagFromMySqlRow($row, $dom, $point);
    }
    $dom->appendChild($points);
    echo $dom->saveXML();
    
}
