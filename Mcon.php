<?php
class mysql_func
{
      private $LI;
      private $TF;
      private $data;
      private $result;



      function login($ID,$PW)
      {

        $LI = mysqli_connect('localhost','root','autoset','SP') or die ('fail to connect');
        $TF = "SELECT num FROM users WHERE ID = '$ID' and PW = '$PW'";
        $data = mysqli_query($LI, $TF) or die ('wrong query');
        $result = mysqli_num_rows($data);

        return $result;
      }

      function REGISTER_CHECK_ID($ID)
      {
        if(!ctype_alnum($_POST['ID'])){
          return -1;
        }
        $LI = mysqli_connect('localhost','root','autoset','SP') or die ('fail to connect');
        $TF = "SELECT num FROM users WHERE ID ='$ID'";
        $data = mysqli_query($LI, $TF) or die ('wrong query');


        $result = mysql_num_rows($data);

        return $result;
      }

      function REGISTER_CHECK_EM($EM)
      {

        $LI = mysqli_connect('localhost','root','autoset','SP') or die ('fail to connect');
        $TF = "SELECT num FROM users WHERE EM = '$EM'";
        $data = mysqli_query($LI, $TF) or die ('wrong query');
        $result = mysql_num_rows($data);

        return $result;
      }

      function REGISTER($ID, $EM, $PW, $AG)
      {
        $LI = mysqli_connect('localhost','root','autoset','SP') or die ('fail to connect');
        $TF = "INSERT INTO users (ID, EM, PW, AG) VALUES('$ID', '$EM', '$PW', '$AG')";

        $data = mysqli_query($LI, $TF);

        return $data;
      }

      function logout()
      {
        session_destroy();

      }
}
