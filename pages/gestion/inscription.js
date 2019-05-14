

function checkemail(email) {
     clearInput(email);
    var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/; // chaine limitée par /^ chaine $/ | {2,} == 2 ou plus | {2,4} == entre 2 et 4 | \ devant le point pour enlever le "spécial" du caractère
    if(!regex.test(email.value))
    {
      displayError(email, 'Invalid email, retry.');
      return false;
    }
    else
    {
       return true;
    }
  }


function checkfirstName(username) {
    clearInput(username); //voir en bas
    if (username.value.length  < 3 || username.value.length > 30)
    {
      displayError(username, 'Your username needs to be at least 3 characters long and not more than 30.'); //voir en bas
      return false;
    }
    else {
      return true;
    }
  }


  function checkpassword(password){
     clearInput(password);
    //var regex = ^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$;
    var regex = /^(?=[^\d]*\d)(?=[A-Z\d ]*[^A-Z\d ]).{8,}$/i; // chaine limitée par /^ chaine $/ | {2,} == 2 ou plus | {2,4} == entre 2 et 4 | \ devant le point pour enlever le "spécial" du caractère
    if(!regex.test(password.value))
    {
      displayError(password, 'Invalid password, requires at least:<br> 8 characters, 1 special character, 1 digit.');
      return false;
    }
    else
    {
       return true;
    }
  }

  function checkconfirmPassword(verifPassword) {
    clearInput(verifPassword);

    var p = document.getElementById("inputPassword");

    if (verifPassword.value == p.value) {

        return true;
    }
    else {
        displayError(verifPassword, 'Wrong verification password, retry.');
        return false;

    }


  }


function displayError(input, message) {
    input.style.borderColor = 'red';
    var error = document.createElement('p');
    error.innerHTML = message;
    error.style.color = 'red';
    var parent = input.parentNode;
    parent.appendChild(error);
  }

  function clearInput(input) {
    input.style.borderColor = '';

    var parent = input.parentNode;
    var elements = parent.getElementsByTagName('p');
    if(elements.length > 0){
      parent.removeChild(elements[0]);
    }
  }

  function checkGlobal(donnees) {
    console.log(donnees.email.value);
    console.log(donnees.username.value);
    console.log(donnees.password.value);
    console.log(donnees.verifyPassword.value);

    var email =checkemail(donnees.email);
    console.log("email: " + email);
    var username =checkfirstName(donnees.username);
    console.log("username: " + username);
    var password =checkpassword(donnees.password);
    console.log("password: " + password);
    var verifPassword=checkconfirmPassword(donnees.verifyPassword);
    console.log("verifPassword: " + verifPassword);

    if(email && username && password && verifPassword){
        console.log("end true");
        return true;
    }else{
        console.log("end false");
        return false;
    }

  }

function showPasswords(){
    document.getElementById('inputPassword').type = 'text';
    document.getElementById('inputVerifyPassword').type = 'text';

    var button = document.getElementById('togglePassword');
    button.innerHTML = "Hide password";
    $('#togglePassword').removeAttr('onclick');
    button.setAttribute("onclick", "hidePasswords()");
}

function hidePasswords(){
    document.getElementById('inputPassword').type = 'password';
    document.getElementById('inputVerifyPassword').type = 'password';

    var button = document.getElementById('togglePassword');
    button.innerHTML = "Show password";
    $('#togglePassword').removeAttr('onclick');
    button.setAttribute("onclick", "showPasswords()");
}
