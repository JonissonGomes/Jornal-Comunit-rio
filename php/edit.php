<?php 
session_start();
require_once 'pacote.php';

$postagem= new postagem();
$postagem->imgDEL();
if (isset($_FILES['imagem'])) {
	$postagem->imagem($_FILES['imagem']);
}
$postagem->editar();

header("location:home.php");