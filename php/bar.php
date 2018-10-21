   <?php session_start(); ?>
    <link rel="stylesheet" type="text/css" href="../css/barraL.css" >
	<link rel="shortcut icon" href="../img/icon.png" >
    <div class="lc">
    <!-- ver qual a pagina que o usuario esta acessando -->
    	<?php $paginaCorrente = basename($_SERVER['PHP_SELF']);
     /*se o usuario não estiver logado mostrara os links para login e cadastro*/
    if(!isset($_SESSION['user'])){ ?>
		<a href="/php/cadastro.php"> <button class="sendtop" > Cadastrar-se</button></a>
		<a href="/php/login.php"> <button class="sendtop"> Login</button></a>
		<!-- caso ja esteja logado mostrara o link para sair, a um link adional pois houve a necessidade de dois paramentros para o link  -->
	<?php }elseif (isset($_SESSION['user'])){ ?>
	    <a href="/php/logout.php"> <button class="sendtop"> Sair </button> </a>
	    <?php } ?>
	</div>  
	<div id="menu">
	<a href="/index.php"><img src="../img/logo.png" class="logo"></a>
	<ul id="menu2">
			<!-- marca o link da pagina atual em que o usuario esta acessando //a concluir -->
			<li><a href="/index.php" <?php if ($paginaCorrente == "index.php") { echo 'class="active"';} ?>>Home</a></li>
			<li><a href="/php/home.php" <?php if ($paginaCorrente == "home.php") { echo 'class="active"';} ?>>Notícias</a></li>	
			<li><a href="/php/comunidades.php" <?php if ($paginaCorrente == "comunidades.php") { echo 'class="active"';} ?>>Comunidades</a></li>	
			<li><a href="/php/sobre.php"<?php if ($paginaCorrente == "sobre.php") { echo 'class="active"';} ?>>Sobre</a></li>			
		</ul>
	</div>
	
	