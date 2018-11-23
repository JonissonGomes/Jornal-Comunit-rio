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
</div>

			<form action="comentar.php" method="post" style="margin: 100px,100px, 100px;">
				<div class="portlet">
					<div class="sheet sheet-lg widget-comments">
						<div class="autofit-row autofit-float widget-comments-header">
							<div class="autofit-col autofit-col-expand">
							</div>
							<div class="autofit-col autofit-col-end">
							</div>
						</div>

						<div class="autofit-row widget-comments-body">
							<div class="autofit-col inline-item-before">
								<span class="sticker sticker-lg sticker-success user-icon"></span>
							</div>
							<div class="autofit-col autofit-col-expand">
								<div class="form-group">
									<textarea name="coment" required class="form-control"></textarea>
								</div>
								<div class="form-group">
									<button class="btn btn-primary btn-sm" type="submit">Enviar comentário</button>
								</div>
							</div>
						</div>
					</form>
	<?php
		//$stmt=$pdo->prepare('SELECT * FROM coments WHERE posts_id=?');
	$stmt=$pdo->prepare("SELECT u.username, c.coment ,c.created_at FROM users u INNER JOIN coments c WHERE u.id = c.users_id AND c.posts_id = ?");
	$stmt->execute([$_SESSION['post']]);
	$get=$stmt->fetchall();

	for ($i=sizeof($get)-1; $i >=0 ; $i--) { ?>
	<br>
	<div class="body_com">
	<section class="profilebox">
		<aside>
			<img class="profpic" src="//gravatar.com/avatar/59d2646254895816400fcb1eded7d86d?s=128&d=https://codepen.io/assets/avatars/user-avatar-512x512-e95b68f7d95e0e48bead22e5d64c95d9.png" alt="profile picture" />
		</aside>
		<header>
			<h1 class="prof-name"><?=$get[$i]['username']?></h1>
			<h5 class="prof-user"><?=$get[$i]['created_at']?></h5>
		</header>
		<main class="user-desc">
			<br><br><br>
				<?= $get[$i]['coment'] ?>
			</br>
		</main>
	</section>
	</div>
	<?php }
	?>
</div>	
</body>
</html>