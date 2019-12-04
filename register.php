<?php include_once(dirname(__FILE__)."/includes/header.php");?>
<div id="register-wrapper">
  <form id="register-form" name="registerForm" action="includes/signupHandler.inc.php" method="POST" onsubmit="return registerSubmit()" novalidate>
    <p>
      <label for="uid" class="required">Username:</label>
      <input type="text" id="regUid" name="uid" value="" required>
      <span class="regError">Field is required</span>
    </p>
    <p>
      <label for="fname" class="required">First Name:</label>
      <input type="text" id="regFname" name="fName" value="" required>
      <span class="regError">Field is required</span>
    </p>
    <p>
      <label for="lname" class="required">Last Name:</label>
      <input type="text" id="regLname" name="lName" value="" required>
      <span class="regError">Field is required</span>
    </p>
    <p>
      <label for="email1" class="required">Email:</label>
      <input type="email" id="regEmail1" name="email" value="" required>
      <span class="regError">Field is required</span>
    </p>
    <p>
      <label for="email2" class="required">Confirm Email:</label>
      <input type="email" id="regEmail2" name="confirm-email" value="" required>
      <span class="regError">Field is required</span>
    </p>
    <p>
      <label for="pwd1" class="required">Password:</label>
      <input type="password" id="password1" name="pwd" value="" required>
      <span class="regError">Field is required</span>
    </p>
    <p>
      <label for="pwd2" class="required">Confirm Password:</label>
      <input type="password" id="password2" name="confirm-pwd" value="" required>
      <span class="regError">Field is required</span>
    </p>
    <p>
      <div class="submit">
        <input type="submit" name="register-submit" value="Register">
      </div>
    </p>
    <span><a href="index.php" id="login">Already have and account? Login Here.</a></span>
  </form>
</div><!--REGISTER-WRAPPER-->
<?php include_once(dirname(__FILE__)."/includes/footer.php");?>
