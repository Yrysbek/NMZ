<?php

include 'config.php';

//connection to the database
$dbhandle = mysql_connect(HOSTNAME, USERNAME, PASSWORD)
        or die("Unable to connect to MySQL");

//select a database to work with
$selected = mysql_select_db(DBNAME, $dbhandle)
        or die("Could not select examples");
