<div class="row">
  <div class="col-lg-12" id="infotitle">
      <h1 class="jumbotron">Say::Project</h1>
      <br>
        <h3><?php
        $DATA = new article_db;
        $TOP = $DATA->SHOW_ARTICLE();
        echo $TOP['HL'];?></h3>
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
                <h4>찬성 댓글 제목</h4>
                <p>내용내용내용내용</p>
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
                <h4>중립 댓글 제목</h4>
                <p>내용내용내용내용</p>
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
                <h4>반대 댓글 제목</h4>
                <p>내용내용내용내용</p>
              </div>
            </div>
          </div>
        </div>
  </div>
</div>
