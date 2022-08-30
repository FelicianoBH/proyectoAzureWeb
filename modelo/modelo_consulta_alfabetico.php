<?php 
	require "conexion.php";
 

	$cuentas="";
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
	$param_edicion="";

	if (isset($_GET['cuentas'])) {
		$cuentas = $_GET['cuentas'];
		$pagina=$_GET['pagina'];
		$num_paginas=$_GET['num_paginas'];
		$param_edicion=$_GET['edicion'];
		}

	if (isset($_GET['acontar'])) {
		$acontar="si";
		} else {
			$acontar="no";
		}
	
	
	$codigo_cuenta = "CODIGO_CUENTA";
	$titulo = "TITULO";
	$seleccionar ="SELECCIONAR";
	$borrar = "BORRAR";
	$tamanio=12;
	
	if ($acontar=="si") {

		$resultado = mysqli_query($con, "SELECT * FROM cuentas");
		$num_filas = mysqli_num_rows($resultado);
		echo $num_filas;

	}

	if($cuentas==="cuentas") {

			$desde=(($pagina-1)*$tamanio);

			 
			 	$resultado = mysqli_query($con, "SELECT * FROM cuentas ORDER BY TITULO LIMIT $desde,$tamanio ");


			$table = '<div class = "container">';
			$table .=  '<table class = "table table-striped table-bordered table-hover table-condensed table-responsive">';
			$table .= '<tr>';
			$table .= '<th class="col-sm-12">Titulo</th>';
			$table .= '<th class="col-sm-2">Codigo Id</th>';

			$table .= '<th class="col-sm-2">Seleccionar</th>';
			$table .= '</tr>';


			while ($fila = mysqli_fetch_assoc($resultado)) {

			$table .= '<tr>';
			$table .= '<td id="'.$titulo.$fila['CODIGO_CUENTA'].'">' . $fila['TITULO'] . '</td>';
			$table .= '<td id="'.$codigo_cuenta.$fila['CODIGO_CUENTA'].'">' . $fila['CODIGO_CUENTA'] . '</td>';
			$texto="'";
	  		$texto="'";
			if ($param_edicion=="edicion"){
					$table .= '<td><input id="'.$seleccionar.$fila['CODIGO_CUENTA'].'" onclick = "seleccionarCuentaEdicion('.$texto.$fila['CODIGO_CUENTA'].$texto.')" type = "button" value ="Seleccionar" class = "btn btn-success" ></td>'; 

			} else {
	  		$table .= '<td><input id="'.$seleccionar.$fila['CODIGO_CUENTA'].'" onclick = "seleccionarCuenta('.$texto.$fila['CODIGO_CUENTA'].$texto.')" type = "button" value ="Seleccionar" class = "btn btn-success" ></td>'; }
			$table .= '</tr>';
	}
		$table.= '</table>';
		$table.="<h4>Mostrar Página:</h4>";
		$table.="<button class='botones' onclick="."'retrocedoPaginaAlfa()'>"."<"."</button>";
		$table.="<button  class='botones' onclick="."'avanzoPaginaAlfa()'>".">"."</button>";
		$table.= "</div>";
		echo $table;
		mysqli_close($con);
	} 


?>


