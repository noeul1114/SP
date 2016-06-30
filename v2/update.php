<?
  include "db_info.php";

  $query="SELECT pass From $board WHERE id=$POST[$id]";
  $result=mysql_query($query,$conn);
  $row=mysql_fetch_array($result);

  if($pass == $row[pass]){
    $query = "UPDATE $board SET name = '$POST[$name]', email='$'$POST[$email]', title='$POST[$title]', content='$POST[$content]' WHERE id=$_GET[id]";
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
  mysql_close($conn);
  echo("<meta http-equiv='Refresh' $_POST[content]='1;
  URL=read.php?id='$POST[$id]'>");
  ?>
  <center>
    <font size=2>정상적으로 수정되었습니다</font>
