<?php 

session_start();

if(!isset ($_SESSION['user'])){
	header('location:login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="../css/Home.css">
</head>
<body>
	<header>
		<div class="cabecalho">
			<fieldset class="fieldsettop">

				<div class="dropdown">
					&#9776;

					<div class="dropdown-content">
						<p> <a href="regioes.php"> <button class="drop"> Regiões </button> </a> </p>

						<p> <a href="regioes.php"> <button class="drop"> Comunidades </button> </a></p>

						<p> <a href="noticia.php"> <button class="drop"> Notícias </button> </a></p>

						<p> <a href="../html/pessoas.html"> <button class="drop"> Conheça-nos </button> </a></p>

					</div>
				</div>

				<img class="logo" src="../img/logo.png">

				<a href="logout.php"> <button class="sendtop"> Sair </button> </a>

			</fieldset>
		</div>
	</header>

</body>
</html>
</body>
</html>