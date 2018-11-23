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
     <a href="/php/logout.php"> <button class="sendtop"> Sair </button> </a>
     <a href="/php/perfil.php"> <button class="sendtop"> Perfil </button> </a>
<?php } ?>
</div>  
</div>


