<?php
  session_start();
  if(!isset($_SESSION['dglogin']) || $_SESSION['dglogin'] !== true){
    header("location: home.php");
    exit;
  }
  include "header.php";
?>
<div class="misc">
  <div class='container'>
    <a href="home.php" id="dailyGrindWords"></a>
  </div>
    <br><br>
    <div class='container'>
    <form class="passwordForm" name="passwordForm" method="post" action="../scripts/php/passwordUpdateScript.php">
      <input type="password" class="textInput" id="password" name="password" placeholder="Password" maxlength="255" required>
      <input type="password" class="textInput" id="passwordConfirm" name="passwordConfirm" placeholder="Confirm Password" maxlength="255" required>
      <br><br>
      <p id='errorHidden'>All fields must be completed and filled in correctly!</p>
      <br><br>
      <input type="submit" class="submitBtn" id="passwordIcon" value="">
    </form>
  </div>
</div>
  
<script src="../scripts/js/password.js"></script>
</body>
