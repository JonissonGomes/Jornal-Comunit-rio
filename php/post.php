<?php 

require_once 'pacote.php';

$postagem= new Postagem($_POST['title'],$_POST['tema'],$_POST['comunidades'],$_POST['post']);
if (isset($_FILES['imagem'])) {
	$postagem->getimagem($_FILES['imagem']);
}
$postagem->postar();


header("location:".$_SERVER['HTTP_REFERER']);