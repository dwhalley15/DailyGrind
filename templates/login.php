<?php
  session_start();
  if(isset($_SESSION['dglogin']) && $_SESSION['dglogin'] === true){
    header("location: account.php");
    exit;
  }
  if($_SERVER['REQUEST_METHOD'] == "POST"){
      include '../resources/database.php';
      $email = $_POST['email'];
      $pass = $_POST['password'];
      $login_error = "";
      $conn = connect();
      $result = mysqli_query($conn, "SELECT user_id, full_name, email_address, password, status, theme FROM app_user WHERE email_address = '$email'");
      $account =  mysqli_fetch_array($result);
      if(!empty($account)){
        $verified = password_verify($pass, $account['password']);
      }
      disconnect($conn);
      if(empty($account)){
        $login_error = "This account does not exist";
      }
      else if(!$verified){
        $login_error = "Password is incorrect!";
      }
      else{
        $_SESSION['dglogin'] = true;
        $_SESSION['user_id'] = $account['user_id'];
        $_SESSION['name'] = $account['full_name'];
        $_SESSION['status'] = $account['status'];
        $_SESSION['theme'] = $account['theme'];
        header("location: account.php");
      }
    }
    include "header.php";
?>
<div class="misc">
  <div class='container'>
    <a href="home.php" id="dailyGrindWords"></a>
  </div>
  <div class='container'>
    <form class="loginForm" name="login" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <input type="email" class="textInput" id="email" name="email" placeholder="Email Address" maxlength="255" required>
      <input type="password" class="textInput" id="password" name="password" placeholder="Password" maxlength="255" required>
      <input type="submit" class="submitBtn" id="loginIcon" value="">
      <p class='errorShown'><?php if(!empty($login_error)) echo $login_error;?></p>
    </form>
  </div>
</div>
</body>
