<?php

include_once(dirname(__FILE__)."/header.php");


echo "what up";

if(isset($_POST['updateTracks'])) {
    $trackName = $_POST['trackField'];
    echo $trackName;
    //$db->updateRow("INSERT INTO tracks (trackName) VALUES (?)", [$trackName]);
}
    









    
