<?php
  session_start();
  if(!empty($_GET) && isset($_GET)){
    include '../../resources/database.php';
    $current_user_id = $_SESSION["user_id"];
    $friend_user_id = $_GET['user_id'];
    $conn = connect();
    $query = "DELETE FROM friend_list WHERE user_id_req=$friend_user_id AND user_id_rec=$current_user_id OR user_id_req=$current_user_id AND user_id_rec=$friend_user_id";
    mysqli_query($conn, $query);
    header("location: ../../templates/account.php");
    disconnect($conn);
  }
  else{
    header("location: ../../templates/account.php");
  }
?>