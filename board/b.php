<?php
$DATA = new article_db;
$TOP = $DATA->SHOW_HOTARGUE_BOARD("a");
?>
<div class="row">
  <div class="col-lg-12" id="infotitle">
      <h1 id="jumbo" class="jumbotron"><strong>Say::Project</strong></h1>
      <br>
      <div class="row container">
        <div class="row">
          <div class="col-sm-9 col-xs-12">
            <table class="table">
              <tr>
                <th style="width:20%; border-top: none; border-right:1px solid #ddd; text-align:center"><h3><?=$DATA->FIND_BOARD($TOP['board_name'])?></h3></th>
                <th style="width:80%; border-top: none; padding-left:1%; text-align:center"><h3><?=$TOP['HL']?></h3></th>
              </tr>
            </table>
          </div>
          <div class="writer">
            <div class="text-right col-sm-1 col-xs-8">
              <img class="writericon" src="img/edit.png" alt="">
            </div>
            <div class="col-sm-2 col-xs-4">
              <table>
                <th class="text-center"><a href=""><?=$TOP['WRT'];?></a></th>
              </table>
            </div>
          </div>
        </div>
        <div class="row text-left">
          <small class="article_info">
          <?php
          echo ("찬성 : ".$TOP['U']."중립 : ".$TOP['N']."반대 : ".$TOP['D']."총투표수 : ".$TOP['V_ID']."조회수 : ".$TOP['VW']."</small><br><small class=\"article_info\">작성일자 : ".$TOP['C_AT']);
          ?>
         </small>
        </div>
      </div>
        <hr>
        <p><?=$TOP['DESCR']?></p>
        <hr>
        <div>
          <div class="progress">
            <div class="progress-bar progress-bar-danger progress-bar-striped" style="width: <?=$TOP['U']/($TOP['U']+$TOP['D']+$TOP['N'])*100?>%">
              <span class="sr-only"></span><?=ceil($TOP['U']/($TOP['U']+$TOP['D']+$TOP['N'])*100)?>%
            </div>
            <div class="progress-bar progress-bar-success progress-bar-striped" style="width: <?=$TOP['N']/($TOP['U']+$TOP['D']+$TOP['N'])*100?>%">
              <span class="sr-only"></span><?=ceil($TOP['N']/($TOP['U']+$TOP['D']+$TOP['N'])*100)?>%
            </div>
            <div class="progress-bar progress-bar-primary progress-bar-striped" style="width: <?=$TOP['D']/($TOP['U']+$TOP['D']+$TOP['N'])*100?>%">
              <span class="sr-only"></span><?=ceil($TOP['D']/($TOP['U']+$TOP['D']+$TOP['N'])*100)?>%
            </div>
          </div>
        </div>
        <hr>
        <br>
    </div>
        <div class="row UDN" id="infotitle">
          <div class="col-sm-4">
            <div class="row">
              <div class="col-sm-4"></div>
              <div>
                <buttonc class="btn btn-danger col-xs-12 col-sm-8">찬성</button>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-sm-12">
                <table class="table table-condensed">
                    <?php
                    $CM = $DATA->SHOW_HOTARGUE_COMMENT_U();
                    $i = 0;
                    foreach ($CM as $value)
                    {
                      $i++;
                      echo ("<tr ");
                      if ($i==1) {
                        echo ("class=\"danger\"");
                    }
                      echo ("><td><span class=\"glyphicon glyphicon-arrow-up Gicon-up\" aria-hidden=\"true\"></span><small>".$value['U']);
                      echo (" </small><span class=\"glyphicon glyphicon-resize-small Gicon-neut\" aria-hidden=\"true\"></span><small>".$value['N']);
                      echo (" </small><span class=\"glyphicon glyphicon-arrow-down Gicon-down\" aria-hidden=\"true\"></span><small>".$value['D']);
                      echo ("</small></td><td>".$value['WRT']."</td></tr>");
                      echo ("<tr><td class=\"text-left\" colspan=\"2\"><article class=\"description\">".$value['DESCR']."</article></td></tr>");
                    }
                    ?>
                </table>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="row">
              <div class="col-sm-2"></div>
              <div>
                <buttonc class="btn btn-success col-xs-12 col-sm-8">중립</button>
              </div>
              <div class="col-sm-2"></div>
            </div>
            <br>
            <div class="row">
              <div class="col-sm-12">
                <table class="table table-condensed">
                    <?php
                    $CM = $DATA->SHOW_HOTARGUE_COMMENT_N();
                    $i = 0;
                    foreach ($CM as $value)
                    {
                      $i++;
                      echo ("<tr ");
                      if ($i==1) {
                        echo ("class=\"success\"");
                      }
                      echo ("><td><span class=\"glyphicon glyphicon-arrow-up Gicon-up\" aria-hidden=\"true\"></span><small>".$value['U']);
                      echo (" </small><span class=\"glyphicon glyphicon-resize-small Gicon-neut\" aria-hidden=\"true\"></span><small>".$value['N']);
                      echo (" </small><span class=\"glyphicon glyphicon-arrow-down Gicon-down\" aria-hidden=\"true\"></span><small>".$value['D']);
                      echo ("</small></td><td>".$value['WRT']."</td></tr>");
                      echo ("<tr><td class=\"text-left\" colspan=\"2\"><article class=\"description\">".$value['DESCR']."</article></td></tr>");
                    }
                    ?>
                </table>
            </div>
              </div>
          </div>
          <div class="col-sm-4">
            <div class="row">
              <div>
                <buttonc class="btn btn-primary col-xs-12 col-sm-8">반대</button>
              </div>
              <div class="col-sm-4"></div>
            </div>
            <br>
            <div class="row">
              <div class="col-sm-12">
                <table class="table table-condensed">
                  <?php
                  $i = 0;
                  foreach ($CM as $value)
                  {
                    $i++;
                    echo ("<tr ");
                    if ($i==1) {
                        echo ("class=\"info\"");
                    }
                    echo ("><td><span class=\"glyphicon glyphicon-arrow-up Gicon-up\" aria-hidden=\"true\"></span><small>".$value['U']);
                    echo (" </small><span class=\"glyphicon glyphicon-resize-small Gicon-neut\" aria-hidden=\"true\"></span><small>".$value['N']);
                    echo (" </small><span class=\"glyphicon glyphicon-arrow-down Gicon-down\" aria-hidden=\"true\"></span><small>".$value['D']);
                    echo ("</small></td><td>".$value['WRT']."</td></tr>");
                    echo ("<tr><td class=\"text-left\" colspan=\"2\"><article class=\"description\">".$value['DESCR']."</article></td></tr>");
                  }
                  ?>
                </table>
              </div>
            </div>
          </div>
        </div>
</div>
<div class="row">
  <div class="col-xs-12">
    <table class="table table-hover">
      <tbody>
        <tr>
          <td style="width:25%">ss</td>
          <td style="width:25%">s</td>
          <td style="width:25%">s</td>
          <td style="width:25%">s</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
