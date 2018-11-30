<?php 

require_once 'pacote.php';

$postagem= new Postagem($_POST['title'],$_POST['tema'],$_POST['comunidades'],$_POST['post']);
$postagem->imgDEL($_POST['id']);
if (isset($_FILES['imagem'])) {
	$postagem->getimagem($_FILES['imagem']);
}
$postagem->editar($_POST['id']);

header("location:home.php");