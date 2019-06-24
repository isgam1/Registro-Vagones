
<?php

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
	
	createDatabase($servername, $username, $password, $database);
	echo "<br>";
	createTable($servername, $username, $password, $database);
	echo "<br>";
	insertData($servername, $username, $password, $database,  $numero, $color, $tamano, 
	$candado, $fechallegada, $fechasalida, $direccion, $pueblo, $pais);
	echo "<br>";
	echo "<a href='listado1.php'>Listado</a>";

	header("Location: listado1.php"); // esta linea redirecciona a otra pag.

	function insertData($servername, $username, $password, $database,  $numero, $color, $tamano, 
	$candado, $fechallegada, $fechasalida, $direccion, $pueblo, $pais){
		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $database);
		// Check connection
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		 }

		$sql = "INSERT INTO REGISTRO_VAGONES (numero, color, tamano, 
	candado, fechallegada, fechasalida, direccion, pueblo, pais)
		VALUES ('$numero', '$color', '$tamano', 
	'$candado', '$fechallegada', '$fechasalida', '$direccion', '$pueblo', '$pais')";

		echo $sql;

		if (mysqli_query($conn, $sql)) {
		    echo "New record created successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

		mysqli_close($conn);		
	}

	function createTable($servername, $username, $password, $database){

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $database);
		// Check connection
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}

		// sql to create table
        $sql = "CREATE TABLE REGISTRO_VAGONES(
            id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
            numero VARCHAR(30) NOT NULL,
            color VARCHAR(30) NOT NULL,
            tamano VARCHAR(30) NOT NULL,
            candado VARCHAR (10) NOT NULL,
            fechallegada DATE NOT NULL,
            fechasalida VARCHAR(60) NOT NULL,
            direccion VARCHAR(60) NOT NULL ,
            pueblo VARCHAR(30) NOT NULL,
            accion VARCHAR(30) NOT NULL,
            pais VARCHAR(30) NOT NULL )";

		if (mysqli_query($conn, $sql)) {
		    echo "Table REGISTRO_VAGONES created successfully";
		} else {
		    echo "Error creating table (REGISTRO_VAGONES): " .  mysqli_errno($conn) . mysqli_error($conn) ;
		}

		mysqli_close($conn);
	}

	function createDatabase($servername, $username, $password, $database){
		// Create connection
		$conn = mysqli_connect($servername, $username, $password);
		// Check connection
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}

		// Create database
		$sql = "CREATE DATABASE $database";
		if (mysqli_query($conn, $sql)) {
		    echo "Database created successfully";
		} else {
		    echo "Error creating database: " . mysqli_error($conn);
		}

		mysqli_close($conn);
	}

?>