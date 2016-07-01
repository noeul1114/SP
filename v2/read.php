<?php
require "db_info.php";
require "../lib/article_db.php";

if((isset($_GET['id'])) && (isset($_GET['no']))) {
  $id = $_GET['id'];
  $no = $_GET['no'];
}
else {
  header("location: list.php");
}
$ARTICLE = new article_db;
$row = $ARTICLE->ENTER_ARTICLE($board, $no, $conn);
?>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>계층형 게시판</title>
  <style>
  </style>
</head>
<body>
  <center>
  <BR>
  <table>
    <tr>
      <td>
        <font color=white><B><?php $row['HL']?></B></font>
      </td>
    </tr>
    <tr>
      <td>글쓴이</td>
      <td><?=$row['WRT']?></td>
      <td>이메일</td>
      <td><?=$row['EM']?></td>
    </tr>
    <tr>
      <td>날짜</td>
      <td><?=$row['C_AT']?></td>
      <td>조회수</td>
      <td><?=$row['VW']?></td>
    </tr>
    <tr>
      <td>
        <font>
          <pre><?=strip_tags($row['DESCR']);?></pre>
        </font>
      </td>
    </tr>
    <!--기타버튼-->
    <tr>
      <td>
        <table>
          <tr>
            <td>
              <a href=list.php?no=<?=$no?>>
                [목록보기]</a>
              <a href=reply.php?id=<?$id?>>
                [답글쓰기]</a>
              <a href=write.php>
                [글쓰기]</a>
              <a href=edit.php?id=<?=$id?>>
                [수정]</a>
              <a href=predel.php?id=<?$id?>>
                [삭제]</a>
              </td>
              <!-- 기타 버튼 끝-->
              <td>
              </table>
            </td>
          </tr>
        </table>
        <table width=580 bgcilor=white style="border-botto-width:1; border-bottom-style:solid;border-bottom-color:cccccc;">
      <?php
        $row_VID = (int)$row['V_ID'];
        $query = "SELECT num, WRT, HL FROM $board WHERE V_ID > $row_VID LIMIT 1";
        $result = mysqli_query($conn, $query) or die ('Wrong query');
        $up_id = mysqli_fetch_array($result);


        if($up_id['num'])
        {
          echo "<tr><td width=500 align=left height=25>";
          echo "<a href=read.php?id=$up_id[num]> $up_id[HL]</a></td><td align=right>$up_id[WRT]</td></tr>";
        }
        $query = "SELECT num,WRT,HL FROM $board WHERE V_ID < $row[V_ID] ORDER BY V_ID DESC LIMIT 1";
        $result = mysqli_query($conn, $query);
        $down_id = mysqli_fetch_array($result);

        if($down_id['num'])
        {
          echo "<tr><td width=500 align=left height=25>";
          echo "<a href=read.php?id=$down_id[num]> $down_id[HL]</a></td><td align=right>$down_id[WRT]</td></tr>";

        }
?>
  </table>
  <BR>
    <?php
    $VID_end = ceil($row['V_ID']/1000*1000);
    $VID_start = $VID_end - 1000;
    $query = "SELECT * FROM $board WHERE V_ID <= $VID_end and V_ID > $VID_start ORDER BY V_ID DESC";
    $result = mysqli_query($conn ,$query);
?>
    <table width=580 border=0 cellpadding=2 cellspacing=1 bgcolor=#777777>
    <tr height=20 bgcolor=#999999>
    <td width=30 align=center>
      <font color=white>번호</font>
      </td>
      <td width=370 align=center>
        <font color=white>제 목</font>
        </td>
        <td width=50 align=center>
          <font color=white>글쓴이</font>
          </td>
        <td width=60 align=center>
            <font color=white>날짜</font>
            </td>
          <td width=40 align=center>
              <font color=white>번호</font>
            </td>
          </tr>
          <?php
          while($row = mysqli_fetch_array($result)) {
?>
        <tr>
          <td height=20 bgcolor=white align=center>
            <a href="read.php?id=<?$row['WRT']?>&no=<?$row['num']?>">
              <?=$row['num']?></a>
            </td>
            <td height=20 bgcolor=white> &nbsp;
            <a href="read.php?id=<?$row['WRT']?>&no=<?$row['num']?>">
              <?=strip_tags($row['HL'], '<b><i>');?></a>
              </td>
              <td align=center height=20 bgcolor=white>
                <font color= black>
                  <a href="mailto:<?=$row['EM']?>"><?=$row['WRT']?></a>
                </font>
              </td>
              <td align=center height=20 bgcolor=white>
                <font color=black><?=$row['C_AT']?></font>
              </td>
              <td align=center height=20 bgcolor=white>
                <font color=black><?=$row['VW']?></font>
              </td>
            </tr>
            <?php
          }
          mysqli_close($conn);
          ?>
        </center>
      </body>
      </html>
