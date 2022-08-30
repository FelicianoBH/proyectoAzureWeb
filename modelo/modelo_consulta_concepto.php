<?php 
	require "conexion.php";
 

	$conceptos="";
	$filtracodigo_cuenta="";
	$filtratitulo="";
	$filtramasa_patrimonial="";
	$filtragrado="";
	$filtradesarrollo="";
	$filtracon_enlace="";
	$codigo_cuentaActualizada="";
	$titulo_Actualizo="";
	$masa_patrimonialActualizada="";
	$gradoActualizado="";
	$desarrolloActualizado="";
	$con_enlaceActualizado="";
	
	$referenciaIDEliminada="";
	$nuevaCuenta="";
	$nuevoTitulo=""; 
	$nuevaMasaPatrimonial="";
	$nuevoGrado="";
	$nuevoDesarrollo="";
	$nuevoConEnlace="";
	$nuevaFecha="";
	$nuevoAsiento="";
	$acontar="no";
	$pagina=0;
	$num_paginas=0;
	$desde=0;
	$fechaHoy=0;
	$retrocedo="inicio";

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
	


	$concepto_id="CONCEPTO_ID";
	$debe_o_haber="DEBE_O_HABER";
	$texto_fijo="TEXTO_FIJO";

	$codigo_cuenta = "CODIGO_CUENTA";
	$titulo = "TITULO";
	$seleccionar ="SELECCIONAR";
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
			$table .= '<th class="col-sm-2">Concepto Id</th>';
			$table .= '<th class="col-sm-12">Texto Id</th>';
			$table .= '<th class="col-sm-2">Debe/Haber</th>';
			$table .= '<th class="col-sm-2">Seleccionar</th>';
			$table .= '</tr>';


			while ($fila = mysqli_fetch_assoc($resultado)) {

			$table .= '<tr>';
			$table .= '<td id="'.$concepto_id.$fila['CONCEPTO_ID'].'">' . $fila['CONCEPTO_ID'] . '</td>';
			$table .= '<td id="'.$texto_fijo.$fila['CONCEPTO_ID'].'">' . $fila['TEXTO_FIJO'] . '</td>';
			$table .= '<td id="'.$debe_o_haber.$fila['CONCEPTO_ID'].'">' . $fila['DEBE_O_HABER'] . '</td>';
			$texto="'";
	  		$table .= '<td><input id="'.$seleccionar.$fila['CONCEPTO_ID'].'" onclick = "seleccionarConcepto('.$texto.$fila['CONCEPTO_ID'].$texto.')" type = "button" value ="Seleccionar" class = "btn btn-success" ></td>'; 
			$table .= '</tr>';
	}
		$table.= '</table>';
		$table.="<h4>Mostrar Página:</h4>";
		$table.="<button class='botones' onclick="."'retrocedoPaginaConcepto()'>"."<"."</button>";
		$table.="<button  class='botones' onclick="."'avanzoPaginaConcepto()'>".">"."</button>";
		$table.= "</div>";
		echo $table;
		mysqli_close($con);
	} 

?>

