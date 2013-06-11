<?php
$conexion=mysql_connect("srvr","usr","pass"); 
if (!$conexion){
  	die('Fallida: ' . mysql_error());
  	}
mysql_select_db("files", $conexion);


function mataInjection($value)
{
	$value=utf8_decode($value);

if (get_magic_quotes_gpc())
  {
  $value = stripslashes($value);
  }

if (!is_numeric($value))
  {
  $value = mysql_real_escape_string($value);
  }
return $value;
}

?>