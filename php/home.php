<?php 

session_start();
if(!isset ($_SESSION['user'])){
	header('location:login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="../css/Home.css">
	<?php include('bar.php'); ?>
	</head>
<body>


</body>
</html>
</body>
</html>