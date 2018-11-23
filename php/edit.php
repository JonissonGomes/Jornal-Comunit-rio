<?php 

require_once 'pacote.php';

$postagem= new postagem($_POST['title'],$_POST['desc'],$_POST['comunidade'],$_POST['post']);
$postagem->imgDEL($_POST['id']);
if (isset($_FILES['imagem'])) {
	$postagem->getimagem($_FILES['imagem']);
}
$postagem->editar($_POST['id']);

header("location:home.php");