<?php session_start();
$name= addslashes($_POST['user']);
$ps= addslashes($_POST['pass']);
$ps2= addslashes($_POST['password']);
$to= addslashes($_POST['email']);
require_once 'envio.php';
if (!$mail->send()) {
   $_SESSION['inc']='E-mail invalido';
} else {
//se as senhas baterem;
if ($ps == $ps2) {
	//conecta ao banco 
	include('conect.php');
	//procura se ja existe usuarioom o nickname passado;
	$stmt= $pdo->prepare("SELECT * FROM users WHERE username=?");
	$stmt->execute([$name]);
	$data = $stmt-> fetchall();
	if ($data!=null) {		
		$_SESSION['erro']= "Nome de usuario ja existe";
		}
//se não houver ira cadastrar o usuario;
		else{
		$stmt= $pdo->prepare("INSERT INTO users (username, password,email,validate) VALUES (?,?,?,?)");
		$stmt->execute([$name,$ps,$to,0]);
		$_SESSION['inc']='Um E-mail de confirmação foi lhe enviado';
		}
}else{
	$_SESSION['erro']= "Senhas não combinam";
}
}
header('location:'.$_SERVER['HTTP_REFERER']);

?>