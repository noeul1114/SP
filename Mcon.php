<?php
class mysql_func
{
      private $LI;
      private $TF;
      private $data;
      private $result;

      function login($ID,$PW)
      {
        $LI = mysqli_connect('localhost','root','','SP') or die ('fail to connect');
        $TF = "SELECT num FROM users WHERE ID = '$ID' and PW = '$PW'";
        $data = mysqli_query($LI, $TF) or die ('wrong query');
        $result = mysqli_num_rows($data);

        return $result;
      }

      function logout()
      {
        session_destroy();

        return ;
      }
}
