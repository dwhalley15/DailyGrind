document.getElementById("passwordIcon").addEventListener("click", validation);

function validation(){
  let pass = document.forms["passwordForm"]["password"].value;
  let passConfirm = document.forms["passwordForm"]["passwordConfirm"].value;
  var passFormat = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}$/;
  
  if(pass == "" || passConfirm == ""){
    showError();
  }
  else if(!pass.match(passFormat)){
    document.forms["passwordForm"]["password"].value = "";
    showError();
  }
  else if(passConfirm != pass){
    document.forms["passwordForm"]["passwordConfirm"].value = "";
    showError();
  }
  else{
    document.forms["passwordForm"].submit();
  }
}

function showError(){
  let error = document.getElementById("errorHidden");
  error.style.display = "inline";
}
