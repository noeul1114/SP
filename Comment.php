<?php
 include_once "module/db_info.php";

 $num = $_GET['num'];
 $sql_cmt = "SELECT * from cm_board WHERE article_num = '$num' ORDER BY num";
 $result_cmt = mysqli_query($conn, $sql_cmt);

 while($row_cmt= mysqli_fetch_array($result_cmt)) {
  $comment = nl2br(str_replace(" ","&nbsp;" , remove_html($row_cmt['comment'])));
  ?>
  <div>
  <table width=98% border=0 align=center cellpadding=5 cellspacing=0>
    <tr bgcolor=#CCCCCC><td colsapn=2></td></tr>
    <tr bgcolor=#F0F0F0>
      <TD width=50% num="WRT_<?=$row_cmt['num']?>"><?=$row_cmt['comment']?></td>
        <td align=right style="font-size:8pt">
          <a href="javascript:change_form(<?=$row_cmt['num']?>);"
            style="font-size:8pt;color:#999999">[수정]</a>
          <a href="action/comment_predel.php?num=<?=$row_cmt['num']?>&board=<?=$_GET['board']?>&no=<?=$_GET['no']?>"
            style="font-size:8pt;color:#999999">[삭제]</a>
            <?=$row_cmt['C_AT']?>
          </td>
        </tr>
        <tr>
          <td valign=top colspan=2 num="comment_<?=$row_cmt['num']?>"><?=$comment?><br><br></td>
        </tr>
      </table>
      <?php } ?>


<script>
function change_form(num){
  WRT = eval("WRT_" + num) . innerText;
  comment = eval("comment_"+num) .innerText;
  comment_insert.WRT.value = WRT;
  comment_insert.comment.value = comment;
  comment_insert.num.value = num;
  comment_insert.action = "comment_update.php";
  comment_insert.comment.cols=61;
  comment_insert.register.value="수 정";
  str = "<input type=button value =' 취 소 '";
  str += "style = 'height:80;width:57' onclick='restore_form()'>";
  cancel.innerHTML = str;
  comment_insert.comment.focus();

}
function restore_form(){
  cancel.innerHTML = "";
  COMMENT_INSERT.action = "comment_insert.php";
  comment_insert.num.value="";
  comment_insert.reset();
  comment_insert.register.value="등록";
  comment_insert.comment.cols=70;
}

  function CommentFormCheck(){
    if(!comment_insert.WRT.value){
      alert("이름을 입력하세요.");
      comment_insert.WRT.focus();
      return false;
    }
    if(!comment_insert.PW.value){
      alert("비밀번호를 입력하세요.");
      comment_insert.PW.focus();
      return false;
    }
    if(!comment_insert.comment.value){
      alert("내용을 입력하세요.");
      comment_insert.WRT.focus();
      return false;
    }
  }
  </script>

  <table width-98% align=center border=0 cellpadding=5 cellspacing=0>
    <form name=comment_insert method=post action='action/comment_insert.php?num=<?=$_GET['num']?>&no=<?=$_GET['no']?>&board=<?=$_GET['board']?>'
    onsubmit="return CommentFormCheck()">
    <input type=hidden name=num value=''>
    <input type=hidden name=article_num value='<?=$num?>'>
    <tr bgcolor=#CCCCCC><TD COLSPAN=4></td></tr>
    <tr bgcolor=#F0F0F0>
    <td width= 50 align=center>이름</td>
    <td width=100><input type=text name=WRT size=15></td>
    <td width=50 align=center>비밀번호</td>
    <td><input type=password name=PW size=15></td>
  </tr>
  <tr>
    <td><input type=radio name=CTT value="U">찬성</td>
    <td><input type=radio name=CTT value="D">반대</td>
    <td><input type=radio name=CTT value="N">중립</td>
  </tr>
  <tr>
    <td valign=absmidddle colspan=4><textarea name=comment rows=4 cols=70></textarea>
      <input name=register type=submit value=' 등 록' style="heigh:80;width:57">
      <span num=cancel></span>
    </td>
  </tr>
</form>
</table>
</div>
