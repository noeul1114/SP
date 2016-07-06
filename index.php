<?php
session_start();
require 'Mcon.php';
require 'lib/article_db.php'
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>phpProject</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
</head>
  <body>
    <div class="container">
      <?php
      include 'header.php';
      echo '<br>';
      if (isset($_GET['pgreq'])!=NULL) {
        if ($_GET['pgreq']=='home') {
          include 'home.php';
        }
        if ($_GET['pgreq']=='info') {
          include 'info.php';
        }
        if ($_GET['pgreq']=='a_board') {
          include 'board/a.php';
        }
        if ($_GET['pgreq']=='b_board') {
          include 'board/b.php';
        }
        if ($_GET['pgreq']=='c_board') {
          include 'board/c.php';
        }
      }
      else {
        include 'home.php';
      }
      ?>
      <hr>
      <footer class="text-right" id="footer">
        <div class="row">
          <div class="col-sm-6"></div>
          <div class="col-sm-2">건의게시판</div>
          <div class="col-sm-2">운영원칙</div>
          <div class="col-sm-2">제휴문의</div>
        </div>
        <div class="row">
          <div id="copyright" class="col-xs-12">
              Say::Project Copyright All rights reserved
          </div>
        </div>
      </footer>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
