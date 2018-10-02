<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Início</title> 
	<link rel="stylesheet" type="text/css" href="css/barraL.css" >
	<link rel="shortcut icon" href="img/icon.png" >
</head>
<body>
     <div class="lc">
     <?php
    if(!isset($_SESSION['user'])){ ?>
		<a href="php/cadastro.php"> <button class="sendtop" > Cadastrar-se</button></a>
		<a href="php/login.php"> <button class="sendtop"> Login</button></a>
	<?php }else{ ?>
	    <a href="php/logout.php"> <button class="sendtop"> Sair </button> </a>
	    <?php } ?>
	</div>
	<div id="menu">
		<img class="logo" src="img/logo.png">
		<ul>
			<li><a href="#" class="active">Home</a></li>
			<li><a href="#">Notícias</a></li>
			<li><a href="#">Comunidades</a></li>
			<li><a href="#">Sobre</a></li>
		</ul>
	</div>


</body>
</html>