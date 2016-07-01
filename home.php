<div class="row">
  <div class="col-lg-12" id="infotitle">
      <h2 class="jumbotron">Say::Project</h2>
        <h3><?php
        $DATA = new article_db;
        $TOP = $DATA->SHOW_ARTICLE();
        echo $TOP['HL'];?></h3>
        <p><?=$TOP['DESCR']?></p>
        <div>
          <div class="progress">
            <div class="progress-bar progress-bar-success" style="width: <?=$TOP['U']/($TOP['U']+$TOP['D']+$TOP['N'])*100?>%">
              <span class="sr-only"></span>
            </div>
            <div class="progress-bar progress-bar-warning" style="width: <?=$TOP['D']/($TOP['U']+$TOP['D']+$TOP['N'])*100?>%">
              <span class="sr-only"></span>
            </div>
            <div class="progress-bar progress-bar-danger" style="width: <?=$TOP['N']/($TOP['U']+$TOP['D']+$TOP['N'])*100?>%">
              <span class="sr-only"></span>
            </div>
          </div>
        </div>
        <hr>
        <br>
        <div class="row">
          <span class="col-xs-2"></span>
          <span>
            <buttonc class="btn btn-danger col-xs-2">花</button>
          </span>
          <span class="col-xs-1"></span>
          <span>
            <buttonc class="btn btn-success col-xs-2">成</button>
          </span>
          <span class="col-xs-1"></span>
          <span>
            <buttonc class="btn btn-primary col-xs-2">十</button>
          </span>
          <span class="col-xs-2"></span>
        </div>
  </div>
</div>
