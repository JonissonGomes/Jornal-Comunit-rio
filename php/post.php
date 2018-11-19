<?php 
session_start();

require_once 'pacote.php';

$postagem= new postagem();
if (isset($_FILES['imagem'])) {
	$postagem->imagem($_FILES['imagem']);
}
$postagem->postar();


header("location:home.php");