<?php
session_start();
require 'mysql_db.php';
$DATA = new mysql_db;

if(($_SERVER["REQUEST_METHOD"] == "POST")&&($DATA->MATCH_TABLE($_POST['table']))){
  $check_table = addslashes($_POST['table']);

  $DATA->DROP_TABLE($check_table);

  echo "<script>window.alert('".$check_table." TABLE이 제거되었습니다');</script>";
  echo "<script>location.href='mysql_interface.php';</script>";

}
else if($_SERVER["REQUEST_METHOD"] == "POST") {
  $DATA->CREATE_TABLE($_POST['table']);
}
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MYSQL INTERFACE</title>
    <link rel="stylesheet" href="http://localhost/public/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="sqlcss.css">
    <title>MYSQL INTERFACE</title>
  </head>
  <body>
    <div class="container text-center">
      <header>
        <h1 class="jumbotron" id="mysqltitle">MYSQL 제어판</h1>
      </header>
        <div class="row">
          <form method="POST" action=""><br><input name="table" type="text"><br><br>
            <button type="submit" class="btn">Create/Drop</button><br>
          </form>
            <table class="table">
              <thead>
                <th>#</th>
                <th>table</th>
                <th>drop</th>
              </thead>
              <tbody>
                <?php $DATA->SHOW_TABLES(); ?>
              </tbody>
            </table>
        </div>
      <div class="row">
        <h2>Users</h2>
        <table class="table">
          <thead>
            <th>num</th>
            <th>ID</th>
            <th>EM</th>
            <th>PW</th>
            <th>AG</th>
            <th>PT</th>
            <th>VA</th>
            <th>WA</th>
            <th>WC</th>
            <th>JD</th>
            <th>DROP</th>
          </thead>
          <tbody>
            <?php $DATA->SELECT_FROM_USERS(); ?>
          </tbody>
        </table>
      </div>
      <div class ="col-lg-12"><h4><a href="../../public">To SP</a></h4></div>
      <hr>
      <div class="row">
          <p>Say::Project Copyright All rights reserved.</p>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="//localhost/public/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
