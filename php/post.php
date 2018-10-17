<?php 
session_start();
$desc= $_POST['desc'];
$post=$_POST['post'];
$title=$_POST['title'];
// $texto = str_replace(' ','' ,$_FILES[ 'imagem' ][ 'name' ] );
$destino = '../img/'.date('d-m-Y').time() ;
$arquivo_tmp = $_FILES[ 'imagem' ][ 'tmp_name' ];
 move_uploaded_file ( $arquivo_tmp, $destino );
include('conect.php');


$stmt= $pdo->prepare("INSERT INTO posts (user_id,title,descricao,post,imagem) VALUES (?,?,?,?,?)");
$stmt->execute([$_SESSION['id'],$title,$desc,$post,$destino]);

header("location:home.php");