<?php session_start();?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Início</title> 
	 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
  
	<link rel="shortcut icon" href="img/icon.png" >
	<?php include('php/bar.php') ?>
</head>
<body>
<div class="container">
  <h2></h2>  
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="/img/igarassu.jpg" alt="" style="width:100%;filter: brightness(50%)">
        <div class="item">
          <div class="carousel-caption">
            <h3>Web Jornal</h3>
            <p>As notícias sobre a sua comunidade você encontra nesta plataforma.</p>
        </div>
    </div>
      </div>
      <div class="item">
        <img src="/img/igarassu2.jpg" alt="" style="width:100%;filter: brightness(50%)">
        <div class="item">
        <div class="carousel-caption">
          <h3>O que o Web Jornal oferece?</h3>
          <p>Web Jornal oferece ao usuário a possibilidade de fazer publicações sobre problemas locais e a receber feedback sobre a resolução dos problemas. </p>
          </div>
        </div>
      </div>
      <div class="item">
        <img src="/img/a.jpg" alt="" style="width:100%;filter: brightness(50%)">
        <div class="item">
          <div class="carousel-caption">
           <h3>Web Jornal</h3>
           <p>Faça publicações sobre os problemas da sua cidade, receba feedbacks e contribua para a melhoria da sua comunidade.</p>
          </div>
        </div>
      </div>
    </div>
    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
	<div class="alinha">
	<h3>Sobre o que você pode publicar?</h3><br>
	<br>
	<fieldset class="foto1">
		<img  class="aline" src="../img/saude.png" width="150" height="150">
		<p> Saúde	
	</fieldset>

	<fieldset class="foto1">
		<img src="../img/agua.png" width="150" height="150">
		<p>Saneamento básico
	</fieldset>

	<fieldset class="foto1">
		<img src="../img/educacao.png" width="150" height="150">
		<p> Educação
	</fieldset>

	<fieldset class="foto1">
		<img src="../img/saude.png" width="150" height="150">

	</fieldset>

	<fieldset class="foto1">
		<img src="../img/saude.png" width="150" height="150">

	</fieldset>

	</div>
</body>
</html>