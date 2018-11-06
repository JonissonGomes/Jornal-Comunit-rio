<?php 
session_start();

$re = '/jpg|png|jpge/m';
preg_match_all($re, $_FILES['imagem']['name'], $nam, PREG_SET_ORDER, 0);
if ($nam!=null) {
$destino = '../img/'.date('d-m-Y')."_".date('h:m:s') ;
$arquivo_tmp = $_FILES[ 'imagem' ][ 'tmp_name' ];
move_uploaded_file ( $arquivo_tmp, $destino );
}else{
    $destino=null;
}
$desc= strip_tags($_POST['desc']);
$post=strip_tags($_POST['post']);
$title=strip_tags($_POST['title']);
$com=$_POST['comunidade'];

 
include('conect.php');


$stmt= $pdo->prepare("INSERT INTO posts (title,descricao,post,imagem,users_id,comunidades_id) VALUES (?,?,?,?,?,?)");
$stmt->execute([$title,$desc,$post,$destino,$_SESSION['id'],$com]);

header("location:home.php");