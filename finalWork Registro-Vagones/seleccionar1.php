<?php

	$id = filter_input(INPUT_GET, "id");
	$row = getRecord($id);

    function getRecord($id){
   
        $link = mysqli_connect("localhost", "root", "", "trabajo_final");

        $sql = "SELECT * from REGISTRO_VAGONES where id = $id";

        $result = mysqli_query($link, $sql);

        $row = null;
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
        } else {
            echo mysql_error($link);
        }

        mysqli_close($link);

        return $row;
    }
?>
 
<!doctype html>
<html>
<head>
	<title>Trabajo_Final</title>
	<link rel="stylesheet" href="css/bootstrap.css" >
</head>
<body>

	<div class='container'>
		<h1>Update Record</h1>
		
        <form action="update1.php" method="get">

            <input type='hidden' name='id' value="<?=$row['id'] ?>"/>
            <br>
            <label for="numero">Numero:</label>
            <input type="text" class="form-control" placeholder="Actualice el numero" name="numero" value="<?=$row['numero'] ?>"/>
            <br>
            <label for="color">Color:</label>
            <input type="text" class="form-control" placeholder="Actualice el color" name="color" value="<?=$row['color'] ?>"/>
            <br>
            <label for="tamano">Tamaño:</label>
            <input type="text" class="form-control" placeholder="Actualice el tamano" name="tamano" value="<?=$row['tamano'] ?>"/>
            <br>
            <label for="candado">Candado:</label>
            <br>
            <label class="radio-inline">
                <input type="radio" name="candado" value= "cerrado">Cerrado
            </label>
            <label class="radio-inline">
                <input type="radio" name="candado" value= "abierto">Abierto
            </label>
            <br>
            <br>
            <label for="fechallegada">Fecha de Llegada:</label>
            <input type="Date" class="form-control" name= "fechallegada" value="<?=$row['fechallegada'] ?>"/>
            <br>
            <label for="fechasalida">Fecha de Salida:</label>
            <input type="Date" class="form-control" name= "fechasalida" value="<?=$row['fechasalida'] ?>"/>
            <br>
            <label for="Direccion">Direccion a la que se dirige:</label>
            <input type="text" class="form-control" placeholder="direccion" name= "direccion"value="<?=$row['direccion'] ?>"/>
            <br>

            <label for="pueblo">Pueblo al que se dirige</label>
            <br>
            <select class="form-control" name= "pueblo">
                <option value="default">Seleccione su Pueblo</option>
                <option value="Barranquitas">Barranquitas</option>
                <option value="Coamo">Coamo</option>
                <option value="Aibonito">Aibonito</option>
                <option value="Comerio">Comerio</option>
                <option value="Naranjito">Naranjito</option>
                <option value="Bayamon">Bayamon</option>
                <option value="San Juan">San Juan</option>
                <option value="Toa Alta">Toa Alta</option>
                <option value="Humacao">Humacao</option>
                <option value="Ponce">Ponce</option>
                <option value="Otros">Otros</option>
            </select>

            <br>

            <label for="pais">Pais Procedente:</label>
            <br>
            <select class="form-control" name= "pais">
                <option value="default">Seleccione su Pais</option>
                <option value="Puerto Rico">Puerto Rico</option>
                <option value="Estados Unidos">Estados Unidos</option>
                <option value="Canada">Canada</option>
                <option value="Otros">Otros</option>
            </select>

            <input type="submit" name="update1"  class="btn btn-success" value="Update Data">

        </form>
    </div>
		
    <script src = "js/jquery.js"></script>
    <script src = "js/bootstrap.js"></script>
        
</body>
</html>