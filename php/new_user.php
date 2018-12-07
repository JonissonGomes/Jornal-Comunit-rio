<?php require_once 'pacote.php';
$name= addslashes($_POST['user']);
$genero= addslashes($_POST['genero']);
$bairro= addslashes($_POST['bairro']);
$cidade= addslashes($_POST['cidade']);
$ddn= addslashes($_POST['ddn']);
$ps= addslashes($_POST['pass']);
$ps2= addslashes($_POST['password']);
$to= addslashes($_POST['email']);
$hash= md5(rand());
require_once 'envio.php';
if ($ps == $ps2) {
	//procura se ja existe usuarioom o nickname passado;
	$stmt= $pdo->prepare("SELECT * FROM users WHERE username=? or email=?");
	$stmt->execute([$name,$name]);
	$data = $stmt-> fetchall();
	if ($data!=null) {		
		$_SESSION['inc']= "Nome de usuario ja existe";
		}elseif (!$mail->send()) {
   $_SESSION['inc']='E-mail invalido';
		}else {
		$stmt= $pdo->prepare("INSERT INTO users (username,genero,bairro,cidade,ddn, password,email,validate) VALUES (?,?,?,?,?,?,?,?)");
		$stmt->execute([$name,$genero,$bairro,$cidade,$ddn, $ps,$to,$hash]);
		$_SESSION['inc']='Um E-mail de confirmação foi lhe enviado';
 }
		
}else{
	$_SESSION['inc']= "Senhas não combinam";
}

header('location:'.$_SERVER['HTTP_REFERER']);

?>