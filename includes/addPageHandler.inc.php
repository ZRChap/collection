<?php
include_once(dirname(__FILE__)."/header.php");

if(isset($_SESSION['user'])) {
  $currUser = $_SESSION['user'];
  $user_id = $db->getrows('SELECT * FROM users WHERE userName =?',["$currUser"]);
  $user = $user_id[0][0];
  

  if(isset($_GET['order'])) {
    $order = $_GET['order'];
  } else {
    $order = 'artist';
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

        $getArtId = $db->getrow("SELECT * FROM artist WHERE artistName =?", ["$artist"]);
        $artistId = $getArtId[0];

        $db->insertRow("INSERT INTO album (artist_id, albumName, year, tracks, created, updated) VALUES (?, ?, ?, ?, ?, ?)", ["$artistId", "$album", "$year", "$trackNum", "$currTime", "$currTime"]);

        addTracks($trackNum);

        // header('Location: http://localhost/collection/addpage.php?addSuccess');
      
    
      //if artist and album do not exits then add both to colleciton//
      } else {
        $artist = $_POST['addArtist'];
        $album = $_POST['addAlbum'];
        $trackNum = $_POST['trackNum'];
        $year = $_POST['addYear'];
        $currTime = date("Y-m-d H:i:s");

        $db->insertRow("INSERT INTO artist (artistName, created, updated) VALUES (?, ?, ?)", ["$artist", "$currTime", "$currTime"]);

        $getArtId = $db->getrow("SELECT * FROM artist WHERE artistName =?", ["$artist"]);
        $artistId = $getArtId[0];

        $db->insertRow("INSERT INTO album (artist_id, albumName, year, tracks, created, updated) VALUES (?, ?, ?, ?, ?, ?)", ["$artistId", "$album", "$year", "$trackNum", "$currTime", "$currTime"]);

        addTracks($trackNum);
        submitTracks($trackNum);
        
        // header('Location: http://localhost/collection/addpage.php?addSuccess');    
      }  
    }

    //$data = $db->getRows('SELECT * FROM collection WHERE user_id = ?' . "ORDER BY $order $sort", ["$user"]);
    // dspTable($data, $sort);


} else {
  session_destroy();
  header('Location: http://localhost/collection');
  }


 ?>
