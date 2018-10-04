    <link rel="stylesheet" type="text/css" href="../css/barraL.css" >
	<link rel="shortcut icon" href="../img/icon.png" >
    <div class="lc">
    <!-- ver qual a pagina que o usuario esta acessando -->
    	<?php $paginaCorrente = basename($_SERVER['PHP_SELF']);?>
     <?php
     /*se o usuario não estiver logado mostrara os links para login e cadastro*/
    if(!isset($_SESSION['user']) && $paginaCorrente == "index.php" ){ ?>
		<a href="php/cadastro.php"> <button class="sendtop" > Cadastrar-se</button></a>
		<a href="php/login.php"> <button class="sendtop"> Login</button></a>
		<!-- caso ja esteja logado mostrara o link para sair, a um link adional pois houve a necessidade de dois paramentros para o link  -->
	<?php }elseif (isset($_SESSION['user']) && $paginaCorrente == "index.php" ){ ?>
	    <a href="php/logout.php"> <button class="sendtop"> Sair </button> </a>
	    <?php }elseif(isset($_SESSION['user'])){?>
		<a href="logout.php"> <button class="sendtop"> Sair </button> </a>
	    <?php }else{ 	
	    	} ?>
	</div>
	
	
	 <div>
		<img src="../img/logo.png" class="logo">
	 	
	 </div>  
	<div id="menu">
	
	<ul>
			<!-- marca o link da pagina atual em que o usuario esta acessando //a concluir -->
			<?php if ($paginaCorrente == "index.php"){?>
			<li><a href="index.php" <?php if ($paginaCorrente == "index.php") { echo 'class="active"';} ?>>Home</a></li>	
			<?php } else { ?>
			<li><a href="../index.php">Home</a></li>	
			<?php }	?>
			<?php if ($paginaCorrente == "index.php"){?>
			<li><a href="/php/home.php" >Notícias</a></li>	
			<?php } else { ?>
			<li><a href="home.php" <?php if ($paginaCorrente == "home.php") { echo 'class="active"';} ?>>Notícias</a></li>	
			<?php }	?>	
			<?php if ($paginaCorrente == "index.php"){?>
			<li><a href="php/Comunidades.php" >Comunidades</a></li>	
			<?php } else { ?>
			<li><a href="Comunidades.php" >Comunidades</a></li>	
			<?php }	?>
			<?php if ($paginaCorrente == "index.php"){?>
			<li><a href="php/sobre.php" >Sobre</a></li>	
			<?php } else { ?>
			<li><a href="sobre.php"<?php if ($paginaCorrente == "sobre.php") { echo 'class="active"';} ?>>Sobre</a></li>	
			<?php }	?>
			
		</ul>
	</div>
	
	