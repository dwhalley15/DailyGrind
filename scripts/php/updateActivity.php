<?php
session_start();

if(!empty($_POST) && isset($_POST)){
  $activity_id = htmlspecialchars($_POST["activity_id"]);
  $name = htmlspecialchars($_POST["name"]);
  $description = htmlspecialchars(trim($_POST["description"]));
  $type = htmlspecialchars(trim($_POST["type"]));
  $startTime = htmlspecialchars(trim($_POST["startTime"]));
  $endTime = htmlspecialchars(trim($_POST["endTime"]));
  $state = htmlspecialchars(trim($_POST["state"]));
  $user_id = $_SESSION['user_id'];
  $_SESSION['open_task_form'] = "true";
  
  include '../../resources/database.php';

  $conn = connect();

  $update_score = false;
  $score_query1 = "SELECT state FROM activity WHERE activity_id = '$activity_id'";
  $score_query1_result = mysqli_fetch_all(mysqli_query($conn, $score_query1), MYSQLI_ASSOC)['state'];
  if($score_query1_result != "active" && $state == "active") $update_score = true;

  try{
    $query = "UPDATE activity (name, description, category, start, end, state) 
                VALUES ('".$name."', '".$description."', '".$type."', '".$startTime."', '".$endTime."', '".$state."')
                WHERE activity_id = '".$activity_id."'";
    mysqli_query($conn, $query);
  } catch(Exception $ex){
    exit;
    header("location: ../../templates/account.php");
  }

  if($update_score){ //Update the users score if the activity has been completed
    $score_query2 = "SELECT score FROM app_user WHERE user_id = '$user_id'";
    $score_query2_result = mysqli_fetch_all(mysqli_query($conn, $score_query1), MYSQLI_ASSOC)['score'];
    $score = $score_query2_result + 1;
    $query2 = "UPDATE app_user (score) VALUES ('".$score."') WHERE user_id = '".$user_id."'";
    mysqli_query($conn, $query2);
  }

  disconnect($conn);
  header("location: ../../templates/account.php");
  exit;
} else{
    $_SESSION['task_update_error'] = "true";
    $_SESSION['task_update_error_text'] = "Post error occurred while trying to create a new task";
    header("location: ../../templates/account.php");
    exit;  
}
?>