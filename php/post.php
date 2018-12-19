<?php 

require_once 'pacote.php';

$postagem= new Postagem($_POST['title'],$_POST['tema'],$_POST['comunidades'],$_POST['post']);
if (isset($_FILES['imagem'])) {
	$postagem->getimagem($_FILES['imagem']);
}
$postagem->postar();
// echo $_FILES['imagem']['name'];

$get=fetchall('SELECT u.imagem_perfil,u.username, p.* FROM posts p inner join users u where p.users_id=u.id');

for ($i=sizeof($get)-1; $i >=0 ; $i--) { 
?>

<div class="postagens" style="margin: auto;" >
<div><a href="#" data-toggle="modal" data-target="#mPerfil" ><img style="position: relative !important;float: left;left: 7px;" class="profpic" src="<?=$get[$i]['imagem_perfil']?>" ></a href="#"><h4 style="    margin: 48px 126px;position: absolute;"><strong><?=$get[$i]['username']?></strong><br><?=$get[$i]['created_at']?></h4></div>
	<h1><a href="coment.php?post=<?=$get[$i]['id']?>"><?=$get[$i]['title']?></a></h1>
	<p><?=$get[$i]['post']?></p>
	<?php 
	if ($get[$i]['imagem']!=null) {
		echo '<a href="coment.php?post='.$get[$i]['id'].'"><img src="'.$get[$i]['imagem'].'"></a>';
	}
	?>
	<div class="postA">
		<?php
		if ($_SESSION['id']==$get[$i]['users_id']) {
			echo '<a onclick="confirma('.$get[$i]['id'].')" title="exluir" ><button class="postAbutton">	Excluir </button></a>';
			echo '<a href="/php/editar.php?edit='.$get[$i]['id'].'" title="editar"><button class="postAbutton"> Editar </button></a>';
		}
		?>
	</div>
</div>
<br>
<?php include 'perfil.modal.php'; } ?>