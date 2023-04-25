<?php
  $user_id = $_SESSION['user_id'];
  $query = mysqli_query($conn, 
            "SELECT f.*, u.user_id, u.full_name, u.theme
            FROM friend_list f 
            INNER JOIN app_user u ON f.user_id_req = u.user_id 
            WHERE f.user_id_rec = ".$user_id." AND f.accepted = 'false'");
  if(mysqli_num_rows($query) == 0){
    echo "<p>No friend requests at this time.</p>";
  }
  else{
    echo "<ol class='friendRequestList'>";
    while($row = mysqli_fetch_assoc($query)){
      switch($row['theme']){
        case "light":
          $avatar = "avatarblack";
          break;
        default:
          $avatar = "avatarwhite";
      }
      echo 
        "<li class='friendRequests'>
        <img class='smallAvatar' src='../images/$avatar.png'>
        <h5>".$row['full_name']."</h4>
        <a href='../scripts/php/requestResponseScript.php?user_id=".$row['user_id']."&response=accept' id='yesIconSmall'></a>
        <a href='../scripts/php/requestResponseScript.php?user_id=".$row['user_id']."&response=deny' id='noIconSmall'></a>
        </li>";
    }
    echo "</ol>";
  }
?>