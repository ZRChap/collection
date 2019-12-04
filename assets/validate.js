///SET OBJECTS//////////////////////////////////////////////////////////////////

var rValid = {};
var lValid = {};
var aValid = {};

///LOGIN VALIDATION///--------------------------------------------------------//

///RUN LOGIN VALIDATION FUNCTIONS
///CHECK IF lValid PROPERTIES ARE TRUE OR FALSE
///SUBMIT FORM IF ALL TRUE
function loginSubmit() {

  loginValidate();

  if (lValid.username === false || lValid.password === false) {
    return false;
  } else {
    return true;
  }
}

///REGISTER VALIDATION///-----------------------------------------------------//

///RUN REGISTER VALIDATION FUNCTIONS
///CHECK IF rValid PROPERTIES ARE TRUE OR FALSE
///SUBMIT FORM IF ALL TRUE
function registerSubmit() {

  errShow();
  nameValidate();
  emailValidate();
  passValidate();

  if (rValid.status === false || rValid.eStatus === false || rValid.pStatus === false) {
    return false;
  } else {
    return true;
  }
}

///ADDPAGE VALIDATION///------------------------------------------------------//
function addPageValidate() {
  isEmpty();
  addPageErr();

  if (aValid.status === false) {
    return false;
  } else {
    return true;
  }
}

///CALLED FUNCTIONS///--------------------------------------------------------//

///ADDPAGE FUNCTIONS///-------------------------------------------------------//
///lOOP THROUGH REGISTRATION FORM ELEMENTS
///SHOW ERROR IF FIELD IS EMPTY
function addPageErr() {
  var aPageForm = document.forms.addPageForm.elements;
  for (var i = 0; i < aPageForm.length -1; i++) {
    if (aPageForm[i].value.trim() === "") {
      document.getElementsByClassName("addError")[i].style.visibility = 'visible';
    } else {
      document.getElementsByClassName("addError")[i].style.visibility = 'hidden';
    }
  }
}

///CHECK IF FIELDS ARE EMPTY SHOW ERROR MESSAGE
///SET STATUS TO aValid PROPERTY
function isEmpty() {
  var artist = document.getElementById('addArtist').value.trim();
  var album = document.getElementById('addAlbum').value.trim();
  var year = document.getElementById('addYear').value.trim();
  var tracks = document.getElementById('trackNum').value.trim();

  if (artist === "" || album === "" || tracks === "" || year === "") {
    aValid.status = false;
  } else {
    aValid.status = true;
  }
}


///LOGIN FORM FUNCTIONS///----------------------------------------------------//

///CHECK IF FIELDS ARE EMPTY SHOW ERROR MESSAGE
///SET STATUS TO lValid PROPERTY
function loginValidate() {

  if (document.forms.loginForm.username.value.trim() === "") {
    $('#usernameError').html("Field is required");
    lValid.username = false;
  } else {
    $('#usernameError').hide();
    lValid.username = true;
  }
  if(document.forms.loginForm.password.value.trim() === "") {
    $('#passwordError').html("Field is required");
    lValid.password = false;
  } else {
    $('#passwordError').hide();
    lValid.password = true;
  }
}

///REGISTER FORM FUNCTIONS///-------------------------------------------------//

///lOOP THROUGH REGISTRATION FORM ELEMENTS
///SHOW ERROR IF FIELD IS EMPTY
function errShow() {
  var regForm = document.forms.registerForm.elements;
  for (var i = 0; i < regForm.length -1; i++) {
    if (regForm[i].value.trim() === "") {
      document.getElementsByClassName("regError")[i].style.visibility = 'visible';
    } else {
      document.getElementsByClassName("regError")[i].style.visibility = 'hidden';
    }
  }
}

///CHECK IF NAME FIELDS ARE EMPTY AND SET rValid.status TO TRUE OR FALSE
function nameValidate() {
  var userName = document.getElementById('regUid').value.trim();
  var firstName = document.getElementById('regFname').value.trim();
  var lastName = document.getElementById('regLname').value.trim();

  if (userName === "" || firstName ==="" || lastName ==="") {
    rValid.status = false;
  } else {
    rValid.status = true;
  }
}

///TEST EMAIL FOR VALID FORMAT ALERT ERROR IF NOT
///CHECK IF EMAIL AND CONFIRM EMAIL MATCH AND ALERT IF NOT
//SET rValid.eStatus TO TRUE OR FALSE
function emailValidate() {
  var email1 = document.getElementById('regEmail1').value.trim();
  var email2 = document.getElementById('regEmail2').value.trim();
  var evalid = emailValidate(email1);

  function emailValidate(email) {
    return /[^@]+@[^@]+/.test(email);
  }

  if (!evalid && email1 !== "") {
    alert("Email is invalid");
    rValid.eStatus = false;
  } else if (email1 !== email2) {
    alert("Email's do not match");
    rValid.eStatus = false;
  } else if (email1 ==="" || email2 ==="") {
    rValid.eStatus = false;
  } else {
    rValid.eStatus = true;
  }
}

///CHECK IF PASSWORD IS CORRECT LENGTH AND ALERT ERROR IF NOT
///CHECK IF PASSWORD AND CONFIRM PASSWORD MATCH AND ALERT ERROR IF NOT
///CHECK IF EMPTY, SET rValid.pStatus TO TRUE OR FALSE
function passValidate() {
  var password1 = document.getElementById('password1').value.trim();
  var password2 = document.getElementById('password2').value.trim();

  if (password1.length < 8 && password1 !== "") {
    alert('Password must be at least 8 characters long');
    rValid.pStatus = false;
  } else if (password2 !=="" && password1 !== password2) {
    alert('Passwords do not match');
    rValid.pStatus = false;
  } else if (password1 ==="" || password2 ==="") {
    rValid.pStatus = false;
  } else {
    rValid.pStatus = true;
  }
}
