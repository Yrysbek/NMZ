<?php
include_once 'model/config.php';
$content = '';
if(DATASOURCE == "xml"){
    $content = 'templates/list_view_xml.php';
}
else if(DATASOURCE == "mysql"){
    $content = 'templates/list_view_mysql.php';
}
$header = 'templates/list_view_header.php';

include 'templates/page.php';
