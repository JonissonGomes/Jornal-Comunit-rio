<?php 
try {

	$pdo = new PDO ('mysql:dbname=2jc;host=localhost;port=3306', 'root','');
} catch (PDOException $e) {
	echo "Erro de Conexão " . $e->getMessage() . "\n";
	exit;
}