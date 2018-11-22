<!DOCTYPE html>
<html lang="en">
<head>
	<?php include('bar.php');?>
	<meta charset="UTF-8">
	<title>Editar</title>
	<link rel="stylesheet" type="text/css" href="/css/home.css">
</head>
<body>
	<div class="form-group" id="POSTS">
		<form method="post" action="edit.php" enctype="multipart/form-data">
			<hr>
<?php
	$feed=$pdo->prepare('SELECT * FROM posts WHERE id=?');
	$feed->execute([$_GET['edit']]);
	$posts=$feed->fetch();
	?>
			<fieldset class="descricao">
				<label for="title">Titulo:</label>
				<input class="form-control-inline" type="text" id="title" name="title" size="20" maxlength="40" value="<?=$posts['title']?>" required>
				<label for="desc">Descrição:</label>
				<input class="form-control-inline" type="text" id="desc" name="desc" size="20" maxlength="120" value="<?=$posts['descricao']?>">
                <label class="file" id="file" >
					<span data-default='Choose file'> Escolher Imagem</span>
				<input class="form-control" type="file" name="imagem" onchange="cor()" >
				</label>
				<select class="form-control"  name="comunidade">
					<?php
						$stmt=$pdo->prepare("SELECT * FROM comunidades");
						$stmt->execute();
						$com=$stmt->fetchall();
					 for ($i=0; $i < sizeof($com); $i++) { 
						echo '<option value="'.$com[$i]['id'].'">'.$com[$i]['nome'].'</option>';
					}?>
				</select>
			</fieldset>

			<label>Postagem:</label><br>
			<textarea class="form-control" name="post" maxlength="510" cols="63" rows="3" required><?=$posts['post']?></textarea>
			<br>
			<input class="form-control" class="enviar" type="submit" name="">
			<hr>
			<input style="display: none;" type="text" name="id" value="<?=$_GET['edit']?>">
		</form>
	</div>
</body>
</html>