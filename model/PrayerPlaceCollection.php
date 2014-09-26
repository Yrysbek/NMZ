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

function savePoints(){
    $xmlfile = '../points/geopoints.xml';
    $aPoints = getPointsCollectionFromFile($xmlfile);
    
    $username = "root";
    $password = "";
    $hostname = "localhost";
    $dbname = "nmz";

//connection to the database
    $dbhandle = mysql_connect($hostname, $username, $password)
            or die("Unable to connect to MySQL");
    echo "Connected to MySQL<br>";

//select a database to work with
    $selected = mysql_select_db($dbname, $dbhandle)
            or die("Could not select examples");
//echo 'step'.  var_dump($aPoints);
//execute the SQL query and return records
    //$result = mysql_query("SELECT id, model,year FROM cars");
    
    foreach ($aPoints->GetItems() as $point){
        $pType = 1;
        if($point->type == 'mosque')
            $pType = 2;
        else
            $pType = 3;
        
        $pGender = 1;
        switch ($point->gender){
            case 'male':
                $pGender = 2;break;
            
            case 'female':
                $pGender = 3;break;
            
            case 'all':
                $pGender = 4;break;
            
        }
        mysql_query(
               "INSERT INTO `places`(ID, NAME, ADDRESS, DESCRIPTION, LATITUDE, LONGITUDE, TYPE, GENDER, STATUS) "
                . "VALUES (NULL, '".$point->name."', '".$point->address."', '".$point->description."', '".$point->latitude."', '".$point->longitude."', '".$pType."', '".$pGender."', 1)") or die("incorrect query");
        echo $query." <br>";
    }
}
//savePoints();
