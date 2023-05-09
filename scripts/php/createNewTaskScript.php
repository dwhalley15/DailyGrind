<?php
session_start();

if(!empty($_POST) && isset($_POST)){
  $name = htmlspecialchars($_POST["name"]);
  $description = htmlspecialchars(trim($_POST["description"]));
  $type = htmlspecialchars(trim($_POST["type"]));
  $startTime = htmlspecialchars(trim($_POST["startTime"]));
  $endTime = htmlspecialchars(trim($_POST["endTime"]));
  $user_id = $_SESSION['user_id'];
  $_SESSION['open_task_form'] = "true";
  
  include '../../resources/database.php';

  $conn = connect();

  $checkTimesQuery = "SELECT activity_id, start, end FROM activity WHERE user_id = '".$user_id."'";
  $activities = mysqli_fetch_all(mysqli_query($conn, $checkTimesQuery), MYSQLI_ASSOC);
  foreach($activities as $activity){
    if(!($activity['start'] > $endTime || $activity['end'] < $startTime)){
        $_SESSION['task_date_error'] = "true";
        $_SESSION['task_date_error_text'] = "This date overlaps with another task";
        header("location: ../../templates/account.php");
        exit;
    }
  }
  
  $query = "INSERT INTO activity (user_id, name, description, category, start, end, state) VALUES ('".$user_id."', '".$name."', '".$description."', '".$type."', '".$startTime."', '".$endTime."', 'active')";
  mysqli_query($conn, $query);
  disconnect($conn);
  $_SESSION['task_date_error'] = "false";
  $_SESSION['open_task_form'] = false;
  header("location: ../../templates/account.php");
  exit;
} else{
    $_SESSION['task_date_error'] = "true";
    $_SESSION['task_date_error_text'] = "Post error occurred while trying to create a new task";
    header("location: ../../templates/account.php");
    exit;  
}
?>