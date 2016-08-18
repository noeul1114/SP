<?php
  GLOBAL $board;
  $board= "board";
	$conn = mysqli_connect("localhost", "root", "autoset");
	mysqli_select_db($conn, "sp");
	mysqli_query($conn, 'set names utf8');
