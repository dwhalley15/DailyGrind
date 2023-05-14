<?php
  $user_id = $_SESSION['user_id'];
  $result = mysqli_query($conn, "SELECT * FROM app_user WHERE user_id = '$user_id'");
  $account = mysqli_fetch_assoc($result);
?>
<br>
<div id="avatar"></div>
<form class="profileUpdateForm" name="profileUpdateForm" method="post" action="../scripts/php/updateScript.php">
      <input type="text" class="textInput" id="status" name="status" placeholder="status" maxlength="255" value="Account Status: <?php echo $account['status']?>" disabled>
      <input type="text" class="textInput" id="fullName" name="fullName" placeholder="Full Name" maxlength="255" value="<?php echo $account['full_name']?>" required>
      <input type="hidden" name="theme" id="theme" value="<?php echo $account['theme']?>" required>
      <select class="themes" id="themes"><?php if($account['status'] == "premium"){ 
  echo "
         <option class='options' value='default' ";if($account['theme'] == "default") echo "selected";  echo ">Dark Mode</option>
         <option class='options' value='light' ";if($account['theme'] == "light") echo "selected";  echo ">Light Mode</option>
         <option class='options' value='retro' ";if($account['theme'] == "retro") echo "selected";  echo ">Retro Theme</option>
         <option class='options' value='forest' ";if($account['theme'] == "forest") echo "selected";  echo ">Forest Theme</option>
         <option class='options' value='blue' ";if($account['theme'] == "blue") echo "selected";  echo ">Ocean Mode</option>
         <option class='options' value='pale' ";if($account['theme'] == "pale") echo "selected";  echo ">Pantone Mode</option>
        ";}
      else{
        echo "
         <option class='options' value='default' ";if($account['theme'] == "default") echo "selected";  echo ">Dark Mode</option>
         <option class='options' value='light' ";if($account['theme'] == "light") echo "selected";  echo ">Light Mode</option>
         <option class='options' value='blue' ";if($account['theme'] == "blue") echo "selected";  echo ">Ocean Mode</option>
         <option class='options' value='pale' ";if($account['theme'] == "pale") echo "selected";  echo ">Pantone Mode</option>
        ";
      }
  ?></select> 
      <br><br>
      <p id='errorHidden'>All fields must be completed and filled in correctly!</p>
      <br><br>
      <input type="submit" class="submitBtn" id="updateIcon" value="">
</form>
<br><br>
<div class="container">
  <a href="password.php" id="passwordIcon"></a>
  <a href="delete.php" id="deleteIcon"></a>
</div>
<script src="../scripts/js/profile.js"></script>
