<?php
$LI = mysqli_connect('localhost','root','qudtlstz1','SP') or die ('fail to connect');
mysqli_query($LI, "set names utf8");

$QY = "UPDATE t_comment SET VT = VT+1 WHERE num = '$_POST[num]'";

$RS = mysqli_query($LI, $QY);

echo("<meta http-equiv='Refresh' content='0; URL=../?pgreq=todaycomment'>");
?>
