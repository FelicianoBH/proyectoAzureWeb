<?php 
	session_start();
 
	require "conexion.php";
     
	$apuntes="";  
	$filtraconcepto_id="";
	$filtradebe_o_haber="";
	$filtratexto_fijo=""; 
	$filtraid_usuario=""; 
	$filtradebehaber=""; 
	$filtraimporte="";  
   
      
	$concepto_idActualizado="";  
	$debe_o_haberActualizado="";
	$texto_fijoActualizado="";
 
	$codigo_cuenta="";
	 
	$conceptoIdEliminado="";
	$nuevoConcepto_Id="";
	$nuevoDebe_o_Haber="";
	$nuevoTexto_Fijo="";
	$acontar="no";
	$acontarapuntes="no";
	$pagina=0;
	$num_paginas=0;
	$desde=0;
	$leer_ref="";
	$sesion="";
	$concepto_numero=0;
	$agrabar_importe=0;
	$agrabar_debehaber="";
	$agrabar_ref="";

	$agrabar_apu="";
	$agrabar_cta="";
	$agrabar_fecha="";
	$agrabar_asiento="";
	$agrabar_apunte=0;
	$agrabar_cuenta="";
	$agrabar_debehaber="";
	$agrabar_documento="";
	$agrabar_importe="";
	$agrabar_concepto_numero="";
	$agrabar_concepto_texto="";
	$cambiarcuenta="";
	$borrar_apunte="";
	$apunte_eliminar="";
	$asiento_eliminar="";
	$fecha_eliminar="";
	$borrar_apunte_ref="";
	$borrar_apunte_cuenta="";
	$cuentaId="";
	$borrar_dh="";
	$borrar_importe="";
	$cuadre="";
	$cierre="";
	$darbajaapunte="";
	$asientocerrar="";
	$fechacerrar="";
	$asientonuevo="";
	$extractos="";
	$dar_baja_apuntes="";
	$saldocuenta=0;
	$ayuda="";
	$grabaapunteresumen="";
	$agrabar_segundo_grado="";
	$agrabar_primer_grado="";

	if (isset($_GET['asientonuevo'])){

		$asientonuevo=$_GET['asientonuevo'];
	}

	if (isset($_GET['cierre'])){

		$cierre=$_GET['cierre'];
		$asientocerrar=$_GET['asientocerrar'];
		$fechacerrar=$_GET['fechacerrar'];
	}
	if (isset($_GET['extractos'])){

		$extractos=$_GET['extractos'];
		$asientocerrar=$_GET['asientocerrar'];
		$fechacerrar=$_GET['fechacerrar'];
		
	}
	if (isset($_GET['darbajaapunte'])){

		$darbajaapunte=$_GET['darbajaapunte'];
		$asientocerrar=$_GET['asientocerrar'];
		$fechacerrar=$_GET['fechacerrar'];
	}

	if (isset($_GET['cuadre'])) {

		$cuadre=$_GET['cuadre'];

	}
	if (isset($_GET['ayuda'])) {

		$ayuda=$_GET['ayuda'];

	}

	$id_usuario=$_SESSION["id_usuario"];


	if (isset($_GET['cambiarcuenta'])) {

		$cambiarcuenta=$_GET['cambiarcuenta'];

	}

	if (isset($_GET['agrabar_apu'])) {

		$agrabar_apu=$_GET['agrabar_apu'];
		$agrabar_fecha=$_GET['agrabar_fecha'];
		$agrabar_asiento=$_GET['agrabar_asiento'];
		$agrabar_apunte=$_GET['agrabar_apunte'];
		$agrabar_cuenta=$_GET['agrabar_cuenta'];
		$agrabar_debehaber=$_GET['agrabar_debehaber'];
		$agrabar_documento=$_GET['agrabar_documento'];
		$agrabar_concepto_numero=$_GET['agrabar_concepto_numero'];
		$agrabar_concepto_texto=$_GET['agrabar_concepto_texto'];
		$agrabar_importe=$_GET['agrabar_importe'];
		$saldocuenta=$_GET['saldocuenta'];
	}
	if (isset($_GET['grabaapunteresumen'])) {

		$grabaapunteresumen=$_GET['grabaapunteresumen'];
		$agrabar_fecha=$_GET['agrabar_fecha'];
		$agrabar_asiento=$_GET['agrabar_asiento'];
		$agrabar_apunte=$_GET['agrabar_apunte'];
		$ref_debe=$_GET['ref_debe'];
		$ref_haber=$_GET['ref_haber'];
	}

	if (isset($_GET['agrabar_cta'])) {

		$agrabar_cta=$_GET['agrabar_cta'];
		$agrabar_cuenta=$_GET['agrabar_cuenta'];
		$agrabar_debehaber=$_GET['agrabar_debehaber'];
		$agrabar_importe=$_GET['agrabar_importe'];

	}
	if (isset($_GET['agrabar_segundo_grado'])) {

		$agrabar_segundo_grado=$_GET['agrabar_segundo_grado'];
		$agrabar_cuenta=$_GET['agrabar_cuenta'];
		$agrabar_debehaber=$_GET['agrabar_debehaber'];
		$agrabar_importe=$_GET['agrabar_importe'];

	}
	if (isset($_GET['agrabar_primer_grado'])) {

		$agrabar_primer_grado=$_GET['agrabar_primer_grado'];
		$agrabar_cuenta=$_GET['agrabar_cuenta'];
		$agrabar_debehaber=$_GET['agrabar_debehaber'];
		$agrabar_importe=$_GET['agrabar_importe'];

	}

	if (isset($_GET['agrabar_ref'])) {

		$agrabar_ref=$_GET['agrabar_ref'];
		$agrabar_importe=$_GET['agrabar_importe'];
		$agrabar_debehaber=$_GET['agrabar_debehaber'];
	}

	if (isset($_GET['leer_ref'])) {

		$leer_ref=$_GET['leer_ref'];

		}

	if (isset($_GET['concepto_numero'])){

		$concepto_numero=$_GET['concepto_numero'];
	}

	if (isset($_GET['cuenta'])){

		$codigo_cuenta=$_GET['cuenta'];

		}

	if (isset($_GET['apuntes'])) {
		$apuntes = $_GET['apuntes'];
		$pagina=$_GET['pagina'];
		$num_paginas=$_GET['num_paginas'];
		}

	if (isset($_GET['acontar'])) {
		$acontar="si";
		} else {
			$acontar="no";
		}

	if (isset($_GET['acontarapuntes'])) {
		$acontarapuntes="si";
		} else {
			$acontarapuntes="no";
		}
	
	
	if (isset($_GET['nuevoConcepto_Id'])) {

		$nuevoConcepto_Id=$_GET['nuevoConcepto_Id'];
		$nuevoDebe_o_Haber=$_GET['nuevoDebe_o_Haber'];
		$nuevoTexto_Fijo=$_GET['nuevoTexto_Fijo'];

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

	if (isset($_GET['borrar_apunte'])) {
		$borrar_apunte = $_GET['borrar_apunte'];
		$fecha_eliminar= $_GET['fecha_eliminar'];
		$asiento_eliminar = $_GET['asiento_eliminar'];
		$apunte_eliminar = $_GET['apunte_eliminar'];
		}

	if (isset($_GET['dar_baja_apuntes'])) {
		$dar_baja_apuntes = $_GET['dar_baja_apuntes'];
		$asientocerrar=$_GET['asientocerrar'];
		$fechacerrar=$_GET['fechacerrar'];
		}


	if (isset($_GET['borrar_apunte_ref'])){

		$borrar_apunte_ref=$_GET['borrar_apunte_ref'];
		$borrar_dh=$_GET['borrar_dh'];
		$borrar_importe=$_GET['borrar_importe'];
	}
	
	if (isset($_GET['borrar_apunte_cuenta'])){

		$borrar_apunte_cuenta=$_GET['borrar_apunte_cuenta'];
		$borrar_dh=$_GET['borrar_dh'];
		$borrar_importe=$_GET['borrar_importe'];
		$cuentaId=$_GET['cuentaId'];
		
	}

	$concepto_id = "CONCEPTO_ID";
	$debe_o_haber = "DEBE_HABER";
	$texto_fijo = "TEXTO_FIJO";

	$actualizar ="ACTUALIZAR";
	$borrar = "BORRAR";
	$tamanio=9;

	$fecha=""; 
	$asiento="";
	$apunte="APUNTE";
	$documento="DOCUMENTO";
	$cuenta="CUENTA";
	$titulo="TITULO";
	$id_concepto="ID_CONCEPTO";
	$concepto="CONCEPTO";
	$importedebe="IMPORTED";
	$importehaber="IMPORTEH";
	$cero="0";
	

	if ($ayuda=="si") {

		$cuadro=	'<div id="ayuda">
					<img id ="aqui" width="85%" class="card-img-top" src="/PROYECTO3/IMAGEN_SERVIDOR/ayuda.png">
					</div>';
		echo $cuadro;
	}

	if ($acontarapuntes=="si") {

		$resultado = mysqli_query($con, "SELECT * FROM apuntes WHERE USUARIO = '$id_usuario' ");
		$num_filas = mysqli_num_rows($resultado);
		echo $num_filas;
	}

	if ($acontar=="si") {

		$resultado = mysqli_query($con, "SELECT * FROM conceptos");
		$num_filas = mysqli_num_rows($resultado);
		echo "hay te van:".$num_filas;
	}


	if($apuntes==="apuntes") {
			
			$desde=(($pagina-1)*$tamanio);

		 	$resultado = mysqli_query($con, "SELECT * FROM apuntes LEFT JOIN cuentas ON CUENTA = CODIGO_CUENTA HAVING USUARIO = '$id_usuario' ORDER BY APUNTE DESC LIMIT $desde,$tamanio");

			
			$table = '<div class = "container">';
			$table .=  '<table class = "table table-striped table-hover table-responsive">';
			$table .= '<tr>';
			$table .= '<th class="col-sm-1">Ap.</th>';
			$table .= '<th class="col-sm-1">Cuenta</th>';
			$table .= '<th class="col-sm-1">Título</th>';
			$table .= '<th class="col-sm-1">Documento</th>';
			$table .= '<th class="col-sm-4">Id_Con</th>';
			$table .= '<th class="col-sm-1">Concepto</th>';
			$table .= '<th class="col-sm-1">D/H</th>';
			$table .= '<th class="col-sm-1">Debe</th>';
			$table .= '<th class="col-sm-1">Haber</th>';
			$table .= '</tr>';

			$colecciono="";
 
			if (!$resultado) echo mysqli_error($con);

			while ($fila = mysqli_fetch_assoc($resultado)) {
			
			$texto="'";
			$comilla='"';
			$coma=",";

			$table .= '<tr>';
			$table .= '<td id="'.$apunte.$fila['APUNTE'].'">' . $fila['APUNTE'] . '</td>';
			$table .= '<td id="'.$cuenta.$fila['APUNTE'].'">' . $fila['CUENTA'] . '</td>';
			$table .= '<td id="'.$titulo.$fila['APUNTE'].'" style="white-space:nowrap">' . $fila['TITULO'] . '</td>';
			$table .= '<td id="'.$documento.$fila['APUNTE'].'" style="white-space:nowrap">' . $fila['DOCUMENTO'] . '</td>';
			$table .= '<td id="'.$id_concepto.$fila['APUNTE'].'">' . $fila['ID_CONCEPTO'] . '</td>';
			$table .= '<td id="'.$concepto.$fila['APUNTE'].'" style="white-space:nowrap">' . $fila['CONCEPTO'] . '</td>';
			$table .= '<td id="'.$debe_o_haber.$fila['APUNTE'].'">' . $fila['DEBE_HABER'] . '</td>';

			$el_id=$fila['APUNTE'];
			
			if ($fila['DEBE_HABER']=="DEBE"){
				$table .= '<td id="'.$importedebe.$fila['APUNTE'].'" align="right">' . number_format($fila['IMPORTE_DEBE'], 2, ',','.') . '</td>';
				$table .= '<td id="'.$importehaber.$fila['APUNTE'].'" align="right">' . number_format(0, 2, ',','.') . '</td>';
				$el_debe_haber=1;
				$el_importe=$fila['IMPORTE_DEBE'];
			} else {
					$table .= '<td id="'.$importedebe.$fila['APUNTE'].'" align="right">' . number_format(0, 2, ',','.') . '</td>';
					$table .= '<td id="'.$importehaber.$fila['APUNTE'].'" align="right">' . number_format($fila['IMPORTE_HABER'], 2, ',','.') . '</td>';
					$el_debe_haber=2;
					$el_importe=$fila['IMPORTE_HABER'];
					}
			$envio=$el_id.$coma.$el_debe_haber.$coma.$el_importe.$coma;

			$table .= '<td><input id="'.$fila['APUNTE'].'" onclick="editarApunte(this.id)" type = "button" value ="Edita" class = "btn btn-success"></td>';
			$table .= '<td><input  id="'.$borrar.$fila['APUNTE'].'" onclick="borrarApunte('.$envio.')"  type = "button" value ="Borra" class = "btn btn-danger"></td>';
			
			$table .= '<td><input id="'.$actualizar.$fila['APUNTE'].'" onclick = "actualizarApunte('.$texto.$fila['APUNTE'].$texto.')" type = "button" value ="Actualiza" class = "btn btn-primary" style="display:none;"></td>'; 
 			
			$table .= '</tr>';
			}
		$table.= '</table>';

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



	if ($grabaapunteresumen=="si") {

		$id_usuario=$_SESSION["id_usuario"];
		$msg=" veamos grabar apunteresumen--> ";
		$concepto="RESUMEN";
		$fecha_hoy=date("Y-m-d");

		$msg.= " ANTES user :".$id_usuario." fec ".$agrabar_fecha." as ".$agrabar_asiento." ap ".$apunte." debe ".$ref_debe." hab ".$ref_haber;

		$query="INSERT INTO apuntes
		(USUARIO, FECHA, ASIENTO, APUNTE, DOCUMENTO, ID_CONCEPTO, CONCEPTO, DEBE_HABER, IMPORTE_DEBE, IMPORTE_HABER, CUENTA, FECHA_REAL, SALDO_ANTERIOR)
		 VALUES
		('$id_usuario', '$agrabar_fecha', '$agrabar_asiento', '$agrabar_apunte', ' ', '0', '$concepto', ' ', '$ref_debe', '$ref_haber', '999999999999', '$fecha_hoy', '0')";

		$resultado=mysqli_query($con, $query);

		if (!$resultado) {

			 $msg.=" Error al grabar APUNTE_RESUMEN";

			} else { $msg.= " pues deberia ser que si"; }

		$msg.= "  afectados: ".mysqli_affected_rows($con)." parametros, user :".$id_usuario." fec ".$agrabar_fecha." as ".$agrabar_asiento." ap ".$agrabar_apunte." debe ".$ref_debe." hab ".$ref_haber." y el error: ".mysqli_error($con);
		echo $msg;
		mysqli_close($con); 

		}


	if ($agrabar_ref=="si") {


		if ($agrabar_debehaber=="DEBE") {
			
			$query="UPDATE referencias SET DEBE_ASIENTO_ACTUAL=DEBE_ASIENTO_ACTUAL+'$agrabar_importe', APUNTE_CONTABLE=APUNTE_CONTABLE+'1' WHERE ID_USUARIO='$id_usuario'";

			} else {

				$query="UPDATE referencias SET HABER_ASIENTO_ACTUAL=(HABER_ASIENTO_ACTUAL+'$agrabar_importe'), APUNTE_CONTABLE=(APUNTE_CONTABLE+'1') WHERE ID_USUARIO='$id_usuario'";
			}
		
		$resultado=mysqli_query($con, $query);
		if (!$resultado) {
			echo "Error al grabar Referencias";
			}
		mysqli_close($con); 

	}

	if ($agrabar_cta=="si") {

		$segmento= substr($agrabar_cuenta, 0, 3);

		$primer_grado=$segmento."         ";

		$segmento= substr($agrabar_cuenta, 0, 6);

		$segundo_grado=$segmento."      ";

		if ($agrabar_debehaber=="DEBE") {
			
			$query="UPDATE cuentas SET DEBE_ANIO = DEBE_ANIO +'$agrabar_importe' WHERE CODIGO_CUENTA IN ('$agrabar_cuenta', '$primer_grado', '$segundo_grado')";

			} else {

				$query="UPDATE cuentas SET HABER_ANIO=HABER_ANIO+'$agrabar_importe' WHERE CODIGO_CUENTA IN ('$agrabar_cuenta', '$primer_grado', '$segundo_grado')";
			}
		
		$resultado=mysqli_query($con, $query);

		if (!$resultado) {

			echo "Error  ". mysqli_error($con)." ". $agrabar_debehaber." ".$agrabar_cuenta." ".$agrabar_importe;
			}

		mysqli_close($con); 

	}

	if ($borrar_apunte_cuenta=="si") {

		$segmento= substr($cuentaId, 0, 3);

		$primer_grado=$segmento."         ";

		$segmento= substr($cuentaId, 0, 6);

		$segundo_grado=$segmento."      ";

			if ($borrar_dh=='1') {
			 
			$query="UPDATE cuentas SET DEBE_ANIO = DEBE_ANIO -'$borrar_importe'   WHERE CODIGO_CUENTA IN ('$cuentaId', '$primer_grado', '$segundo_grado')";

			} else {

			$query="UPDATE cuentas SET HABER_ANIO = HABER_ANIO -'$borrar_importe'   WHERE CODIGO_CUENTA IN ('$cuentaId', '$primer_grado', '$segundo_grado')";
			}
		
			$resultado=mysqli_query($con, $query);

			if (!$resultado) {

				echo "Error ";
				} else echo "Correcto ";

			mysqli_close($con); 

	}

	if ($borrar_apunte=="si") {

		$query="DELETE FROM apuntes WHERE USUARIO='$id_usuario' AND FECHA ='$fecha_eliminar' AND ASIENTO= '$asiento_eliminar' AND APUNTE = '$apunte_eliminar' ";

		$resultado=mysqli_query($con, $query);

		if (!mysqli_query($con, $query)) {

			echo "Error ".$id_usuario."-".$fecha_eliminar."-".$asiento_eliminar."-".$apunte_eliminar;
			}

		mysqli_close($con); 

	}
		
		if(!empty($concepto_IdEliminado)){

		$concepto_id=mysqli_real_escape_string($con, $concepto_IdEliminado);
		$resultado=mysqli_query($con, "DELETE FROM conceptos WHERE CONCEPTO_ID = $concepto_id");

		mysqli_close($con);

	}



	if(!empty($leer_ref)) {

			$user=$_SESSION["usuario"];
			$id_usuario=$_SESSION["id_usuario"];


			$query="SELECT FECHA_CONTABLE, ASIENTO_CONTABLE, APUNTE_CONTABLE,DEBE_ASIENTO_ACTUAL, HABER_ASIENTO_ACTUAL FROM referencias WHERE ID_USUARIO = '$id_usuario'";

			$resultado = mysqli_query($con, $query);

			if (mysqli_num_rows($resultado)> 0) {

			$fila = mysqli_fetch_assoc($resultado);
			
					$datos_ref= new stdClass();
					$datos_ref->fechaRef_ed=date('d/m/Y',strtotime($fila['FECHA_CONTABLE']));
					$datos_ref->fechaRef=$fila['FECHA_CONTABLE'];
					$datos_ref->asientoRef=$fila['ASIENTO_CONTABLE'];
					$datos_ref->apunteRef=$fila['APUNTE_CONTABLE'];
					$datos_ref->debeRef=$fila['DEBE_ASIENTO_ACTUAL'];
					$datos_ref->haberRef=$fila['HABER_ASIENTO_ACTUAL'];
					$json=json_encode($datos_ref);
					echo $json;

			} else {
					echo "INEXISTENTE";
					} 
		}

		if(!empty($concepto_numero)){

			$query="SELECT DEBE_O_HABER, TEXTO_FIJO FROM conceptos WHERE CONCEPTO_ID='$concepto_numero'";

			$resultado =mysqli_query($con, $query);

			if (mysqli_num_rows($resultado)> 0) {

			$fila = mysqli_fetch_assoc($resultado);

			$datos_concepto = new stdClass();

			$datos_concepto->concepto=$fila['TEXTO_FIJO'];
			$datos_concepto->debehaber=$fila['DEBE_O_HABER'];
			$json=json_encode($datos_concepto);
			echo $json;

			} else { $datos_concepto = new stdClass();

					$datos_concepto->concepto="CONCEPTO INEXISTENTE";
					$datos_concepto->debehaber="_";
					$json=json_encode($datos_concepto);
					echo $json;
					}	
		}

		if(!empty($codigo_cuenta)) {

			$query="SELECT TITULO, DEBE_ANIO, HABER_ANIO, MASA_PATRIMONIAL FROM cuentas WHERE CODIGO_CUENTA = '$codigo_cuenta'";

			$resultado = mysqli_query($con, $query);

			if (mysqli_num_rows($resultado) > 0) {

				$fila = mysqli_fetch_assoc($resultado);
				$datos_cta= new stdClass();
				$datos_cta->titulo=$fila['TITULO'];
				$datos_cta->datos_debe=$fila['DEBE_ANIO'];
				$datos_cta->datos_haber=$fila['HABER_ANIO'];
				$datos_cta->saldo=$fila['DEBE_ANIO']-$fila['HABER_ANIO'];
				$datos_cta->masa_patrimonial=$fila['MASA_PATRIMONIAL'];
				$json=json_encode($datos_cta);
				echo $json;

			}  else {

				$datos_cta= new stdClass();
				$datos_cta->titulo="INEXISTENTE";
				$datos_cta->saldo=0;
				$json=json_encode($datos_cta);
				echo $json;
		}  
	}	

	if(!empty($concepto_IdActualizado)) {

		$filtraconcepto_id=mysqli_real_escape_string($con, $concepto_IdActualizado);
		$filtradebe_o_haber=mysqli_real_escape_string($con, $debe_o_haberActualizado);
		$filtratexto_fijo=mysqli_real_escape_string($con, $texto_fijoActualizado);

	
		$query="UPDATE conceptos SET DEBE_O_HABER = '$filtradebe_o_haber', TEXTO_FIJO = '$filtratexto_fijo' WHERE  'CONCEPTO_ID' =  $filtraconcepto_id";
		 
		if (mysqli_query($con, $query)) {
			echo "correcto";
		} else { 
			echo "No correcto". mysqli_error($con);
		}
		mysqli_close($con); 
	}
	

	if($agrabar_apu=="si") {

		$msg="";
		$id_usuario=$_SESSION["id_usuario"];
		$fecha_hoy=date("Y-m-d");
		if ($agrabar_debehaber=="DEBE") { 
			$agrabar_importe_debe=$agrabar_importe;
			$agrabar_importe_haber=0;
		} else {
			$agrabar_importe_haber=$agrabar_importe;
			$agrabar_importe_debe=0;
		}
		$query="INSERT INTO apuntes (USUARIO, FECHA, ASIENTO, APUNTE, DOCUMENTO, ID_CONCEPTO, CONCEPTO, DEBE_HABER, IMPORTE_DEBE, IMPORTE_HABER, CUENTA, FECHA_REAL, SALDO_ANTERIOR) VALUES ('$id_usuario', '$agrabar_fecha', '$agrabar_asiento','$agrabar_apunte','$agrabar_documento','$agrabar_concepto_numero','$agrabar_concepto_texto','$agrabar_debehaber','$agrabar_importe_debe', '$agrabar_importe_haber','$agrabar_cuenta','$fecha_hoy', '$saldocuenta')";
		$lista=new stdClass();
		$lista->cero=$id_usuario;
		$lista->uno=$agrabar_apu;
		$lista->dos=$agrabar_fecha;
		$lista->tres=$agrabar_asiento;
		$lista->cuatro=$agrabar_apunte;
		$lista->cinco=$agrabar_cuenta;
		$lista->seis=$agrabar_debehaber;
		$lista->siete=$agrabar_documento;
		$lista->ocho=$agrabar_concepto_numero;
		$lista->nueve=$agrabar_concepto_texto;
		$lista->diez=$agrabar_importe;
		$lista->once=$fecha_hoy;
		$json=json_encode($lista);

		if (mysqli_query($con, $query)) {
			$msg="correcto -> ".$json; 
		} else { 
			$msg="Error al grabar el Diario, ".mysqli_error($con);
		}
		echo $msg." la fecha convertida era : ".$agrabar_fecha;
	} 

	if ($borrar_apunte_ref=="si") {

		if ($borrar_dh=="1") {
				
		$query="UPDATE referencias SET DEBE_ASIENTO_ACTUAL=(DEBE_ASIENTO_ACTUAL-'$borrar_importe') WHERE ID_USUARIO='$id_usuario'";

			} else {

		$query="UPDATE referencias SET HABER_ASIENTO_ACTUAL=(HABER_ASIENTO_ACTUAL-'$borrar_importe') WHERE ID_USUARIO='$id_usuario'";
			}
		
		$resultado=mysqli_query($con, $query);
		if (!$resultado) {
			echo "Error al grabar Referencias";
			}
		mysqli_close($con); 

	}

	if ($cuadre=="si") {

		$envio="";

		$query="SELECT DEBE_ASIENTO_ACTUAL, HABER_ASIENTO_ACTUAL FROM referencias WHERE ID_USUARIO='$id_usuario'";

		$resultado=mysqli_query($con, $query);

		if ($resultado) {

		$fila = mysqli_fetch_assoc($resultado);
			$dac=$fila['DEBE_ASIENTO_ACTUAL'];
			$hac=$fila['HABER_ASIENTO_ACTUAL'];

		if ($dac != $hac ) {
			$envio= "DESCUADRA";
		} else {
		    $envio="CUADRE";
			}
		} else { $envio=" no leyo resultado"; } 
		
		echo $envio;
		mysqli_close($con);
		
	}
	


	if ($cierre=="si") {

		$mesg="";
		$query="INSERT INTO diario (DIARIO_FECHA, DIARIO_ASIENTO, DIARIO_APUNTE, DIARIO_DOCUMENTO, DIARIO_ID_USUARIO, DIARIO_ID_CONCEPTO, DIARIO_CONCEPTO, DIARIO_DEBE_HABER, DIARIO_IMPORTE_DEBE, DIARIO_IMPORTE_HABER, DIARIO_CUENTA, DIARIO_FECHA_REAL ) SELECT FECHA, ASIENTO, APUNTE, DOCUMENTO, USUARIO, ID_CONCEPTO, CONCEPTO, DEBE_HABER, IMPORTE_DEBE, IMPORTE_HABER, CUENTA, FECHA_REAL FROM apuntes WHERE USUARIO='$id_usuario' AND FECHA='$fechacerrar' AND ASIENTO ='$asientocerrar'";

		$resultado = mysqli_query($con, $query);

		if($resultado) {
						 $mesg= "CORRECTO DIARIO" ;
				 		} else {
								$mesg= "NO DIARIO ".mysqli_error($con);
								}
		$mesg.=" afectados: ".mysqli_affected_rows($con);
		echo $mesg;
		mysqli_close($con);
	}

	if ($extractos=="si") {

		$mesg="";

		$query="INSERT INTO extractos (EXT_CUENTA, EXT_FECHA, EXT_ASIENTO, EXT_APUNTE, EXT_ID_USUARIO, EXT_DOCUMENTO, EXT_ID_CONCEPTO, EXT_CONCEPTO, EXT_DEBE_HABER, EXT_IMPORTE_DEBE, EXT_IMPORTE_HABER, EXT_SALDO_ANTERIOR) SELECT  CUENTA, FECHA, ASIENTO, APUNTE, USUARIO, DOCUMENTO, ID_CONCEPTO, CONCEPTO, DEBE_HABER, IMPORTE_DEBE, IMPORTE_HABER , SALDO_ANTERIOR FROM apuntes WHERE USUARIO='$id_usuario' AND FECHA='$fechacerrar' AND ASIENTO ='$asientocerrar' HAVING CONCEPTO!='RESUMEN'";

		$resultado = mysqli_query($con, $query);

		if($resultado) { $mesg.= "CORRECTO EXTRACTO" ; } else {
			$mesg.= "NO EXTRACTO ".mysqli_error($con);
		}
		echo $mesg." ".mysqli_affected_rows($con);
		mysqli_close($con);
	}



	if ($dar_baja_apuntes=="si") {

		$msg=" baja apuntes --->";
		$query="DELETE FROM apuntes WHERE USUARIO ='$id_usuario' AND FECHA ='$fechacerrar' AND ASIENTO ='$asientocerrar'";

		$resultado = mysqli_query($con, $query);

		if($resultado) { $msg.= "CORRECTO"; } else {
			$msg.= "INCORRECTO".mysqli_error($con);
		}
		$msg.=" afectados: ".mysqli_affected_rows($con);
		echo $msg;
		mysqli_close($con);
	}

	if ($asientonuevo=="si") {

		$resultado = mysqli_query($con, "UPDATE referencias SET DEBE_ASIENTO_ACTUAL='0', HABER_ASIENTO_ACTUAL='0',  APUNTE_CONTABLE='0', ASIENTO_CONTABLE=ASIENTO_CONTABLE+'1'  WHERE ID_USUARIO='$id_usuario'");

		if($resultado) { echo "CORRECTO"." ".mysqli_affected_rows($con); } else {
			echo "INCORRECTO".mysqli_error($con);
		}
		mysqli_close($con);
	}

?>
