<?php
session_start();

include '../../resources/database.php';
$conn = connect();

$user_id = $_SESSION['user_id'];
$query = "SELECT friend_list.user_id_rec, app_user.full_name, app_user.score FROM friend_list 
          JOIN app_user ON friend_list.user_id_rec = app_user.user_id 
          WHERE accepted = 'true' AND user_id_req = $user_id";
$leaderBoardElements = mysqli_fetch_all(mysqli_query($conn, $query), MYSQLI_ASSOC);

foreach($element as $leaderBoardElements){
    if($element['score'] > $_SESSION['score']){
        echo "<li class='friends' name='friendLeaderBoard'> 
              <h5>".$element['name']."</h5>
              <img class='smallAvatar' src='../images/$delete.png'>
              </li>";
    }
}
?>