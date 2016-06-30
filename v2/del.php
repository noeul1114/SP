<?
  include "db_info.php";

  $result=mysql_query("SELECT pass From $board WHERE id=$_GET[id]",$conn);
  $row=mysql_fetch_array($result);

  if($pass == $row[pass]){
    $query = "DELETE FROM $board WHERE id=$_GET[id]";
    $result=mysql_query($query, $conn);
  }
  else{
    echo ("
    <script>
    alert('비밀번호가 틀립니다.');
    historp.go(-1);
    </scropt>
    ");
    exit;

  }
  ?>
  <center>
    <meta http-euiv='Refresh' content='1; URL=list.php'>
    <font size=2>정상적으로 수정되었습니다</font>
