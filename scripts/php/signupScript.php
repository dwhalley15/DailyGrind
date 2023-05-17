<?php

session_start();

if(!empty($_POST) && isset($_POST)){
  
  $fullName = $_POST["fullName"];
  $email = $_POST["email"];
  $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
  $status = "free";
  $score = 0;
  $newUser = "true";
  $theme = "default";
  
  include '../../resources/database.php';

  $conn = connect();
  $result = mysqli_query($conn, "SELECT count(*) AS count_all FROM app_user WHERE email_address='$email'");
  $row = mysqli_fetch_array($result);
  $count = $row['count_all'];
  
  if($count == 0){
    $query = "INSERT INTO app_user (full_name, email_address, password, status, score, new_user, theme) VALUES ('".$fullName."', '".$email."', '".$password."', '".$status."', '".$score."', '".$newUser."', '".$theme."')";
    mysqli_query($conn, $query);
    $user_id = mysqli_insert_id($conn);
    disconnect($conn);
    $_SESSION['dglogin'] = true;
    $_SESSION['user_id'] = $user_id;
    $_SESSION['name'] = $fullName;
    $_SESSION['status'] = $status;
    $_SESSION['theme'] = $theme;
    header("location: ../../templates/account.php?signedUp=true");
  }
  else{
    header("location: ../../templates/signup.php");
    exit; 
  }
}
else{
  header("location: ../../templates/signup.php");
  exit;  
}
?>