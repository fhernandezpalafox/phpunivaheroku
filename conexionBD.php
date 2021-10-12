<?php
$mysql = new mysqli("localhost", "root", "root", "univa01");
if ($mysql->connect_error)
  die('Problemas con la conexion a la base de datos');

?>