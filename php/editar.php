<?php include('bar.php');?>
<meta charset="UTF-8">
<title>Editar</title>
<link rel="stylesheet" type="text/css" href="/css/home.css">
</head>
<body>
	<div class="form-group" id="POSTS">
			<?php
			$feed=$pdo->prepare('SELECT * FROM posts WHERE id=?');
			$feed->execute([$_GET['edit']]);
			$posts=$feed->fetch();
			?>

	<div class="form-group container" id="POSTS">
		<form method="post" action="edit.php" enctype="multipart/form-data">
			<div class="formPost">
				<label for="title">Titulo:</label>
				<input class="form-control" type="text" id="title" name="title" size="20" maxlength="40" placeholder="Insira o titulo" value="<?=$posts['title']?>" required>	
				<label>Postagem:</label>
				<textarea class="form-control" name="post" maxlength="510" cols="63" rows="3" required><?=$posts['post']?></textarea><br>
				<div class="form-group row" style="display: flex; justify-content: space-between;">
					<div class="col-xs-7">
						<select class="form-control"  name="comunidades">
							<option disabled>Selecione a comunidade</option>
							<?php
							$stmt=$pdo->prepare("SELECT * FROM comunidades");
							$stmt->execute();
							$com=$stmt->fetchall();
							for ($i=0; $i < sizeof($com); $i++) { 
								if ($com[$i]['id']==$posts['comunidades_id']) {
								echo '<option value="'.$com[$i]['id'].'" selected>'.$com[$i]['nome'].'</option>';
								}else{
								echo '<option value="'.$com[$i]['id'].'">'.$com[$i]['nome'].'</option>';
							}
							}?>
						</select><br>
						<select name="tema" class="form-control">
							<option disabled selected>Selecione o Tema</option>
							<?php
							$stmt=$pdo->prepare("SELECT * FROM tema");
							$stmt->execute();
							$com=$stmt->fetchall();
							for ($i=0; $i < sizeof($com); $i++) { 
								if ($com[$i]['id']==$posts['tema_id']) {
								echo '<option value="'.$com[$i]['id'].'" selected>'.$com[$i]['nome'].'</option>';							
								}else{
								echo '<option value="'.$com[$i]['id'].'">'.$com[$i]['nome'].'</option>';
							}
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

			<input type="password" name="id" value="<?=$_GET['edit']?>" style="display: none;">
</body>
</html>