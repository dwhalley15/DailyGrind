<?php
session_start();
$_SESSION['task_delete_error'] = "false";
$_SESSION['task_delete_error_text'] = "";

if(!empty($_GET) && isset($_GET)){
  $activity_id = htmlspecialchars($_GET["activity_id"]);
  
  include '../../resources/database.php';

  $conn = connect();
  $deleteQuery = "DELETE FROM activity WHERE activity_id = '".$activity_id."'";
  mysqli_query($conn, $deleteQuery);

  try{
    $conn = connect();
    $deleteQuery = "DELETE FROM activity WHERE activity_id = '".$activity_id."'";
    mysqli_query($conn, $deleteQuery);
  } 
  catch (PDOException $ex){
    $_SESSION['task_delete_error'] = "true";
    $_SESSION['task_delete_error_text'] = "could not delete task: MySQL error: " . $ex->getMessage();
  }

  disconnect($conn);
  header("location: ../../templates/account.php");
  exit;
} else {
    $_SESSION['task_delete_error'] = "true";
    $_SESSION['task_delete_error_text'] = "could not delete task: GET request failed: unknown cause";
    header("location: ../../templates/account.php");
    exit;
}
?>