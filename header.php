<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
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
                <li><a class="navbar-brand" href="sqlaction/mysql_interface.php">MYSQL</a></li>
                <li><a class="navbar-brand" href="v2">V2</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                    <li><a href="view/register.php">회원가입</a></li>
                    <li><a href="view/login.php"><?php

                    if(isset($_SESSION['login_user'])) {
                      if($_SESSION['login_user']!=NULL)
                      {
                        echo ($_SESSION['login_user']." 님 안녕하세요");
                        echo "<li><a href=\"action/logout.php\">로그아웃</a></li>";
                      }
                    }
                    else {
                      echo "로그인";
                    }
                    ?></a></li>
            </ul>
        </div>
    </div>
</nav>
