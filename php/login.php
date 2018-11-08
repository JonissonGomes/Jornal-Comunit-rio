<?php session_start();?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
 	<?php include('bar.php');  	

 	if (isset($_SESSION['inc'])) { ?>
 		<script type="text/javascript">
 			alert("<?=$_SESSION['inc']?>");
 		</script>

 	<?php unset($_SESSION['inc']); }?>
    <script type="text/javascript">
        function ver(){
            var s = document.getElementById("senha");            
            s.setAttribute('type', 'text');
        }

    </script>
</head>
<body>

	<div class="login">
	<h1>Login</h1>
    <form method="post" action="login2.php">
    	<input type="text" name="user" placeholder="Username" required="required" />
        <input type="password" name="pass" placeholder="Password" required="required" id="senha"/>
        <label style="display: flex;justify-content: space-between;">
            <span>Mostrar Senha</span>
        <input style="width: 16px; height: 16px;" type="checkbox" id="vers" onclick="ver()" >
        </label>
        <button type="submit" class="btn btn-primary btn-block" >Entrar</button>
    </form>
        <br><a href="cadastro.php" ><button class="btn btn-primary btn-block">Cadastre-se</button></a>
</div>
</body>
</html>