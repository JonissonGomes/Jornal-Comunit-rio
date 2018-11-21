<?php 
session_start();
$us= $_POST['user'];
$ps= $_POST['pass'];


include('pacote.php');

$stmt= $pdo->prepare("SELECT * FROM users WHERE username=? and password=?");
$stmt->execute([$us,$ps]);
$data = $stmt-> fetch();

if ($data != null) {
	if ($data['validate']) {		
			$_SESSION['user']=$us;
			$_SESSION['id']=$data['id'];
			header('location:home.php');
	}else{
		$_SESSION['inc']='Conta não autenticada';
		header('location:'.$_SERVER['HTTP_REFERER']);
	}
}else{
	$_SESSION['inc']='Usuario ou Senha incorreta(o)';
		header('location:'.$_SERVER['HTTP_REFERER']);
	}