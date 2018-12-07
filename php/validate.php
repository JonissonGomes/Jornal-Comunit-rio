<?php
session_start();
$name=$_GET['us'];

require 'pacote.php';

$stmt=$pdo->prepare("UPDATE users SET validate= ? WHERE validate=?");
if ($stmt->execute([1,$name])) {
$_SESSION['inc']='Conta autenticada';
}


header('location:/');