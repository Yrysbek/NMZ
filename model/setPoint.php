<?php

include_once 'config.php';

$operation = $_GET["operation"];
$name = $_GET["name"];
$address = $_GET["address"];
$description = $_GET["description"];
$lat = $_GET["lat"];
$lng = $_GET["lng"];
$type = $_GET["type"];
$gender = $_GET["gender"];
$status = $_GET["status"];
$id = $_GET["id"];

switch ($operation){
    case "edit":
        editPoint();
        break;
    
    case "add":
        addPoint();
        break;
    
    case "delete":
        deletePoint();
        break;
    
    default:
        return;
}

//include_once 'DbConnection.php';

function editPoint(){
    include_once 'DbConnection.php';
    
    $name = $_GET["name"];
    $address = $_GET["address"];
    $description = $_GET["description"];
    $latitude = $_GET["lat"];
    $longitude = $_GET["lng"];
    $type = $_GET["type"];
    $gender = $_GET["gender"];
    $status = $_GET["status"];
    $id = $_GET["id"];

    mysql_query("UPDATE `places` SET "
            . "`NAME` = '$name', "
            . "`ADDRESS` = '$address', "
            . "`DESCRIPTION` = '$description', "
            . "`LATITUDE` = $latitude, "
            . "`LONGITUDE` = $longitude, "
            . "`GENDER` = (SELECT `ID` FROM `gender` WHERE `NAME` = '$gender'), "
            . "`TYPE` = (SELECT `ID` FROM `types` WHERE `NAME` = '$type'), "
            . "`STATUS` = $status, "
            . "WHERE `ID` = $id") or die("error on editing point");
    
    
}

function addPoint(){
    include_once 'DbConnection.php';

    $name = $_GET["name"];
    $address = $_GET["address"];
    $description = $_GET["description"];
    $latitude = $_GET["lat"];
    $longitude = $_GET["lng"];
    $type = $_GET["type"];
    $gender = $_GET["gender"];
    $status = $_GET["status"];
    
    $query = mysql_query("INSERT INTO `places`"
                . "(`NAME`, "
                . "`ADDRESS`, "
                . "`DESCRIPTION`, "
                . "`LATITUDE`, "
                . "`LONGITUDE`, "
                . "`TYPE`, "
                . "`GENDER`, "
                . "`STATUS`) "
            . "VALUES ("
                . "'$name',"
                . "'$address',"
                . "'$description',"
                . "$latitude,"
                . "$longitude,"
                . "(SELECT `ID` FROM `types` WHERE `NAME` = '$type'),"
                . "(SELECT `ID` FROM `gender` WHERE `NAME` = '$gender'),"
                . "$status)");
    if(!$query){
        echo mysql_error();
    }
}

function deletePoint(){
    include_once 'DbConnection.php';
    
    $id = $_GET["id"];
    
    mysql_query("DELETE FROM `places` "
            . "WHERE `ID` = $id") or die("error on deleting point");
}
$actual_link = 'http://'.HOSTURL;
header("Location: $actual_link");
