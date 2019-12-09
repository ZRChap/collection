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
          <th><a href='?order=year&&sort=$sort'>YEAR</a></th>
          <th><a href='?order=tracks&&sort=$sort'>TRACKS</a></th>
    ";
    foreach ($data as $row) {
      echo '<tr>
        <td><input type="checkbox" name="" value=""></td>
        <td>' . $row['artistName'] . '</td>
        <td>' . $row['albumName'] . '</td>
        <td>' . $row['year'] . '</td>
        <td>' . $row['tracks'] . '</td>
      </tr>';
    }
  } 
};



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