<?php
include_once(dirname(__FILE__)."/header.php");

if(isset($_POST['deleteSubmit'])) {
    $checked = $_POST['checkboxes'];
    if(!empty($checked)) {
        for ($i = 0; $i <= count($checked) -1; $i++) {
            $colId = "$checked[$i]";
            $int = intval($colId);
            $db->deleteRow('DELETE FROM collection WHERE collection.collection_id =' . "$int" . '');
            header('Location:http://localhost/collection/addpage.php?recordDeleted');
        }
    } else {
        header('Location:http://localhost/collection/addpage.php?noSelect');
        }

}

if(isset($_POST['editSubmit'])) {
    $checked = $_POST['checkboxes'];
    if(!empty($checked)) {
        echo "checked";
    } else {
        header('Location:http://localhost/collection/addpage.php?noSelect');  
        }
}

if(isset($_POST['editTracksSubmit'])) {
    $checked = $_POST['checkboxes'];
    if(!empty($checked)) {
        for($i = 0; $i <= count($checked) -1; $i++) {


            $vTable = $db->getrows('SELECT collection.collection_id, artist.artist_id, artist.artistName, album.albumName, tracks.trackName FROM collection JOIN artist ON collection.collection_id =' . "$checked[$i]" . ' AND artist.artist_id = collection.artist_id JOIN album ON collection.artist_id = album.artist_id JOIN tracks ON album.album_id = tracks.album_id');
            //print_r($vTable);
            // echo "<br>";
            //print_r($data);
            $artist = $vTable[1][2];
            $album = $vTable[1][3];
            

        echo'
            <h2>'. "$artist" . '</h2>
            <p>'. "$album" . '</p>
            <form action ="tracksHandler.php" method="POST">
            <table border ="1">';

            foreach ($vTable as $row) {
                $id = $row['collection_id'];
                echo '<tr>
                    <td><input type= "text" name="trackField" value=' . "'$row[trackName]'" .'></td>
                </tr>';
                }
                echo '</table><p></p>';
        }
        echo '
                <input type="submit" name="updateTracks" value= "Update Tracks">
                </form>
                <p></p>';
    } else {
        header('Location:http://localhost/collection/addpage.php?noSelect');  
        }
}