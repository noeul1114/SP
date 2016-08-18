<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-left">
                <li><a class="navbar-brand" href="?pgreq=home">Home</a></li>
                <li><a class="navbar-brand" href="?pgreq=info">About</a></li>
                <li><a class="navbar-brand" href="/public/sqlaction/mysql_interface.php">MYSQL</a></li>
                <li><a class="navbar-brand" href="/public/v2">V2</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <?php

              if(isset($_SESSION['login_user'])) {
                if($_SESSION['login_user']!=NULL)
                {
                  echo ("<li><a>".$_SESSION['login_user']." 님 안녕하세요</a></li>");
?>
                  <li><a href="/sp/action/logout.php">로그아웃</a></li>
                  <?php
                }
                    }
                    else {
                      ?>
                      <li><a href="/sp/view/register.php">회원가입</a></li>
                      <li><a href="/sp/view/login.php">로그인</a></li>
                      <?php
                    }
                    ?>
            </ul>
        </div>
    </div>
</nav>

<div class="row">
  <div class="col-xs-1"></div>
  <div class="col-xs-10">
    <div><a href="?pgreq=todaycomment"><button id="mainbutton" class="btn btn-default col-xs-2">주제</button></a></div>
    <div><a href="?pgreq=board&board=a"><button id="mainbutton" class="btn btn-default col-xs-2">A동</button></a></div>
    <div><a href="?pgreq=board&board=b"><button id="mainbutton" class="btn btn-default col-xs-2">B동</button></a></div>
    <div><a href="?pgreq=board&board=c"><button id="mainbutton" class="btn btn-default col-xs-2">C동</button></a></div>
    <div><a href="?pgreq=todaycomment"><button id="mainbutton" class="btn btn-default col-xs-2">한마디</button></a></div>
  </div>
</div>
