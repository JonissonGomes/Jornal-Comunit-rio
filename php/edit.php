<?php 
session_start();
include('conect.php');
$delete=$pdo->prepare("SELECT * FROM posts WHERE id=?");
$delete->execute([$_POST['id']]);
$del=$delete->fetch();
if(is_file($del['imagem'])){
unlink($del['imagem']);
}
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


$update=$pdo->prepare("UPDATE posts SET users_id= ?, title=? , descricao=? , post=? , imagem=? WHERE id=".$_POST['id']);
$update->execute([$_SESSION['id'],$title,$desc,$post,$destino]);


header('location:home.php');