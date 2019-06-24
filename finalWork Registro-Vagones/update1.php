<?php

	$id = filter_input(INPUT_GET, "id");
	$numero = filter_input(INPUT_GET, "numero");
	$color = filter_input(INPUT_GET, "color");
	$tamano = filter_input(INPUT_GET, "tamano");
	$candado = filter_input(INPUT_GET, "candado");
	$fechallegada = filter_input(INPUT_GET, "fechallegada");
	$fechasalida = filter_input(INPUT_GET, "fechasalida");
	$direccion = filter_input(INPUT_GET, "direccion");
	$pueblo = filter_input(INPUT_GET, "pueblo");
	$pais = filter_input(INPUT_GET, "pais");
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "trabajo_final";

   $conn = mysqli_connect($servername, $username, $password, $database);

	updateData($servername, $username, $password, $database, $numero, $color, $tamano, $candado, $fechallegada, $fechasalida, $direccion, $pueblo, $pais, $id);
	echo "<br>";
	echo "<a href='listado1.php'>Listado</a>";

	header("Location: listado1.php"); // esta linea redirecciona a otra pag.

	function updateData($servername, $username, $password, $database,  $numero, $color, $tamano, $candado, $fechallegada, $fechasalida, $direccion, $pueblo, $pais,  $id){
		// Create connection
		$conn = mysqli_connect("localhost", "root", "", "trabajo_final");
		// Check connection
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}

		$sql = "UPDATE REGISTRO_VAGONES SET Numero = '$numero', color = '$color', tamano = '$tamano', candado = '$candado',
		fechallegada = '$fechallegada', fechasalida = '$fechasalida', direccion = '$direccion', pueblo = '$pueblo', pais = '$pais' where id = $id";

		echo $sql;

		if (mysqli_query($conn, $sql)) {
		    echo "Record updated successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

		mysqli_close($conn);		
	}



?>