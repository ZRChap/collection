<?php
include_once(dirname(__FILE__)."/includes/header.php");
include_once(dirname(__FILE__)."/includes/addPageHandler.inc.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="assets/login.css">
  </head>
  <body>
    <div id="page-wrapper">
      <div id="header">
        <form class="" action="includes/logout.inc.php" method="post">
          <?php echo '<div><h3>Welcome ' . $_SESSION['user'] . '</h3></div><br>'; ?>
          <input id="logoutBtn" type="submit" name="logout" value="Logout">
        </div>
        </form>
      <div id="form-wrapper">
        <form onsubmit="return addPageValidate()" class="" name="addPageForm" action="includes/addPageHandler.inc.php" method="post" novalidate>
          <p>
            <label for="">Artist</label>
            <input id="addArtist" type="text" name="addArtist" value="">
            <span class="addError">Field is required</span>
          </p>
          <p>
            <label for="">Album</label>
            <input id="addAlbum"  type="text" name="addAlbum" value="">
            <span class="addError">Field is required</span>
          </p>
          <p>
            <label for="">Year</label>
            <input id="addYear"  type="text" name="addYear" value="">
            <span class="addError">Field is required</span>
          </p>
          <p>
            <label for=""># of Tracks</label>
            <input id="trackNum" type="text" name="trackNum" value="">
            <span class="addError">Field is required</span>
          </p>
          <p>
            <input type="submit" name="addFormSubmit" value="Submit">
          </p>
        </form>
      </div>
    </div>
  <div id="table-wrapper">
  <div>
      <input type="submit" name="updateRecord" value="Edit">
  </div>
  <div>
      <input type="submit" name="deleteRecord" value="Delete">
  </div>
  </div>
<?php include_once(dirname(__FILE__)."/includes/footer.php"); ?>
