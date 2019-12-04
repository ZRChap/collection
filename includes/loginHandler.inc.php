<?php
include_once(dirname(__FILE__)."/header.php");

if(isset($_POST['login-submit'])) {
  $userName = $_POST['username'];
  $pass = $_POST['password'];
  $userCheck = $db->getRow('SELECT * FROM users WHERE userName = ?', ["$userName"]);
  if(!empty($userCheck)) {
    $passCheck = $userCheck[5];
    $pValid = password_verify($pass, $passCheck);
     if ($pValid) {
       $_SESSION['user'] = $userName;
       header('Location: http://localhost/collection/addpage.php');
      } else {
          header('Location: http://localhost/collection/index.php?loginFail');
      } 
  } else {
    header('Location: http://localhost/collection/index.php?loginFail');
  }   
}


?>
