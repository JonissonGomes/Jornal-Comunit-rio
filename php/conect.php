<?php 
try {

	$pdo = new PDO ('mysql:dbname=id7031787_login;host=localhost;port=3306', 'id7031787_wjm','paocomovo');
} catch (PDOException $e) {
	echo "Erro de Conexão " . $e->getMessage() . "\n";
	exit;
}