<?php 
session_start();
include('pacote.php');


$stmt=$pdo->prepare("INSERT INTO coments(coment,posts_id,users_id) values (?,?,?)");
$stmt->execute([$_POST['coment'],$_SESSION['post'],$_SESSION['id']]);


header("location:coment.php");