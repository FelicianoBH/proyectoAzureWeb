<?php 
	require "conexion.php";
 
	$referencias="";
	$fechaActualizada="";
	$fechaIdActualizada="";
	$referenciaIDEliminada="";
	$nuevaFecha="";
	$nuevoAsiento="";

	
	if (isset($_GET['referencias'])) {
		$referencias = $_GET['referencias'];
	}
	if (isset($_GET['param1'])) {
		$fechaIdActualizada = $_GET['param1'];
		}
	if (isset($_GET['param2'])){
		$fechaActualizada = $_GET['param2'];
		}
	if (isset($_GET['param3'])) {
		$referenciaIDEliminada=$_GET['param3'];
	 	}

	if (isset($_GET['nuevaF'])) {
		$nuevaFecha = $_GET['nuevaF'];
		}
	if (isset($_GET['nuevoA'])) {
		$nuevoAsiento = $_GET['nuevoA'];
		}

	$id_usuario = "ID_USUARIO";
	$fecha_contable = "FECHA_CONTABLE";
	$asiento_contable = "ASIENTO_CONTABLE";
	$apunte_contable="APUNTE_CONTABLE";
	$actualizar ="ACTUALIZAR";
	$borrar = "BORRAR";
	
	if($referencias==="referencias") {



			$resultado = mysqli_query($con, "SELECT * FROM referencias");

			$table = '<div class = "container">';
			$table .=  '<table class = "table table-striped table-bordered">';
			$table .= '<tr>';
			$table .= '<th class="col-sm-4">Usuario Id</th>';
			$table .= '<th class="col-sm-4">Fecha Contable</th>';
			$table .= '<th class="col-sm-4">Asiento</th>';
			$table .= '<th class="col-sm-4">Modificar</th>';
			$table .= '<th class="col-sm-4">Eliminar</th>';
			$table .= '</tr>';


			while ($fila = mysqli_fetch_assoc($resultado)) {

				$table .= '<tr>';
				$table .= '<td>' . $fila['ID_USUARIO'] . '</td>';
				$table .= '<td id="'.$fecha_contable.$fila['ID_USUARIO'].'">' . $fila['FECHA_CONTABLE'] . '</td>';
				$table .= '<td id="'.$asiento_contable.$fila['ID_USUARIO'].'">' . $fila['ASIENTO_CONTABLE'] . '</td>';
				$table .= '<td><input id="'.$fila['ID_USUARIO'].'" onclick="editarReferencias(this.id)" type = "button" value ="Editar" class = "btn btn-default"></td>';

				$table .= '<td><input  id="'.$borrar.$fila['ID_USUARIO'].'" onclick="borrarReferencia('.$fila['ID_USUARIO'].')"  type = "button" value ="Borrar" class = "btn btn-danger"></td>';

				$table .= '<td><input id="'.$actualizar.$fila['ID_USUARIO'].'" onclick = "actualizarReferencias('.$fila['ID_USUARIO'].')" type = "button" value ="Actualizar" class = "btn btn-primary" style="display:none;"></td>';
				$table .= '</tr>';
			}

		$table.= '</table>';
		$table.= '<button onclick="ejecutarNuevaVentana()" class="btn btn-primary">Agregar Referencia</button>';
		$table.="<h4>Mostrar Página:</h4>";
		$table.="<button class='botones' onclick="."'retrocedoPagina()'>"."<"."</button>";

			for ($i=0; $i<$num_paginas;$i++) {

			$table.="<button class='botones' onclick="."mostrarCuentas(".($i+1).")"." id="."boton".($i+1).">".($i+1)."</button>";
		
			} 

		$table.="<button  class='botones' onclick="."'avanzoPagina()'>".">"."</button>";
		$table.= '</div>';
		echo $table;
		mysqli_close($con);
	}

		

		if(!empty($fechaActualizada)) {

		$referencia=mysqli_real_escape_string($con, $fechaActualizada);
		$resultado=mysqli_query($con, "UPDATE referencias SET FECHA_CONTABLE = '$referencia' WHERE  ID_USUARIO =  $fechaIdActualizada");
		mysqli_close($con);  

		}
		
		
		if(!empty($referenciaIDEliminada)){

		$referencia=mysqli_real_escape_string($con, $referenciaIDEliminada);
		$resultado=mysqli_query($con, "DELETE FROM referencias WHERE ID_USUARIO = $referencia");
		mysqli_close($con);

		} 

		
		if(!empty($nuevaFecha) && !empty($nuevoAsiento)) {
		$resultado=mysqli_query($con, "INSERT INTO referencias ('ID_USUARIO', 'FECHA_CONTABLE', 'ASIENTO_CONTABLE') VALUES (NULL, '$nuevaFecha', '$nuevoAsiento')");
		mysqli_close($con);
		} 
		
	
?>

