<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="CSS/form.css">
</head>
<body>
	<div class="login">
		<fieldset class="divlogin">
			<center>
				<h1>Entrar</h1>
				<?php 
				if(isset($_SESSION['logado'])){
				?>
				<span style="color: blue;">Usuário cadastrado com sucesso!</span>
				<?php
				unset($_SESSION['logado']);
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
					<input class="send" type="submit" value="Login">
					<a href="cadastro.php" class="send">Cadastrar</a>
				</form>
			</center>
		</fieldset>
	</div>
	<footer class="rodape">
		<center><p class="trodape">Copyright - Jornal comunitario </center>
	</footer>
</body>
</html>