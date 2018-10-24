<?php 
session_start();
if (isset($_GET['post'])) {
$_SESSION['post']=$_GET['post'];
}
	include('conect.php');
	$feed=$pdo->prepare('SELECT * FROM posts WHERE id=?');
	$feed->execute([$_SESSION['post']]);
	$posts=$feed->fetch();
	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?=$posts['title']?></title>
</head>
<body>
<div style="width: 100%;height: 300px; text-align: center;margin: auto;">
<h1><?=$posts['title']?></h1>
<h2><?=$posts['descricao']?></h2>
<p><?=$posts['post']?></p>
<img style="width: 50%;" src="<?=$posts['imagem']?>">
	</div>
	<div>
		<form action="comentar.php" method="post">
			<textarea name="coment" ></textarea>
			<input type="submit" name="">
		</form>
	</div>
</body>
</html>