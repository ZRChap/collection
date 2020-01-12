<?php
include_once(dirname(__FILE__)."/header.php");

  if(isset($_POST['register-submit'])) {
    $userName = $_POST['uid'];
    $firstName = $_POST['fName'];
    $lastName = $_POST['lName'];
    $email = $_POST['email'];
    $password = $_POST['pwd'];

    $regUserCheck = $db->getrow('SELECT * FROM users WHERE uidUsers = ?', ["$userName"]);
    
    if(!empty($regUserCheck)) {
      header('location: http://localhost/collection/register.php?userNameTaken= User Name Taken');
    } else {
      $hash = password_hash($password, PASSWORD_DEFAULT);
      $db->insertRow('INSERT INTO users(uidUsers, firstNameUsers, lastNameUsers, emailUsers, pwdUsers) VALUE(?, ?, ?, ?, ?)', ["$userName", "$firstName", "$lastName", "$email", "$hash"]);
  
      header('location: http://localhost/collection/index.php?regSuccess');
    }
  } else {
    header('Location: http://localhost/collection/index.php');
  }
?>
