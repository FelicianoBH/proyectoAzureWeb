<?php 
	require "conexion.php";
   
	$cuentas="";
	$filtracodigo_cuenta="";
	$filtratitulo="";
	$filtramasa_patrimonial="";
	$filtragrado="";
	$codigo_cuentaActualizada="";
	$titulo_Actualizo="";
	$masa_patrimonialActualizada="";
	$gradoActualizado="";
	$referenciaIDEliminada=""; 
	$nuevaCuenta="";
	$nuevoTitulo="";
	$nuevaMasaPatrimonial="";
	$nuevoGrado="";
	$nuevaFecha="";
	$nuevoAsiento="";
	$acontar="no"; 
	$pagina=0; 
	$num_paginas=0;
	$desde=0;
	$fechaHoy=0;
	$retrocedo="inicio";
	$agrabar_fecha;
	$agrabar_masa;
	$agrabar_grado;
	$grado_id=0;
	$agrabar_cuenta="";
	$cuentanueva="";
	$nuevacuenta="";
	$crearCuenta="";
	$leer_ref="";
	$user="";
	$cuentaeliminar="";
	$cuentarevisar="";
	$revisar="";
	$eliminar="";
	$masa_id="";
	$cambiamasas="";
	$codigo_cuenta="";
	$masa_nueva="";
	$desdecodigo="";
	$desdetitulo="";
	$ordena="";

	if (isset($_GET['cambiamasas'])){
		$cambiamasas="si";
		$codigo_cuenta=$_GET['codigo_cuenta'];
		$masa_nueva=$_GET['masa_nueva'];
	}

	if (isset($_GET['revisar'])){
		$revisar="si";
		$cuentarevisar=$_GET['cuentarevisar'];

	}
	if (isset($_GET['eliminar'])){
		$eliminar="si";
		$cuentaeliminar=$_GET['cuentaeliminar'];

	}

	if (isset($_GET['leer_ref'])){

		$leer_ref=$_GET['leer_ref'];
		$user=$_GET['user'];
	}

	if (isset($_GET['cuentanueva'])) {

		$cuentanueva="si";
		$crearCuenta=$_GET['nuevacuenta'];
		$nuevoTitulo=$_GET['agrabar_titulo'];
		$agrabar_fecha=$_GET['fecha'];
		$agrabar_masa=$_GET['agrabar_masa'];
		$agrabar_grado=$_GET['agrabar_grado'];

	}

	if (isset($_GET['cuentas'])) { 
		$cuentas = $_GET['cuentas'];
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
	
	if (isset($_GET['nuevaCuenta'])) {

		$nuevaCuenta=$_GET['nuevaCuenta'];
		$nuevoTitulo=$_GET['nuevoTitulo'];
		$nuevaMasaPatrimonial=$_GET['nuevaMasaPatrimonial'];
		$nuevoGrado=$_GET['nuevoGrado'];
	}

	if (isset($_GET['param1'])) {
		$codigo_cuentaActualizada = $_GET['param1'];
		}
	if (isset($_GET['param2'])){
		$tituloActualizado = $_GET['param2'];
		}
	if (isset($_GET['param3'])) {
		$masa_patrimonialActualizada = $_GET['param3'];
		}
	
	if (isset($_GET['refeliminada'])) {
		$referenciaIDEliminada=$_GET['refeliminada'];
		}


	$codigo_cuenta = "CODIGO_CUENTA";
	$titulo = "TITULO";
	$fecha_alta = "FECHA_ALTA";
	$apertura_debe="APERTURA_DEBE";
	$apertura_haber="APERTURA_HABER";
	$debe_anio="DEBE_ANIO";
	$haber_anio="HABER_ANIO";
	$masa_patrimonial="MASA_PATRIMONIAL";
	$grado="GRADO";

	$actualizar ="ACTUALIZAR";
	$borrar = "BORRAR";
	$tamanio=12;
	
	if ($revisar=="si") {

		$respuesta=new stdClass();
		$respuesta->responde=1;

		$cuentaamirar=mysqli_real_escape_string($con, $cuentarevisar);

		$resultado=mysqli_query($con, "SELECT * FROM cuentas WHERE CODIGO_CUENTA = '$cuentaamirar'");

		if ($resultado) { 
							$fila = mysqli_fetch_assoc($resultado);

							if ($fila['GRADO']!=3) {

											$respuesta->responde=3;

									} 
										if ($fila['DEBE_ANIO']!=0 || $fila['HABER_ANIO']!=0) {

											 $respuesta->responde=2;

											} 
								 
					}  else { $respuesta->responde=4;}

		$json=json_encode($respuesta);
		echo $json;
		
		mysqli_close($con);

	}


	if ($eliminar=="si"){

		$cuentaborrar=mysqli_real_escape_string($con, $cuentaeliminar);

		$resultado=mysqli_query($con, "DELETE FROM cuentas WHERE CODIGO_CUENTA= $cuentaeliminar");
		if ($resultado) {

			echo "eliminadas: ".mysqli_num_rows($con);
		} else {
			echo "No correcto";
		}

		mysqli_close($con);

		} 
		

	if ($acontar=="si") {

		
		$resultado = mysqli_query($con, "SELECT * FROM cuentas WHERE CODIGO_CUENTA >= '$desdecodigo'");
			
		if ($resultado) { $num_filas = mysqli_num_rows($resultado);
				echo $num_filas; } else { echo "no hay, el desdecodigo es:".$desdecodigo."---".mysqli_error($con);
													   }

	}


	if($cuentas==="cuentas") {

			
			$desde=(($pagina-1)*$tamanio);

			$con = new PDO("mysql:host=tatosqlserver.mysql.database.azure.com; dbname=arnet", "tato", "Tapon_458", array (PDO::MYSQL_ATTR_SSL_CA => 'DigiCertGlobalRootCA.crt.pem' ));

			$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
			

			$resultado = mysqli_query($con, "SELECT * FROM cuentas WHERE CODIGO_CUENTA >= '$desdecodigo' LIMIT $desde,$tamanio");
			
			$table = '<div class = "container">';
			$table .=  '<table class = "table table-striped table-bordered table-hover table-condensed table-responsive">';
			$table .= '<tr>';
			$table .= '<th class="col-sm-1" style="text-align:center;">Código</th>';
			$table .= '<th class="col-sm-4" style="text-align:center;">Título</th>';
			$table .= '<th class="col-sm-1" style="text-align:center;">F.Alta</th>';
			$table .= '<th class="col-sm-2" style="text-align:right;">Debe </th>';
			$table .= '<th class="col-sm-2" style="text-align:right;">Haber </th>';
			$table .= '<th class="col-sm-2" style="text-align:right;">Saldo</th>';
			$table .= '<th class="col-sm-6">Masa</th>';
			$table .= '<th class="col-sm-0">Gr</th>';
			$table .= '<th class="col-sm-0">Mod</th>';
			$table .= '<th class="col-sm-0">Elim</th>';
			$table .= '</tr>';

			while ($fila = mysqli_fetch_assoc($resultado)) {
  
			$saldo=$fila['DEBE_ANIO']-$fila['HABER_ANIO'];
			$table .= '<tr>';
			$table .= '<td id="'.$codigo_cuenta.$fila['CODIGO_CUENTA'].'">' . $fila['CODIGO_CUENTA'] . '</td>';
			$table .= '<td id="'.$titulo.$fila['CODIGO_CUENTA'].'" style="white-space:nowrap">' . htmlentities($fila['TITULO']) . '</td>';
			$table .= '<td id="'.$fecha_alta.$fila['CODIGO_CUENTA'].'">' . date('d/m/Y',strtotime($fila['FECHA_ALTA'])). '</td>';
			$table .= '<td id="'.$debe_anio.$fila['CODIGO_CUENTA'].'" align="right">' .number_format($fila['DEBE_ANIO'], 2, ',','.') . '</td>';
			$table .= '<td id="'.$haber_anio.$fila['CODIGO_CUENTA'].'" align="right">'.number_format($fila['HABER_ANIO'], 2, ',','.'). '</td>';
			$table .= '<td id="'.$haber_anio.$fila['CODIGO_CUENTA'].'" align="right">' .number_format($saldo, 2, ',','.'). '</td>';
			$subcadena=substr($fila['MASA_PATRIMONIAL'], 4);
			$table .= '<td id="'.$masa_patrimonial.$fila['CODIGO_CUENTA'].'"  style="white-space:nowrap">'.$subcadena.'</td>';
			$table .= '<td id="'.$grado.$fila['CODIGO_CUENTA'].'">' . $fila['GRADO'] . '</td>';
			$table .= '<td><input id="'.$fila['CODIGO_CUENTA'].'" onclick="editarCuentas(this.id)" type = "button" value ="Edi" class = "btn btn-success"></td>';
			$table .= '<td><input  id="'.$borrar.$fila['CODIGO_CUENTA'].'" onclick="borrarCuenta('.$fila['CODIGO_CUENTA'].')"  type = "button" value ="Bor" class = "btn btn-danger"></td>';

		$texto="'";
		$table .= '<td><input id="'.$actualizar.$fila['CODIGO_CUENTA'].'" onclick = "actualizarCuentas('.$texto.$fila['CODIGO_CUENTA'].$texto.')" type = "button" value ="Actualizar" class = "btn btn-primary" style="display:none;"></td>'; 

			$table .= '</tr>';
	}
		$table.= '</table>';
		$table.= '<button onclick="ejecutarNuevaVentana()" class="btn btn-primary">Agregar Cuentas</button>';
		$table.="<br>";
		$table.="<h4>Mostrar Página:<span id='mostrandopagina'> </span> Desde código : ".$desdecodigo."</h4>";
		$table.="<button class='botones' onclick="."'retrocedoPagina()'>"."<"."</button>";
		$eligepagina="1-".$num_paginas;
		$table.=' Pagina: <input type="text" id="eligepagina" size="3" maxlength="3" placeholder="'.$eligepagina.'">';
		$table.="<button class='botones' onclick="."'iraPagina()'>"."Ir"."</button>";
		$table.="<button  class='botones' onclick="."'avanzoPagina()'>".">"."</button>";
		$table.='Desde codigo:<input type="text" id="desdecodigo" size="12" maxlength="12">';
		$table.="<button class='botones' onclick="."'desdeCodigo()'>"."Ir"."</button>";
		$table.= "</div>";
		$table.= "</div>";
		echo $table;
		mysqli_close($con);
	} 


	if(!empty($codigo_cuentaActualizada)) {

		$filtracodigo_cuenta=mysqli_real_escape_string($con, $codigo_cuentaActualizada);
		$filtratitulo=mysqli_real_escape_string($con, $tituloActualizado);
		$filtramasa_patrimonial=mysqli_real_escape_string($con, $masa_patrimonialActualizada);
	//	$titulonuevo=filter_var ($tituloActualizado, FILTER_SANITIZE_ENCODED);
		$titulonuevo=htmlentities($tituloActualizado);
		$masa_id=substr($masa_patrimonialActualizada,0,4);
			
		$query="UPDATE cuentas SET TITULO = '$titulonuevo', MASA_PATRIMONIAL = '$filtramasa_patrimonial', MASA_ID = '$masa_id' WHERE  CODIGO_CUENTA LIKE  $filtracodigo_cuenta";
 
		if (mysqli_query($con, $query)) {
			echo "correcto";
		} else { 
			echo "No correcto ". $filtracodigo_cuenta." ".$filtratitulo." ".$masa_patrimonialActualizada." ".$masa_id." ".mysqli_error($con);
		}
		mysqli_close($con); 
	}
		
		
	if(!empty($referenciaIDEliminada)){

		$referencia=mysqli_real_escape_string($con, $referenciaIDEliminada);
		$resultado=mysqli_query($con, "DELETE FROM referencias WHERE ID_USUARIO = $referencia");
		mysqli_close($con);

		} 
		
	if(!empty($nuevaCuenta)) {

		$masa_id=$masa_id=substr($nuevaMasaPatrimonial,0,4);


		$query="INSERT INTO cuentas(CODIGO_CUENTA, TITULO, FECHA_ALTA, MASA_PATRIMONIAL, GRADO, MASA_ID) VALUES ('$nuevaCuenta', '$nuevoTitulo', '2020-10-23', '$nuevaMasaPatrimonial', '$nuevoGrado', '$masa_id')";

		if (mysqli_query($con, $query)) {
			echo "correcto";
		} else { 
			echo "No ejecutado".mysqli_error($con);
		}
		
		mysqli_close($con);
	} 

		if ($cuentanueva=="si") {

		
		$masa_id=$masa_id=substr($agrabar_masa,0,4);

		$query="INSERT INTO cuentas (CODIGO_CUENTA, TITULO, FECHA_ALTA, DEBE_ANIO, HABER_ANIO, MASA_PATRIMONIAL, GRADO, MASA_ID) VALUES ('$crearCuenta', '$nuevoTitulo', '$agrabar_fecha', '0', '0', '$agrabar_masa', '$agrabar_grado', '$masa_id')";

		if (mysqli_query($con, $query)) {
			echo "correcto ".$nuevoTitulo;
		} else { 
			echo "No erjecutado -> grado: <".$agrabar_grado.">  error: ".mysqli_error($con);
		}
		
		mysqli_close($con);
	} 

	if($leer_ref=="si") {


			$query="SELECT FECHA_CONTABLE FROM referencias WHERE ID_USUARIO = '$user'";

			$resultado = mysqli_query($con, $query);

			if($resultado) {

				$fila = mysqli_fetch_assoc($resultado);

			echo $fila['FECHA_CONTABLE'];

			}
			else {
					echo "INEXISTENTE ".$user;

					} 
		
			mysqli_close($con);
	}
		
	if ($cambiamasas=="si"){

			$filtramasa_patrimonial=mysqli_real_escape_string($con, $masa_nueva);
			
			$masa_id=substr($masa_nueva,0,4);

			$subcadena=substr($_GET['codigo_cuenta'], 0, 3);

			$resultado=mysqli_query($con, "UPDATE cuentas SET MASA_PATRIMONIAL = '$filtramasa_patrimonial', MASA_ID = '$masa_id' WHERE LEFT(CODIGO_CUENTA, 3) = '$subcadena' ");

		if ($resultado) {

			echo "MODIFICADAS: "."subcadena:->" . $subcadena."<-"."  en el GET: ". $_GET['codigo_cuenta']; 

		} else {
			echo "No correcto ".mysqli_error($con)." la masaid: ".$masa_id." subcadena: ".$subcadena;
		}

		mysqli_close($con);

	} 
		
?>

