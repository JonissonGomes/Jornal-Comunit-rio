<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href= "../css/form.css">
 	<?php include('bar.php'); ?>
</head>
<body>
	<div class="login">
			<center>
				<h1>Entrar</h1>
				<?php 
				if(isset($_SESSION['inc'])){
				?>
				<span style="color: blue;">Usuário cadastrado com sucesso!</span>
				<?php
				unset($_SESSION['inc']);
				}if (isset($_SESSION['error'])){
				?>
				<span style="color: red;">Usuário não existe!</span>
				<?php
				unset($_SESSION['error']);
				}
				?>
				<form method="post" action="login2.php">
					<p>Login: <input type="text" name="user" placeholder="Usuário"></p>
					<p>Senha: <input type="password" name="pass" placeholder="Digite sua senha"></p>
					<input class="enviar" type="submit" value="Login">
				</form>
			<a href="../index.php"><button class="enviar">voltar</button></a>
			</center>
	</div>
</body>
</html>