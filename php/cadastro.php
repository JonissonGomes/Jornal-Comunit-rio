

	<?php 
	if (isset($_SESSION['erro'])) { ?>
	<script type="text/javascript">
		alert("<?=$_SESSION['erro']?>");
	</script>

	<?php unset($_SESSION['erro']); }?>

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

						<label>Username</label> <input type="text" name="user" placeholder="Digite seu nome">
						<label>Digite sua senha</label> <input type="password" name="password" placeholder="Digite sua senha">
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
