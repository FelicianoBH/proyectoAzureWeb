<?php 
	require "conexion.php";
 

	$id_responsableActualizada="";
	$actualizar_subfam="";
	$acontar="no";
	$pagina=0;
	$num_paginas=0;
	$desde=0;
	$fechaHoy=0;
	$familias="";
	$buscafamilia="";
	$buscasubfamilia="";
	$codigo_buscar;
	$alta="";
	$nuevoCodigo="";
	$nuevoNombre="";
	$nuevoDescuento1="";
	$nuevoDescuento2="";
	$borrar_subfam="";
	$codigo_borrar="";
	$desdecodigo="";


	if (isset($_GET['buscafamilia'])) {
		$buscafamilia = $_GET['buscafamilia'];
		$codigo_buscar= $_GET['id'];
		}

	if (isset($_GET['buscasubfamilia'])) {
		$buscasubfamilia = $_GET['buscasubfamilia'];
		$codigo_buscar= $_GET['id'];

		}

	if (isset($_GET['familias'])) {
		$familias = $_GET['familias'];
		$pagina=$_GET['pagina'];
		$num_paginas=$_GET['num_paginas'];
		$desdecodigo=$_GET['desdecodigo'];
		}

	if (isset($_GET['acontar'])) {
		$acontar="si";
		$desdecodigo=$_GET['desdecodigo'];
		} else {
			$acontar="no";
		}
	

	if (isset($_GET['alta'])) {

		$alta=$_GET['alta'];
		$nuevoCodigo=$_GET['nuevoCodigo'];
		$nuevoNombre=$_GET['nuevoNombre'];
		$nuevoDescuento1=$_GET['nuevoDescuento1'];
		$nuevoDescuento2=$_GET['nuevoDescuento2'];
	}

	if (isset($_GET['actualizar_subfam'])) {

		$actualizar_subfam=$_GET['actualizar_subfam'];
		$codigo_actualizar=$_GET['codigo'];
		$nombre_actualizar=$_GET['nombreActualizado'];
		$descuento1_actualizar=$_GET['descuento1Actualizado'];
		$descuento2_actualizar=$_GET['descuento2Actualizado'];

	}


	if (isset($_GET['borrar'])) {
		$borrar_subfam=$_GET['borrar'];
		$codigo_borrar=$_GET['subfamilia_borrar'];
	 	}


	$codigo = "SFAM_CODIGO";
	$nombre = "SFAM_NOMBRE";
	$descuento1 = "SFAM_DESC_1";
	$descuento2 = "SFAM_DESC_2";
	$actualizar ="ACTUALIZAR";
	$borrar = "BORRAR";
	$tamanio=12;

	
	if ($acontar=="si") {

		$resultado = mysqli_query($con, "SELECT * FROM subfamilia WHERE SFAM_CODIGO >= '$desdecodigo'" );
		$num_filas = mysqli_num_rows($resultado);
		echo $num_filas;

	}
 	

	if($familias==="si") {

			$desde=(($pagina-1)*$tamanio);

		 	$resultado = mysqli_query($con, "SELECT SFAM_CODIGO, SFAM_NOMBRE, SFAM_DESC_1, SFAM_DESC_2, FAM_CODIGO, FAM_NOMBRE FROM subfamilia LEFT JOIN familia ON SUBSTR(SFAM_CODIGO,1,3)= FAM_CODIGO 
						 	WHERE SFAM_CODIGO >= '$desdecodigo' 
				 			ORDER BY SFAM_CODIGO
				 			LIMIT $desde,$tamanio ");
 
			$table = '<div class = "container">';
			$table .=  '<table class = "table table-striped table-hover table-condensed table-responsive">';
			$table .= '<tr>';
			$table .= '<th class="col-sm-1">Código</th>';
			$table .= '<th class="col-sm-3">Sub_Familia</th>';
			$table .= '<th class="col-sm-3">Familia</th>';
			$table .= '<th class="col-sm-2">Desc 1</th>';
			$table .= '<th class="col-sm-2">Desc 2</th>';
			$table .= '<th class="col-sm-2">Modificar</th>';
			$table .= '<th class="col-sm-2">Eliminar</th>';
			$table .= '</tr>';

			if ($resultado) {
			while ($fila = mysqli_fetch_assoc($resultado)) {

			$table .= '<tr>';
			$table .= '<td id="'.$codigo.$fila['SFAM_CODIGO'].'">' . $fila['SFAM_CODIGO'] . '</td>';
			$table .= '<td id="'.$nombre.$fila['SFAM_CODIGO'].'" style="white-space:nowrap">' . $fila['SFAM_NOMBRE'] . '</td>';
			$table .= '<td id="'.$nombre.$fila['SFAM_CODIGO'].' "style="white-space:nowrap">' . $fila['FAM_NOMBRE'] . '</td>';
			$table .= '<td id="'.$descuento1.$fila['SFAM_CODIGO'].'" style="white-space:nowrap">' . $fila['SFAM_DESC_1'] . '</td>';
			$table .= '<td id="'.$descuento2.$fila['SFAM_CODIGO'].'" style="white-space:nowrap">' . $fila['SFAM_DESC_2'] . '</td>';

			$table .= '<td><input id="'.$fila['SFAM_CODIGO'].'" onclick="editarsubFamilia(this.id)" type = "button" value ="Editar" class = "btn btn-success"></td>';
			$table .= '<td><input  id="'.$borrar.$fila['SFAM_CODIGO'].'"name="'.$fila['SFAM_CODIGO'].'"  onclick="borrarsubFamilia(this.name)"  type = "button" value ="Borrar" class = "btn btn-danger"></td>';

			$table .= '<td><input id="'.$actualizar.$fila['SFAM_CODIGO'].'" name="'.$fila['SFAM_CODIGO'].'" onclick = "actualizarsubFamilia(this.name)" type = "button" value ="Actualizar" class = "btn btn-primary" style="display:none;"></td>';
			$table .= '</tr>';
			}
		} else {
			$mensaje="nada";
		}
		$table.= '</table>';
		$table.= '<button onclick="ejecutarNuevaVentana()" class="btn btn-primary">Agregar Sub_Familia</button>';
		$table.="<br>";
		$table.="<h4>Mostrar Página:<span id='mostrandopagina'> </span> Desde código : ".$desdecodigo."</h4>";
		$table.="<button class='botones' onclick="."'retrocedoPagina()'>"."<"."</button>";
		$eligepagina="1-".$num_paginas;
		$table.=' Pagina: <input type="text" id="eligepagina" size="3" maxlength="3" placeholder="'.$eligepagina.'">';
		$table.="<button class='botones' onclick="."'iraPagina()'>"."Ir"."</button>";
		$table.="<button  class='botones' onclick="."'avanzoPagina()'>".">"."</button>";
		$table.='Desde codigo:<input type="text" id="desdecodigo" size="8" maxlength="8">';
		$table.="<button class='botones' onclick="."'desdeCodigo()'>"."Ir"."</button>";
		$table.= "</div>";
		echo $table;
		mysqli_close($con);
	} 


		if($actualizar_subfam=="si") {

		$descuento1=round($descuento1_actualizar, 2);
		$descuento2=round($descuento2_actualizar, 2);
	
		$query="UPDATE subfamilia SET SFAM_NOMBRE = '$nombre_actualizar', SFAM_DESC_1 = '$descuento1', SFAM_DESC_2= '$descuento2' WHERE  SFAM_CODIGO = '$codigo_actualizar'";

		if (mysqli_query($con, $query)) {
			echo "correcto"."_".mysqli_affected_rows($con)."_".$codigo_actualizar;
		} else { 
			echo "No correcto". mysqli_error($con);
		}
		mysqli_close($con); 
	}
		
		
		if($borrar_subfam=="si"){

		
		$resultado=mysqli_query($con, "DELETE FROM subfamilia WHERE SFAM_CODIGO = $codigo_borrar");
		
		if ($resultado){

			echo " eliminada: ". mysqli_affected_rows($con);

		} else echo "error";


		mysqli_close($con);
	} 

		
		if($alta=="si") {

		$descuento1=round($nuevoDescuento1, 2);
		$descuento2=round($nuevoDescuento2, 2);

		$query="INSERT INTO subfamilia (SFAM_CODIGO, SFAM_NOMBRE, SFAM_DESC_1, SFAM_DESC_2) VALUES ('$nuevoCodigo', '$nuevoNombre', '$descuento1', '$descuento2')";

		if (mysqli_query($con, $query)) {
			echo "correcto"." ".$nuevoDescuento1." ".$descuento1."__".$nuevoDescuento2." ".$descuento2;
		} else { 
			echo "No ejecutado".mysqli_error($con);
		}

		mysqli_close($con);
	} 

	if ($buscafamilia=="si") {


		$resultado = mysqli_query($con, "SELECT FAM_CODIGO, FAM_NOMBRE FROM familia WHERE FAM_CODIGO = '$codigo_buscar'");
			
		if ($resultado) { 

			if (mysqli_num_rows($resultado)> 0) {

				$fila = mysqli_fetch_assoc($resultado);

				echo $fila['FAM_NOMBRE'];

			} else echo "INEXISTENTE";

			
		} else echo "INEXISTENTE";											   

		mysqli_close($con); 

	}

		if ($buscasubfamilia=="si") {


		$resultado = mysqli_query($con, "SELECT SFAM_CODIGO, SFAM_NOMBRE FROM subfamilia WHERE SFAM_CODIGO = '$codigo_buscar'");
			
		if ($resultado) { 

			if (mysqli_num_rows($resultado)> 0) {

				$fila = mysqli_fetch_assoc($resultado);

				echo $fila['SFAM_NOMBRE'];

			} else echo "INEXISTENTE";

			
		} else echo "INEXISTENTE";											   

		mysqli_close($con); 

	}

?>


