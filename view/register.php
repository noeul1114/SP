<?php
session_start();
require "../Mcon.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $check_ID = addslashes($_POST['name']);
  $check_PW = addslashes($_POST['pw']);

  $checking = new mysql_func;

  $ToF = $checking->login($check_ID,$check_PW);

  if($ToF==1)
  {
    $_SESSION['login_user']=$check_ID;

    header("location: ../index.php");
  }
  else {
    echo "<script>window.alert('아이디 혹은 비밀번호가 잘못되었습니다');</script>";
    echo "<script>location.href='login.php';</script>";
  }

}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Say::project 가입신청</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <title>Register</title>
  </head>
  <body>
    <br>
    <div class="container" id="registercontainer">
      <h2 class="text-center">회원가입 신청</h2>
      <div class="panel panel-default" id="registerform">
        <form method="post" action="">
          <div class="row">
            <div class="col-xs-6 form-group">
              <label>ID</label>
              <input type="text" class="form-control" placeholder="아이디를 입력해주세요">
            </div>
          </div>
          <div class="row">
            <div class="col-xs-8 form-group">
              <label>Email</label>
              <input type="email" class="form-control" placeholder="이메일을 입력해주세요">
            </div>
          </div>
          <div class="row">
            <div class="col-xs-6 form-group">
              <label>Password</label>
              <input type="password" class="form-control" placeholder="비밀번호를 입력해주세요">
            </div>
          </div>
          <div class="row">
            <div class="col-xs-4 form-group">
              <label>Age</label>
              <input type="number" class="form-control" placeholder="나이를 입력해주세요">
            </div>
          </div>
          <br><br>
          <hr>
            <p class="help-block">Say::Project 는 최소한의 개인정보만을 수집합니다.</p>
          <hr>
          <br>
          <button type="submit" class="btn btn-info">Submit</button>
        </form>
      </div>
    </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
