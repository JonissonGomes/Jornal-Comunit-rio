<?php 
try {

	$pdo = new PDO ('mysql:dbname=jc;host=localhost;port=3306', 'root','ifpe');
} catch (PDOException $e) {
	echo "Erro de Conexão " . $e->getMessage() . "\n";
	exit;
}