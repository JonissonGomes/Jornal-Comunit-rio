<?php 
$desc= $_POST['desc'];
$post=$_POST['post'];
$title=$_POST['title'];

include('conect.php');


$stmt= $pdo->prepare("INSERT INTO post (title,descricao,post) VALUES (?,?,?)");
$stmt->execute([$title,$desc,$post]);

header("location:home.php");