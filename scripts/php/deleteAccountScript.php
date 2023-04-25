<?php
  session_start();
  include '../../resources/database.php';
  $user_id = $_SESSION["user_id"];
  $conn = connect();
  $query = "DELETE FROM app_user WHERE user_id=$user_id";
  mysqli_query($conn, $query);
  disconnect($conn);
  $_SESSION = array();
  session_destroy();
  header("location: ../../templates/home.php");
  exit;
?>