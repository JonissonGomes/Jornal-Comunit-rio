<?php include 'bar.php'; ?>
<title>Perfil</title>
</head>
<body>
<div style="width: 80%;margin-left: 50px; ">
<?php $stmt= $pdo->prepare('SELECT * from users where id=?');
			$stmt->execute([$_SESSION['id']]);
			$fetch=$stmt->fetch();?>
<div class="cont postagens">
  <div class="profile"></div>
  
  <div class="info">
    <h2><?= $fetch['username']?></h3>
    <p>Sexo: <?=$fetch['genero']?></p>
    <p>Data de Nascimento: <?=$fetch['ddn']?></p>
    <p><?=$fetch['bairro'].' - '.$fetch['cidade']?></p>
  </div>
  <div class="footer"></div>
</div>
<center><strong><h3 style="color: #fff;">Suas publicações</h3></strong></center>
	<?php 
	$feed=$pdo->prepare('SELECT u.username, p.* FROM users u INNER JOIN posts p WHERE u.id = p.users_id AND p.users_id = ?');
	$feed->execute([$_SESSION['id']]);
	$posts=$feed->fetchall(); 
	for ($i=sizeof($posts)-1; $i >=0 ; $i--) { 
		echo '<div class="postagens" style="position: relative;">';
		echo '<div><footer style="float: right;margin-right: 50px;">'.$posts[$i]['created_at'].'</footer>';
		echo '<footer style="float: left;margin-left: 50px;font-size: 20px;"><strong>'.$posts[$i]['username'].'</strong></footer></div>';
		echo '<a href="coment.php?post='.$posts[$i]['id'].'"><h1>'.$posts[$i]['title']."</h1></a>";
		echo "<h2>".$posts[$i]['tema']."</h2>";
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
</div>

</body>
</html>
