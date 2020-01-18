<?php
include_once(dirname(__FILE__)."/header.php");

if(isset($_POST['updateRecord'])) {
    $artistNameArr = $_POST['artist'];
    $albumNameArr = $_POST['album'];
    $yearArr = $_POST['year'];
    $trackNumArr = $_POST['tracks'];
    $currTime = date("Y-m-d H:i:s");
    $artistId= $_POST['artistId'];
    $albumId = $_POST['albumId'];
    

   
    for($i = 0; $i <= count($artistNameArr) -1; $i++) {
        
        $artistData = $db->getRow('SELECT * FROM artist WHERE ' . "'$artistId[$i]'" . '= artist_id');
        $albumData = $db->getRow('SELECT * FROM album WHERE ' . "'$albumId[$i]'" . '= album_id');
        
        if($artistNameArr[$i] == $artistData[1]) {
            continue;
        } else {
            $db->updateRow('UPDATE artist SET artistName=' . "'$artistNameArr[$i]'" . ', updated= ' . "'$currTime'" . ' WHERE artist_id =' . "'$artistId[$i]'" . '');
        }

        if($albumNameArr[$i] == $albumData[2]) {
            continue;
        } else {
            $db->updateRow('UPDATE album SET albumName=' . "'$albumNameArr[$i]'" . ', updated= ' . "'$currTime'" . ' WHERE album_id =' . "'$albumId[$i]'" . '');
        }

        if($yearArr[$i] == $albumData[3]) {
            continue;
        } else {
            $db->updateRow('UPDATE album SET year =' . "'$yearArr[$i]'" . ', updated= ' . "'$currTime'" . ' WHERE album_id =' . "'$albumId[$i]'" . '');
        }
        
    }
    header('Location:http://localhost/collection/addpage.php?recordUpdated');

   
};