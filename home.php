<?php
$DATA = new article_db;
$TOP = $DATA->SHOW_HOTARGUE();
?>
<div class="row">
  <div class="col-xs-1"></div>
  <div class="col-xs-10">
    <div></div>
    <div><button id="mainbutton" class="btn btn-default col-xs-2"><a href="">주제</a></button></div>
    <div><button id="mainbutton" class="btn btn-default col-xs-2"><a href="">A동</a></button></div>
    <div><button id="mainbutton" class="btn btn-default col-xs-2"><a href="">B동</a></button></div>
    <div><button id="mainbutton" class="btn btn-default col-xs-2"><a href="">C동</a></button></div>
    <div><button id="mainbutton" class="btn btn-default col-xs-2"><a href="">자유</a></button></div>
  </div>
</div>
<div class="row">
  <div class="col-lg-12" id="infotitle">
      <h1 id="jumbo" class="jumbotron"><strong>Say::Project</strong></h1>
      <div></div>
      <br>
        <h3><?=$TOP['HL'];?></h3>
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
        <div class="row UDN">
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
                      echo ("><td>".$value['U']." ".$value['N']." ".$value['D']."</td><td>".$value['WRT']."</td></tr>");
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
                      echo ("><td>".$value['U']." ".$value['N']." ".$value['D']."</td><td>".$value['WRT']."</td></tr>");
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
                    echo ("><td>".$value['U']." ".$value['N']." ".$value['D']."</td><td>".$value['WRT']."</td></tr>");
                    echo ("<tr><td class=\"text-left\" colspan=\"2\"><article class=\"description\">".$value['DESCR']."</article></td></tr>");
                  }
                  ?>
                </table>
              </div>
            </div>
          </div>
        </div>
  </div>
</div>
