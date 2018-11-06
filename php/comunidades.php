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
    <title>Comunidades</title>
    <?php include("bar.php"); ?>
  
  <style>
  /* Style the input field */
  #myInput {
    padding: 20px;
    margin-top: -6px;
    border: 0;
    border-radius: 0;
    background: #f1f1f1;
  }
  .dropdown-menu{
    overflow: auto;
    height: 200px;
  }
  body {
    background-color:#e6f3ff;
    /*background-image: url("igarassu.jpg");
    background-repeat: no-repeat;
    background-size: 1%;*/
  }

  </style>
  <link rel="stylesheet" type="text/css" href="/css/home.css">
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
      <?php
      require_once('conect.php');
      $stmt= $pdo->prepare('SELECT * FROM comunidades');
      $stmt->execute();
      $com=$stmt->fetchall();

      for ($i=0; $i < sizeof($com); $i++) { 
          echo '<li><a href="comunidades.php?comunidade='.$com[$i]['id'].'">'.$com[$i]['nome'].'</a>';
      }

    ?>
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


<hr>
</div>
<?php 
if (isset($_GET['comunidade'])) {
  $feed=$pdo->prepare('SELECT * FROM posts WHERE comunidades_id=?');
  $feed->execute([$_GET['comunidade']]);
  $posts=$feed->fetchall();

}
for ($i=sizeof($posts)-1; $i >=0 ; $i--) { 

    echo '<div class="postagens">';
    echo '<a href="coment.php?post='.$posts[$i]['id'].'"><h1>'.$posts[$i]['title']."</h1></a>";
    echo "<h2>".$posts[$i]['descricao']."</h2>";
    echo "<p>".$posts[$i]['post']."</p>";
    if ($posts[$i]['imagem']!=null) {
    echo '<a href="coment.php?post='.$posts[$i]['id'].'"><img src="'.$posts[$i]['imagem'].'"></a>';
    }
    echo '<div class="postA">';
    if ($_SESSION['id']==$posts[$i]['users_id']) {
      echo '<a onclick="confirma('.$posts[$i]['id'].')" ><button >Excluir </button></a>';
      echo '<a href="/php/editar.php?edit='.$posts[$i]['id'].'" ><button > Editar </button></a>';
    }
    echo "</div>";
    echo "</div><br>";
                  
  }
?>
</body>
</html>

    
</body>
</html>