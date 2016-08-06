<?php
include "../lib/library.php";
  $num = trim(strip_tags($_GET['num']));
  $no = trim(strip_tags($_GET['no']));
  $_POST['WRT'] = trim(strip_tags($_POST['WRT']));
  if(!$_POST['WRT']) ErrorMessage('이름을 입력하세요');
  if(!$_POST['PW']) ErrorMessage('암호 입력하세요');
  if(!$_POST['comment']) ErrorMessage('내용을 입력하세요');
    if(!$_POST['CTT']) ErrorMessage('의견을 선택하세요');

  include_once "../module/db_info.php";

$query = "INSERT into cm_board (CTT, article_num, board_name, WRT, PW, comment, ip)";
$query .= "VALUES ('{$_POST['CTT']}', '{$_POST['article_num']}', '{$_GET['board']}', '{$_POST['WRT']}', '{$_POST['PW']}', '{$_POST['comment']}','$_SERVER[REMOTE_ADDR]')";
$result=mysqli_query($conn, $query)
or ErrorMessage('덧글 저장하는 데 실패하였습니다.');
?>


<meta http-equiv='Refresh' content='1; URL=../?pgreq=article&board=<?=$_GET['board']?>&num=<?=$_POST['article_num']?>&no=0'>


<center>
  <font size=2>정상적으로 저장됨</font></center>
