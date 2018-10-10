<?php 

session_start();
if(!isset ($_SESSION['user'])){
	header('location:login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="../css/Home.css">
	<?php include('bar.php'); ?>
</head>

<body>



	<fieldset class="POSTS">
		<form method="post" action="post.php">
			<hr>
			<fieldset class="descricao">
				<label>Titulo:</label>
				<input type="text" name="title" size="20" maxlength="40">
				<label>Descrição:</label>
				<input type="text" name="desc" size="20" maxlength="120">
			</fieldset>

			<label>Postagem:</label><br>
			<textarea name="post" maxlength="510" cols="63" rows="3"></textarea>
			<br>
			<!-- <input type="text" name="post" maxlength="510"><br> -->
			<input class="sendtop" type="submit" name="">
			<hr>
		</form>
	</fieldset>

	<?php 
	include('conect.php');
	$feed=$pdo->prepare('SELECT * FROM post');
	$feed->execute();
	$posts=$feed->fetchall();
	for ($i=0; $i < sizeof($posts); $i++) { 

		echo '<div class="postagens">';
		echo "<h1>".$posts[$i]['title']."</h1>";
		echo "<h2>".$posts[$i]['descricao']."</h2>";
		echo "<p>".$posts[$i]['post']."</p>";
		echo "</div><br>";

	}
	

	?>

</body>
</html>
</body>
</html>