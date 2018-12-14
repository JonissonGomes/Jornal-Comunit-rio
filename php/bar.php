<!DOCTYPE html>
<html>
<head>
	<?php include('pacote.php'); ?>
	<?php
	
	if (isset($_SESSION['inc'])) { ?>
	<script type="text/javascript">
		alert("<?=$_SESSION['inc']?>");
	</script>

	<?php unset($_SESSION['inc']); }?>
	<link rel="stylesheet" type="text/css" href="../css/wjc.css" >
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css">
	<script src="/js/jquery.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<script src="/js/index.js"></script>
	<link rel="shortcut icon" href="../img/icon.png" >
	<?php $paginaCorrente = basename($_SERVER['PHP_SELF']); ?>
	<div id="menu">
		<a href="/index.php"><img src="../img/logo.png" class="logo"></a>
		<ul id="menu2">			
			<li><a href="/index.php" <?php if ($paginaCorrente == "index.php") { echo 'class="active"';} ?>>Home</a></li>
			<?php if (!isset($_SESSION['user'])) {?>
			<li><a data-toggle="modal" data-target="#mLogin">Notícias</a></li>
			<li><a data-toggle="modal" data-target="#mLogin">Comunidades</a></li>
			<?php } else {?>
			<li><a href="/php/home.php" <?php if ($paginaCorrente == "home.php") { echo 'class="active"';} ?>>Notícias</a></li>	
			<li><a href="/php/comunidades.php" <?php if ($paginaCorrente == "comunidades.php") { echo 'class="active"';} ?>>Comunidades</a></li>
			<?php } ?>	
			<li><a href="/php/sobre.php"<?php if ($paginaCorrente == "sobre.php") { echo 'class="active"';} ?>>Sobre</a></li>			
		</ul>
		<div >

			<?php 
			if(!isset($_SESSION['user'])){ include('cadastro.php');?>
			<button type="button" class="sendtop" data-toggle="modal" data-target="#mCadastrar">Cadastrar</button>
			<?php include('login.php');?>
			<button type="button" class="sendtop" data-toggle="modal" data-target="#mLogin">Login</button>

			<?php } else { ?>
			<div id="main-container">

				<div id="header">

					<div id="nav-bar">

						<div id="notifications" class="menu">

							<img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTguMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDIyOS4yMzggMjI5LjIzOCIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgMjI5LjIzOCAyMjkuMjM4OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjY0cHgiIGhlaWdodD0iNjRweCI+CjxwYXRoIGQ9Ik0yMjAuMjI4LDE3Mi4yNDJjLTIwLjYwNi0xNy44Mi0zOS42NzUtNDIuOTYyLTM5LjY3NS0xMDUuNzM0YzAtMzYuMzUzLTI5LjU3Ni02NS45MjgtNjUuOTMtNjUuOTI4ICBjLTM2LjM1OSwwLTY1LjkzOSwyOS41NzUtNjUuOTM5LDY1LjkyOGMwLDYyLjgyOS0xOS4wNjIsODcuOTQ2LTM5LjY4NiwxMDUuNzUxQzMuMjgsMTc3LjIzOSwwLDE4NC40MTEsMCwxOTEuOTM3ICBjMCw0LjE0MiwzLjM1OCw3LjUsNy41LDcuNWg3MS4xNzVjMy40NzIsMTYuNjYzLDE4LjI2OCwyOS4yMjIsMzUuOTQ0LDI5LjIyMnMzMi40NzMtMTIuNTU4LDM1Ljk0NC0yOS4yMjJoNzEuMTc1ICBjNC4xNDIsMCw3LjUtMy4zNTgsNy41LTcuNUMyMjkuMjM4LDE4NC4zNSwyMjUuOTUsMTc3LjE2NywyMjAuMjI4LDE3Mi4yNDJ6IE0xMTQuNjE5LDIxMy42NTljLTkuMzQsMC0xNy4zMjEtNS45MjktMjAuMzgxLTE0LjIyMiAgSDEzNUMxMzEuOTQsMjA3LjczLDEyMy45NTksMjEzLjY1OSwxMTQuNjE5LDIxMy42NTl6IE0xNy45NTQsMTg0LjQzN2MwLjI3My0wLjI5NiwwLjU2NC0wLjU3OCwwLjg3MS0wLjg0NSAgYzMxLjQ0My0yNy4xNDYsNDQuODU4LTYyLjE2Miw0NC44NTgtMTE3LjA4NGMwLTI4LjA4MiwyMi44NTItNTAuOTI4LDUwLjkzOS01MC45MjhjMjguMDgzLDAsNTAuOTMsMjIuODQ2LDUwLjkzLDUwLjkyOCAgYzAsNTQuODcyLDEzLjQxNyw4OS44ODcsNDQuODc2LDExNy4wOTFjMC4zMDcsMC4yNjUsMC41OTgsMC41NDQsMC44NzIsMC44MzhIMTcuOTU0eiIgZmlsbD0iI0ZGRkZGRiIvPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K" />
							<div id="notification-bullet">
								<div class="inner"></div>
								<div class="outer"></div>
							</div>
						</div><!--end notifications-->

						<div class="account-btn">
							<p><?= $_SESSION['user']?></p>
							<img class="account-img" src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjI0cHgiIGhlaWdodD0iMjRweCIgdmlld0JveD0iMCAwIDI5Mi4zNjIgMjkyLjM2MiIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgMjkyLjM2MiAyOTIuMzYyOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+CjxnPgoJPHBhdGggZD0iTTI4Ni45MzUsNjkuMzc3Yy0zLjYxNC0zLjYxNy03Ljg5OC01LjQyNC0xMi44NDgtNS40MjRIMTguMjc0Yy00Ljk1MiwwLTkuMjMzLDEuODA3LTEyLjg1LDUuNDI0ICAgQzEuODA3LDcyLjk5OCwwLDc3LjI3OSwwLDgyLjIyOGMwLDQuOTQ4LDEuODA3LDkuMjI5LDUuNDI0LDEyLjg0N2wxMjcuOTA3LDEyNy45MDdjMy42MjEsMy42MTcsNy45MDIsNS40MjgsMTIuODUsNS40MjggICBzOS4yMzMtMS44MTEsMTIuODQ3LTUuNDI4TDI4Ni45MzUsOTUuMDc0YzMuNjEzLTMuNjE3LDUuNDI3LTcuODk4LDUuNDI3LTEyLjg0N0MyOTIuMzYyLDc3LjI3OSwyOTAuNTQ4LDcyLjk5OCwyODYuOTM1LDY5LjM3N3oiIGZpbGw9IiNGRkZGRkYiLz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K"/>
						</div>

					</div><!--end nav-bar-->

					<div id="account-panel">

						<div class="account-header">
								<img id="profile-pic" src="<?= $_SESSION['imagem']?>">
							<!-- <div id="profile-pic" style="background-image:url(<?= $_SESSION['imagem']?>);"></div> -->
							<div id="profile-details">
								<h1 style="color: black"><?= $_SESSION['user']?></h1>
								<div id="profile-buttons">
									<div class="view-profile"><a href="/php/perfil.php" style="text-decoration: none;color: white"> Ver Perfil </a></div>
								</div>
							</div>

						</div><!--end account-header-->

						<div class="account-menu">

							<ul class="account-menu-list">

								<li style="color: black">Feedback</li>
								<li style="color: black">Ajuda</li>
								<li style="color: black"><a href="/php/logout.php">Sair</a></li>
							</ul>

						</div><!--end account-menu-->

					</div><!--end account-panel-->

				</div> <!--end header -->



			</div><!--end main-container-->
			<?php } ?>
		</div>  
	</div>


