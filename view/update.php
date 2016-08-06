
<?php
  include "db_info.php";

  $query="SELECT PW From $board WHERE num='$_GET[num]'";
  $result=mysqli_query($conn, $query);
  $row=@mysqli_fetch_array($result);

  if($_POST['PW'] == $row['PW']){
    $query = "UPDATE $board SET WRT = '$_POST[WRT]', EM='$_POST[EM]', HL='$_POST[HL]', DESCR='$_POST[DESCR]' WHERE num='$_GET[num]'";
    $result = mysqli_query($conn, $query);
  }
  else
  {
    echo ("
    <script>
    alert('비밀번호가 틀립니다.');
    history.go(-1);
    </script>
    ");
    exit;

  }
  mysqli_close($conn);
  echo("<meta http-equiv='Refresh' '$_POST[DESCR]'='1;
 URL=read.php?num='$_GET[num]'>");
  ?>
  <center>
    <font size=2>정상적으로 수정되었습니다</font>
    <meta http-equiv='Refresh' content='1; URL=list.php'>
