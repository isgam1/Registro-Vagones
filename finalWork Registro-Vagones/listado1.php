<!doctype html>
<html>
<head>
	<title>Trabajo_Final</title>
	<link rel="stylesheet" href="css/bootstrap.css" >
</head>
<body>

    <div class='container'>
        <h1>Listado</h1>
        <table class='table'>
            <thead>
                <tr>
                    <th>numero</th>
                    <th>color</th>
                    <th>tamano</th>
                    <th>candado</th>
                    <th>fechallegada</th>
                    <th>fechasalida</th>
                    <th>direccion</th>
                    <th>pueblo</th>
                    <th>pais</th>
                    <th>Accion</th>
                </tr>	
            </thead>
            <tbody>
                <?php getAllRecords(); ?>
            </tbody>
        </table>
        <a href="index.html" class='btn btn-default'>Add Record</a>
    </div>

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>

</body>
</html>

<?php 

	function getAllRecords(){

		// Create connection
		$link = mysqli_connect("localhost", "root", "", "trabajo_final");
		// Check connection
		if (!$link) {
		    die("Connection failed: " . mysqli_connect_error());
		}

		$sql = "SELECT * from REGISTRO_VAGONES";
		$result = mysqli_query($link, $sql);

		if (mysqli_num_rows($result) > 0) {
		    // output data of each row
		    while($row = mysqli_fetch_assoc($result)) {
echo "<tr>";
echo "<td>" . $row['numero'] . "</td>";
echo "<td>" . $row['color'] . "</td>";
echo "<td>" . $row['tamano'] . "</td>";
echo "<td>" . $row['candado'] . "</td>";
echo "<td>" . $row['fechallegada'] . "</td>";
echo "<td>" . $row['fechasalida'] . "</td>";
echo "<td>" . $row['direccion'] . "</td>";
echo "<td>" . $row['pueblo'] . "</td>";
echo "<td>" . $row['pais'] . "</td>";
echo "<td> <a href='seleccionar1.php?id=" . $row['id'] . "' class='btn btn-link'>Select</a> </td>";
echo "</tr>";
		    }
		} else {
		    echo "0 results";
		}

		mysqli_close($link);		
	}

?>