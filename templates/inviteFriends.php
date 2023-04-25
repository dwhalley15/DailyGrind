<?php
  $user_id = $_SESSION['user_id'];
  $query = mysqli_query($conn, 
                        "SELECT DISTINCT au.user_id, au.full_name, au.theme
                        FROM app_user AS au
                        LEFT JOIN friend_list AS fl
                        ON (au.user_id = fl.user_id_req AND fl.user_id_rec <> ".$user_id.") OR (au.user_id = fl.user_id_rec AND fl.user_id_req <> ".$user_id.")
                        WHERE NOT EXISTS (SELECT 1 FROM friend_list WHERE (user_id_req = au.user_id AND user_id_rec = ".$user_id.") OR (user_id_req = ".$user_id." AND user_id_rec = au.user_id))
                        AND au.user_id <> ".$user_id."");
  if(mysqli_num_rows($query) == 0){
    echo "<p>There are currently no other users to add.</p>";
  }
  else{
    echo "<ol class='friendInvitesList'>";
    while($row = mysqli_fetch_assoc($query)){
      switch($row['theme']){
        case "light":
          $avatar = "avatarblack";
          break;
        default:
          $avatar = "avatarwhite";
      }
      echo 
        "<li class='potentialFriends'>
            <img class='smallAvatar' src='../images/$avatar.png'>
            <h5>".$row['full_name']."</h4>
            <a href='../scripts/php/inviteFriendScript.php?user_id=".$row['user_id']."' id='addFriendIcon'></a>
          </li>";
    }
    echo "</ol>";
  }
?>