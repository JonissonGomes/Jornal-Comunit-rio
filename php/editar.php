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
				<div class="form-group row">
					<div class="col-xs-6">
						<select class="form-control"  name="comunidades">
							<option disabled selected>Selecione a comunidade</option>
							<?php
							$stmt=$pdo->prepare("SELECT * FROM comunidades");
							$stmt->execute();
							$com=$stmt->fetchall();
							for ($i=0; $i < sizeof($com); $i++) { 
								echo '<option value="'.$com[$i]['id'].'">'.$com[$i]['nome'].'</option>';
							}?>
						</select>
					</div>
					<div class="col-xs-6">
						<select name="tema" class="form-control">
							<option disabled selected>Selecione o Tema</option>
							<?php
							$stmt=$pdo->prepare("SELECT * FROM tema");
							$stmt->execute();
							$com=$stmt->fetchall();
							for ($i=0; $i < sizeof($com); $i++) { 
								echo '<option value="'.$com[$i]['id'].'">'.$com[$i]['nome'].'</option>';
							}?>
						</select>
						<br>
					</div>
					<div class="col-xs-6">
				<input  type="button" class="btnI" value="SELECIONAR">
				<input type="file" accept="image/*" name="imagem" id="arquivo" class="arquivo" style="display: none;" >
				<input type="text" name="file" id="file" class="form-control" placeholder="Selecione a imagem" readonly="readonly" >
				<script>
					$('.btnI').on('click', function() {
						$('.arquivo').trigger('click');
					});
					$('.arquivo').on('change', function() {
						var fileName = $(this)[0].files[0].name;
						$('#file').val(fileName);
					});
					
				</script>
				</div>
				</div>
			</div>
			<br>
			<input type="password" name="id" value="<?=$_GET['edit']?>" style="display: none;">
			<input class="form-control" class="enviar" type="submit" value="Concluir">
		</form>
	</div>

</body>
</html>