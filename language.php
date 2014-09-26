<?php

session_start();
$set_lang = $_GET['lang'];
if($set_lang=="ru"){
    $_SESSION['lang'] = $set_lang;
}
else if($set_lang == 'en'){
    $_SESSION['lang'] = $set_lang;
}
else if($set_lang == 'kg'){
    $_SESSION['lang'] = $set_lang;
}
if(!$_SESSION['lang']){
    $_SESSION['lang'] = 'ru';    
}

$url = $_SERVER['HTTP_REFERER'];
header("Location: $url");
