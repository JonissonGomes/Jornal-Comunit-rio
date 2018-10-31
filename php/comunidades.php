<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Comunidades</title>
    <?php include("bar.php"); include("filtro.php");?>
    <link rel="stylesheet" href="/css/comunidades.css">
</head>
<body>
    <form>
        <select id='comunidade' onchange="val()">
            <?php
            include('conect.php');
            $stmt=$pdo->prepare("SELECT * FROM comunidades");
            $stmt->execute();
            $com=$stmt->fetchall();
            for ($i=0; $i < sizeof($com); $i++) { 
                echo '<option value="'.$com[$i]['id'].'">'.$com[$i]['nome'].'</option>';
            }?>
        </select>

    </form>
    
</body>
</html>