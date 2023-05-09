<?php
  $user_id = $_SESSION['user_id'];
  $query = mysqli_query($conn, 
            "SELECT *
            FROM activity
            WHERE user_id = $user_id");
  if(mysqli_num_rows($query) == 0){
    echo "<p>You currently have no activities.</p>";
  }
  else{
    echo "<ul class='taskList, friendList'>";
    while($row = mysqli_fetch_assoc($query)){
    switch($_SESSION['theme']){
        case "light":
            $delete = "deleteBlack";
            break;
        default:
            $delete = "deleteWhite";
        }
      echo 
        "<li class='friends' name='activity' onclick='showPopUp(".$row['activity_id'].")'> 
        <h5>".$row['name']."</h5> 
        <a href='../scripts/php/deleteActivity.php?activity_id=".$row['activity_id']."'>
        <img class='smallAvatar' src='../images/$delete.png'>
        </a>
        </li>";

      echo
        "<div class='container, popup' id='".$row['activity_id']."'>
          <div class='popup-content'>
            <button id='myButton' onclick='removePopUp(".$row['activity_id'].")'>Click me</button>
            <form class='task' name='tastCreationForm' id='form_".$row['activity_id']."' method='post' action=<?php echo htmlspecialchars('../scripts/php/updateActivity.php'); ?>
              <input type='text' class='textInput' id='activity_id' name='activity_id' value='" .$row['activity_id']. "' hidden>
              <input type='text' class='textInput' id='name' name='name' placeholder='name' maxlength='20' value=" .$row['name']. " required>
              <input type='text' class='textInput' id='description' name='description' placeholder='name' maxlength='255' value='" .$row['description']. "' required>

              <select class='textInput' id='type' name='type' placeholder='name' maxlength='255' value='" .$row['category']. "' required>
                  <option value='task'>task</option>
                  <option value='study'>study</option>
                  <option value='exercise'>exercise</option>
                  <option value='social'>social</option>
                  <option value='clean'>clean</option>
                  <option value='eat'>eat</option>
                  <option value='drink'>drink</option>
                  <option value='meditate'>meditate</option>
              </select> 

              <input type='date' class='textInput' id='startTime' name='startTime' placeholder='name' maxlength='10' required
              maxlength='10' required required pattern = '[0-3][0-9]-[0-1][0-9]-[0-9]{4}' value='".$row['start'] . "'>
              <input type='date' class='textInput' id='endTime' name='endTime' placeholder='name' maxlength='10' required
              maxlength='10' required required pattern = '[0-3][0-9]-[0-1][0-9]-[0-9]{4}' value='".$row['end'] . "'>
              
              <select class='textInput' id='state' name='state' placeholder='state' maxlength='255' value='".$row['state'] . "' required>
                  <option value='active'>active</option>
                  <option value='completed'>completed</option>
                  <option value='abondoned'>abondoned</option>
              </select>

              <br><br>
              <input onclick='submitTaskForm(\"form_".$row['activity_id']."\")' type='button' class='btn, navItem' id='update_task' value='Update'>
            </form>
          </div>
        </div>";
    }
    echo "</ul>";
  }
?>