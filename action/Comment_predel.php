<html>
<head>
  <title>계층 게시판</title>
  <style>
  <!--
  td { font-size : 9pt; }
  A:link { font : 9pt, color : black; text-decoration : none; font-family : 굴림; font-sqze : 9pt; }
  A:visited {text-decoration : none; color : black; font-size : 9pt; }
  A:hover { text-decoration : underline: color  : black; font-size : 9pt;}
  -->
  </style>
  <script>
  function FormCheck(){
    if(!fm.PW.value){
      alert("암호를 입력하세요.");
      fm.PW.focus();
      return false;
    }
}
</script>
</head>
<body topmargin=0 leftmargin=0 text=#464646>
  <center>
  <BR>
<form action="Comment_del.php?num=<?=$_GET['num']?>&article_num=<?=$_GET['article_num']?>" method=post name=fm onsubmit="return FormCheck()">
  <table width=300 border=0 cellpadding=2 cellspacing=1 bgcolor=#777777>
    <tr>
      <td height=20 align=center bgcolor=#999999>
        <font color=white><B>비 밀 번 호 확 인</B></font>
      </td>
    </tr>
    <tr>
      <td align=center>
        <font color=white><b>비밀번호 : </b>
          <input type=password name=PW size=8>
          <input type=submit value="확 인">
          <input type=button value="취 소" onclick="history.back(=1)">
        </td>
      </tr>
    </table>
