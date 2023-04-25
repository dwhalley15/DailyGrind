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
    <div id="dailyGrindLogo"></div>
  </div>
  <div class="container">
    <a href="login.php" id="loginIcon"></a>
    <a href="signup.php" id="signupIcon"></a>
  </div>
</div>
</body>
