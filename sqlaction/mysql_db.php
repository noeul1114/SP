<?php
class mysql_db
{
      private $DB;
      private $TF;
      private $data;
      private $result;
      private $num;

      function CREATE_TABLE($table)
      {
        $DB = mysqli_connect('localhost','root','autoset','SP') or die ('fail to connect');
        $TF = ("CREATE TABLE ".$table." (
              	num INT(10) AUTO_INCREMENT PRIMARY KEY,
              	HL VARCHAR(100) NOT NULL,
              	DESCR MEDIUMTEXT NOT NULL,
              	WRT VARCHAR(60) NOT NULL,
              	C_AT DATE NOT NULL,
              	U_AT DATE NOT NULL,
              	D_AT DATE NULL DEFAULT NULL,
              	U INT(10) UNSIGNED NOT NULL DEFAULT '0',
              	D INT(10) UNSIGNED NOT NULL DEFAULT '0',
              	N INT(10) UNSIGNED NOT NULL DEFAULT '0',
              	ST VARCHAR(50) NOT NULL DEFAULT '0',
              	IF_N TINYINT(4) NOT NULL DEFAULT '0',
                VW INT(11) NULL DEFAULT '0',
              	V_ID INT(10) UNSIGNED NOT NULL DEFAULT '0',
              	V_NID INT(10) UNSIGNED NOT NULL DEFAULT '0',
              	RV INT(11) UNSIGNED NOT NULL DEFAULT '0',
                EM VARCHAR(70) NULL DEFAULT NULL,
                IP VARCHAR(30) NULL DEFAULT '0.0.0.0'
              )");
        var_dump($TF);
        mysqli_query($DB,$TF) or die ("<script>window.alert('Wrong Query.');location.href='mysql_interface.php';</script>");

        echo "<script>window.alert('Create Complete.');location.href='mysql_interface.php';</script>";
      }

      function SELECT_FROM_USERS()
      {
        $DB = mysqli_connect('localhost','root','autoset','SP') or die ('fail to connect');
        $TF = "SELECT * FROM users";
        $result = mysqli_query($DB,$TF) or die ("<script>window.alert('Wrong Query.');location.href='mysql_interface.php';</script>");
        $count_all = mysqli_num_rows($result);

        $AR = mysqli_fetch_all($result);

        for($count=1; $count<$count_all+1; $count++) {
          echo ("<tr><td>".$count."</td>");

          for($count_a=1; $count_a<10; $count_a++) {
            echo ("<td>".$AR[$count-1][$count_a]."</td>");
          }
          echo "<td></td></tr>";
        }
      }

      function MATCH_TABLE($table)
      {
        $DB = mysqli_connect('localhost','root','autoset','SP') or die ('fail to connect');
        $TF = "SHOW TABLES";
        $result = mysqli_query($DB,$TF) or die ("<script>window.alert('Wrong Query.');location.href='mysql_interface.php';</script>");
        $AR = mysqli_fetch_all($result);
        $count_all = mysqli_num_rows($result);
        for($count=1; $count<$count_all+1; $count++) {
          if($AR[$count-1][0]==$table){
            return true;
          }
        }
        if($count==$count_all+1) {
          return false;
        }
      }

      function SHOW_TABLES()
      {
        $DB = mysqli_connect('localhost','root','autoset','SP') or die ('fail to connect');
        $TF = "SHOW TABLES";
        $result = mysqli_query($DB,$TF) or die ("<script>window.alert('Wrong Query.');location.href='mysql_interface.php';</script>");
        $count_all = mysqli_num_rows($result);

        $AR = mysqli_fetch_all($result);
        for($count=1; $count<$count_all+1; $count++) {
          echo ("<tr><td>".$count."</td><td>".$AR[$count-1][0]."</td>");
          echo ("<td><form method=\"POST\" action=\"\"><button type=\"submit\" name=\"table\" value=".$AR[$count-1][0]." class=\"btn btn-xs\">Del</button></td></form></tr>");
        }
      }

      // function DROP_TABLE($table)
      // {
      //   $DB = mysqli_connect('localhost','root','qudtlstz1','SP') or die ('fail to connect');
      //   $TF = ("DROP TABLE ".$table);
      //   mysqli_query($DB,$TF);
      //
      // }
  }
