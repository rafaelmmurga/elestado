<!DOCTYPE html>
<?php
require_once 'config.php';
$result = false;

if(!empty($_POST)){
	$name = $_POST['name'];
	$password = $_POST['password'];
	$sql = "INSERT INTO users(name,password) VALUES(:name,:password)";
	$query = $pdo->prepare($sql);

	$query->execute([
		'name'=> $name,
		'password'=>$password
	]);
}
?>
<html>
<head>
	<title>Panel admin</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<h1>Añadir usuario</h1>
			<a href="index.php">Inicio</a>
			<?php
			if($result){
				echo '<div class="alert alert-success">Usuario guardado</div>'; 
			}			
			?>
			<form action="add.php" method="POST">
				<label for="name">Nombre</label>
				<input type="text" name="name" id="name">
				<br>
				<label for="password">Contraseña</label>
				<input type="password" name="password" id="password">
				<br>
				<input type="submit" value="Guardar">
			</form>
	</div>
</body>
</html>