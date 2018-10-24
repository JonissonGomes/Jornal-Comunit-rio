<?php 

include('conect.php');

$stmt=$pdo->prepare("INSERT INTO coments(coment,post_id,users_id) values (?,?,?)");
$stmt->execute([$_POST['coment'],$_POST['post'],$_SESSION['id']]);