<div class="row">
  <div class="col-xs-1"></div>
  <div class="col-xs-10">
    <div><button id="mainbutton" class="btn btn-default col-xs-2"><a href="?pgreq=subj&board=s">주제</a></button></div>
    <div><button id="mainbutton" class="btn btn-default col-xs-2"><a href="?pgreq=board&board=a">A동</a></button></div>
    <div><button id="mainbutton" class="btn btn-default col-xs-2"><a href="?pgreq=board&board=b">B동</a></button></div>
    <div><button id="mainbutton" class="btn btn-default col-xs-2"><a href="?pgreq=board&board=c">C동</a></button></div>
    <div><button id="mainbutton" class="btn btn-default col-xs-2"><a href="?pgreq=todaycomment">한마디</a></button></div>
   </div>
 </div>
<?php
require "/module/hotargue.php";
?>
<?php
$ROWS = $DATA->SHOW_BOARD_ROWS($_GET['board']);
?>

        <?php
        require "module/list.php";
        ?>

  </div>
</div>
