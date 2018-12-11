<?php 
require_once 'pacote.php';

$imagem = $_FILES['imagemP'];

getimagem($imagem);

header('location:perfil.php');