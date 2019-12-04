<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>MusicCollection</title>
    <link rel="stylesheet" href="./assets/login.css">
    <script type="text/javascript" src="./assets/validate.js"></script>
    <script type="text/javascript" src="./assets/jquery-3.4.1.js"></script>
  </head>
  <body>
<?php
  session_start();
  include_once(dirname(__FILE__)."/../classes/Database.php");
  include_once(dirname(__FILE__)."/../includes/functions.php");
  pageMessage();

  $db = new Database();
?>
