<?php
if(!isset($_SESSION))
    {
        session_start();
    }
$_SESSION['login_user']=NULL;

echo "<script>window.alert('로그아웃 되었습니다.');</script>";
echo "<script>location.href='../index.php';</script>";
?>
