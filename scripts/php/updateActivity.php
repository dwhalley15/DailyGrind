<?php
session_start();

$_SESSION['task_update_error'] = "false";
$_SESSION['task_update_error_text'] = "";

$_SESSION['task_date_error'] = "false";
$_SESSION['task_date_error_text'] = "";

if(!empty($_POST) && isset($_POST)){
  $activity_id = htmlspecialchars($_POST["activity_id"]);
  $name = htmlspecialchars($_POST["name"]);
  $description = htmlspecialchars(trim($_POST["description"]));
  $type = htmlspecialchars(trim($_POST["type"]));
  $startTime = htmlspecialchars(trim($_POST["startTime"]));
  $endTime = htmlspecialchars(trim($_POST["endTime"]));
  $user_id = $_SESSION['user_id'];

  $state = 'active';
  if(isset($_POST["completedCheckbox"])) $state = htmlspecialchars(trim($_POST["completedCheckbox"]));
  
  include '../../resources/database.php';

  $conn = connect();

  $checkTimesQuery = "SELECT activity_id, start, end FROM activity WHERE user_id = '".$user_id."' AND state = 'active'";
  $activities = mysqli_fetch_all(mysqli_query($conn, $checkTimesQuery), MYSQLI_ASSOC);
  foreach($activities as $activity){
    if(!($activity['start'] > $endTime || $activity['end'] < $startTime) && !($activity['activity_id'] == $activity_id)){
      $_SESSION['task_date_error'] = "true";
      $_SESSION['task_date_error_text'] = "This date overlaps with another task";
      header("location: ../../templates/account.php");
      exit;
    }
  }

  try{
    $update_score = false;
    $score_query1 = "SELECT state FROM activity WHERE activity_id = '$activity_id'";
    $score_query1_result = mysqli_fetch_all(mysqli_query($conn, $score_query1), MYSQLI_ASSOC)[0]['state'];
    if($score_query1_result != "completed" && $state == "completed") $update_score = true;
    $query = "UPDATE activity SET name = '".$name."', description = '".$description."', 
                         category = '".$type."', start = '".$startTime."', 
                         end = '".$endTime."', state = '".$state."'
                         WHERE activity_id = '".$activity_id."'";
    mysqli_query($conn, $query);
  } catch (PDOException $ex){
    $_SESSION['task_update_error'] = "true";
    $_SESSION['task_update_error_text'] = "could not update task: MySQL error: " . $ex->getMessage();
    exit;
    header("location: ../../templates/account.php");
  }

  try{
    if($update_score){ //Update the users score if the activity has been completed
      $score_query2 = "SELECT score FROM app_user WHERE user_id = '$user_id'";
      $score_query2_result = mysqli_fetch_all(mysqli_query($conn, $score_query1), MYSQLI_ASSOC)[0]['score'];
      $score = $score_query2_result + 1;
      $query2 = "UPDATE app_user SET score = '".$score."' WHERE user_id = '".$user_id."'";
      mysqli_query($conn, $query2);
    }
  } catch (PDOException $ex){
    $_SESSION['task_update_error'] = "true";
    $_SESSION['task_update_error_text'] = "could not update the users score: MySQL error: " . $ex->getMessage();
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