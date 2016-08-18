<?php
function ErrorMessage($message){
  echo("<Script>\n <!--\n window.alert('$message')\n history.go(-1)\n -->\n </Script>\n");
exit;
}
function remove_html($string){
  $string = str_replace("<", "&lt", $string);
  $string = str_replace(">", "&gt", $string);
}
function magic_quotes($var)
{
    if (get_magic_quotes_gpc() == false)
    {
        $result = addslashes($var);
    }
    else
    {
        $result = $var;
    }

    return $result;
}


?>
