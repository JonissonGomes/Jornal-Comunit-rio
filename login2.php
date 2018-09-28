<?php 
session_start();
$us= $_POST['user'];
$ps= $_POST['pass'];


include('./conect.php');

$stmt= $pdo->prepare("SELECT * FROM login WHERE nickname=? and senha=?");
$stmt->execute([$us,$ps]);
$data = $stmt-> fetchall();

if ($data != null) {
			$_SESSION['user']=$us;
			header('location:home.php');
}else{
	$_SESSION['inc']='Usuario ou Senha incorreta(o)';
		header('location:login.php');
	}