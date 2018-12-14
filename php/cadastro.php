
<div class="modal fade" id="mCadastrar" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Cadastro</h4>
			</div>
			<div class="modal-body">
				<div class="login">
					<form method="post" action="/php/new_user.php">						
						<label>Nome</label> <input type="text" name="user" placeholder="Digite seu nome" required>
						<label>Gênero</label>	
						<select name="genero" required>							
							<option selected disabled>Gênero</option>
							<option value="Masculino">Masculino</option>
							<option value="Feminino">Feminino</option>
						</select>
						<label>Mora em : </label>
						<input type="text" name="cidade" placeholder="Cidade">
						<input type="text" name="bairro" placeholder="Bairro"> 
						<label>Data de Nascimento</label>
						<input type="date" id="data" name="DDN" required >
						<script type="text/javascript">
							$('#data').on('blur',function(event) {
								var agora= new Date();								
								var escolhido = new Date(this.value);
								if (agora < escolhido) {
								console.log('data invalida');
								this.value = '';
								}
							});
						</script>
						<label>E-mail</label> <input type="email" name="email" placeholder="Digite seu E-mail" required>
						<label>Digite sua senha</label> <input type="password" name="password" placeholder="Digite sua senha" required="">
						<label>Confirme sua senha</label> <input type="password" name="pass" placeholder="Confirme sua senha">
						<div class="modal-footer">
							<button type="submit" class="btn btn-primary">Cadastre-se</button></a>
							<button type="button" data-toggle="modal" data-target="#mLogin" class="btn btn-primary" data-dismiss="modal">Login</button></a>
						</div>
					</form>
				</div>
			</div>
		</div>

	</div>
</div>
