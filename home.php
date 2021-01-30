<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title> Página Restrita </title>
</head>
<body>
	<p> Olá <?php echo $_SESSION['nome'];?>! </p>
</body>
</html>