<?php
session_start();
require 'Mcon.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>phpProject</title>
    <link rel="stylesheet" href="//localhost/public/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
</head>
  <body>
    <div class="container">
      <?php
      include 'header.php';
      echo '<br>';
      include 'info.php';
      ?>
      <hr>
      <footer class="text-center">Say::Project
      Copyright All rights reserved</footer>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="//localhost/public/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
