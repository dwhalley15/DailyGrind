<?php
  session_start();
  include '../../resources/database.php';
  if($_SERVER['REQUEST_METHOD'] == "POST"){
      $user_id = $_SESSION['user_id'];
      $newFullName = $_POST["fullName"];
      $newTheme = $_POST["theme"];
      $conn = connect();
      $query = "UPDATE app_user SET full_name='".$newFullName."', theme='".$newTheme."' WHERE user_id='".$user_id."'";
      mysqli_query($conn, $query);
      $_SESSION['name'] = $newFullName;
      $_SESSION['theme'] = $newTheme;
      disconnect($conn);
      header("location: ../../templates/account.php"); 
  }
?>