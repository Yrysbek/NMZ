<?php

class PrayerPlace
{
	public $type;
	public $gender;
	public $name;
	public $address;
	public $description;
	public $latitude;
	public $longitude;
	
	public function __construct($type, $gender, $name, $address, $description, $lat, $lng){
		$this->type = $type;
		$this->gender = $gender;
		$this->name = $name;
		$this->address = $address;
		$this->description = $description;	
		$this->latitude = $lat;
		$this->longitude = $lng;
	}
	
	public function __toString(){
		return $this->name."";
	}
}

class MyPosition{
	public static $latitude;
	public static $longitude;
}


?>
