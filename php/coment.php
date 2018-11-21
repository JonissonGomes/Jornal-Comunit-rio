<?php 
session_start();
if (isset($_GET['post'])) {
$_SESSION['post']=$_GET['post'];
}
	include('pacote.php');
	$feed=$pdo->prepare('SELECT * FROM posts WHERE id=?');
	$feed->execute([$_SESSION['post']]);
	$posts=$feed->fetch();
	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?=$posts['title']?></title>
	<link rel="stylesheet" type="text/css" href="/css/home.css">
	<?php include('bar.php');?>
</head>
<body>
<div style="display: flex; flex-direction: column;"> 
<div class="postagens">
<h1><?=$posts['title']?></h1>
<h2><?=$posts['descricao']?></h2>
<p><?=$posts['post']?></p>
<img style="width: 50%;" src="<?=$posts['imagem']?>">
	</div>
	<div style="margin: 0 310px;">
		<form action="comentar.php" method="post" style="margin: 100px,100px, 100px;">
			<textarea name="coment" required style="width: 70%; position: relative;"></textarea>
			<input style="width: 250px; height: 40px;background-color: #3db0f7;border: none;border-radius: 5px;margin-left: 40%" type="submit" value="Comentar">
		</form>
	</div>
	<div class="postagens" style="margin-top: 50px; width: 1000px;">
		<?php
		//$stmt=$pdo->prepare('SELECT * FROM coments WHERE posts_id=?');
		$stmt=$pdo->prepare("SELECT u.username, c.coment FROM users u INNER JOIN coments c WHERE u.id = c.users_id AND c.posts_id = ?");
		$stmt->execute([$_SESSION['post']]);
		$get=$stmt->fetchall();

		for ($i=sizeof($get)-1; $i >=0 ; $i--) { 
			echo '<div class="postagens">';
			echo '<h1>'.$get[$i]['username'].'</h1>';
			echo '<h2 >'.$get[$i]['coment'].'</h2>';
			echo "</div>";
		}
		?>
	</div>
</div>	
</body>
</html>