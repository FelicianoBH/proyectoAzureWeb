<?php 
	require "conexion.php";
 

	$id_responsableActualizada="";
	$actualizar_fam="";
	$acontar="no";
	$pagina=0;
	$num_paginas=0;
	$desde=0;
	$fechaHoy=0;
	$familias="";
	$buscafamilia="";
	$codigo_buscar;
	$alta="";
	$nuevoCodigo="";
	$nuevoNombre="";
	$nuevoDescuento1="";
	$nuevoDescuento2="";
	$borrar_fam="";
	$codigo_borrar="";
	$desdecodigo="";

	if (isset($_GET['buscafamilia'])) {
		$buscafamilia = $_GET['buscafamilia'];
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

	if (isset($_GET['actualizar_fam'])) {

		$actualizar_fam=$_GET['actualizar_fam'];
		$codigo_actualizar=$_GET['codigo'];
		$nombre_actualizar=$_GET['nombreActualizado'];
		$descuento1_actualizar=$_GET['descuento1Actualizado'];
		$descuento2_actualizar=$_GET['descuento2Actualizado'];

	}


	if (isset($_GET['borrar'])) {
		$borrar_fam=$_GET['borrar'];
		$codigo_borrar=$_GET['familia_borrar'];
	 	}


	$codigo = "FAM_CODIGO";
	$nombre = "FAM_NOMBRE";
	$descuento1 = "FAM_DESCUENTO1";
	$descuento2 = "FAM_DESCUENTO2";
	$actualizar ="ACTUALIZAR";
	$borrar = "BORRAR";
	$tamanio=12;

	
	if ($acontar=="si") {

		$resultado = mysqli_query($con, "SELECT * FROM familia WHERE FAM_CODIGO >= '$desdecodigo'");
		$num_filas = mysqli_num_rows($resultado);
		echo $num_filas;

	}


	if($familias==="si") {

			
			$desde=(($pagina-1)*$tamanio);

		 	$resultado = mysqli_query($con, "SELECT * FROM familia WHERE FAM_CODIGO >= '$desdecodigo' ORDER BY FAM_CODIGO LIMIT $desde,$tamanio");

			$table = '<div class = "container">';
			$table .=  '<table class = "table table-striped table-hover table-condensed table-responsive">';
			$table .= '<tr>';
			$table .= '<th class="col-sm-0">Código</th>';
			$table .= '<th class="col-sm-4">Nombre</th>';
			$table .= '<th class="col-sm-2">Descuento 1</th>';
			$table .= '<th class="col-sm-2">Descuento 2</th>';
			$table .= '<th class="col-sm-0">Modificar</th>';
			$table .= '<th class="col-sm-0">Eliminar</th>';
			$table .= '</tr>';


			while ($fila = mysqli_fetch_assoc($resultado)) {

			$table .= '<tr>';
			$table .= '<td id="'.$codigo.$fila['FAM_CODIGO'].'">' . $fila['FAM_CODIGO'] . '</td>';
			$table .= '<td id="'.$nombre.$fila['FAM_CODIGO'].'" style="white-space:nowrap">' . $fila['FAM_NOMBRE'] . '</td>';
			$table .= '<td id="'.$descuento1.$fila['FAM_CODIGO'].'" style="white-space:nowrap">' . $fila['FAM_DESCUENTO1'] . '</td>';
			$table .= '<td id="'.$descuento2.$fila['FAM_CODIGO'].'" style="white-space:nowrap">' . $fila['FAM_DESCUENTO2'] . '</td>';

			$table .= '<td><input id="'.$fila['FAM_CODIGO'].'" onclick="editarFamilia(this.id)" type = "button" value ="Editar" class = "btn btn-success"></td>';
			$table .= '<td><input  id="'.$borrar.$fila['FAM_CODIGO'].'" onclick="borrarFamilia('.$fila['FAM_CODIGO'].')"  type = "button" value ="Borrar" class = "btn btn-danger"></td>';

			$table .= '<td><input id="'.$actualizar.$fila['FAM_CODIGO'].'" onclick = "actualizarFamilia('.$fila['FAM_CODIGO'].')" type = "button" value ="Actualizar" class = "btn btn-primary" style="display:none;"></td>';
			$table .= '</tr>';
			}

		$table.= '</table>';
		$table.= '<button onclick="ejecutarNuevaVentana()" class="btn btn-primary">Agregar Familia</button>';
		$table.="<br>";

		$table.="<h4>Mostrar Página:<span id='mostrandopagina'> </span> Desde código : ".$desdecodigo."</h4>";
		$table.="<button class='botones' onclick="."'retrocedoPagina()'>"."<"."</button>";
		$eligepagina="1-".$num_paginas;
		$table.=' Pagina: <input type="text" id="eligepagina" size="3" maxlength="3" placeholder="'.$eligepagina.'">';
		$table.="<button class='botones' onclick="."'iraPagina()'>"."Ir"."</button>";
		$table.="<button  class='botones' onclick="."'avanzoPagina()'>".">"."</button>";
		$table.='Desde codigo:<input type="text" id="desdecodigo" size="8" maxlength="8">';
		$table.="<button class='botones' onclick="."'desdeCodigo()'>"."Ir"."</button>";
		echo $table;
		mysqli_close($con);
	} 


		if($actualizar_fam=="si") {

		$descuento1=round($descuento1_actualizar, 2);
		$descuento2=round($descuento2_actualizar, 2);
	
		$query="UPDATE familia SET FAM_NOMBRE = '$nombre_actualizar', FAM_DESCUENTO1 = '$descuento1', FAM_DESCUENTO2= '$descuento2' WHERE  FAM_CODIGO = $codigo_actualizar";

		if (mysqli_query($con, $query)) {
			echo "correcto";
		} else { 
			echo "No correcto". mysqli_error($con);
		}
		mysqli_close($con); 
	}
		
		
		if($borrar_fam=="si"){

		
		$resultado=mysqli_query($con, "DELETE FROM familia WHERE FAM_CODIGO = $codigo_borrar");
		
		if ($resultado){

			$mensaje.= " eliminada: ". mysqli_affected_rows($con);

		} else $mensaje.= "error";

		echo $mensaje;

		mysqli_close($con);
	} 

		
		if($alta=="si") {

		$descuento1=round($nuevoDescuento1, 2);
		$descuento2=round($nuevoDescuento2, 2);

		$query="INSERT INTO familia (FAM_CODIGO, FAM_NOMBRE, FAM_DESCUENTO1, FAM_DESCUENTO2) VALUES ('$nuevoCodigo', '$nuevoNombre', '$descuento1', '$descuento2')";

		if (mysqli_query($con, $query)) {
			echo "correcto"." ".$nuevoDescuento1." ".$descuento1."__".$nuevoDescuento2." ".$descuento2;
		} else { 
			echo "No ejecutado".mysqli_error($con);
		}

		mysqli_close($con);
	} 

	if ($buscafamilia=="si") {


		$resultado = mysqli_query($con, "SELECT FAM_CODIGO FROM familia WHERE FAM_CODIGO = '$codigo_buscar'");
			
		if ($resultado) { 

			if (mysqli_num_rows($resultado)> 0) {

				$fila = mysqli_fetch_assoc($resultado);

				echo $fila['FAM_NOMBRE'];

			} else echo "INEXISTENTE";

			
		} else echo "INEXISTENTE";											   

		mysqli_close($con); 

	}

	

?>


