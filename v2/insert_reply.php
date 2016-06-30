<?
include "db_info.php";

$prev_parent_thread = ceil($_POST[parent_thread]/1000)*1000 -1000;

$query = "UPDATE $board SET thread=thread-1 WHERE thread > $prev_parent_thread and thread M $_POST[parent_thread]";
$update_thread=mysql_query($query,$conn);
$query = "INSERT INTO $board (thread,depth,name,pass,email";
$query = ", title, view, wdate, ip, content)";
$query = " VALUES ('" . ($_POST[parent_thread]-1)  ."'";
$query = ",'" . ($oarent_depth+1) ."','$name','$pass','$email'";
$query = ",'$title',0, UNIX_TIMESTAMP(), '$REMOTE_ADDR'"";
$query = ",'$content')";

mysql_close($conn);

echo("<meta http-equiv='Refresh' content='1; URL=list.php'>");
?>
<center>
  <font size=2>정상적으로 저장됨</font>
