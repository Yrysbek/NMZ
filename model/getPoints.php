<?php

include("xmlCreator.php");
include("PrayerPlaceCollection.php");
//sleep(2);
$gender = $_GET["gender"];
$count = $_GET["count"];
$lat = $_GET["lat"];
$lng = $_GET["lng"];
$type = $_GET["type"];

if(!isset($gender) || !isset($type)){
    return;
}

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
?>
