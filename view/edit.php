<?php
  include "../module/db_info.php";
    $result = @mysqli_query($conn, "SELECT * FROM $board WHERE num=$_GET[num]");
    $row=@mysqli_fetch_array($result);
?>
<html>
<head>
<title>초 허접 게시판</title>
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

<body topmargin=0 leftmargin=0 text=#464646>
<center>
<BR>
<form action=../action/update.php?num=<?=$row['num']?> method=post>
  <table width=580 border=0 cellpadding=2 cellspacing=1 bgcolor=#777772>
    <tr>
      <td height=20 align=center bgcolor=#999999>
        <font color=write><B>글 글수정하기</B></font>
      </td>
      </tr>


      <!-- 입력부분 --->
    <tr>
      <td bgcolor= yellow>&nbsp;
        <table>
          <tr>
            <td width=60 align=left>이름</td>
            <td align=left>
              <input type=text name=WRT size=20 maxlength=10
              value=<?=$row['WRT']?>>
            </td>
          </tr>
          <tr>
            <td width=60 align=left>이메일</td>
            <td align=left>
              <input type=text name=EM size=20 maxlength=25
              value=<?=$row['EM']?>>
            </td>
          </tr>
          <tr>
            <td width=60 align=left>비밀번호</td>
            <td align=left>
              <input type=password name=PW size=8 maxlength=8>
              (비밀번호가 맞아야 수정가능)
            </td>
          </tr>
          <tr>
            <td width=60 align=left>제목</td>
            <td align=left>
              <input type=text name=HL size=60 maxlength=35
              value=<?=$row['HL']?>>
            </td>
          </tr>
          <tr>
            <td width=60 align=left>내용</td>
            <td align=left>
              <TEXTAREA name=DESCR cols=65 rows=15><?=$row['DESCR']?></textarea>
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
