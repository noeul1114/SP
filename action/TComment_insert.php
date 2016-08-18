<?php
 $LI = mysqli_connect('localhost','root','qudtlstz1','SP') or die ('fail to connect');
 mysqli_query($LI, "set names utf8");

 $QY = "INSERT into t_comment (COMMENT , ip)";
 $QY .= "VALUES ('$_POST[COMMENT]','$_SERVER[REMOTE_ADDR]')";

 $RS = mysqli_query($LI, $QY);

echo("<meta http-equiv='Refresh' content='0; URL=../?pgreq=todaycomment'>");
 ?>
