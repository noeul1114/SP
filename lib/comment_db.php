<?php
class comment_db
{
  function SHOW_HOTARGUE_COMMENT_U($board)
  {
    $LI = mysqli_connect('localhost','root','qudtlstz1','SP') or die ('fail to connect');
    mysqli_query($LI, "set names utf8");
    $QY = "SELECT num FROM board ORDER BY V_ID DESC LIMIT 1";
    $TEMP = mysqli_query($LI, $QY);
    $RS = mysqli_fetch_array($TEMP);
    $QY = "SELECT * FROM cm_board WHERE board_name LIKE 'a' and article_num = '$RS[num]' and CTT = 'U' ORDER BY V_ID DESC LIMIT 3";
    $RS = mysqli_query($LI, $QY) or die ('wrong query');

    return $RS;
  }

  function SHOW_HOTARGUE_COMMENT_N($board)
  {
    $LI = mysqli_connect('localhost','root','qudtlstz1','SP') or die ('fail to connect');
    mysqli_query($LI, "set names utf8");
    $QY = "SELECT num FROM board ORDER BY V_ID DESC LIMIT 1";
    $TEMP = mysqli_query($LI, $QY);
    $RS = mysqli_fetch_array($TEMP);
    $QY = "SELECT * FROM cm_board WHERE board_name LIKE 'a' and article_num = '$RS[num]' and CTT = 'N' ORDER BY V_ID DESC LIMIT 3";
    $RS = mysqli_query($LI, $QY) or die ('wrong query');

    return $RS;
  }

  function SHOW_HOTARGUE_COMMENT_D($board)
  {
    $LI = mysqli_connect('localhost','root','qudtlstz1','SP') or die ('fail to connect');
    mysqli_query($LI, "set names utf8");
    $QY = "SELECT num FROM board ORDER BY V_ID DESC LIMIT 1";
    $TEMP = mysqli_query($LI, $QY);
    $RS = mysqli_fetch_array($TEMP);
    $QY = "SELECT * FROM cm_board WHERE board_name LIKE 'a' and article_num = '$RS[num]' and CTT = 'D' ORDER BY V_ID DESC LIMIT 3";
    $RS = mysqli_query($LI, $QY) or die ('wrong query');

    return $RS;
  }

  function SHOW_COMMENT_TODAY()
  {
    $LI = mysqli_connect('localhost','root','qudtlstz1','SP') or die ('fail to connect');
    mysqli_query($LI, "set names utf8");
    $QY = "SELECT * FROM t_comment ORDER BY num DESC";
    $TEMP = mysqli_query($LI, $QY);

    return $TEMP;
  }

  function SHOW_HOT_TODAY()
  {
    $LI = mysqli_connect('localhost','root','qudtlstz1','SP') or die ('fail to connect');
    mysqli_query($LI, "set names utf8");
    $QY = "SELECT * FROM t_comment ORDER BY VT DESC LIMIT 3";
    $TEMP = mysqli_query($LI, $QY);

    return $TEMP;
  }
}
