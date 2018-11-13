<?php 
session_start();
$us= $_POST['user'];
$ps= $_POST['pass'];


include('conect.php');

$stmt= $pdo->prepare("SELECT * FROM users WHERE username=? and password=?");
$stmt->execute([$us,$ps]);
$data = $stmt-> fetchall();

if ($data != null) {
			$_SESSION['user']=$us;
			$_SESSION['id']=$data[0]['id'];
			header('location:home.php');
}else{
	$_SESSION['inc']='Usuario ou Senha incorreta(o)';
		header('location:'.$_SERVER['HTTP_REFERER']);
	}