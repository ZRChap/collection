<?php

include_once(dirname(__FILE__)."/header.php");



if(isset($_POST['updateTracks'])) {
    $trackArr = $_POST['trackField'];
    $trackIdArr = $_POST['tracksId'];
    $currTime = date("Y-m-d H:i:s");
    
    for($i = 0; $i <= count($trackArr) -1; $i++) {
     
        $data = $db->getRows('SELECT * FROM tracks WHERE tracks_id =' . "$trackIdArr[$i]" . '');
   
        if($data[0][2] == $trackArr[$i]) {
            continue;
        } else {
            $db->updateRow('UPDATE tracks SET trackName=' . "'$trackArr[$i]'" . ', updated=' . "'$currTime'" .  ' WHERE tracks_id =' . "$trackIdArr[$i]" . '');
        }
    }

header('Location:http://localhost/collection/addpage.php?tracksUpdated');
    
}
    









    
