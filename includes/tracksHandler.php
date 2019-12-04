<?php

include_once(dirname(__FILE__)."/includes/header.php");





foreach($tracks as $trackNum => $trackName){
    $trackNum += 1;
    if($trackName !== "" && !NULL) {
    $db->insertRow("INSERT INTO tracks (album_id, trackNum, name, created, updated) VALUES (?, ?, ?, ?, ?)", ["$albumId", "$trackNum", "$trackName", "$currTime", "$currTime"]);
    }





    
    exit;