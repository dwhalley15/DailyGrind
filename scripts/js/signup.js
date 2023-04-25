document.getElementById("signupIcon").addEventListener("click", validation);

function validation(){
  let fullName = document.forms["signup"]["fullName"].value;
  let email = document.forms["signup"]["email"].value;
  let pass = document.forms["signup"]["password"].value;
  let passConfirm = document.forms["signup"]["passwordConfirm"].value;
  let nameFormat = /^[a-zA-Z]+ [a-zA-Z]+$/;
  var emailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  var passFormat = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}$/;
  
  if(fullName == "" || email == "" || pass == "" || passConfirm == ""){
    showError();
  }
  else if(!fullName.match(nameFormat)){
    document.forms["signup"]["fullName"].value = "";
    showError();
  }
  else if(!email.match(emailFormat)){
    document.forms["signup"]["email"].value = "";
    showError();
  }
  else if(!pass.match(passFormat)){
    document.forms["signup"]["password"].value = "";
    showError();
  }
  else if(passConfirm != pass){
    document.forms["signup"]["passwordConfirm"].value = "";
    showError();
  }
  else{
    document.forms["signup"].submit();
  }
}

function showError(){
  let error = document.getElementById("errorHidden");
  error.style.display = "inline";
}
