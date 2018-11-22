<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php include 'bar.php';?>
</head>
<body>
<div class="form-group" id="POSTS">
		<form method="post" action="post.php?post" enctype="multipart/form-data">
			<hr>
			<fieldset class="formPost">
				<label for="title">Titulo:</label>
				<input class="form-control-inline" type="text" id="title" name="title" size="20" maxlength="40" placeholder="Insira o titulo" required>				
				<input type="file" accept="image/*" name="imagem" id="arquivo" class="arquivo" >
				<input type="text" name="file" id="file" class="form-control-inline" placeholder="Selecione a imagem" readonly="readonly" >
				<input type="button" class="btnI" value="SELECIONAR">
				<script>
					$('.btnI').on('click', function() {
						$('.arquivo').trigger('click');
					});

					$('.arquivo').on('change', function() {
						var fileName = $(this)[0].files[0].name;
						$('#file').val(fileName);
					});
					
				</script>
				<div class="form-group row">
					<div class="col-xs-6">
				<select class="form-control"  name="comunidade">
					<option disabled selected>Selecione a comunidade</option>
					<?php
					$stmt=$pdo->prepare("SELECT * FROM comunidades");
					$stmt->execute();
					$com=$stmt->fetchall();
					for ($i=0; $i < sizeof($com); $i++) { 
						echo '<option value="'.$com[$i]['id'].'">'.$com[$i]['nome'].'</option>';
					}?>
				</select>
				</div>
				<div class="col-xs-6">
				<select class="form-control">
					<option>opition</option>
				</select>
				</div>
				</div>
			</fieldset>

			<label>Postagem:</label><br>
			<textarea class="form-control" name="post" maxlength="510" cols="63" rows="3" required></textarea>
			<br>
			<input class="form-control" class="enviar" type="submit" name="">
			<hr>
		</form>
	</div>
<center><strong><h1>SUAS POSTAGENS</h1></strong></center>
	<?php 
	$feed=$pdo->prepare('SELECT u.username, p.* FROM users u INNER JOIN posts p WHERE u.id = p.users_id AND p.users_id = ?');
	$feed->execute([$_SESSION['id']]);
	$posts=$feed->fetchall(); 
	for ($i=sizeof($posts)-1; $i >=0 ; $i--) { 
		echo '<div class="postagens">';
		echo '<div><footer style="float: right;margin-right: 50px;">'.$posts[$i]['created_at'].'</footer>';
		echo '<footer style="float: left;margin-left: 50px;font-size: 20px;"><strong>'.$posts[$i]['username'].'</strong></footer></div>';
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