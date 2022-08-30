<?php 
	require "conexion.php";
 

	$referencias="";
	$fechaActualizada="";
	$fechaIdActualizada="";
	$referenciaIDEliminada="";
	$nuevaFecha="";
	$nuevoAsiento="";
	$acontar="no";  
	$pagina=0;
	$num_paginas=0;
	$desde=0;


	if (isset($_GET['referencias'])) {
		$referencias = $_GET['referencias'];
		$pagina=$_GET['pagina'];
		$num_paginas=$_GET['num_paginas'];
		}
	
	if (!isset($_GET['referencias']) && isset($_GET['nuevaF'])) {

		$nuevaFecha=$_GET['nuevaF'];
		$nuevoAsiento=$_GET['nuevoA'];
	}

	if (isset($_GET['param1'])) {
		$referenciaIdActualizada = $_GET['param1'];
		}
	if (isset($_GET['param2'])){
		$fechaActualizada = $_GET['param2'];
		}
	if (isset($_GET['param3'])) {
		$asientoActualizado=$_GET['param3'];
	 	}
	if (isset($_GET['param4'])) {
		$apunteActualizado=$_GET['param4'];
	 	}
	if (isset($_GET['param5'])) {
		$debe_asientoActualizado=$_GET['param5'];
	 	}
	if (isset($_GET['param6'])) {
		$haber_asientoActualizado=$_GET['param6'];
	 	} 	
	if (isset($_GET['param7'])) {
		$num_facActualizado=$_GET['param7'];
	 	}
	if (isset($_GET['param8'])) {
		$num_pedActualizado=$_GET['param8'];
	 	}
	if (isset($_GET['param9'])) {
		$num_albActualizado=$_GET['param9'];
	 	}
	if (isset($_GET['param10'])) {
		$num_recActualizado=$_GET['param10'];
	 	} 	

	if (isset($_GET['refeliminada'])){
		$referenciaIDEliminada=$_GET['refeliminada'];
	}

	if (isset($_GET['acontar'])) {

		$acontar="si";
		} else {
			$acontar="no";
		}

	$id_usuario = "ID_USUARIO";
	$fecha_contable = "FECHA_CONTABLE";
	$asiento_contable = "ASIENTO_CONTABLE";
	$apunte_contable="APUNTE_CONTABLE";
	$debe_asiento="DEBE_ASIENTO_ACTUAL";
	$haber_asiento="HABER_ASIENTO_ACTUAL";
	$num_fac="NUM_FACTURA";
	$num_ped="NUM_PEDIDO";
	$num_alb="NUM_ALBARAN";
	$num_recibo="NUM_RECIBO";
	$actualizar ="ACTUALIZAR";
	$borrar = "BORRAR";
	$tamanio=12;




	
	if ($acontar=="si") {

		$resultado = mysqli_query($con, "SELECT * FROM referencias");
		$num_filas = mysqli_num_rows($resultado);
		echo $num_filas;

	}


	if($referencias==="referencias") {


			$desde=(($pagina-1)*$tamanio);

		 	$resultado = mysqli_query($con, "SELECT * FROM referencias LIMIT $desde,$tamanio");

		 	
			$table = '<div class = "container">';
			$table .=  '<table class = "table table-striped table-bordered table-hover table-condensed table-responsive">';
			$table .= '<tr>';
			$table .= '<th class="col-sm-0">User </th>';
			$table .= '<th class="col-sm-0">Fecha Contable</th>';
			$table .= '<th class="col-sm-0">Asiento</th>';	
			$table .= '<th class="col-sm-0">Apunte</th>';
			$table .= '<th class="col-sm-0">Debe_Acum</th>';
			$table .= '<th class="col-sm-0">Haber_Acum</th>';
			$table .= '<th class="col-sm-0">N.Factura</th>';
			$table .= '<th class="col-sm-0">N.Pedido</th>';
			$table .= '<th class="col-sm-0">N.Albaran</th>';
			$table .= '<th class="col-sm-0">N.Recibo</th>';
			$table .= '<th class="col-sm-0">Edi.</th>';
			$table .= '<th class="col-sm-0">Bor.</th>';
			$table .= '</tr>'; 

			while ($fila = mysqli_fetch_assoc($resultado)) {

				$table .= '<tr>';
				$table .= '<td>' . $fila['ID_USUARIO'] . '</td>';
				$table .= '<td id="'.$fecha_contable.$fila['ID_USUARIO'].'" align="right">' . $fila['FECHA_CONTABLE'] . '</td>';
				$table .= '<td id="'.$asiento_contable.$fila['ID_USUARIO'].'" align="right">' . $fila['ASIENTO_CONTABLE'] . '</td>';
				$table .= '<td id="'.$apunte_contable.$fila['ID_USUARIO'].'" align="right">' . $fila['APUNTE_CONTABLE'] . '</td>';
				$table .= '<td id="'.$debe_asiento.$fila['ID_USUARIO'].'" style="white-space:nowrap" align="right">' . number_format($fila['DEBE_ASIENTO_ACTUAL'], 2, ',','.') . '</td>';
				$table .= '<td id="'.$haber_asiento.$fila['ID_USUARIO'].'" style="white-space:nowrap" align="right">' . number_format($fila['HABER_ASIENTO_ACTUAL'], 2, ',','.') . '</td>';
				$table .= '<td id="'.$num_fac.$fila['ID_USUARIO'].'" align="right">' . $fila['NUM_FACTURA'] . '</td>';
				$table .= '<td id="'.$num_ped.$fila['ID_USUARIO'].'" align="right">' . $fila['NUM_PEDIDO'] . '</td>';
				$table .= '<td id="'.$num_alb.$fila['ID_USUARIO'].'" align="right">' . $fila['NUM_ALBARAN'] . '</td>';
				$table .= '<td id="'.$num_recibo.$fila['ID_USUARIO'].'" align="right">' . $fila['NUM_RECIBO'] . '</td>';
				$table .= '<td><input id="'.$fila['ID_USUARIO'].'" onclick="editarReferencias(this.id)" type = "button" value ="Edit" class = "btn btn-success"></td>';

				$table .= '<td><input  id="'.$borrar.$fila['ID_USUARIO'].'" onclick="borrarReferencia('.$fila['ID_USUARIO'].')"  type = "button" value ="Borr" class = "btn btn-danger"></td>';

				$texto="'";
  				$table .= '<td><input id="'.$actualizar.$fila['ID_USUARIO'].'" onclick = "actualizarReferencias('.$texto.$fila['ID_USUARIO'].$texto.')" type = "button" value ="Actualizar" class = "btn btn-primary" style="display:none;"></td>'; 
 

				$table .= '</tr>';
			}

		$table.= '</table>';
		$table.= '<button onclick="ejecutarNuevaVentana()" class="btn btn-primary">Agregar Referencias</button>';
		$table.="<br>";

		$table.="<h4>Mostrar Página:<span id='mostrandopagina'> </span></h4>";
		$table.="<button class='botones' onclick="."'retrocedoPagina()'>"."<"."</button>";
		$eligepagina="1-".$num_paginas;
		$table.='<input type="text" id="eligepagina" size="3" maxlength="3" placeholder="'.$eligepagina.'">';
		$table.="<button class='botones' onclick="."'iraPagina()'>"."Ir a pagina "."</button>";
		$table.="<button  class='botones' onclick="."'avanzoPagina()'>".">"."</button>";  
		$table.= "</div>";
		echo $table;
		mysqli_close($con); 
	} 


		if(!empty($referenciaIdActualizada)) {

		
		$referencia=mysqli_real_escape_string($con, $referenciaIdActualizada);
		$resultado=mysqli_query($con, "UPDATE referencias SET FECHA_CONTABLE = '$fechaActualizada', ASIENTO_CONTABLE = '$asientoActualizado', APUNTE_CONTABLE = '$apunteActualizado', DEBE_ASIENTO_ACTUAL='$debe_asientoActualizado', HABER_ASIENTO_ACTUAL = '$haber_asientoActualizado', NUM_FACTURA = '$num_facActualizado', NUM_PEDIDO = '$num_pedActualizado', NUM_ALBARAN = '$num_albActualizado', NUM_RECIBO = '$num_recActualizado' WHERE  ID_USUARIO =  '$referencia'");
		if ($resultado) {
			echo mysqli_affected_rows($con);
		} else echo mysqli_error($con);

		mysqli_close($con);  

		}
		
		
		if(!empty($referenciaIDEliminada)){

		$referencia=mysqli_real_escape_string($con, $referenciaIDEliminada);
		$resultado=mysqli_query($con, "DELETE FROM referencias WHERE ID_USUARIO = $referencia");
		mysqli_close($con);

		} 
		
		if(!empty($nuevaFecha) && !empty($nuevoAsiento)) {
		$resultado=mysqli_query($con, "INSERT INTO referencias (FECHA_CONTABLE, ASIENTO_CONTABLE, APUNTE_CONTABLE, APERTURA_DEBE, APERTURA_HABER, DEBE_ASIENTO_ACTUAL, HABER_ASIENTO_ACTUAL, NUM_FACTURA, NUM_PEDIDO, NUM_ALBARAN, NUM_RECIBO) VALUES ('$nuevaFecha', '$nuevoAsiento', '0', '0', '0', '0', '0', '0', '0', '0', '0')");
		mysqli_close($con);
		} 
		
?>

