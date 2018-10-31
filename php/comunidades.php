<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Comunidades</title>
    <?php include("bar.php"); ?>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  /* Style the input field */
  #myInput {
    padding: 20px;
    margin-top: -6px;
    border: 0;
    border-radius: 0;
    background: #f1f1f1;
  }
  body {
    background-color:#e6f3ff;
    /*background-image: url("igarassu.jpg");
    background-repeat: no-repeat;
    background-size: 1%;*/
  }

  </style>
</head>
<body>
<div class="div">
<div class="container">
  <h2>Comunidades Cadastradas</h2>
  <p>Pesquise o nome da comunidade e tenha acesso as suas publicações.</p>
  <p>Não encontrou uma comunidade? Faça o cadastro dela.</p>
  <div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Lista de Comunidades
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <input class="form-control" id="myInput" type="text" placeholder="Search..">
      <li><a href="#">Alto do céu</a></li>
      <li><a href="#">Cortegada</a></li>
      <li><a href="#">Vila Rural</a></li>
      <li><a href="#">Saramandaia</a></li>
      <li><a href="#">Beira Mar 1</a></li>
      <li><a href="#">Beira Mar 2</a></li>
    </ul>
  </div>
</div>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".dropdown-menu li").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

<div class="container">
  <h2>Últimas publicações</h2>  
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
        <img src="/img/a.jpg" alt="" style="width:100%;">
      </div>

      <div class="item">
        <img src="/img/igarassu2.jpg" alt="" style="width:100%;">
      </div>
    
      <div class="item">
        <img src="/img/igarassu3.jpg" alt="" style="width:100%;">
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
</div>
</body>
</html>

	
</body>
</html>