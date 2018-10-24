<?php 
session_start();
include('conect.php');
$delete=$pdo->prepare("SELECT * FROM posts WHERE id=?");
$delete->execute([$_POST['id']]);
$del=$delete->fetch();

unlink($del['imagem']);

$re = '/jpg|png|jpge/m';
preg_match_all($re, $_FILES['imagem']['name'], $nam, PREG_SET_ORDER, 0);
if ($nam!=null) {
$destino = '../img/'.date('d-m-Y')."_".date('h:m:s') ;
$arquivo_tmp = $_FILES[ 'imagem' ][ 'tmp_name' ];
}
$desc= strip_tags($_POST['desc']);
$post=strip_tags($_POST['post']);
$title=strip_tags($_POST['title']);

move_uploaded_file ( $arquivo_tmp, $destino );
$update=$pdo->prepare("UPDATE posts SET user_id= ?, title=? , descricao=? , post=? , imagem=? WHERE id=".$_POST['id']);
$update->execute([$_SESSION['id'],$title,$desc,$post,$destino]);


header('location:home.php');