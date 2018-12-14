<?php session_start();
try {

	$pdo = new PDO ('mysql:dbname=jc;host=localhost;port=3306', 'root','ifpe');
} catch (PDOException $e) {
	echo "Erro de Conexão " . $e->getMessage() . "\n";
	exit;
}

class Postagem{
	var $titulo;
	var $tema;
	var $corpo;
	var $imagem;
	var $comunidade;


	function __construct($titulo,$tema,$comunidade,$post){
		$this->titulo=addslashes($titulo);
		$this->tema=addslashes($tema);
		$this->comunidade=addslashes($comunidade);
		$this->corpo=addslashes($post);
	}

	function getimagem($img){
		//VERIFICAR SE O ARQUIVO ENVIADO É UMA IMAGEM 
		$re = '/jpg|png|jpge/m';
		preg_match_all($re, $img['name'], $nam, PREG_SET_ORDER, 0);
		//SE O ARQUIVO FOR UMA IMAGEM O PROCESSO DE UPLOAD É INICIADO
		if ($nam!=null) {
			//O DESTINO DA IMAGEM É SALVO PARA QUE POSSA SER SALVO NO BD
			$this->imagem = '../img/postagens/'.date('d-m-Y')."_".date('h-m-s') ;
			$arquivo_tmp = $img[ 'tmp_name' ];
			move_uploaded_file ( $arquivo_tmp, $this->imagem );
		}
	}


	function postar(){
		$resultado=[$this->titulo, $this->tema, $this->corpo, $this->imagem, $this->comunidade,$_SESSION['id']];
		query("INSERT INTO posts (title,tema_id,post,imagem,comunidades_id,users_id) VALUES (?,?,?,?,?,?)",$resultado);
	}
	function imgDEL($post_id){
		$del=fetch("SELECT * FROM posts WHERE id=".$post_id);
		if (is_file($del['imagem'])) {
			unlink($del['imagem']);
		}
	}
	function editar($edit){
		$post=[$this->titulo, $this->tema, $this->corpo, $this->imagem, $this->comunidade,$_SESSION['id']];
		query("UPDATE posts SET title=?, tema_id=? , post=? , imagem=? , comunidades_id=?, users_id= ? WHERE id=".$edit,$post);
	}
}


function getimagem($img){
		//VERIFICAR SE O ARQUIVO ENVIADO É UMA IMAGEM 
		$re = '/jpg|png|jpge/m';
		preg_match_all($re, $img['name'], $nam, PREG_SET_ORDER, 0);
		//SE O ARQUIVO FOR UMA IMAGEM O PROCESSO DE UPLOAD É INICIADO
		if ($nam!=null) {
			//O DESTINO DA IMAGEM É SALVO PARA QUE POSSA SER SALVO NO BD
			$imagem = '../img/perfil/'.$_SESSION['user'];
			$arquivo_tmp = $img[ 'tmp_name' ];
			move_uploaded_file ( $arquivo_tmp, $imagem );
			query('UPDATE users SET imagem=? WHERE id='.$_SESSION['id'],[$imagem]);
			$_SESSION['imagem']=$imagem;
		}
	}





function deletar($del){
	query("DELETE FROM stars where post_id=?",[$del]);
	query("DELETE FROM coments where posts_id=?",[$del]);
	query("DELETE FROM posts where id=?",[$del]);
}

function query($query,$values){
	global $pdo;
	$stmt=$pdo->prepare($query);
	$stmt->execute($values);
	return $stmt;
}

function fetch($query,$values=[]){	
	return query($query, $values)->fetch();
}
function fetchall($query,$values=[]){	 
	return query($query, $values)->fetchAll();
}