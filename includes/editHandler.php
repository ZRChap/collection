<?php
include_once(dirname(__FILE__)."/header.php");

if(isset($_POST['updateRecord'])) {
    $artistNameArr = $_POST['artist'];
    $albumNameArr = $_POST['album'];
    $yearArr = $_POST['year'];
    $trackNumArr = $_POST['tracks'];
   
    for($i = 0; $i <= count($artistNameArr) -1; $i++) {
        $data = $db->getRow('SELECT collection.collection_id, ')
    }

   
};