<?php 

require_once 'pacote.php';

$stmt= $pdo->prepare('INSERT INTO stars(valor,user_id,post_id) values (?,?,?)');
$stmt->execute([$_POST['valor'],$_SESSION['id'],$_SESSION['post']]);

$media=fetch('SELECT AVG(valor) FROM stars where post_id=?',[$_SESSION['post']]);

echo number_format($media[0],2);