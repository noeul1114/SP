<?
include "db_info.php"
$query="SELECT * FROM $board WHERE id='$_GET'";
$parent_result = mysql_query($query,$conn);
$parent_row= mysql_fetch_array($parent_result);
$parent_title = "RE:" . $parent_row[title];
$parent_content= "\n>" . str_replace("\n", "\n>", $parent_row[content]);

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
    <form action=insert_reply.php method=post>
      <input type=hidden name=parent_depth value=<?=$parent_row[depth]?>>
      <input type=hidden name=parent_thread value=<?=$parent_row[thread]?>>
  <table width=580 border=0 cellpadding=2 cellspacing=1 bgcolor=#777777>
    <tr>
      <td height=20 colspan=4 align=center bgcolor=#999999>
        <font color=white><B>답변달기</B></font>
      </td>
    </tr>
    <tr>
      <td bgcolor=white> &nbsp;
        <table>
          <tr>
            <td width=60 align=left>이름</td>
            <td align=left>
              <INPUT type=text name=name size=20 maxlength=10>
              </td>
            </tr>
            <tr>
              <td width=60 align=left>이메일</td>
              <td align=left>
                <INPUT type=text name=email size=20 maxlength=25>
                </td>
              </tr>
              <tr>
                <td width=60 align=left>비밀번호</td>
                <td align=left>
                  <INPUT type=password name=pass size=8 maxlength=8>
                  </td>
                </tr>
                <tr>
                  <td width=60 align=left>제목</td>
                  <td align=left>
                    <INPUT type=text name=title size=60 maxlength=35 value="<?$parent_title?>">
                    </td>
                  </tr>
                <tr>
                  <td width=60 align=left>내용</td>
                  <td align=left>
                    <TEXTAREA name=content cols=65 rows=15>
                      <?=$parent_content?></TEXTAREA>
                    </tr>
                  <tr>
                    <td colspan=10 align=center>
                      <INPUT type=submit value="글 저장하기">
                        &nbsp; &nbsp;
                      <INPUT type=reset value="다시 쓰기">
                          &nbsp; &nbsp;
                      <INPUT type=button value="되돌아가기">
                            &nbsp; &nbsp;
                          </td>
                        </tr>
                      </TABLE>
                    </td>
                  </tr>
                </table>
              </center>
            </body>
      </html>
