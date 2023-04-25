document.getElementById("updateIcon").addEventListener("click", validation);
const themes = document.getElementById("themes");

themes.addEventListener('input', function(){
  let selected = themes.options[themes.selectedIndex].value;
  document.getElementById('theme'). value = selected;
});

function validation(){
  let fullName = document.forms["profileUpdateForm"]["fullName"].value;
  let nameFormat = /^[a-zA-Z]+ [a-zA-Z]+$/;
  if(fullName == ""){
    showError();
  }
  else if(!fullName.match(nameFormat)){
    document.forms["profileUpdateForm"]["fullName"].value = "";
    showError();
  }
  else{
    document.forms["profileUpdateForm"].submit();
  }
}

function showError(){
  let error = document.getElementById("errorHidden");
  error.style.display = "inline";
}