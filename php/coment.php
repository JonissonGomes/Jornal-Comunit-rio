<?php include('bar.php');?>
<?php
if(!isset ($_SESSION['user'])){
	header('location:/');
}
if (isset($_GET['post'])) {
	$_SESSION['post']=$_GET['post'];
}
$feed=$pdo->prepare('SELECT * FROM posts WHERE id=?');
$feed->execute([$_SESSION['post']]);
$posts=$feed->fetch();?>
<meta charset="UTF-8">
<title><?=$posts['title']?></title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" >
</head>
<body>
	<div id="postbox">
		<div class="postagens" style="margin: auto;">
			<footer style="display: flex;justify-content: space-between;"><?=$posts['created_at']?>	<div class="opcoes"><div onclick="options()" class="sendtop"><img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjI0cHgiIGhlaWdodD0iMjRweCIgdmlld0JveD0iMCAwIDI5Mi4zNjIgMjkyLjM2MiIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgMjkyLjM2MiAyOTIuMzYyOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+CjxnPgoJPHBhdGggZD0iTTI4Ni45MzUsNjkuMzc3Yy0zLjYxNC0zLjYxNy03Ljg5OC01LjQyNC0xMi44NDgtNS40MjRIMTguMjc0Yy00Ljk1MiwwLTkuMjMzLDEuODA3LTEyLjg1LDUuNDI0ICAgQzEuODA3LDcyLjk5OCwwLDc3LjI3OSwwLDgyLjIyOGMwLDQuOTQ4LDEuODA3LDkuMjI5LDUuNDI0LDEyLjg0N2wxMjcuOTA3LDEyNy45MDdjMy42MjEsMy42MTcsNy45MDIsNS40MjgsMTIuODUsNS40MjggICBzOS4yMzMtMS44MTEsMTIuODQ3LTUuNDI4TDI4Ni45MzUsOTUuMDc0YzMuNjEzLTMuNjE3LDUuNDI3LTcuODk4LDUuNDI3LTEyLjg0N0MyOTIuMzYyLDc3LjI3OSwyOTAuNTQ4LDcyLjk5OCwyODYuOTM1LDY5LjM3N3oiIGZpbGw9IiNGRkZGRkYiLz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K"></div>
				<div id="opcoes" class="displaynone" style="margin-top: 50px;margin-left: -50px;">
					<div class="listaopcoes">
						<ul>
							<?php if ($_SESSION['id']==$posts['users_id']) {
								echo '<li><a onclick="confirma('.$posts['id'].')" ><button class="sendtop" >Excluir </button ></a></li>';
								echo '<li><a href="/php/editar.php?edit='.$posts['id'].'" ><button class="sendtop"> Editar </button></a></li>';
							}?>
							<li><a href="" id="facebook-share-btt" rel="nofollow" target="_blank" class="facebook-share-button"><button class="sendtop" style="width: 100px;">compartihar</button></a></li>
						</ul>
					</div>
				</div>
			</div>
		</footer>
		<h1><?=$posts['title']?></h1>
		<img src="<?= $posts['imagem']?>">				
		<div id='estrela'>
			
			<script type="text/javascript">
				getEstrela();
			</script>
			
		</div>
		
		
		<p><?=$posts['post']?></p>

		<br>
		<br>
		<div id="barcoment">
			<form id="forms" action="comentar.php" method="post" style="margin: 100px,100px, 100px;">
				<div class="form-group">
					<textarea name="coment" required style="width:100%; height:150px;"></textarea>
					<button id="botao" class="btn btn-primary btn-sm" type="submit">Enviar comentário</button>
				</div>
			</form>
		</div>

		<div id="Pcoment">

		</div>
		<script type="text/javascript">
			$('#forms').on('submit', function(event) {
				event.preventDefault();
				$.ajax({
					url: $(this).attr('action'),
					type: 'POST',
					data: $(this).serialize(),
					success: function(data){
						getComentarios();
					}
				})
				$(this).trigger('reset');


			});
			
			getComentarios();
		</script>
	</body>
	</html>