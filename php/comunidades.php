<?php include("bar.php"); ?>
<meta charset="UTF-8">
<title>Comunidades</title>
<?php 
if(!isset($_SESSION['id'])){
		header('location:/index.php');
	}

?>
</head>
<body>
  <div class="div">
    <div class="container">
      <h2 class="pr">Comunidades Cadastradas</h2>
      <p class="pr">Pesquise o nome da comunidade e tenha acesso as suas publicações.</p>
      <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Lista de Comunidades
          <span class="caret"></span></button>
          <ul class="dropdown-menu" id="ul-comunidades">
            <input class="form-control" id="procurarcomunidade" type="text" placeholder="Procurar...">
            <?php
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
          $("#ul-comunidades").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $(".dropdown-menu li").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
        });
      </script>
    <br><br>
    </div>
    <?php 
    if (isset($_GET['comunidade'])) {
      $feed=$pdo->prepare('SELECT * FROM posts WHERE comunidades_id=?');
    }else{
      $feed=$pdo->prepare('SELECT * FROM posts');
      }

      $feed->execute([$_GET['comunidade']]);
      $posts=$feed->fetchall();
      for ($i=sizeof($posts)-1; $i >=0 ; $i--) { 

        echo '<div class="postagens" style="margin:auto">';
        echo '<a href="coment.php?post='.$posts[$i]['id'].'"><h1>'.$posts[$i]['title']."</h1></a>";
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