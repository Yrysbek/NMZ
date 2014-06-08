<?php

include("PrayerPlace.php");

class PrayerPlaceCollection
{
    private static $Collection;
    private static $instance;

    private function __construct(){
	$Collection = array();
    }
    private function __clone(){}

    public static function getInstance(){
	if ( empty(self::$instance) ) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    public function AddItem($Item)
    {
        $this->Collection[] = $Item;
    }

    public function GetItems()
    {
        return $this->Collection;
    }

    public function Sort()
    {
        return usort($this->Collection, 'PrayerPlaceCollectionSort');
    }
}


function PrayerPlaceCollectionSort($a, $b)
{
    $mypos = new MyPosition();
    $aDistance = abs((float)$a->latitude - $mypos::$latitude) + abs((float)$a->longitude - $mypos::$longitude);
    $bDistance = abs((float)$b->latitude - $mypos::$latitude) + abs((float)$b->longitude - $mypos::$longitude);
    if ($aDistance == $bDistance){
        return 0;
    }
    return ($aDistance < $bDistance) ? -1 : 1;
}


function getPointsCollectionFromFile($xmlfile){
	$Collection = PrayerPlaceCollection::getInstance();
	if(file_exists($xmlfile)){ 
		$points = simplexml_load_file($xmlfile);
		foreach ( $points as $point ) {
			$Collection->AddItem(new PrayerPlace($point->type,$point->gender,$point->name,$point->address,$point->description,$point->latitude,$point->longitude));
                }
	} else { 
		echo "file is not exists";
	}
	return $Collection;
}
