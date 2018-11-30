<?php include('bar.php');?>
<meta charset="UTF-8">
<title>Home</title>
<?php 
if(!isset ($_SESSION['user'])){
	header('location:/');
}

?>

</head>

<body>

<br>
<div class="container">
  <div class="row">
    <div>
      <div class="well well-sm well-social-post">
        <form method="post" action="post.php?post" enctype="multipart/form-data">
          <ul class="list-inline" id='list_PostActions'>
            <center><li class='active'>Publique</li></center>
          </ul>
          <label style="color:black;">Titulo</label>
         	<input class="form-control-inline" type="text" name="title">
          <textarea class="form-control" name="post" placeholder="Faça uma publicação"></textarea>
          <ul class='list-inline post-actions'>
						<input type="file" name="imagem" id="camera" style="display: none;">
            <li ><label style="cursor: pointer;" for="camera"><span class="glyphicon glyphicon-camera"></span></label></li>
            <li ><label style="cursor: pointer;" for="comunidades"><span class='glyphicon glyphicon-map-marker'></span></label></li>
            <select style="display: none;" class="form-control" id="comunidades" name="comunidade">
							<option disabled selected>Selecione a comunidade</option>
							<?php
							$stmt=$pdo->prepare("SELECT * FROM comunidades");
							$stmt->execute();
							$com=$stmt->fetchall();
							for ($i=0; $i < sizeof($com); $i++) { 
								echo '<option value="'.$com[$i]['id'].'">'.$com[$i]['nome'].'</option>';
							}?>
						</select>
            <li class='pull-right'><a href="#" class='btn btn-primary btn-xs'>Publicar</a></li>
          </ul>
        </form>
      </div>
    </div>
  </div>
</div>                                                            

	<?php 
	$feed=$pdo->prepare('SELECT * FROM posts');
	$feed->execute();
	$posts=$feed->fetchall(); 
	for ($i=sizeof($posts)-1; $i >=0 ; $i--) { 
		echo '<div class="postagens">';
		echo '<footer>'.$posts[$i]['created_at'].'</footer>';
		echo '<h1><a href="coment.php?post='.$posts[$i]['id'].'">'.$posts[$i]['title']."</a></h1>";
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