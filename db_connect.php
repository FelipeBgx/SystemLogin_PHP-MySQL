<?php

$host = "localhost";
$username = "root";
$passwd = "";
$db_name = "systemlogin";

$connect = mysqli_connect($host, $username, $passwd, $db_name);

if(mysqli_connect_error()){
	echo "Falha na conexão: ". mysqli_connect_error();
}

?>