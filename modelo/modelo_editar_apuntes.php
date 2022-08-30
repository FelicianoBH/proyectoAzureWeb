				
<?php  
	session_start(); 

	require "conexion.php";
  
	$idconcepto="";
	$cambiarcuenta="";
	$actualizarapunte="";
	$cuentaresto="";
	$cuentasumo=""; 
	$cuenta=""; 
	$agrabar_cta="";
  
	$user="";
	$fecha="";
	$asiento="";
	$apunte="";  
	$importedebe=0;
	$importehaber=0;

	$old_debe=0;
	$old_haber=0;
	
	$new_debe=0;
	$new_haber=0;
	
	$editoref="";


	$id_usuario=$_SESSION["id_usuario"];

	if (isset($_GET['editoref'])){

		$editoref=$_GET['editoref'];

		$old_debe=$_GET['old_debe'];
		$old_haber=$_GET['old_haber'];
		
		$new_debe=$_GET['new_debe'];
		$new_haber=$_GET['new_haber'];
	}



	if (isset($_GET['cuentaresto'])) {

		$cuentaresto=$_GET['cuentaresto'];
		$agrabar_cuenta=$_GET['cuenta'];
		$importedebe=$_GET['importedebe'];
		$importehaber=$_GET['importehaber'];
	}

	if (isset($_GET['cuentasumo'])) {

		$cuentasumo=$_GET['cuentasumo'];
		$agrabar_cuenta=$_GET['cuenta'];
		$importedebe=$_GET['importedebe'];
		$importehaber=$_GET['importehaber'];
	}

	if (isset($_GET['cambiarcuenta'])) {

		$cambiarcuenta=$_GET['cambiarcuenta'];
	}

	if (isset($_GET['idconcepto'])) {
		$idconcepto=$_GET['idconcepto'];
	}

	if (isset($_GET['actualizarapunte'])) {
		$actualizarapunte=$_GET['actualizarapunte'];

		$user=$_GET['usuario'];
		$fecha=$_GET['fecha'];
		$asiento=$_GET['asiento'];
		$apunte=$_GET['apunte'];
		$cuenta=$_GET['cuenta'];
		$documento=$_GET['documento'];
		$idconcepto=$_GET['idconcepto'];
		$concepto=$_GET['concepto'];
		$debeohaber=$_GET['debeohaber'];
		$importedebe=$_GET['importedebe'];
		$importehaber=$_GET['importehaber'];
	}



	if ($cambiarcuenta=="si") {

		$screen='<div class = "container">';
		$screen .= '<label style="margin-left:10%;">Codigo Cuenta: </label><input type="text" id ="nuevaCuentaId"  maxlength="12" /><br><br>';
		$screen .= '<label style="margin-left:11%;">Titulo: </label><input type="" id="nuevoTituloId"/><br><br>';
		$screen .='<button type="button" class="botones" onclick="ejecutarNuevaVentanaB()">Consulta </button>';
		$screen .='<button type="button" class="botones" onclick="ejecutarNuevaVentanaBA()">Alfabetica</button>';
		$screen .= '<button type="button" class="botones" style="margin-left:10%;" onclick="buscarCuentaB()">Busca Cuenta </button>';
		$screen .= '<button type="button" class="botones" style="margin-left:10%;" onclick="validaCuentaNueva()">Validar </button>';
		$screen .='<div>';
		echo $screen;
	}



	if (isset($_GET['idconcepto'])) {

		$screen='<div class = "container">';
		$screen .= '<label style="margin-left:10%;">Id Concepto: </label><input type="text" id ="nuevoConceptoId"  maxlength="2" /><br><br>';
		$screen .= '<label style="margin-left:11%;">Texto: </label><input type="" id="nuevoTexto"/><br><br>';
		$screen .= '<label style="margin-left:11%;">Debe/Haber: </label><input type="" id="nuevoDebeHaber"/><br><br>';
		$screen .='<button type="button" class="botones" onclick="ejecutarNuevaVentanaConcepto()">Consulta </button>';
		$screen .='<button type="button" class="botones" onclick="ejecutarNuevaVentanaAlfaConcepto()">Alfabetica</button>';
		$screen .= '<button type="button" class="botones" style="margin-left:10%;" onclick="buscaConceptosEdicion()">Busca Concepto </button>';
		$screen .= '<button type="button" class="botones" style="margin-left:10%;" onclick="validaConceptoNuevoEdicion()">Validar </button>';
		$screen .='<div>';
 		echo $screen; 

	}

	if (isset($_GET['cuentaresto'])) {

		$segmento= substr($agrabar_cuenta, 0, 3);

		$primer_grado=$segmento."         ";

		$segmento= substr($agrabar_cuenta, 0, 6);

		$segundo_grado=$segmento."      ";

	 	$query="UPDATE cuentas SET HABER_ANIO = HABER_ANIO - '$importehaber', DEBE_ANIO = DEBE_ANIO - '$importedebe' WHERE CODIGO_CUENTA IN ('$agrabar_cuenta', '$primer_grado', '$segundo_grado')";

		if (mysqli_query($con, $query)) {
			echo "correcto CUENTARESTO". mysqli_affected_rows($con)." ".$agrabar_cuenta." ".$primer_grado." ".$segundo_grado;
		} else { 
			echo "No correcto". mysqli_error($con);
		}
		mysqli_close($con);

	}

	if (isset($_GET['cuentasumo'])) {

		$segmento= substr($agrabar_cuenta, 0, 3);

		$primer_grado=$segmento."         ";

		$segmento= substr($agrabar_cuenta, 0, 6);

		$segundo_grado=$segmento."      ";

		$query="UPDATE cuentas SET HABER_ANIO = HABER_ANIO + '$importehaber', DEBE_ANIO = DEBE_ANIO + '$importedebe' WHERE CODIGO_CUENTA IN ('$agrabar_cuenta', '$primer_grado', '$segundo_grado')";


		if (mysqli_query($con, $query)) {
			echo "correcto CUENTASUMO";
		} else { 
			echo "No correcto CUENTASUMO". mysqli_error($con);
		}
		mysqli_close($con); 

	}


	if (isset($_GET['actualizarapunte'])) {

		$importe="";

		if($importedebe==0) {
					$importe=$importehaber;
				} 
		if ($importehaber==0) {
			$importe=$importedebe;
				}

		$fechareal=date("Y-m-d");

		$fuser=mysqli_real_escape_string($con, $user);
		$ffecha=mysqli_real_escape_string($con, $fecha);
		$fasiento=mysqli_real_escape_string($con, $asiento);
		$fapunte=mysqli_real_escape_string($con, $apunte);

	
		IF ($debeohaber=="DEBE"){
		$query="UPDATE apuntes SET CUENTA='$cuenta', DOCUMENTO='$documento', ID_CONCEPTO='$idconcepto', CONCEPTO='$concepto', DEBE_HABER='$debeohaber', IMPORTE_DEBE='$importe', IMPORTE_HABER=0, FECHA_REAL='$fechareal' WHERE  USUARIO ='$fuser' AND  FECHA  = '$ffecha' AND  ASIENTO ='$fasiento' AND  APUNTE ='$fapunte'";
		} else {
				$query="UPDATE apuntes SET CUENTA='$cuenta', DOCUMENTO='$documento', ID_CONCEPTO='$idconcepto', CONCEPTO='$concepto', DEBE_HABER='$debeohaber', IMPORTE_DEBE=0, IMPORTE_HABER='$importe', FECHA_REAL='$fechareal' WHERE  USUARIO ='$fuser' AND  FECHA  = '$ffecha' AND  ASIENTO ='$fasiento' AND  APUNTE ='$fapunte'";
		}
		
		if (mysqli_query($con, $query)) {
			$afectadas=mysqli_affected_rows($con);
			echo "correcto "."cuenta: ".$cuenta." fuser: ".$fuser." ffecha:".$ffecha." fasiento: ".$fasiento."   fapunte: ".$fapunte." afectados: ".$afectadas;
		} else { 
			echo "No correcto". mysqli_error($con);
		}
		mysqli_close($con); 
	}

	if ($editoref=="si") {

		$query="UPDATE referencias SET DEBE_ASIENTO_ACTUAL=(DEBE_ASIENTO_ACTUAL - '$old_debe' + '$new_debe'),  HABER_ASIENTO_ACTUAL=(HABER_ASIENTO_ACTUAL - '$old_haber' + '$new_haber') WHERE ID_USUARIO='$id_usuario'";

		if (mysqli_query($con, $query)) {
			echo "correcto EDITOREF";
		} else { 
			echo "No correcto EDITOREF". mysqli_error($con);
		}
		mysqli_close($con); 


	}



?>
