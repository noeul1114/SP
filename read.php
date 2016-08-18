<?php
include "/module/db_info.php";
$num=$_GET['num'];
$no=$_GET['no'];
$query="UPDATE $board SET VW=VW+1 WHERE num=$num";
$result = mysqli_query($conn, $query);

$query = "SELECT * FROM $board WHERE num=$num";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);
?>

  <center>
  <BR>
    <div class="row">
  <table class="table table-condensed text-center">
    <thead>
      <th style="width=4%"></th>
      <th style="width=4%"></th>
      <th style="width=4%"></th>
      <th style="width=4%"></th>
      <th style="width=4%"></th>
      <th style="width=4%"></th>
      <th style="width=4%"></th>
      <th style="width=4%"></th>
      <th style="width=4%"></th>
      <th style="width=4%"></th>
      <th style="width=4%"></th>
      <th style="width=4%"></th>
      <th style="width=4%"></th>
      <th style="width=4%"></th>
      <th style="width=4%"></th>
      <th style="width=4%"></th>
      <th style="width=4%"></th>
      <th style="width=4%"></th>
      <th style="width=4%"></th>
      <th style="width=4%"></th>
      <th style="width=4%"></th>
      <th style="width=4%"></th>
      <th style="width=4%"></th>
      <th style="width=4%"></th>
      <th style="width=4%"></th>
    </thead>
    <tr>
      <td colspan="25">
        <B>
          <?=strip_tags($row['HL']);?>
        </B>
      </td>
    </tr>
    <tr>
      <td colspan="4">글쓴이</td>
      <td colspan="8"><?=$row['WRT']?></td>
      <td colspan="4">이메일</td>
      <td colspan="9"><?=$row['EM']?></td>
    </tr>
    <tr>
      <td colspan="4">날짜</td>
      <td colspan="11"><?=$row['C_AT']?></td>
      <td colspan="4">조회수</td>
      <td colspan="6"><?=$row['VW']?></td>
    </tr>
    <tr>
      <td colspan="25">
        <pre><?=strip_tags($row['DESCR']);?></pre>
      </td>
    </tr>
    <!--기타버튼-->
    <tr>
      <td>
        <table>
          <tr>
            <td>
              <a href='view/reply.php?num=<?=$num?>&board=<?=$_GET['board']?>&no=<?=$_GET['no']?>'>
                [답글쓰기]
              </a>
              <a href='view/write.php?board=<?=$_GET['board']?>&no=<?=$_GET['no']?>'>
                [글쓰기]
              </a>
              <a href='view/edit.php?num=<?=$num?>&board=<?=$_GET['board']?>&no=<?=$_GET['no']?>'>
                [수정]
              </a>
              <a href='view/predel.php?num=<?=$num?>&board=<?=$_GET['board']?>&no=<?=$_GET['no']?>'>
                [삭제]
              </a>
              </td>
              <!-- 기타 버튼 끝-->
              <td>
              </table>
            </td>
          </tr>
        </table>
      </div>

  <BR>
    <?php
    $THD_end = ceil($row['THD']/1000)*1000;
    $THD_start = $THD_end - 1000;
    $query = "SELECT * FROM $
    board WHERE THD <= $THD_end and THD > $THD_start ORDER BY THD DESC";
    $result = mysqli_query($conn,$query);
?>
<div class="row">
    <table class="table table-condensed text-center">

          <?php
          while($row = @mysqli_fetch_array($result)){
?>
        <tr>
          <td>
            <a href="read.php?num=<?php $row[num]?>&no=<?=$no?>">
              <?=$row['num']?></a>
            </td>
            <td> &nbsp;
              <?php
              if($row['DPT']>0)
              echo "<img src=img/dot.gif height=1 width=" .
              $row[DPT]*7 . ">=>";
              ?>
            <a href="read.php?num=<?php $row[num]?>&no=<?=$no?>">
              <?=strip_tags( $row['HL'], '<b><i>');?></a>
              </td>
              <td>
                  <a href="mailto:<?= $row['EM']?>"><?= $row['WRT']?></a>
              </td>
              <td>
                <?=date("Y-m-d", $row['C_AT'])?>
              </td>
              <td>
                <?= $row['VW']?>
              </td>
            </tr>

            <?php
            }
            ?>
                    <tr>
                      <td>
                        <BR>
                              <?=nl2br(str_replace(" ", "&nbsp;", remove_html($row['DESCR'])));?>
                          <br><br>
                          <?php include "comment.php"; ?>
                        </td>
                      </tr>
          <?php
          mysqli_close($conn);
          ?>

</table>
</div>
</center>
<?php
        require "module/list.php";
 ?>
