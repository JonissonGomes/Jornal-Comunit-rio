<?php 

require_once 'pacote.php';

$postagem= new Postagem($_POST['title'],$_POST['tema'],$_POST['comunidades'],$_POST['post']);
if (isset($_FILES['imagem'])) {
	$postagem->getimagem($_FILES['imagem']);
}
$postagem->postar();
// echo $_FILES['imagem']['name'];

$feed=fetchall('SELECT * FROM posts');
for ($i=sizeof($feed)-1; $i >=0 ; $i--) { 
?>

<div class="postagens" style="margin: auto;" >
<footer><?=$feed[$i]['created_at']?></footer>
	<h1><a href="coment.php?post=<?=$feed[$i]['id']?>"><?=$feed[$i]['title']?></a></h1>
	<p><?=$feed[$i]['post']?></p>
	<?php 
	if ($feed[$i]['imagem']!=null) {
		echo '<a href="coment.php?post='.$feed[$i]['id'].'"><img src="'.$feed[$i]['imagem'].'"></a>';
	}
	?>
	<div class="postA">
		<?php
		if ($_SESSION['id']==$feed[$i]['users_id']) {
			echo '<a onclick="confirma('.$feed[$i]['id'].')" title="exluir" ><button >	Excluir </button></a>';
			echo '<a href="/php/editar.php?edit='.$feed[$i]['id'].'" title="editar"><button > Editar </button></a>';
		}
		?>
	</div>
</div>
<br>
<?php } ?>