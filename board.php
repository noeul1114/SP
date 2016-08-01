<?php
require "module/hotargue.php";
?>
<?php
$ROWS = $DATA->SHOW_BOARD_ROWS($_GET['board']);
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
          $QY = "SELECT * FROM board WHERE board_name = '$_GET[board]' ORDER BY num DESC LIMIT 15";
          $TEMP = mysqli_query($LI, $QY);

          while($RS = mysqli_fetch_array($TEMP)) {
            echo "
            <tr>
              <td colspan=\"4\">$RS[0]</td>
              <td colspan=\"10\"></td>
              <td colspan=\"7\">$RS[5]</td>
              <td colspan=\"4\">조회수 : $RS[13]</td>
            </tr>
            <tr>
              <td colspan=\"21\">$RS[2]</td>
              <td colspan=\"4\">$RS[4]</td>
            </tr>
            <tr>
              <td colspan=\"20\">
                <div class=\"progress\" id=\"board_progress\">
                  <div class=\"progress-bar progress-bar-danger progress-bar-striped\" style=\"width: ".($RS[8]/($RS[8]+$RS[9]+$RS[10])*100)."%\">
                    <span class=\"sr-only\"></span>
                  </div>
                  <div class=\"progress-bar progress-bar-success progress-bar-striped\" style=\"width: ".($RS[10]/($RS[8]+$RS[9]+$RS[10])*100)."%\">
                    <span class=\"sr-only\"></span>
                  </div>
                  <div class=\"progress-bar progress-bar-primary progress-bar-striped\" style=\"width: ".($RS[9]/($RS[8]+$RS[9]+$RS[10])*100)."%\">
                    <span class=\"sr-only\"></span>
                  </div>
              </td>
              <td colspan=\"5\">투표수 : $RS[14]</td>
            </tr>";
          };

        ?>

      </tbody>
    </table>
  </div>
</div>
