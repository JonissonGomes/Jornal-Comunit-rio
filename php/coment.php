
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include('bar.php');?>
	<meta charset="UTF-8">
	<title><?=$posts['title']?></title>
	<link rel="stylesheet" type="text/css" href="/css/home.css">
</head>
<body>
<?php
if (isset($_GET['post'])) {
$_SESSION['post']=$_GET['post'];
}
	$feed=$pdo->prepare('SELECT * FROM posts WHERE id=?');
	$feed->execute([$_SESSION['post']]);
	$posts=$feed->fetch();
		echo '<div class="postagens">';
		echo '<footer>'.$posts['created_at'].'</footer>';
		echo '<a href="coment.php?post='.$posts['id'].'"><h1>'.$posts['title']."</h1></a>";
		echo "<h2>".$posts['descricao']."</h2>";
		echo "<p>".$posts['post']."</p>";
		if ($posts['imagem']!=null) {
			echo '<a href="coment.php?post='.$posts['id'].'"><img src="'.$posts['imagem'].'"></a>';
		}
		echo '<div class="postA">';
		if ($_SESSION['id']==$posts['users_id']) {
			echo '<a onclick="confirma('.$posts['id'].')" ><button >Excluir </button></a>';
			echo '<a href="/php/editar.php?edit='.$posts['id'].'" ><button > Editar </button></a>';
		}
		echo "</div>";
		echo "</div><br>";
	?>
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
			echo '<div class="">';
			echo '<h1>'.$get[$i]['username'].'</h1>';
			echo '<h2>'.$get[$i]['coment'].'</h2>';
			echo "</div>";
			echo '<hr>';
		}
		?>
	</div>
</div>	
</body>
</html>