<?php

function dspTable($data, $sort) {
if(!empty($data)) {
    $sort == 'DESC' ? $sort = 'ASC' : $sort = 'DESC';
      echo"
      <table border ='1'>
        <tr>
          <th>SELECT</th>
          <th><a href='?order=artist&&sort=$sort'>ARTIST</a></th>
          <th><a href='?order=album&&sort=$sort'>ALBUM</a></th>
          <th><a href='?order=tracks&&sort=$sort'>TRACKS</a></th>
          <th><a href='?order=year&&sort=$sort'>YEAR</a></th>
    ";
    foreach ($data as $row) {
      echo '<tr>
        <td><input type="checkbox" name="" value=""></td>
        <td>' . $row['artist'] . '</td>
        <td>' . $row['album'] . '</td>
        <td>' . $row['tracks'] . '</td>
        <td>' . $row['year'] . '</td>
      </tr>';
    }
  } 
};


function addTracks($trackNum) {
  echo "ADD TRACK NAMES" . '<br>';
  for ($x = 1; $x <= $trackNum; $x++) {
    echo $x . '
    <form method="POST">
      <li>
        <input id="addTracks' . $x  . ' type="text" name="addTracks" value="">
      </li>';
  }

  echo '<br>' . '<input type="submit" name="addTracksSubmit" value="Add Tracks">
  </form>';

}

function submitTracks($trackNum) {
  if(isset($POST_['addTracksSubmit'])){
    $track = $POST_['addTrackField'];
    echo $track;
  }
}



function pageMessage() {
    if(isset($_GET['regSuccess'])) {
        echo '<p style="color:green">Record Added</p>'; 
    }
    
    if(isset($_GET['loginFail'])) {
        echo '<p style="color:red">your username or password is incorrect</p>';
    }
    
    if(isset($_GET['userNameTaken'])) {
        echo '<p style="color:red">Username Already Taken</p>';
    }
    
    if(isset($_GET['addSuccess'])) {
        echo '<p style="color:green">Record Added</p>';
    }

    if(isset($_GET['albumExists'])) {
      echo '<p style="color:red">Album already in your collection</p>';
  }

   
}




?>