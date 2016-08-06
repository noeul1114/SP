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
<script>
function FormCheck(){
  if (!fm.WRT.value){
  alert("이름을 입력하세요");
  fm.WRT.focus();
  return false;
  }
  if (!fm.PW.value){
  alert("비밀번호를 입력하세요");
  fm.PW.focus();
  return false;
  }
  if (!fm.HL.value){
  alert("제목을 입력하세요");
  fm.HL.focus();
  return false;
  }
  if (!fm.DESCR.value){
  alert("이름을 입력하세요");
  fm.DESCR.focus();
  return false;
  }


}
  </script>
</head>

<body topmargin=0 leftmargin=0 text=#123646>
<center>
<BR>
<form action=../action/insert.php method=POST>
  <table width=580 border=0 cellpadding=2 cellspacing=1 bgcolor=#777772>
    <tr>
      <td height=20 align=center bgcolor=#999999>
        <font color=white><B>글쓰기</B></font>
      </td>
      </tr>
      <!-- 입력부분 --->
    <tr>
      <td bgcolor= white>&nbsp;
        <table>
          <tr>
            <td width=60 align=left>이름</td>
            <td align=left>
              <input type=text name=WRT size=20 maxlength=10>
            </td>
          </tr>
          <tr>
            <td width=60 align=left>이메일</td>
            <td align=left>
              <input type=text name=EM size=20 maxlength=25>
            </td>
          </tr>
          <tr>
            <td width=60 align=left>게시판</td>
            <td>
              a<input type=radio name=board_name value="a">
            </td>
            <td>
              b<input type=radio name=board_name value="b">
            </td>
            <td>
              c<input type=radio name=board_name value="c">
            </td>
          </tr>
          <tr>
            <td width=60 align=left>비밀번호</td>
            <td align=left>
              <input type=password name=PW size=8 maxlength=8>
              (수정, 삭제시 반드시 필요)
            </td>
          </tr>
          <tr>
            <td width=60 align=left>제목</td>
            <td align=left>
              <input type=text name=HL size=60 maxlength=35>
            </td>
          </tr>
          <tr>
            <td width=60 align=left>내용</td>
            <td align=left>
              <textarea name=DESCR cols=65 rows=15></textarea>
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
