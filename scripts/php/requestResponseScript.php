<?php
  session_start();
  if(!empty($_GET) && isset($_GET)){
    include '../../resources/database.php';
    $current_user_id = $_SESSION["user_id"];
    $friend_user_id = $_GET['user_id'];
    $request_response = $_GET['response'];
    $conn = connect();
    if($request_response == "accept"){
      $query = "UPDATE friend_list SET accepted='true' WHERE user_id_req='".$friend_user_id."' AND user_id_rec='".$current_user_id."'";
      mysqli_query($conn, $query);
      header("location: ../../templates/account.php");
    }
    else if($request_response == "deny"){
      $query = "DELETE FROM friend_list WHERE user_id_req=$friend_user_id AND user_id_rec=$current_user_id";
      mysqli_query($conn, $query);
      header("location: ../../templates/account.php");
    }
    disconnect($conn);
  }
  else{
    header("location: ../../templates/account.php");
  }
?>