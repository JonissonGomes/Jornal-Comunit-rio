

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cadastro</title>
	<link rel="stylesheet" type="text/css" href="../css/form.css">
	<?php include('bar.php');?>
</head>
<body>
	<div class="cadastro">
		<form method="post" action="new_user.php">
			<h1> Cadastre-se:</h1>
			<p>Nome do usuário: <br> <input type="text" name="user" placeholder="Digite seu nome"></p>
			<p>Senha: <br> <input type="password" name="password" placeholder="Digite sua senha"></p>
			<p>Confirmar senha: <br> <input type="password" name="pass" placeholder="Confirme sua senha"></p>
			<input class="enviar" type="submit" value="Finalizar cadastro">
			
			<a href="../index.php" class="enviar">Voltar</a>
		</form>
	</div>
			</body>
			</html>