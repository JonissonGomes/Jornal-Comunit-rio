<?php include('bar.php');?>
<meta charset="UTF-8">
<title>Home</title>
<?php 
if(!isset ($_SESSION['user'])){
	header('location:/');
}

?>

</head>

<body>

	<div class="form-group container" id="POSTS">
		<form id="postar" method="post" action="post.php?post" enctype="multipart/form-data">
			<div class="formPost">
				<label for="title">Titulo:</label>
				<input class="form-control" type="text" id="title" name="title" size="20" maxlength="40" placeholder="Insira o titulo" required>	
				<label>Postagem:</label>
				<textarea class="form-control" name="post" required></textarea><br>
				<div class="form-group row" style="display: flex; justify-content: space-between;">
					<div class="col-xs-7">
						<select class="form-control"  name="comunidades">
							<option disabled selected>Selecione a comunidade</option>
							<?php
							$stmt=$pdo->prepare("SELECT * FROM comunidades");
							$stmt->execute();
							$com=$stmt->fetchall();
							for ($i=0; $i < sizeof($com); $i++) { 
								echo '<option value="'.$com[$i]['id'].'">'.$com[$i]['nome'].'</option>';
							}?>
						</select><br>
						<select name="tema" class="form-control">
							<option disabled selected>Selecione o Tema</option>
							<?php
							$stmt=$pdo->prepare("SELECT * FROM tema");
							$stmt->execute();
							$com=$stmt->fetchall();
							for ($i=0; $i < sizeof($com); $i++) { 
								echo '<option value="'.$com[$i]['id'].'">'.$com[$i]['nome'].'</option>';
							}?>
						</select><br>
			<input class="form-control" class="enviar" type="submit" name="">
					</div>
					
					  <div class="wrap-custom-file col-xs-5">
    <input type="file" name="imagem" id="image1" accept=".gif, .jpg, .png" />
    <label id="image2" class="sImage" for="image1">
      <span>Selecionar Imagem</span>
    </label>
  </div>
					
</div>
				</div>
			</div>
			<br>
		</form>
	</div>
<div id="all">
	
</div>
		<script type="text/javascript">
		$('input[type="file"]').each(function(){
  // Refs
  var $file = $(this),
      $label = $file.next('label'),
      $labelText = $label.find('span'),
      labelDefault = $labelText.text();
  
  // When a new file is selected
  $file.on('change', function(event){
    var fileName = $file.val().split( '\\' ).pop(),
        tmppath = URL.createObjectURL(event.target.files[0]);
    //Check successfully selection
		if( fileName ){
      $label
        .addClass('file-ok')
        .css({"background-image": "url(' "+ tmppath + "')", "background-size": "100%","background-repeat":"no-repeat"});
			$labelText.text(fileName);
    }else{
      $label.removeClass('file-ok');
			$labelText.text(labelDefault);
    }
  });
  
// End loop of file input elements  
});

		$('#postar').on('submit', function(event) {
			event.preventDefault();
			var data = new FormData(this);
			$.ajax({
				url: $(this).attr('action'),
				enctype: 'multipart/form-data',
				type: 'POST',
				data: data,
				processData: false,
        cache: false,
        contentType: false,
				success: function(data){
					$('#all').html(data);
					$('#postar').trigger('reset');
					$('#image2').removeAttr('style');
				}
			})
			
		});
		getPostagens();
		</script>
</body>
</html>
</body>
</html>