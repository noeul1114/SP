<?php
include "../module/db_info.php";


$new_parent_THD = ("$_POST[parent_THD]"-1);
$new_parent_DPT = $_POST['parent_DPT']+1;

$prev_parent_THD = ceil($_POST['parent_THD']/1000)*1000 - 1000;




$query = "UPDATE $board SET THD=THD-1 WHERE THD > $prev_parent_THD and THD < $_POST[parent_THD]";
$update_THD=mysqli_query($conn, $query);
$query = "INSERT INTO $board (THD,DPT,WRT,PW,EM";
$query .= ", HL, VW, C_AT, IP, DESCR)";
$query .= "VALUES ('" . $new_parent_THD . "'";

$query .= ",'" . $new_parent_DPT . "'";
//$query .=",'$HL',0,UNIX_TIMESTAMP(),$REMOTE_ADDR'";
//$query .= ",$new_parent_DPT ,$_POST[WRT],$_POST[PW], $_POST[EM]";

$query .= ", '$_POST[WRT]', '$_POST[PW]', '$_POST[EM]'";
$query .= ",'$_POST[HL]',0, UNIX_TIMESTAMP(), '$_SERVER[REMOTE_ADDR]'";
$query .= ",'$_POST[DESCR]')";
$result=mysqli_query($conn, $query);
mysqli_close($conn);

 echo("<meta http-equiv='Refresh' content='1; URL=../?pgreq=board&board=a'>");
?>
<center>
  <font size=2>정상적으로 저장됨</font>
