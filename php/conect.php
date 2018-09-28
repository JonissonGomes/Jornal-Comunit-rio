<?php 
try {

	$pdo = new PDO ('mysql:dbname=id7136476_bd1;host=localhost;port=3306', 'id7136476_silvio','paocomovo');
} catch (PDOException $e) {
	echo "Erro de Conexão " . $e->getMessage() . "\n";
	exit;
}