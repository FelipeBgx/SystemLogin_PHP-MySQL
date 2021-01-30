<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title> Página Restrita </title>
</head>
<body>
	<h1> Hello <?php echo $_SESSION['id_usuario'];?>! </h1>
</body>
</html>