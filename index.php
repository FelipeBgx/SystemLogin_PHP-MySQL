<?php

require_once 'db_connect.php';

session_start();

if(isset($_POST['btn-entrar'])){
	$erros = array();
	$login = mysqli_escape_string($connect, $_POST['usuario']);
	$senha = mysqli_escape_string($connect, $_POST['senha']);

	if(empty($login) || empty($senha)){
		$erros[] = "<li> Os campos login/senha não podem estar vazios </li>";

	}else{
		$sql = "SELECT login FROM usuarios WHERE login = '$login'";
		$resultado = mysqli_query($connect, $sql);

		if(mysqli_num_rows($resultado) > 0){
			$senha = md5($senha);
			$sql = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'";
			$resultado = mysqli_query($connect, $sql);
			
			if(mysqli_num_rows($resultado) == 1){
				$dados = mysqli_fetch_array($resultado);
				$_SESSION['logado'] = true;
				$_SESSION['id_usuario'] = $dados['id'];
				$_SESSION['nome'] = $dados['name'];
				header('Location: home.php');

			}else{
				$erros[] = "<li> Usuário ou senha inválidos </li>";
			}

		}else{
			$erros[] = "<li> Usuário inexistente </li>";
		}
	}
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div>
		<h1 id="titulo"> LOGIN </h1>
		<p id="subtitulo"> Simples tela de login para fins de treinamento </p>
	</div>

	<?php
		if(!empty($erros)){
			foreach($erros as $erro){
				echo $erro;
			}
		}
	?>

	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<fieldset>
			<div class="campo">
				<label> Usuário: </label>
				<input type="text" name="usuario">
			</div>
			<div class="campo">
				<label> Senha: </label>
				<input type="password" name="senha">
			</div>
			<div class="campo">
				<button type="submit" name="btn-entrar"> Entrar </button>
			</div>
		</fieldset>
	</form>
</body>
</html>