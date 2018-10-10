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
<form method="post" action="post.php">
	<label>Titulo</label>
	<input type="text" name="title" maxlength="60">
	<label>Descrição</label>
	<input type="text" name="desc" maxlength="120">
	<label>Postagem</label>
	<textarea name="post" maxlength="510" cols="30" rows="5"></textarea>
	<!-- <input type="text" name="post" maxlength="510"><br> -->
	<input type="submit" name="">
</form>

	<?php 
	include('conect.php');
	$feed=$pdo->prepare('SELECT * FROM post');
	$feed->execute();
	$posts=$feed->fetchall();
	for ($i=0; $i < sizeof($posts); $i++) { 
	
		echo '<fieldset style="background-color: white; ;">';
		echo "<h1>".$posts[$i]['title']."</h1>";
		echo "<h2>".$posts[$i]['descricao']."</h2>";
		echo "<p>".$posts[$i]['post']."</p>";
		echo "</fieldset><br>";
	
	}


	?>
</fieldset>
</body>
</html>
</body>
</html>