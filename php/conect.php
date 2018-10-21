<?php 
try {

	$pdo = new PDO ('mysql:dbname=test;host=localhost;port=3306', '','');
} catch (PDOException $e) {
	echo "Erro de Conexão " . $e->getMessage() . "\n";
	exit;
}