<?php
session_start();
require "../Mcon.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $check_name = addslashes($_POST['name']);
  $check_pw = addslashes($_POST['pw']);

  $checking = new mysql_func;

  $ToF = $checking->login($check_name,$check_pw);

  if($ToF==1)
  {
    $_SESSION['login_user']=$check_name;

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
    <title>phpProject</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <title>login</title>
  </head>
  <body>
    <div class="container"><h2>Login</h2>
    <form method="post" action="">
    <div>ID<input type="text"name="name"></div>
    <div>PW<input type="password" name="pw"></div>
    <div><button type="submit" class="btn btn-primary">Confirm</button>
      <button class="btn btn-primary"><a href="view/register">Register</a></button></div>
    </form>
  </div>
  </body>
</html>
