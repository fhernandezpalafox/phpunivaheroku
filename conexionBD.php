<?php
//$mysql = new mysqli("localhost", "root", "root", "univa01");
$mysql = new mysqli("us-cdbr-east-04.cleardb.com", "baec3702f459d5", "57597920", "heroku_10ff34f8473daa0");
if ($mysql->connect_error)
  die('Problemas con la conexion a la base de datos');

?>