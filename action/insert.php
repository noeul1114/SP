<?php
include "../module/db_info.php";

$query = "SELECT max(THD) FROM $board";
$max_THD_result = mysqli_query($conn, $query);
$max_THD_fetch = mysqli_fetch_row($max_THD_result);
$max_THD = ceil($max_THD_fetch[0]/1000)* 1000+1000;


$query = "INSERT intO $board (board_name, THD, DPT, WRT, PW, EM, HL, VW, C_AT, IP, DESCR)
VALUES ('$_POST[board_name]', $max_THD, 0, '$_POST[WRT]', '$_POST[PW]', '$_POST[EM]', '$_POST[HL]', 0, UNIX_TIMESTAMP(),'$_SERVER[REMOTE_ADDR]', '$_POST[DESCR]')";
$result=mysqli_query($conn, $query);

@mysqli_close($conn);

echo("<meta http-equiv='Refresh' content='1; URL=../?pgreq=board&board=a'>");
?>
<center>
  <font size=2>정상적으로 저장됨</font>
