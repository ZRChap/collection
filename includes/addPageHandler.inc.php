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
    $trackNum = $_POST['trackNum'];
    $year = $_POST['addYear'];
    $currTime = date("Y-m-d H:i:s");
    $artistCheck = $db->getrow("SELECT * FROM artist WHERE artistName =?", ["$artist"]);
    $albumCheck = $db->getrow("SELECT * FROM album WHERE albumName =?", ["$album"]);

    //check if artist and album exist//
    if($artist == $artistCheck[1] && $album == $albumCheck[2]){
      
      header('Location: http://localhost/collection/addpage.php?albumExists');

      //if artist exists but not album then add album to collection//
      } else if($artist == $artistCheck[1] && $album != $albumCheck[2]) {

          $getArtId = $db->getrow("SELECT * FROM artist WHERE artistName =?", ["$artist"]);
          $artistId = $getArtId[0];

          $db->insertRow("INSERT INTO album (artist_id, albumName, year, tracks, created, updated) VALUES (?, ?, ?, ?, ?, ?)", ["$artistId", "$album", "$year", "$trackNum", "$currTime", "$currTime"]);

          header('Location: http://localhost/collection/addpage.php?addSuccess');
      
      //if artist and album do not exits then add both to collection//
      } else {

          $db->insertRow("INSERT INTO artist (artistName, created, updated) VALUES (?, ?, ?)", ["$artist", "$currTime", "$currTime"]);

          $getArtId = $db->getrow("SELECT * FROM artist WHERE artistName =?", ["$artist"]);
          $artistId = $getArtId[0];
  
          $db->insertRow("INSERT INTO album (artist_id, albumName, year, tracks, created, updated) VALUES (?, ?, ?, ?, ?, ?)", ["$artistId", "$album", "$year", "$trackNum", "$currTime", "$currTime"]);

          $db->insertRow("INSERT INTO collection(user_id, artist_id) VALUES (?, ?)", ["$user_id", "$artistId"]);

          $getAlbumId = $db->getrow("SELECT * FROM album WHERE albumName =?", ["$album"]);
          $albumId = $getAlbumId[0];
          
          for($i = 1; $i <= $trackNum; $i++) {
            $currTrack = 'track ' . "$i" .'';       
            $db->insertRow("INSERT INTO tracks (album_id, trackName, created, updated) VALUES (?, ?, ?, ?)", ["$albumId", "$currTrack", "$currTime", "$currTime"]);
           }
        
         header('Location: http://localhost/collection/addpage.php?addSuccess');    
      }  
    }
    
    $data = $db->getRows('SELECT collection.collection_id, collection.user_id, collection.artist_id, artist.artistName, album.albumName, album.year, album.tracks FROM collection JOIN artist ON collection.user_id =' . " $user_id " . 'AND collection.artist_id = artist.artist_id JOIN album ON collection.artist_id = album.artist_id ORDER BY' . " $order $sort");
    
} else {
  session_destroy();
  header('Location: http://localhost/collection');
  }

  
 ?>
