<?php
$conn = connect();
$user_loaded = false;

$user_id = $_SESSION['user_id'];
$query = "SELECT friend_list.user_id_rec, app_user.full_name, app_user.score FROM friend_list 
        JOIN app_user ON friend_list.user_id_req = app_user.user_id 
        WHERE accepted = 'true' AND friend_list.user_id_rec = $user_id
        UNION
        SELECT friend_list.user_id_rec, app_user.full_name, app_user.score FROM friend_list 
        JOIN app_user ON friend_list.user_id_rec = app_user.user_id 
        WHERE accepted = 'true' AND user_id_req = $user_id;";
$leaderBoardElements = mysqli_query($conn, $query);

$query2 = "SELECT * FROM app_user WHERE user_id = $user_id";
$user_info = mysqli_fetch_all(mysqli_query($conn, $query2), MYSQLI_ASSOC);


$avatar = "";
switch($_SESSION['theme']){
    case "light":
        $avatar = "avatarblack";
        break;
    case "blue":
        $avatar = "avatarblack";
        break;
    case "pale":
        $avatar = "avatarpale";
        break;    
    default:
        $avatar = "avatarwhite";
}


while($element = mysqli_fetch_assoc($leaderBoardElements)){
    if(!isset($element['score'])) break;
    if($element['score'] <= $user_info[0]['score'] && $user_loaded = false){
        echo "<li class='friends2' name='friendLeaderBoard'> 
                <h5>".$user_info[0]['full_name']." |  score: ".$user_info[0]['score']."</h5> 
                <img class='smallAvatar' src='../images/$avatar.png'>
                </li>";
        $user_loaded = true;
    }
    echo "<li class='friends3' name='friendLeaderBoard'> 
        <h5>".$element['full_name']." |  score: ".$element['score']."</h5>
        <img class='smallAvatar' src='../images/$delete.png'>
        </li>";
}

if(!$user_loaded){
    echo "<li class='friends2' name='friendLeaderBoard'> 
          <h5>".$user_info[0]['full_name']." |  score: ".$user_info[0]['score']."</h5> 
          <img class='smallAvatar' src='../images/$delete.png'>
          </li>";
}
?>