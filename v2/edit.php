<html>
<head>
<title>초 허접 게시판</title>
<style>
<!--
td {font-size : 9pt; }
A:link { font : 9pt; color : black; text_decoration = none;
font-family : 굴림; font-size : 9pt; }
A:visited { text-decoration : none; color : black; font-size : 9pt; }
A:hover { test-decoration : underline; color : black;
font-size : 9pt; }
-->
</style>
</head>

<body topmargin=0 leftmargin=0 text=#464646>
<center>
<BR>
<form action=update.php?id=<?=$_GET[id]?> method=post>
  <table width=580 border=0 cellpadding=2 cellspacing=1 bgcolor=#777772>
    <tr>
      <td height=20 align=center bgcolor=#999999>
        <font color=write><B>글 글수정하기</B></font>
      </td>
      </tr>
<?
  include "db_info.php";
    $result = @mysql_query("SELECT * FROM $$board WHERE id=POST[$_GET[id]]", $conn);
    $row=@mysql_fetch_array($result);
?>

      <!-- 입력부분 --->
    <tr>
      <td bgcolor= yellow>&nbsp;
        <table>
          <tr>
            <td width=60 align=left>이름</td>
            <td align=left>
              <input type=text name=name size=20 maxlength=10
              value=<?$row[$_POST[name]]?>>
            </td>
          </tr>
          <tr>
            <td width=60 align=left>이메일</td>
            <td align=left>
              <input type=text name=email size=20 maxlength=25
              value=<?$_POST[email]?>>
            </td>
          </tr>
          <tr>
            <td width=60 align=left>비밀번호</td>
            <td align=left>
              <input type=password name=pass size=8 maxlength=8>
              (비밀번호가 맞아야 수정가능)
            </td>
          </tr>
          <tr>
            <td width=60 align=left>제목</td>
            <td align=left>
              <input type=text name=title size=60 maxlength=35
              value=<?$row[$_POST[title]]?>>
            </td>
          </tr>
          <tr>
            <td width=60 align=left>내용</td>
            <td align=left>
              <TEXTAREA name=content cols=65 rows=15>
              <?=$row[content]?></textarea>
            </td>
          </tr>
          <tr>
            <td colspan=10 align=center>
              <input type=submit value="글저장하기">
              &nbsp;&nbsp;
              <input type=reset value="다시 쓰기">
              &nbsp;&nbsp;
              <input type=button value="되돌아가기"
              onclick="history.back(-1)">
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
    </form>
  </center>
  </body>
    </html>
