<?php session_start();
$us= $_POST['user'];
$ps= $_POST['pass'];
$ps2= $_POST['password'];

//se as senhas baterem;
if ($ps == $ps2) {
	//conecta ao banco 
	include('conect.php');
	//procura se ja existe usuarioom o nickname passado;
	$stmt= $pdo->prepare("SELECT * FROM users WHERE username=?");
	$stmt->execute([$us]);
	$data = $stmt-> fetchall();
	if (in_array($us, $data[0])) {
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