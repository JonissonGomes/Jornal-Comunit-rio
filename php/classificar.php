<?php 

require_once 'pacote.php';

$stmt= $pdo->prepare('INSERT INTO stars(valor,user_id,post_id) values (?,?,?)');
$stmt->execute([$_POST['valor'],$_SESSION['id'],$_SESSION['post']]);