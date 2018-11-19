<?php 

require_once 'pacote.php';

deletar($_GET['del']);


header('location:'.$_SERVER['HTTP_REFERER']);
