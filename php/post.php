<?php 
session_start();
$desc= $_POST['desc'];
$post=$_POST['post'];
$title=$_POST['title'];

include('conect.php');


$stmt= $pdo->prepare("INSERT INTO post (user_id,title,descricao,post) VALUES (?,?,?,?)");
$stmt->execute([$_SESSION['id'],$title,$desc,$post]);

header("location:home.php");