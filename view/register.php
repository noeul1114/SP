<?php
session_start();
require "../Mcon.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $check_ID = addslashes($_POST['ID']);
  $check_PW = addslashes($_POST['PW']);
  $check_PW_CON = addslashes($_POST['PW_CON']);
  $check_EM = strtolower(addslashes($_POST['EM']));
  $check_AG = addslashes($_POST['AG']);

  $check = new mysql_func;

  $ToF = $check->REGISTER_CHECK_ID($check_ID);
  if($ToF==1)
  {
    echo "<script>window.alert('중복 아이디가 존재합니다');</script>";
    echo "<script>window.history.back();</script>";
  }
  $ID_C = $ToF;

  $ToF = $check->REGISTER_CHECK_EM($check_EM);
  if($ToF==1)
  {
    echo "<script>window.alert('중복 이메일이 존재합니다');</script>";
    echo "<script>window.history.back();</script>";
  }
  $EM_C = $ToF;

  if($check_PW!=$check_PW_CON)
  {
    echo "<script>window.alert('비밀번호가 맞지 않습니다');</script>";
    echo "<script>window.history.back();</script>";
  }

  if(($check_PW==$check_PW_CON)&&($ID_C==0)&&($EM_C==0))
  {
    $ToF = $check->REGISTER($check_ID, $check_EM, $check_PW, $check_AG);
  }

  if($ToF==true)
  {
    header("location: success.php");
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
              <input type="text" name="ID" class="form-control" placeholder="아이디를 입력해주세요">
            </div>
          </div>
          <div class="row">
            <div class="col-xs-8 form-group">
              <label>Email</label>
              <input type="email" name="EM" class="form-control" placeholder="이메일을 입력해주세요">
            </div>
          </div>
          <div class="row">
            <div class="col-xs-6 form-group">
              <label>Password</label>
              <input type="password" name="PW" class="form-control" placeholder="비밀번호를 입력해주세요">
            </div>
          </div>
          <div class="row">
            <div class="col-xs-6 form-group">
              <label>Password</label>
              <input type="password" name="PW_CON" class="form-control" placeholder="비밀번호 확인">
            </div>
          </div>
          <div class="row">
            <div class="col-xs-4 form-group">
              <label>Age</label>
              <input type="number" name="AG" class="form-control" placeholder="나이를 입력해주세요">
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
