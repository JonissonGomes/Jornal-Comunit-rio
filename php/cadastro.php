<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cadastro</title>
	<link rel="stylesheet" type="text/css" href="../css/form.css">
	<?php include('bar.php');
 	if (isset($_SESSION['erro'])) { ?>
 		<script type="text/javascript">
 			alert("<?=$_SESSION['erro']?>");
 		</script>

 	<?php unset($_SESSION['erro']); }?>
</head>
<body>
	<div class="login">
		<form method="post" action="new_user.php">
			<h1> Cadastre-se:</h1>
			<p>Nome do usuário: <br> <input type="text" name="user" placeholder="Digite seu nome"></p>
			<p>Senha: <br> <input type="password" name="password" placeholder="Digite sua senha"></p>
			<p>Confirmar senha: <br> <input type="password" name="pass" placeholder="Confirme sua senha"></p>
			<button type="submit" class="btn btn-primary btn-block btn-large">Cadastrar</button>
		</form>
	</div>
			</body>
			</html>