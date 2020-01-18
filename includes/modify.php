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

        echo'<form action ="editHandler.php" method="POST">';

        for($i = 0; $i <= count($checked) -1; $i++) {
            
            $data = $db->getrows('SELECT collection.collection_id, artist.artist_id, artist.artistName, album.year, album.album_id, album.albumName, album.tracks FROM collection JOIN artist ON collection.collection_id =' . "$checked[$i]" . ' AND artist.artist_id = collection.artist_id JOIN album ON collection.artist_id = album.artist_id');

            echo '
            <table border ="1">
            <tr>
            <th>Artist Name</th>
            <th>Album Name</th>
            <th>Year</th>
            <th>Tracks</th>
            </tr>';

            foreach ($data as $row) {
                $id = $row['artist_id'];
    
                echo '
                    <tr>
                        <input type= "hidden" name="albumId[]" value=' . "'$row[album_id]'" . '></td>
                        <input type= "hidden" name="artistId[]" value=' . "'$id'" . '>
                        <td><input type= "text" name="artist[]" value=' . "'$row[artistName]'" .'></td>
                        <td><input type= "text" name="album[]" value=' . "'$row[albumName]'" .'></td>
                        <td><input type= "text" name="year[]" value=' . "'$row[year]'" .'></td>
                        <td><input type= "text" readonly="readonly" name="tracks[]" value=' . "'$row[tracks]'" .'></td>
                    </tr>
                    <p></p>';
                    }
                echo '</table>';

        }
        echo '
                <input type="submit" name="updateRecord" value= "Update Collection">
                </form>
                <p></p>';

    
        
    } else {
        header('Location:http://localhost/collection/addpage.php?noSelect');  
        }
}

if(isset($_POST['editTracksSubmit'])) {
    $checked = $_POST['checkboxes'];

    echo '<button onclick="history.go(-1);">Back </button>';

    if(!empty($checked)) {
        for($i = 0; $i <= count($checked) -1; $i++) {

            // print_r($checked[$i]);
            // echo count($checked);
            
            $vTable = $db->getRows('SELECT album.artist_id, album.album_id, album.albumName, tracks.trackName, tracks.tracks_id, artist.artistName FROM album JOIN tracks ON tracks.album_id =' . "$checked[$i]" .   ' AND album.album_id =' . "$checked[$i]" .' JOIN artist ON artist.artist_id = album.artist_id');

            $artist = $vTable[0][5];
            $album = $vTable[0][2];

            // echo "<pre>";
            // print_r($vTable);
              
        echo'
            <h2>'. "$artist" . '</h2>
            <p>'. "$album" . '</p>
            <form action ="tracksHandler.php" method="POST">
            <table border ="1">
            <tr>
            <th></th>
            <th>Track Name</th>
            </tr>';

            foreach ($vTable as $row) {
                $id = $row['album_id'];
    
                echo '
                    <tr>
                        <input type= "hidden" name="tracksId[]" value=' . "'$row[tracks_id]'" .'>
                        <td><input type= "checkbox" name="checkboxes[]" value=' . "'$row[tracks_id]'" . '></td>
                        <td><input type= "text" name="trackField[]" value=' . "'$row[trackName]'" .'></td>
                        
                    </tr>';
                    }
                echo '</table><p></p>';
        }
        echo '
                <input type="submit" name= "updateTracks" value= "Update Tracks">
                <input type="submit" name= "deleteTracks" value= "Delete">
                <input type="submit" name= "addTrack" value= "Add">
                </form>
                <p></p>';
    } else {
        header('Location:http://localhost/collection/addpage.php?noSelect');  
        }

}
