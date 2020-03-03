<!DOCTYPE html>
<html>
<head>
	<title>Concexion a la BD</title>
</head>
<body>

	<?php

		function ejecutar_busqueda(){
			require "formulario_busqueda.php";
			require "datosConexion.php";
		
			$busqueda = $_GET['buscar'];		
			
			$conexion = mysqli_connect($host,$user,$pass);

			if(mysqli_connect_errno())
			{   echo "Imposible conectar con la Base de datos";
				exit();}

			mysqli_select_db($conexion,$db_name) or die ("No se encuentra la base de datos.");


			$consulta = "select * from productos where NOMBRE like '%$busqueda%'";
			$resultadoConsulta = mysqli_query($conexion,$consulta);
	        
	        echo "<table width='50%' align='center' border='1px solid'>";

	        while($fila = mysqli_fetch_array($resultadoConsulta, MYSQLI_ASSOC))
	        {
	        	echo "<tr>";
	        	echo "<td>" . $fila['SECTOR'] . "</td>";
	        	echo "<td>" . $fila['NOMBRE'] . "</td>";
				echo "<td>" . $fila['FECHA'] . "</td>";
				echo "<td>" . $fila['PAIS'] . "</td>";
				echo "<td>" . $fila['PRECIO'] . "</td>";
				echo "</tr>";
	        }
	        echo "</table>";
	        mysqli_close($conexion);
		}

		ejecutar_busqueda();
		
	?>
</body>
</html>