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
  <div class='container'>
    <form class="upgrade" name="upgrade" method="post" action="../scripts/php/upgradeScript.php">
      <input type="text" class="textInput" id="cardNumber" name="cardNumber" placeholder="Does not take card details at this point" maxlength="255" disabled>
      <input type="text" class="textInput" id="expiryDate" name="expiryDate" placeholder="Expiry Date" maxlength="255" disabled>
      <input type="text" class="textInput" id="CVV" name="CVV" placeholder="CVV" maxlength="255" disabled>
      <input type="submit" class="submitBtn" id="upgradeIcon" value="">
    </form>
  </div>
</div>