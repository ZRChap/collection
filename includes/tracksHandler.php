<?php

include_once(dirname(__FILE__)."/header.php");



if(isset($_POST['deleteTracks'])) {
    $checked = $_POST['checkboxes'];
    if(!empty($checked)) {
        
        for($i = 0; $i <= count($checked) -1; $i++) {
            
            $data = $db->getRow('SELECT album.tracks, tracks.tracks_id, tracks.album_id FROM tracks JOIN album ON tracks.album_id = album.album_id');
            
            $x = intval($data[0]);
            $y = count($checked);
            $removeCount = $x - $y;

            echo "<pre>";
            print_r($data);
            var_dump($removeCount);
            var_dump($x);
            exit;



            $db->deleteRow('DELETE FROM tracks WHERE tracks_id=' . "$checked[$i]");
            $db->updateRow('UPDATE album SET tracks=' . "$removeCount" . ' WHERE album_id=' . "$data[0]" . '' );
        }
    
        header('Location:http://localhost/collection/addpage.php?tracksUpdated');
        

    } else {
        echo "no track selected";
    }
}

if(isset($_POST['addTrack'])) {
 

}



if(isset($_POST['updateTracks'])) {
    $checked = $_POST['checkboxes'];
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
    









    
