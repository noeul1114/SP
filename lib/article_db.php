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
    $QY = "SELECT * FROM board ORDER BY V_ID DESC LIMIT 1";
    $TEMP = mysqli_query($LI, $QY);
    $RS = mysqli_fetch_array($TEMP);

    return $RS;
  }

  function SHOW_BOARD_HA($board)
  {
    $LI = mysqli_connect('localhost','root','qudtlstz1','SP') or die ('fail to connect');
    mysqli_query($LI, "set names utf8");
    $QY = "SELECT * FROM board WHERE board_name = '$board' ORDER BY V_ID DESC LIMIT 1";
    $TEMP = mysqli_query($LI, $QY);
    $RS = mysqli_fetch_array($TEMP);

    return $RS;
  }

  function SHOW_BOARD($board)
  {
    $LI = mysqli_connect('localhost','root','qudtlstz1','SP') or die ('fail to connect');
    mysqli_query($LI, "set names utf8");
    $QY = "SELECT * FROM board WHERE board_name = '$board' ORDER BY num DESC LIMIT 15";
    $TEMP = mysqli_query($LI, $QY);
    $RS = mysqli_fetch_array($TEMP);

    return $RS;
  }

  function SHOW_BOARD_ROWS($board)
  {
    $LI = mysqli_connect('localhost','root','qudtlstz1','SP') or die ('fail to connect');
    mysqli_query($LI, "set names utf8");
    $QY = "SELECT * FROM board WHERE board_name = '$board' ORDER BY num DESC LIMIT 15";
    $TEMP = mysqli_query($LI, $QY);
    $RS = mysqli_num_rows($TEMP);

    return $RS;
  }

  function SHOW_HOTARGUE_COMMENT_U($board)
  {
    $LI = mysqli_connect('localhost','root','qudtlstz1','SP') or die ('fail to connect');
    mysqli_query($LI, "set names utf8");
    if ($board==null) {
      $QY = "SELECT num FROM board ORDER BY V_ID DESC LIMIT 1";
      $TEMP = mysqli_query($LI, $QY);
      $RS = mysqli_fetch_array($TEMP);
      $QY = "SELECT * FROM cm_board WHERE article_num = '$RS[num]' and CTT = 'U' ORDER BY V_ID DESC LIMIT 3";
      $RS = mysqli_query($LI, $QY) or die ('wrong query');

      return $RS;
    }
    else {
      $QY = "SELECT num FROM board WHERE board_name LIKE '$board' ORDER BY V_ID DESC LIMIT 1";
      $TEMP = mysqli_query($LI, $QY);
      $RS = mysqli_fetch_array($TEMP);
      $QY = "SELECT * FROM cm_board WHERE board_name LIKE '$board' and article_num = '$RS[num]' and CTT = 'U' ORDER BY V_ID DESC LIMIT 3";
      $RS = mysqli_query($LI, $QY) or die ('wrong query');

      return $RS;
    }
  }

  function SHOW_HOTARGUE_COMMENT_N($board)
  {
    $LI = mysqli_connect('localhost','root','qudtlstz1','SP') or die ('fail to connect');
    mysqli_query($LI, "set names utf8");
    if ($board==null) {
      $QY = "SELECT num FROM board ORDER BY V_ID DESC LIMIT 1";
      $TEMP = mysqli_query($LI, $QY);
      $RS = mysqli_fetch_array($TEMP);
      $QY = "SELECT * FROM cm_board WHERE article_num = '$RS[num]' and CTT = 'N' ORDER BY V_ID DESC LIMIT 3";
      $RS = mysqli_query($LI, $QY) or die ('wrong query');

      return $RS;
    }
    else {
      $QY = "SELECT num FROM board WHERE board_name LIKE '$board' ORDER BY V_ID DESC LIMIT 1";
      $TEMP = mysqli_query($LI, $QY);
      $RS = mysqli_fetch_array($TEMP);
      $QY = "SELECT * FROM cm_board WHERE board_name LIKE '$board' and article_num = '$RS[num]' and CTT = 'N' ORDER BY V_ID DESC LIMIT 3";
      $RS = mysqli_query($LI, $QY) or die ('wrong query');

      return $RS;
    }
  }

  function SHOW_HOTARGUE_COMMENT_D($board)
  {
    $LI = mysqli_connect('localhost','root','qudtlstz1','SP') or die ('fail to connect');
    mysqli_query($LI, "set names utf8");
    if ($board==null) {
      $QY = "SELECT num FROM board ORDER BY V_ID DESC LIMIT 1";
      $TEMP = mysqli_query($LI, $QY);
      $RS = mysqli_fetch_array($TEMP);
      $QY = "SELECT * FROM cm_board WHERE article_num = '$RS[num]' and CTT = 'D' ORDER BY V_ID DESC LIMIT 3";
      $RS = mysqli_query($LI, $QY) or die ('wrong query');

      return $RS;
    }
    else {
      $QY = "SELECT num FROM board WHERE board_name LIKE '$board' ORDER BY V_ID DESC LIMIT 1";
      $TEMP = mysqli_query($LI, $QY);
      $RS = mysqli_fetch_array($TEMP);
      $QY = "SELECT * FROM cm_board WHERE board_name LIKE '$board' and article_num = '$RS[num]' and CTT = 'D' ORDER BY V_ID DESC LIMIT 3";
      $RS = mysqli_query($LI, $QY) or die ('wrong query');

      return $RS;
    }
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

  function FIND_BOARD($board_name)
  {
    switch ($board_name) {
      case 'a':
        return "A동";
        break;

      case 'b':
        return "B동";
        break;

      case 'c':
        return "C동";
        break;

      default:
        return "A동";
        break;
    }
  }
}
