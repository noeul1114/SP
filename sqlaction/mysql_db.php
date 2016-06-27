<?php
class mysql_db
{
      private $DB;
      private $TF;
      private $data;
      private $result;

      function CREATE_TABLE()
      {
        $DB = mysqli_connect('localhost','root','qudtlstz1','SP') or die ('fail to connect');
        $TF = "CREATE TABLE TB (id int, title varchar(60) )";
        mysqli_query($DB,$TF) or die ('Wrong Query.');

//        echo "<script>window.alert('Create Complete.');</script><br><script>location.href='mysql_interface.php';</script>";
      }

      function logout()
      {
        session_destroy();

        return ;
      }
}
