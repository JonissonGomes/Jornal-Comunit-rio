<?php 

require_once 'pacote.php';

$postagem= new postagem($_POST['title'],$_POST['desc'],$_POST['comunidade'],$_POST['post']);
if (isset($_FILES['imagem'])) {
	$postagem->getimagem($_FILES['imagem']);
}
$postagem->postar();


header("location:home.php");