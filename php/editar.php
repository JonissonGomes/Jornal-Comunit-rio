<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Editar</title>
	<link rel="stylesheet" type="text/css" href="/css/home.css">
</head>
<body>
<?php 
	include('conect.php');
	$feed=$pdo->prepare('SELECT * FROM posts WHERE id=?');
	$feed->execute([$_GET['edit']]);
	$posts=$feed->fetch();
	?>
	<fieldset class="POSTS">
		<form method="post" action="post.php" enctype="multipart/form-data">
			<hr>
			<fieldset class="descricao">
				<label for="title">Titulo:</label>
				<input type="text" id="title" name="title" size="20" maxlength="40" value="<?=$posts['title']?>" required>
				<label for="desc">Descrição:</label>
				<input type="text" id="desc" name="desc" size="20" maxlength="120" value="<?=$posts['descricao']?>">
				<label class="file" >
					<span data-default='Choose file'> Escolher Imagem</span>
				<input type="file" name="imagem">
				</label>
			</fieldset>

			<label>Postagem:</label><br>
			<textarea name="post" maxlength="510" cols="63" rows="3" required><?=$posts['post']?></textarea>
			<br>
			<input class="sendtop" type="submit" name="">
			<hr>
		</form>
	</fieldset>
	<!-- <div style="height: 500px;margin-left: 451px; ">
	<form >
	<label><span style="width: 66.2%;margin: 0 0 auto;">Comentar Noticia</span><textarea type="text" name="coment" style="width: 938px;height: 50px"></textarea></label>
	</form>
	</div> -->
</body>
</html>