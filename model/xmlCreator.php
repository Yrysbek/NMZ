
<?php

function getXmlTextFromPrayerPlaceObject($prayerPlace){
	$dom = new DOMDocument('1.0', 'utf-8');
	$points = $dom->createElement('points');
	$point = $dom->createElement('point');
	$points->appendChild($point);

	$type = $dom->createElement('type');
	$gender = $dom->createElement('gender');
	$name = $dom->createElement('name');
	$address = $dom->createElement('address');
	$description = $dom->createElement('description');
	$latitude = $dom->createElement('latitude');
	$longitude = $dom->createElement('longitude');

	$point->appendChild($type);
	$point->appendChild($gender);
	$point->appendChild($name);
	$point->appendChild($address);
	$point->appendChild($description);
	$point->appendChild($latitude);
	$point->appendChild($longitude);

	echo "party ----";
	echo $prayerPlace;
	echo "party ----";

	$type_text = $dom->createTextNode($prayerPlace->type);
	$gender_text = $dom->createTextNode($prayerPlace->gender);
	$name_text = $dom->createTextNode($prayerPlace->name);
	$address_text = $dom->createTextNode($prayerPlace->address);
	$description_text = $dom->createTextNode($prayerPlace->description);
	$latitude_text = $dom->createTextNode($prayerPlace->latitude);
	$longitude_text = $dom->createTextNode($prayerPlace->longitude);

	$type->appendChild($type_text);
	$gender->appendChild($gender_text);
	$name->appendChild($name_text);
	$address->appendChild($address_text);
	$description->appendChild($description_text);
	$latitude->appendChild($latitude_text);
	$longitude->appendChild($longitude_text);

	$dom->appendChild($points);

	return $dom->saveXML();
}

function generatePointTagFromPrayerPlaceObject($prayerPlace, $dom, $point){
	$type = $dom->createElement('type');
	$gender = $dom->createElement('gender');
	$name = $dom->createElement('name');
	$address = $dom->createElement('address');
	$description = $dom->createElement('description');
	$latitude = $dom->createElement('latitude');
	$longitude = $dom->createElement('longitude');
        $status = $dom->createElement('status');

        $point->appendChild($type);
	$point->appendChild($gender);
	$point->appendChild($name);
	$point->appendChild($address);
	$point->appendChild($description);
	$point->appendChild($latitude);
	$point->appendChild($longitude);
        $point->appendChild($status);

        $type_text = $dom->createTextNode($prayerPlace->type);
	$gender_text = $dom->createTextNode($prayerPlace->gender);
	$name_text = $dom->createTextNode($prayerPlace->name);
	$address_text = $dom->createTextNode($prayerPlace->address);
	$description_text = $dom->createTextNode($prayerPlace->description);
	$latitude_text = $dom->createTextNode($prayerPlace->latitude);
	$longitude_text = $dom->createTextNode($prayerPlace->longitude);

	$type->appendChild($type_text);
	$gender->appendChild($gender_text);
	$name->appendChild($name_text);
	$address->appendChild($address_text);
	$description->appendChild($description_text);
	$latitude->appendChild($latitude_text);
	$longitude->appendChild($longitude_text);

	return $point;
}

function generatePointTagFromMySqlRow($prayerPlaceRow, $dom, $point) {
    $type = $dom->createElement('type');
    $gender = $dom->createElement('gender');
    $name = $dom->createElement('name');
    $address = $dom->createElement('address');
    $description = $dom->createElement('description');
    $latitude = $dom->createElement('latitude');
    $longitude = $dom->createElement('longitude');

    $point->appendChild($type);
    $point->appendChild($gender);
    $point->appendChild($name);
    $point->appendChild($address);
    $point->appendChild($description);
    $point->appendChild($latitude);
    $point->appendChild($longitude);

    $type_text = $dom->createTextNode($prayerPlaceRow["TYPE"]);
    $gender_text = $dom->createTextNode($prayerPlaceRow["GENDER"]);
    $name_text = $dom->createTextNode($prayerPlaceRow["NAME"]);
    $address_text = $dom->createTextNode($prayerPlaceRow["ADDRESS"]);
    $description_text = $dom->createTextNode($prayerPlaceRow["DESCRIPTION"]);
    $latitude_text = $dom->createTextNode($prayerPlaceRow["LATITUDE"]);
    $longitude_text = $dom->createTextNode($prayerPlaceRow["LONGITUDE"]);

    $type->appendChild($type_text);
    $gender->appendChild($gender_text);
    $name->appendChild($name_text);
    $address->appendChild($address_text);
    $description->appendChild($description_text);
    $latitude->appendChild($latitude_text);
    $longitude->appendChild($longitude_text);

    return $point;
}

?>
