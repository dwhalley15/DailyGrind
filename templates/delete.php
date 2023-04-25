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
    <p>Are you sure you want to permanently delete your account?</p>
  </div>
  <div class='container'>
        <a href="../scripts/php/deleteAccountScript.php" id="yesIcon"></a>
        <a href="account.php" id="noIcon"></a>
      </div>
</div>
  
</body>
