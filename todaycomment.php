<?php

require "lib/comment_db.php";

$DATA = new comment_db;

$CMT = $DATA->SHOW_COMMENT_TODAY();
$HCMT = $DATA->SHOW_HOT_TODAY();

?>
<center>
<div class="container">
  <?php while($RS = mysqli_fetch_array($HCMT)) { ?>
    <div class="title">
      <h1><?=$RS['COMMENT']?></h1>
    </div>
    <br>
  <?php } ?>

    <div class="block">

    </div>
    <table class="table">
      <thead>
        <tr>
          <th>제  목</th>
          <th>추천</th>
        </tr>
      </thead>
      <tbody>
        <?php while($RS = mysqli_fetch_array($CMT)) { ?>
        <tr>
          <td><?=$RS['COMMENT']?></td>
          <td><?=$RS['VT']?></td>
          <td>
            <form action="action/TComment_vote.php" method="POST" class="form-horizontal">
            <div class="col-sm-offset-3 col-sm-6">
            <input type="hidden" name="num" value="<?=$RS['num']?>">
              <button type="submit" class="btn btn-default">
                  <i class="fa fa-plus"></i> 추천
              </button>
            </div>
          </form>
        </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
            <button class="btn btn-default">
                <i class="fa fa-plus"></i><a href="view/todaycommentwrite.php">한마디!</a>
            </button>
        </div>
    </div>
</div>
</center>
