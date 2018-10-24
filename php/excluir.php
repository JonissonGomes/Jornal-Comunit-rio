<?php 

include('conect.php');
$delete=$pdo->prepare("SELECT * FROM posts WHERE id=?");
$delete->execute([$_GET['del']]);
$del=$delete->fetch();

unlink($del['imagem']);

$delete= $pdo->prepare("DELETE FROM coments where posts_id=?");
$delete->execute([$_GET['del']]);
$delete= $pdo->prepare("DELETE FROM posts where id=?");
$delete->execute([$_GET['del']]);

header('location:home.php');
