<?php 
	require "conexion.php";
 
 
	$conceptos="";
	$filtraconcepto_id="";
	$filtradebe_o_haber="";
	$filtratexto_fijo="";

	$concepto_idActualizado="";
	$debe_o_haberActualizado="";
	$texto_fijoActualizado="";
	
	$conceptoIdEliminado="";
	$nuevoConcepto="";
	$nuevoDebe_o_Haber="";
	$nuevoTexto_Fijo="";
	$acontar="no";
	$pagina=0;
	$num_paginas=0;
	$desde=0;
	$actualizo="";
  
	if (isset($_GET['conceptos'])) {
		$conceptos = $_GET['conceptos'];
		$pagina=$_GET['pagina'];
		$num_paginas=$_GET['num_paginas'];
		}

	if (isset($_GET['acontar'])) {
		$acontar="si";
		} else {
			$acontar="no";
		}
	
	
	if (isset($_GET['nuevoConcepto'])) {

		$nuevoConcepto=$_GET['nuevoConcepto'];
		$nuevoDebe_o_Haber=$_GET['nuevoDebe_o_Haber'];
		$nuevoTexto_Fijo=$_GET['nuevoTexto_Fijo'];

	}

	if (isset($_GET['actualizo'])) {
			$actualizo=$_GET['actualizo'];
			$concepto_IdActualizado = $_GET['param1'];
			$debe_o_haberActualizado = $_GET['param2'];
			$texto_fijoActualizado = $_GET['param3'];
	}

	if (isset($_GET['param1'])) {
		$concepto_IdActualizado = $_GET['param1'];
		}
	if (isset($_GET['param2'])){
		$debe_o_haberActualizado = $_GET['param2'];
		}
	if (isset($_GET['param3'])) {
		$texto_fijoActualizado = $_GET['param3'];
		}

	if (isset($_GET['concepto_ideliminado'])) {
		$concepto_IdEliminado = $_GET['concepto_ideliminado'];
		}

	$concepto_id = "CONCEPTO_ID";
	$debe_o_haber = "DEBE_O_HABER";
	$texto_fijo = "TEXTO_FIJO";

	$actualizar ="ACTUALIZAR";
	$borrar = "BORRAR";
	$tamanio=12;




	
	if ($acontar=="si") {

		$resultado = mysqli_query($con, "SELECT * FROM conceptos");
		$num_filas = mysqli_num_rows($resultado);
		echo $num_filas;

	}


	if($conceptos==="conceptos") {

			
			$desde=(($pagina-1)*$tamanio);

		 	$resultado = mysqli_query($con, "SELECT * FROM conceptos LIMIT $desde,$tamanio");


			$table = '<div class = "container">';
			$table .=  '<table class = "table table-striped table-bordered table-hover table-condensed table-responsive">';
			$table .= '<tr>';
			$table .= '<th class="col-sm-2">ID Concepto</th>';
			$table .= '<th class="col-sm-2">Debe o Haber</th>';
			$table .= '<th class="col-sm-12">Texto Fijo</th>';
			$table .= '<th class="col-sm-2">Modificar</th>';
			$table .= '<th class="col-sm-2">Eliminar</th>';
			$table .= '</tr>';


			while ($fila = mysqli_fetch_assoc($resultado)) {

			$table .= '<tr>';
			$table .= '<td id="'.$concepto_id.$fila['CONCEPTO_ID'].'">' . $fila['CONCEPTO_ID'] . '</td>';
			$table .= '<td id="'.$debe_o_haber.$fila['CONCEPTO_ID'].'">' . $fila['DEBE_O_HABER'] . '</td>';
			$table .= '<td id="'.$texto_fijo.$fila['CONCEPTO_ID'].'">' . $fila['TEXTO_FIJO'] . '</td>';

			$table .= '<td><input id="'.$fila['CONCEPTO_ID'].'" onclick="editarConceptos(this.id)" type = "button" value ="Editar" class = "btn btn-success"></td>';
			$table .= '<td><input  id="'.$borrar.$fila['CONCEPTO_ID'].'" onclick="borrarConcepto('.$fila['CONCEPTO_ID'].')"  type = "button" value ="Borrar" class = "btn btn-danger"></td>';

			$table .= '<td><input id="'.$actualizar.$fila['CONCEPTO_ID'].'" onclick = "actualizarConceptos('.$fila['CONCEPTO_ID'].')" type = "button" value ="Actualizar" class = "btn btn-primary" style="display:none;"></td>';
			$table .= '</tr>';
			}

		$table.= '</table>';
		$table.= '<button onclick="ejecutarNuevaVentana()" class="btn btn-primary">Agregar Concepto</button>';
		$table.="<br>"; 
		$table.="<h4>Mostrar Página:</h4>";
		$table.="<button class='botones' onclick="."'retrocedoPagina()'>"."<"."</button>";

		for ($i=0; $i<$num_paginas;$i++) {

			$table.="<button class='botones' onclick="."mostrarConceptos(".($i+1).")"." id="."boton".($i+1).">".($i+1)."</button>";
		
			} 

		$table.="<button  class='botones' onclick="."'avanzoPagina()'>".">"."</button>";
		$table.= "</div>";
		echo $table;
		mysqli_close($con);
	} 



		if($actualizo=="si") {

		$filtraconcepto_id=mysqli_real_escape_string($con, $concepto_IdActualizado);
		$filtradebe_o_haber=mysqli_real_escape_string($con, $debe_o_haberActualizado);
		$filtratexto_fijo=mysqli_real_escape_string($con, $texto_fijoActualizado);

	
		$query="UPDATE conceptos SET DEBE_O_HABER = '$filtradebe_o_haber', TEXTO_FIJO = '$filtratexto_fijo' WHERE   CONCEPTO_ID  = '$filtraconcepto_id'";

	
		if (mysqli_query($con, $query)) {
			echo "correcto";
		} else { 
			echo "No correcto". mysqli_error($con);
		}
		mysqli_close($con); 
	}
		
		
		if(!empty($concepto_IdEliminado)){

		$concepto_id=mysqli_real_escape_string($con, $concepto_IdEliminado);
		$resultado=mysqli_query($con, "DELETE FROM conceptos WHERE CONCEPTO_ID = $concepto_id");
		mysqli_close($con);

		} 
		
		if($nuevoConcepto=="si") {

		$query="INSERT INTO conceptos (DEBE_O_HABER, TEXTO_FIJO) VALUES ('$nuevoDebe_o_Haber', '$nuevoTexto_Fijo')";

		if (mysqli_query($con, $query)) {
			echo "correcto";
		} else { 
			echo "No ejecutado".mysqli_error($con);
		}

		mysqli_close($con);
	} 

?>


