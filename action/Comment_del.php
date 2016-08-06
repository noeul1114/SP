<?php
 include_once "../lib/library.php";

if(!$_POST['PW']) ErrorMessage("암호를 입력하세요");

  include "../module/db_info.php";

  $result=mysqli_query($conn, "SELECT PW from cm_board WHERE num='$_GET[num]'") or ErrorMessage('덧글을 삭제하는데 실패하였습니다.');;
  $row=@mysqli_fetch_array($result);

  if($_POST['PW'] == $row['PW']){
    $query = "DELETE from cm_board WHERE num=$_GET[num]";
    $result=@mysqli_query($conn, $query) or ErrorMessage('덧글을 삭제하는데 실패하였습니다.');
  }
  ErrorMessage('비밀번호가 틀립니다');

  ?>
