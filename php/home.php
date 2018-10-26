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
<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
function confirma(id){
decisao = confirm("Deseja excluir a publicação ?");

if (decisao){
window.location.assign("/php/excluir.php?del="+id);

}
}
</SCRIPT>
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
				<input type="file" name="imagem" >
				</label>
				<select>
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
			<textarea name="post" maxlength="510" cols="63" rows="3" required></textarea>
			<br>
			<input class="enviar" type="submit" name="">
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