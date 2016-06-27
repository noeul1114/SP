<?php
require '../mysql_db.php';

$TEMP = new mysql_db;
$TEMP->CREATE_TABLE();

echo "<script>window.alert('일단 돌아갑니다.');</script>";
echo "<script>location.href='../mysql_interface.php';</script>";
 ?>
