<?php
class article_db
{
  private $LI;
  private $QY;
  private $RS;

  function SHOW_HOTARGUE()
  {
    $LI = mysqli_connect('localhost','root','qudtlstz1','SP') or die ('fail to connect');
    mysqli_query($LI, "set names utf8");
    $QY = "SELECT * FROM a_board ORDER BY V_ID DESC LIMIT 1";
    $TEMP = mysqli_query($LI, $QY);
    $RS = mysqli_fetch_array($TEMP);

    return $RS;
  }

  function SHOW_HOTARGUE_COMMENT_U()
  {
    $LI = mysqli_connect('localhost','root','qudtlstz1','SP') or die ('fail to connect');
    mysqli_query($LI, "set names utf8");
    $QY = "SELECT num FROM a_board ORDER BY V_ID DESC LIMIT 1";
    $TEMP = mysqli_query($LI, $QY);
    $RS = mysqli_fetch_array($TEMP);
    $QY = "SELECT * FROM cm_board WHERE board_name LIKE 'a' and article_num = '$RS[num]' and CTT = 'U' ORDER BY V_ID DESC LIMIT 3";
    $RS = mysqli_query($LI, $QY) or die ('wrong query');

    return $RS;
  }

  function SHOW_HOTARGUE_COMMENT_N()
  {
    $LI = mysqli_connect('localhost','root','qudtlstz1','SP') or die ('fail to connect');
    mysqli_query($LI, "set names utf8");
    $QY = "SELECT num FROM a_board ORDER BY V_ID DESC LIMIT 1";
    $TEMP = mysqli_query($LI, $QY);
    $RS = mysqli_fetch_array($TEMP);
    $QY = "SELECT * FROM cm_board WHERE board_name LIKE 'a' and article_num = '$RS[num]' and CTT = 'N' ORDER BY V_ID DESC LIMIT 3";
    $RS = mysqli_query($LI, $QY) or die ('wrong query');

    return $RS;
  }

  function SHOW_HOTARGUE_COMMENT_D()
  {
    $LI = mysqli_connect('localhost','root','qudtlstz1','SP') or die ('fail to connect');
    mysqli_query($LI, "set names utf8");
    $QY = "SELECT num FROM a_board ORDER BY V_ID DESC LIMIT 1";
    $TEMP = mysqli_query($LI, $QY);
    $RS = mysqli_fetch_array($TEMP);
    $QY = "SELECT * FROM cm_board WHERE board_name LIKE 'a' and article_num = '$RS[num]' and CTT = 'D' ORDER BY V_ID DESC LIMIT 3";
    $RS = mysqli_query($LI, $QY) or die ('wrong query');

    return $RS;
  }

  function ENTER_ARTICLE($board, $no, $conn)
  {
    $query = "UPDATE $board SET VW=VW+1 WHERE num = '$no'";
    $result = mysqli_query($conn, $query) or die ('Wrong Query view addition');

    $query = "SELECT * FROM $board WHERE num = $no";
    $result = mysqli_query($conn, $query) or die ('Wrong Query number configuration');

    $row = mysqli_fetch_array($result);

    return $row;
  }
}
