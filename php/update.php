<?php 
function update($title,$descricao,$post,$imagem,$id){
require('conect.php');
	$pdo->prepare("UPDATE posts SET  title=? , descricao=? , post=? , imagem=? WHERE id=".$id);
	$pdo->execute([$title,$descricao,$post,$imagem]);
}
function delete($id){
	require('conect.php');
	$pdo->prepare("DELETE FROM posts WHERE id=?");
	$pdo->execute([$id]);
}