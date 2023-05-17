<?php
  session_start();
  include '../../resources/database.php';
  if($_SERVER['REQUEST_METHOD'] == "POST"){
      $user_id = $_SESSION['user_id'];
      $conn = connect();
      $query = "UPDATE app_user SET status='premium' WHERE user_id='".$user_id."'";
      mysqli_query($conn, $query);
      $_SESSION['status'] = 'premium';
      disconnect($conn);
      header("location: ../../templates/account.php"); 
  }
?>