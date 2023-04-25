<?php
  session_start();
  if(!empty($_GET) && isset($_GET)){
    include '../../resources/database.php';
    $current_user_id = $_SESSION["user_id"];
    $friend_user_id = $_GET['user_id'];
    $conn = connect();
    $query = "INSERT INTO friend_list (user_id_req, user_id_rec, accepted) VALUES ('".$current_user_id."', '".$friend_user_id."', 'false')";
    mysqli_query($conn, $query);
    disconnect($conn);
    header("location: ../../templates/account.php");
  }
  else{
    header("location: ../../templates/account.php");
  }
?>