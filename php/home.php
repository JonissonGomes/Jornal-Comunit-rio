<?php include('bar.php');
if(!isset ($_SESSION['user'])){
	header('location:login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="../css/home.css">
</head>

<body>


	<fieldset class="POSTS">
		<form method="post" action="post.php" enctype="multipart/form-data">
			<hr>
			<fieldset class="descricao">
				<label for="title">Titulo:</label>
				<input type="text" id="title" name="title" size="20" maxlength="40" required>
				<label for="desc">Descrição:</label>
				<input type="text" id="desc" name="desc" size="20" maxlength="120">
				<label class="file" >
					<span data-default='Choose file'> Escolher Imagem</span>
				<input type="file" name="imagem">
				</label>
			</fieldset>

			<label>Postagem:</label><br>
			<textarea name="post" maxlength="510" cols="63" rows="3" required></textarea>
			<br>
			<input class="sendtop" type="submit" name="">
			<hr>
		</form>
	</fieldset>

	<?php 
	include('conect.php');
	$feed=$pdo->prepare('SELECT * FROM posts');
	$feed->execute();
	$posts=$feed->fetchall(); 
	for ($i=sizeof($posts)-1; $i >=0 ; $i--) { 

		echo '<div class="postagens">';
		echo "<h1>".$posts[$i]['title']."</h1>";
		echo "<h2>".$posts[$i]['descricao']."</h2>";
		echo "<p>".$posts[$i]['post']."</p>";
		echo '<img src="'.$posts[$i]['imagem'].'">';
		echo '<div class="postA">';
		if ($_SESSION['id']==$posts[$i]['user_id']) {
			echo '<button ><a href="#" >Excluir </a></button>';
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