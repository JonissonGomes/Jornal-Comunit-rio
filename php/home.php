<?php 
session_start();
if(!isset ($_SESSION['user'])){
	header('location:login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include('bar.php');?>
	<meta charset="UTF-8">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="../css/home.css">
	<script type="text/javascript">
		function cor(){
			var cor = document.getElementById('file');
			cor.className='file1';
		}
	</script>

</head>

<body>


	<div class="form-group" id="POSTS">
		<form method="post" action="post.php" enctype="multipart/form-data">
			<hr>
			<fieldset class="descricao">
				<label for="title">Titulo:</label>
				<input class="form-control-inline" type="text" id="title" name="title" size="20" maxlength="40" required>
				<label for="desc">Descrição:</label>
				<input class="form-control-inline" type="text" id="desc" name="desc" size="20" maxlength="120">
				<label class="file" id="file" >
					<span data-default='Choose file'> Escolher Imagem</span>
				<input class="form-control" type="file" name="imagem" onchange="cor()" >
				</label>
				<select class="form-control"  name="comunidade">
					<?php
						include('conect.php');
						$stmt=$pdo->prepare("SELECT * FROM comunidades");
						$stmt->execute();
						$com=$stmt->fetchall();
					 for ($i=0; $i < sizeof($com); $i++) { 
						echo '<option value="'.$com[$i]['id'].'">'.$com[$i]['nome'].'</option>';
					}?>
				</select>
			</fieldset>

			<label>Postagem:</label><br>
			<textarea class="form-control" name="post" maxlength="510" cols="63" rows="3" required></textarea>
			<br>
			<input class="form-control" class="enviar" type="submit" name="">
			<hr>
		</form>
	</div>

	<?php 
	include('conect.php');
	$feed=$pdo->prepare('SELECT * FROM posts');
	$feed->execute();
	$posts=$feed->fetchall(); 
	for ($i=sizeof($posts)-1; $i >=0 ; $i--) { 
		echo '<div class="postagens">';
		echo '<footer>'.$posts[$i]['created_at'].'</footer>';
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