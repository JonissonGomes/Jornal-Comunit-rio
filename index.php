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
          <h3>Seu texto aqui</h3>
          <p>Seu texto aqui</p>
          </div>
        </div>
      </div>
      <div class="item">
        <img src="/img/igarassu3.jpg" alt="" style="width:100%;filter: brightness(50%)">
        <div class="item">
          <div class="carousel-caption">
           <h3>Seu texto aqui</h3>
           <p>Seu texto aqui</p>
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
</body>
</html>