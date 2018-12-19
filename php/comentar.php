<?php 
include('pacote.php');


query("INSERT INTO coments(coment,posts_id,users_id) values (?,?,?)",[$_POST['coment'],$_SESSION['post'],$_SESSION['id']]);

		$get=fetchall("SELECT u.*, c.coment ,c.created_at FROM users u INNER JOIN coments c WHERE u.id = c.users_id AND c.posts_id = ?",[$_SESSION['post']]);
		
		for ($i=sizeof($get)-1; $i >=0 ; $i--) { 
			if ($get[$i]['imagem']==null) {
				$get[$i]['imagem']='../img/perfil-none.jpg';
			}
			?>

		<br>
		<div class="body_com">
			<section class="profilebox">
				<aside>
					<a href="#" data-toggle="modal" data-target="#mPerfil" ><img class="profpic" src="<?=$get[$i]['imagem']?>" ></a href="#">
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
	

	<?php include 'perfil.modal.php'; }
	?>	