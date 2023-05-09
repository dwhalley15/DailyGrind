<?php
session_start();
$_SESSION['task_date_error'] = "false";
$_SESSION['open_task_form'] = false;

if(!empty($_GET) && isset($_GET)){
  $activity_id = htmlspecialchars($_GET["activity_id"]);
  
  include '../../resources/database.php';

  $conn = connect();
  $deleteQuery = "DELETE FROM activity WHERE activity_id = '".$activity_id."'";
  mysqli_query($conn, $deleteQuery);
  disconnect($conn);
  header("location: ../../templates/account.php");
  exit;
} else {
    header("location: ../../templates/account.php");
    exit;
}
?>