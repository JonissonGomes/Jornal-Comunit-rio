<?php
session_start();
$name=$_GET['us'];

require 'conect.php';

$stmt=$pdo->prepare("UPDATE users SET validate= ? WHERE username=?");
$stmt->execute([1,$name]);

$_SESSION['inc']='Conta autenticada';   

header('location:/');