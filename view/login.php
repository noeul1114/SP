<?php
include "../lib/library.php";
if(!isset($_SESSION))
    {
        session_start();
    }
require "../Mcon.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(!ctype_alnum($_POST['name'])){
    ErrorMessage("허용하지 않는 아이디를 입력하셨습니다.");
    }
  $check_ID =  $_POST['name'];
  $check_PW =  magic_quotes($_POST['pw']);

  $checking = new mysql_func;
  $ToF = $checking->login($check_ID,$check_PW);

  if($ToF==1)
  {
    $_SESSION['login_user']=$check_ID;

    header("location: ../index.php");
  }
  else {
    ErrorMessage("아이디 혹은 비밀번호가 잘못되었습니다");
  }

}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>phpProject</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <title>login</title>
  </head>
  <body>
    <div class="container" id="loginalign">
      <h2>Login</h2>
      <hr>
    <form method="post" action="">
      <div class="row">
        <div class="col-xs-3"></div>
        <div class="col-xs-6">ID
          <input class="form-control" placeholder="ID" type="text" name="name">
        </div>
      </div>
      <div class="row">
        <div class="col-xs-3"></div>
        <div class="col-xs-6">PW
          <input class="form-control" placeholder="PW" type="password" name="pw">
        </div>
      </div>
      <hr>
      <div class="row">
        <button type="submit" class="btn btn-success">Confirm
        </button>
        <button type="button" class="btn btn-info">
          <a href="register.php">
            <font color="white">Register</font>
          </a>
        </button>
      </div>
    </form>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
