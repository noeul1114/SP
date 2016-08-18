<?php
    $board = "board";
	  $conn = mysqli_connect("localhost", "root", "autoset", "sp") or die ('MYSQL Connection Failure');
  	mysqli_query($conn, 'set names utf8');
