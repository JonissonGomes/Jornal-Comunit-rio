<?php session_start();
try {

	$pdo = new PDO ('mysql:dbname=jc;host=localhost;port=3306', 'root','');
} catch (PDOException $e) {
	echo "Erro de Conexão " . $e->getMessage() . "\n";
	exit;
}

class Postagem{
	var $titulo;
	var $descricao;
	var $corpo;
	var $imagem;
	var $comunidade;


	function __construct($titulo,$desc,$comunidade,$post){
		$this->titulo=addslashes($titulo);
		$this->descricao=addslashes($desc);
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
			$this->imagem = '../img/'.date('d-m-Y')."_".date('h-m-s') ;
			$arquivo_tmp = $img[ 'tmp_name' ];
			move_uploaded_file ( $arquivo_tmp, $this->imagem );
		}
	}

	function postar(){
		$resultado=[$this->titulo, $this->descricao, $this->corpo, $this->imagem, $this->comunidade,$_SESSION['id']];
		query("INSERT INTO posts (title,descricao,post,imagem,comunidades_id,users_id) VALUES (?,?,?,?,?,?)",$resultado);
	}
	function imgDEL($post_id){
		$del=fetch("SELECT * FROM posts WHERE id=".$post_id);
		if (is_file($del['imagem'])) {
			unlink($del['imagem']);
		}
	}
	function editar($edit){
		$post=[$this->titulo, $this->descricao, $this->corpo, $this->imagem, $this->comunidade,$_SESSION['id']];
		query("UPDATE posts SET title=?, descricao=? , post=? , imagem=? , comunidades_id=?, users_id= ? WHERE id=".$edit,$post);
	}
}





function deletar($del){
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