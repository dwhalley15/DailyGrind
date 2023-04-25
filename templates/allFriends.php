<?php
  $user_id = $_SESSION['user_id'];
  $query = mysqli_query($conn, 
            "SELECT u.user_id, u.full_name, u.theme
            FROM app_user u
            INNER JOIN friend_list f ON u.user_id = f.user_id_req OR u.user_id = f.user_id_rec
            WHERE (f.user_id_req = $user_id OR f.user_id_rec = $user_id) AND u.user_id != $user_id AND f.accepted = 'true'");
  if(mysqli_num_rows($query) == 0){
    echo "<p>You currently have no friends.</p>";
  }
  else{
    echo "<ol class='friendList'>";
    while($row = mysqli_fetch_assoc($query)){
      switch($row['theme']){
        case "light":
          $avatar = "avatarblack";
          break;
        default:
          $avatar = "avatarwhite";
      }
      echo 
        "<li class='friends'>
        <img class='smallAvatar' src='../images/$avatar.png'>
        <h5>".$row['full_name']."</h4>
        <a href='../scripts/php/removeFriendScript.php?user_id=".$row['user_id']."' id='deleteIconSmall'></a>
        </li>";
    }
    echo "</ol>";
  }
?>