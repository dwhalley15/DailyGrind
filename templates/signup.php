<?php
  session_start();
  if(isset($_SESSION['dglogin']) && $_SESSION['dglogin'] === true){
    header("location: account.php");
    exit;
  }
  include "header.php";
?>
<div class="misc">
  <div class='container'>
    <a href="home.php" id="dailyGrindWords"></a>
  </div>
  <div class='container'>
    <form class="signupForm" name="signup" method="post" action="../scripts/php/signupScript.php">
      <input type="text" class="textInput" id="fullName" name="fullName" placeholder="Full Name" maxlength="255" required>
      <input type="email" class="textInput" id="email" name="email" placeholder="Email Address" maxlength="255" required>
      <input type="password" class="textInput" id="password" name="password" placeholder="Password" maxlength="255" required>
      <input type="password" class="textInput" id="passwordConfirm" name="passwordConfirm" placeholder="Confirm Password" maxlength="255" required>
      <input type="submit" class="submitBtn" id="signupIcon" value="">
      <p id='errorHidden'>All fields must be completed and filled in correctly!</p>
    </form>
  </div>
</div>
<script src="../scripts/js/signup.js"></script>
</body>
