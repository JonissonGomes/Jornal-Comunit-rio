<?php 
session_start();
$us= $_POST['user'];
$ps= $_POST['pass'];


include('pacote.php');

$stmt= $pdo->prepare("SELECT id,imagem_perfil,validate FROM users WHERE username=? and password=?");
$stmt->execute([$us,$ps]);
$data = $stmt-> fetch();

if ($data != null) {
	if ($data['validate']== 1) {		
			$_SESSION['user']=$us;
			$_SESSION['id']=$data['id'];
			if ($data['imagem_perfil']==null) {
				$_SESSION['imagem_perfil']='../img/perfil-none.jpg';
			}else{
			$_SESSION['imagem_perfil']=$data['imagem_perfil'];
			}
			header('location:home.php');
	}else{
		$_SESSION['inc']='Conta não autenticada';
		header('location:'.$_SERVER['HTTP_REFERER']);
	}
}else{
	$_SESSION['inc']='Usuario ou Senha incorreta(o)';
		header('location:'.$_SERVER['HTTP_REFERER']);
	}