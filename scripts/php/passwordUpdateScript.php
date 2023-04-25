<?php
  session_start();
  include '../../resources/database.php';
  if($_SERVER['REQUEST_METHOD'] == "POST"){
      $user_id = $_SESSION["user_id"];
      $newPassword = password_hash($_POST["password"], PASSWORD_DEFAULT);
      $conn = connect();
      $query = "UPDATE app_user SET password='".$newPassword."' WHERE user_id='".$user_id."'";
      mysqli_query($conn, $query);
      disconnect($conn);
      header("location: ../../templates/account.php"); 
  }
?>