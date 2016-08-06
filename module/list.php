<?php
  include "db_info.php";

  $page_size=10;

  $page_list_size=10;

  if(!isset($_GET['no'])) $_GET['no']=0;

  $no = $_GET['no'];

//  if(!$no || $no < 0) $no=0;

  $query = "SELECT * FROM $board ORDER BY THD DESC LIMIT $no, $page_size";

  $result = @mysqli_query($conn, $query);

  $result_count=@mysqli_query($conn, "SELECT count(*) FROM $board WHERE board_name='$_GET[board]'") or die;
  $result_row=@mysqli_fetch_row($result_count);
  $total_row=$result_row[0];

  if($total_row<=0) $total_row=0;

  $total_page=floor(($total_row-1) /$page_size);

  $current_page = floor($no /$page_size);
$PHP_SELF = $_SERVER['PHP_SELF'];
  ?>
  <div class="row">
    <div class="col-xs-12">
      <table class="table table-hover table-condensed text-center">
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
        <tbody>
          <?php

            $LI = mysqli_connect('localhost','root','qudtlstz1','SP') or die ('fail to connect');
            mysqli_query($LI, "set names utf8");
            $QY = "SELECT * FROM board WHERE board_name = '$_GET[board]' ORDER BY THD DESC LIMIT $no, $page_size";
            $TEMP = mysqli_query($LI, $QY);

            while($RS = mysqli_fetch_array($TEMP)) {
              ?>
              <tr>
                <td colspan="4">
                    <?=$RS['num']?>
                </td>
                <td colspan="10"></td>
                <td colspan="7"><?=$RS['C_AT']?></td>
                <td colspan="4">조회수 : <?=$RS['VW']?></td>
              </tr>
              <tr>
                <td colspan="21">
                  <a href="?pgreq=article&board=<?=$_GET['board']?>&num=<?=$RS['num']?>&no=<?=$no?>">
                    <?=$RS['HL']?>
                  </a>                </td>
                <td colspan="4"><?=$RS['WRT']?></td>
              </tr>
              <tr>
                <td colspan="20">
                  <div class="progress" id="board_progress">
                    <div class="progress-bar progress-bar-danger progress-bar-striped" style="width: <?=($RS['U']/($RS['U']+$RS['D']+$RS['N'])*100)?>%">
                      <span class="sr-only"></span>
                    </div>
                    <div class="progress-bar progress-bar-success progress-bar-striped" style="width: <?=($RS['N']/($RS['U']+$RS['D']+$RS['N'])*100)?>%">
                      <span class="sr-only"></span>
                    </div>
                    <div class="progress-bar progress-bar-primary progress-bar-striped" style="width: <?=($RS['D']/($RS['U']+$RS['D']+$RS['N'])*100)?>%">
                      <span class="sr-only"></span>
                    </div>
                </td>
                <td colspan="5">투표수 : <?=$RS['V_ID']?></td>
              </tr>
            <?php };
            mysqli_close($conn);
          ?>

        </tbody>
      </table>
      <div>
      <?php
         $start_page = (int)($current_page/$page_list_size) * $page_list_size;
         $end_page= $start_page + $page_list_size -1;
         if($total_page < $end_page) $end_page = $total_page;
         if($start_page >= $page_list_size ) {
           $prev_list = ($start_page -1) * $page_size;
           echo "<a href= $PHP_SELF?no=$prev_list> ◀ </a>";
         }

         for($i=$start_page;$i <= $end_page; $i++){
           //$page=($i-1) * $page_size*$i;
           $page=$page_size*$i;
           $page_num=$i+1;


           // 추가한 부분 php_self를 재정의
           if ($no!=$page){
             echo "<a href = \"?pgreq=board&board=a&no=$page\">";
           }
           echo " $page_num ";
           if($no!=$page){
             echo "</a>";
           }
         }

         if($total_page>$end_page)
         {
           $next_list = ($end_page + 1) * $page_size;
           echo "<a href=$PHP_SELF?no=$next_list> ▶ </a><p>";
         }
         ?>
         </div>
      <a href=view/write.php>
        <button class="button">
          글쓰기
        </button>
      </a>
    </div>
  </div>
