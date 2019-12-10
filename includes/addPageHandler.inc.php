<?php
include_once(dirname(__FILE__)."/header.php");

if(isset($_SESSION['user'])) {
  $currUser = $_SESSION['user'];
  $user = $db->getrows('SELECT * FROM users WHERE userName =?',["$currUser"]);
  $user_id = $user[0][0];
  

  if(isset($_GET['order'])) {
    $order = $_GET['order'];
  } else {
    $order = 'artistName';
  }

if(isset($_GET['sort'])) {
    $sort = $_GET['sort'];
  } else {
    $sort = 'ASC';
  }

  if(isset($_POST['addFormSubmit'])) {
    $artist = $_POST['addArtist'];
    $album = $_POST['addAlbum'];
    $artistCheck = $db->getrow("SELECT * FROM artist WHERE artistName =?", ["$artist"]);
    $albumCheck = $db->getrow("SELECT * FROM album WHERE albumName =?", ["$album"]);

    //check if artist and album exist//
    if($artist == $artistCheck[1] && $album == $albumCheck[2]){
      header('Location: http://localhost/collection/addpage.php?albumExists');

      //if artist exists but not album then add album to collection//
      } else if($artist == $artistCheck[1] && $album != $albumCheck[2]) {
        $artist = $_POST['addArtist'];
        $album = $_POST['addAlbum'];
        $trackNum = $_POST['trackNum'];
        $year = $_POST['addYear'];
        $currTime = date("Y-m-d H:i:s");

        $db->insertRow("INSERT INTO album (albumName, year, tracks, created, updated) VALUES (?, ?, ?, ?, ?)", ["$album", "$year", "$trackNum", "$currTime", "$currTime"]);

        $getArtId = $db->getrow("SELECT * FROM artist WHERE artistName =?", ["$artist"]);
        $artistId = $getArtId[0];

        $getAlbumId = $db->getrow("SELECT * FROM album WHERE albumName =?", ["$album"]);
        $albumId = $getAlbumId[0];

        $db->insertRow("INSERT INTO collection(user_id, artist_id, album_id) VALUES (?, ?, ?)", ["$user_id", "$artistId", "$albumId"]);

        header('Location: http://localhost/collection/addpage.php?addSuccess');
      
      //if artist and album do not exits then add both to collection//
      } else {
        $artist = $_POST['addArtist'];
        $album = $_POST['addAlbum'];
        $trackNum = $_POST['trackNum'];
        $year = $_POST['addYear'];
        $currTime = date("Y-m-d H:i:s");

        $db->insertRow("INSERT INTO artist (artistName, created, updated) VALUES (?, ?, ?)", ["$artist", "$currTime", "$currTime"]);

        $getArtId = $db->getrow("SELECT * FROM artist WHERE artistName =?", ["$artist"]);
        $artistId = $getArtId[0];

        $db->insertRow("INSERT INTO album (albumName, year, tracks, created, updated) VALUES (?, ?, ?, ?, ?)", ["$album", "$year", "$trackNum", "$currTime", "$currTime"]);
        
        $getArtId = $db->getrow("SELECT * FROM artist WHERE artistName =?", ["$artist"]);
        $artistId = $getArtId[0];

        $getAlbumId = $db->getrow("SELECT * FROM album WHERE albumName =?", ["$album"]);
        $albumId = $getAlbumId[0];

        $db->insertRow("INSERT INTO collection(user_id, artist_id, album_id) VALUES (?, ?, ?)", ["$user_id", "$artistId", "$albumId"]);

        header('Location: http://localhost/collection/addpage.php?addSuccess');    
      }  
    }
    
    $data = $db->getRows('SELECT collection.collection_id, artist.artistName, album.albumName, album.year, album.tracks FROM collection JOIN artist ON artist.artist_id = collection.artist_id JOIN album ON collection.album_id = album.album_id ORDER BY' . " $order $sort");
    
} else {
  session_destroy();
  header('Location: http://localhost/collection');
  }

  
 ?>
