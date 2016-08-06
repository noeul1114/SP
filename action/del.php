<?php
  include "../module/db_info.php";

  $result=mysqli_query($conn, "SELECT PW From $board WHERE num='$_GET[num]'");
  $row=@mysqli_fetch_array($result);

  if($_POST['PW'] == $row['PW']){
    $query = "DELETE FROM $board WHERE num=$_GET[num]";
    $result=@mysqli_query($conn, $query);
  }
  else{
    echo ("
    <script>
    alert('비밀번호가 틀립니다.');
    history.go(-1);
    </script>
    ");
    exit;

  }
  ?>
  <center>
    <meta http-euiv='Refresh' content='1; URL=list.php'>
    <font size=2>정상적으로 삭제되었습니다</font>
    <meta http-equiv='Refresh' content='1; URL=list.php'>
