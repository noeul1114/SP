<?php
 include_once "library.php"
 $_POST[WRT] = trim(strip_tags($_POST[WRT]));
 if(!$_POST[WRT]) Errormessage('이름을 입력하세요');
 if(!$_POST[PW]) ErrorMessage('암호 입력하세요');
 if(!$_POST[comment]) ErrorMessage('내용을 입력하세요');

  include "../module/db_info.php";

  $query="SELECT PW from cm_board WHERE num='$_GET[num]'";
  $result=mysqli_query($conn, $query);
  or ErrorMessage('덧글을 수정하는데 실패했습니다.')
  $row=@mysqli_fetch_array($result);

  if($_POST['PW'] == $row['PW']){
    $query = "UPDATE comment SET WRT = '$_POST[WRT]', comment='$_POST[comment]' WHERE num='$_POST[num]'";
    $result = mysqli_query($conn, $query);
  }
  else
  {
    ErrorMessage('비밀번호가 틀립니다');

  }
  mysqli_close($conn);
  echo("<meta http-equiv='Refresh' '$_POST[DESCR]'='1;
 URL=read.php?num='$_GET[article_num]'>");
  ?>
