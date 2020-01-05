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
            $data = $db->getrow('SELECT * FROM collection WHERE collection_id =' . "$checked[$i]" . '');
            $colId = $data[0];
            print_r($data);
            $vTable = $db->getrows('SELECT collection.collection_id, collection.artist_id, artist.artistName, album.albumName, tracks.trackName FROM collection WHERE collection.collection_id =' . "$colId" .  'JOIN artist ON collection.artist_id = artist.artist_id JOIN album ON collection.artist_id = album.artist_id JOIN tracks ON album.album_id = tracks.album_id');
            

            echo"
      <table border ='1'>";

    foreach ($vTable as $row) {
      $id = $row['collection_id'];
      echo '<tr>
        <td><input type="checkbox" name="checkboxes[]" value="' . $id . '"></td>
        <td>' . $row['collection_id'] . '</td>
        <td>' . $row['artist_id'] . '</td>
        <td>' . $row['artistName'] . '</td>
        <td>' . $row['albumName'] . '</td>
        <td>' . $row['trackName'] . '</td>
      </tr>';
      
    }
  }
  echo '</table>';

            echo"<br>";
            // echo '<form>
            //         <input type = text value = ' . "$artId" . '>
            //       </form>';
        
        }
    } else {
        header('Location:http://localhost/collection/addpage.php?noSelect');  
        }
