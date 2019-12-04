<?php include_once(dirname(__FILE__)."/includes/header.php");?>
    <div id="main-wrapper">
      <div id="login-wrapper">
        <form id="login-form" name="loginForm" action="includes/loginHandler.inc.php" method="POST" onsubmit="return loginSubmit()" novalidate>
          <p>
            <label for="username">Username:</label>
            <input type="text" name="username" id="login-name" value="" required>
            <span id="usernameError"></span> 
          </p>
          <p>
            <label for="password">Password:</label>
            <input type="password" name="password" id="login-pass" value="" required>
            <span id="passwordError"></span>
          </p>
          <p>
            <input type="submit" name="login-submit" value="Login">
          </p>
          <span><a href="register.php" id="signup">Don't have an account yet? Signup Here.</a></span>
        </form>
      </div>
    </div>
<?php include_once(dirname(__FILE__)."/includes/footer.php");?>
