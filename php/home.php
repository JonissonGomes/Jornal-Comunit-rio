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

	<div class="form-group container" id="POSTS">
		<form method="post" action="post.php?post" enctype="multipart/form-data">
			<div class="formPost">
				<label for="title">Titulo:</label>
				<input class="form-control" type="text" id="title" name="title" size="20" maxlength="40" placeholder="Insira o titulo" required>	
				<label>Postagem:</label>
				<textarea class="form-control" name="post" maxlength="510" cols="63" rows="3" required></textarea><br>
				<div class="form-group row" style="display: flex; justify-content: space-between;">
					<div class="col-xs-7">
						<select class="form-control"  name="comunidades">
							<option disabled selected>Selecione a comunidade</option>
							<?php
							$stmt=$pdo->prepare("SELECT * FROM comunidades");
							$stmt->execute();
							$com=$stmt->fetchall();
							for ($i=0; $i < sizeof($com); $i++) { 
								echo '<option value="'.$com[$i]['id'].'">'.$com[$i]['nome'].'</option>';
							}?>
						</select><br>
						<select name="tema" class="form-control">
							<option disabled selected>Selecione o Tema</option>
							<?php
							$stmt=$pdo->prepare("SELECT * FROM tema");
							$stmt->execute();
							$com=$stmt->fetchall();
							for ($i=0; $i < sizeof($com); $i++) { 
								echo '<option value="'.$com[$i]['id'].'">'.$com[$i]['nome'].'</option>';
							}?>
						</select><br>
			<input class="form-control" class="enviar" type="submit" name="">
					</div>
					
					  <div class="wrap-custom-file col-xs-5">
    <input type="file" name="imagem" id="image1" accept=".gif, .jpg, .png" />
    <label class="sImage" for="image1">
      <span>Selecionar Imagem</span>
    </label>
  </div>
					
</div>
				</div>
			</div>
			<br>
		</form>
		<script type="text/javascript">
		$('input[type="file"]').each(function(){
  // Refs
  var $file = $(this),
      $label = $file.next('label'),
      $labelText = $label.find('span'),
      labelDefault = $labelText.text();
  
  // When a new file is selected
  $file.on('change', function(event){
    var fileName = $file.val().split( '\\' ).pop(),
        tmppath = URL.createObjectURL(event.target.files[0]);
    //Check successfully selection
		if( fileName ){
      $label
        .addClass('file-ok')
        .css({"background-image": "url(' "+ tmppath + "')", "background-size": "100%","background-repeat":"no-repeat"});
			$labelText.text(fileName);
    }else{
      $label.removeClass('file-ok');
			$labelText.text(labelDefault);
    }
  });
  
// End loop of file input elements  
});
		</script>
	</div>
<div>
	<?php 
	$feed=$pdo->prepare('SELECT * FROM posts');
	$feed->execute();
	$posts=$feed->fetchall(); 
	for ($i=sizeof($posts)-1; $i >=0 ; $i--) { 
		echo '<div class="postagens" style="margin: auto;" >';
		echo '<footer>'.$posts[$i]['created_at'].'</footer>';
		echo '<h1><a href="coment.php?post='.$posts[$i]['id'].'">'.$posts[$i]['title']."</a></h1>";
		echo "<p>".$posts[$i]['post']."</p>";
		if ($posts[$i]['imagem']!=null) {
			echo '<a href="coment.php?post='.$posts[$i]['id'].'"><img src="'.$posts[$i]['imagem'].'"></a>';
		}
		echo '<div class="postA">';
		if ($_SESSION['id']==$posts[$i]['users_id']) {
			echo '<a onclick="confirma('.$posts[$i]['id'].')" title="exluir" ><button >	Excluir </button></a>';
			echo '<a href="/php/editar.php?edit='.$posts[$i]['id'].'" title="editar"><button > Editar </button></a>';
		}
		echo "</div>";
		echo "</div><br>";

	}
	?>
</div>
</body>
</html>
</body>
</html>