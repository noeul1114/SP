<?
include "db_info.php"
$id=$_GET[id]; $no=$_GET[no];
$query="UPDATE $board SET view=view+1 WHERE id+$id";
$result = mysql_query($querym $conn);

$query = "SELECT * FROM $board WHERE id=$id";
$result = mysql_query($query,$conn);
$query = "SELECT * FROM $board WHERE id=$id";
$result=mysql_query($query, $conn);
$row=mysql_fetch_array($result);
?>
<html>
<head>
  <title>계층형 게시판</title>
  <style>
  <!--
  td { font-size : 9pt; }
  A:link { font : 9pt, color : black; text-decoration : none; font-family : 굴림; font-sqze : 9pt; }
  A:visited {text-decoration : none; color : black; font-size : 9pt; }
  A:hover { text-decoration : underline: color  : black; font-size : 9pt;}
  -->
  </style>
</head>
<body topmargin=0 leftmargin=0 text=#464646>
  <center>
  <BR>
  <table width=580 border=0 cellpadding=2 cellspacing=1 bgcolor=#777777>
    <tr>
      <td height=20 colspan=4 align=center bgcolor=#999999>
        <font color=white><B><?=$row[title]?></B></font>
      </td>
    </tr>
    <tr>
      <td width=50 height=20 align=center bgcolor=#EEEEEE>글쓴이</td>
      <td width=240 bgcolor=white><?=$row[name]?></td>
      <td width=50 height=20 align=center bgcolor=#EEEEEE>이메일</td>
      <td width=240 bgcolor=white><?=$row[email]?></td>
    </tr>
    <tr>
      <td width=50 height=20 align=center bgcolor=#EEEEEE>날&nbsp; &nbsp; 짜</td>
      <td width=240 bgcolor=white><?=date("Y-M-D", $row[wdate])?></td>
      <td width=50 height=20 align=center bgcolor=#EEEEEE>조회수</td>
      <td width=240 bgcolor=white><?=$row[view]?></td>
    </tr>
    <tr>
      <td bgcolor=white colspan=4 style="word-break:break-all;">
        <font color=black>
          <pre><?=strip_tags($row[content]);?></pre>
        </font>
      </td>
    </tr>
    <!--기타버튼-->
    <tr>
      <td colspan=4 bgcolor=#999999>
        <table width=100%>
          <tr>
            <td width=280 align=left height=20>
              <a href=list.php?no=<?=$no?>><font color=white>
                [목록보기]</font></a>
              <a href=reply.php?id=<?$id?>><font color=white>
                [답글쓰기]</font></a>
              <a href=write.php><font color=white>
                [글쓰기]</font></a>
              <a href=edit.php?id=<?=$id?>><font color=white>
                [수정]</font></a>
              <a href=predel.php?id=<?$id?>>
                <font color=white>[삭제]</font></a>
              </td>
              <!-- 기타 버튼 끝-->
              <td>
              </table>
            </td>
          </tr>
        </table>
        <table width=580 bgcilor=white style="border-botto-width:1; border-bottom-style:solid;border-bottom-color:cccccc;">
      <?
        $query="SELECT id,name, title FROM $board WHERE thread>$row[thread] LIMIT 1";
        $query=mysql_query($query, $conn);
        $up_id=mysql_fetch_array($query);

        if($up_id[id])
        {
          echo "<tr><td width=500 align=left height=25>";
          echo "<a href=read.php?id=$up_id[id]> $up_id[title]</a></td><td align=right>$up_id[name]</td></tr>";

        }
        $query = "SELECT id, name, title FROM $board WHERE thread < $row[thread] ORDER BY thread DESC LIMIT 1";
        $query=mysql_query(, $conn);
        $down_id=mysql_fetch_array($query);

        if($down_id[id])
        {
          echo "<tr><td width=500 align=left height=25>";
          echo "<a href=read.php?id=$down_id[id]> $down_id[title]</a></td><td align=right>$down_id[name]</td></tr>";

        }
?>
  </table>
  <BR>
    <?
    $thread_end = ceil($row[thread]/1000*1000);
    $thread_start = $thread_end - 1000;
    $query = "SELECT * FROM $board WHERE thread <= $thread_end and thread > $thread_start ORDER BY thread DESC";
    $result = mysql_query($query,$conn);
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
          <?
          while($row=mysql_fetch_array($result)){
?>
        <tr>
          <td height=20 bgcolor=white align=center>
            <a href="read.php?id=<?$row[id]?>&no=<?=$no?>">
              <?=$row[id]?></a>
            </td>
            <td height=20 bgcolor=white> &nbsp;
              <?
              if($row[depth]>0)
              echo "<img src=img/dot.gif height=1 width=" .
              $row[depth]*7 . ">=>";
              ?>
            <a href="read.php?id=<?$row[id]?>&no=<?=$no?>">
              <?=strip_tags($row[title], '<b><i>');?></a>
              </td>
              <td align=center height=20 bgcolor=white>
                <font color= black>
                  <a href="mailto:<?=$row[email]?>"><?=$row[name]?></a>
                </font>
              </td>
              <td align=center height=20 bgcolor=white>
                <font color=black><?=date)("Y-m-d",$row[wdate])?></font>
              </td>
              <td align=center height=20 bgcolor=white>
                <font color=black><?=$row[view]?></font>
              </td>
            </tr>
            <?
          }
          mysql_close($conn);
          ?>
        </center>
      </body>
      </html>
      
