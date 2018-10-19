<?php session_start();
$us= addslashes($_POST['user']);
$ps= addslashes($_POST['pass']);
$ps2= addslashes($_POST['password']);

//se as senhas baterem;
if ($ps == $ps2) {
	//conecta ao banco 
	include('conect.php');
	//procura se ja existe usuarioom o nickname passado;
	$stmt= $pdo->prepare("SELECT * FROM users WHERE username=?");
	$stmt->execute([$us]);
	$data = $stmt-> fetchall();
	if ($data!=null) {		
		$_SESSION['erro']= "Nome de usuario ja existe";
		header('location:cadastro.php');
		}
//se não houver ira cadastrar o usuario;
		else{
		$stmt= $pdo->prepare("INSERT INTO users (username, password) VALUES (?,?)");
		$stmt->execute([$us,$ps]);
		$_SESSION['inc']='Usuario cadastrado com sucesso';
		header('location:login.php');
		}
}else{
	$_SESSION['erro']= "Senhas não combinam";
		header('location:cadastro.php');
}


?>