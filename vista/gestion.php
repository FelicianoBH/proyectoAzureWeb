<!DOCTYPE html>
<html>
<head>    
  
	<title>GESTION ARNET</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" type="image/png" href="../arnetlogo2.png">
 	<link rel="stylesheet" href="fontawesome/css/all.css">
 	<link rel="stylesheet" href="css/estilos.css">

	<!-- BOOTSTRAP CSS -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">

  	<script type="text/javascript" src="../controlador/jquery/jquery-3.4.1.min.js"></script>
 <!-- 	<script type="text/javascript" src="../controlador/jquery/jquery.js"></script><-->
  	<style type="text/css">

*/ 		#principale { 
 
  			width:970px; 
  			height:950px; 
  			margin:0 auto;
  			border:1px solid;
  			background-color:white;
  		}
*/
		#principale {
			display:block;
			background-color:#DFECF0;
  			width:75%;
  			min-width:360px;
  			padding: 1%;
  			margin:0 auto;
  			border: groove #0084d1;
  			opacity:0.4;
			margin-top:10%;			
		 	text-align:center;
 			
		} 
  		
		
  	</style>
</head>
<!--<body style="background:url('fondo2.png')">-->
<body>

<?php 

	session_start();

	if(!isset($_SESSION["usuario"])) {

		header("Location:../index.php");

	}


 ?>

<div id="principale">

	<?php 
	
  		require "cabecera.php"; 

 	?>
 <script>

  	var abierto=false;

	function openNav(cual) {

		
		if (!abierto){
  		document.getElementById(cual).style.width = "250px";
  		abierto=true;
  			} else {
  				document.getElementById(cual).style.width = "0px";
  				abierto=false;
  			}
		}

	function closeNav(cuala) {
		
  		document.getElementById(cuala).style.width = "0px";
  		abierto=false;
		}


</script>

 
	<?php 

 		 if (isset($_GET['op'])) {

 			switch ($_GET['op']){

 			case 11: 
 				 require "ficherosmaestros.php";
 				 break;
					case 111: 
 				 	require "../controlador/referencias_generales.php";
 				 		break;
					case 112:
 				 	require "../controlador/plan_cuentas.php";
 				 	break;
 				 	case 113:
 				 	require "../controlador/sedes.php";
 				 	break;
 				 	case 114:
 				 	require "../controlador/conceptos.php";
 				 	break;
 			case 12: 
 				 require "usuarios.php";
 				 break; 
 				 
 			case 13: 
 				 require "ejercicios.php"; 
 				 break;

 		// ***********************************

 			case 21: 
 				 require "tarifas.php";
 				 break;
 				 	case 211: 
 				 	require "../controlador/precios.php";
 				 	break;
 			case 22: 
 				 require "familias.php";
 				 break; 
 				 	case 221: 
 				 	require "../controlador/familia.php";
 				 	break;
 				 	case 222: 
 				 	require "../controlador/sub_familia.php";
 				 	break;
			case 23: 
 				 require "../controlador/clientes_man.php";
 				 break; 
 			case 24: 
 				 require "pedidos.php";
 				 break;
 				 	case 241:
 				 	require "../controlador/pedidos_directos.php"; 
 				 	break;
 				 	case 242:
 				 	require "../controlador/consulta_pedidos.php"; 
 				 	break;
			case 25: 
 				 require "albaranes.php"; 
 				 break;
 				 	case 251: 
 				 	require "../controlador/albaranes_directo.php";
 				 	break;
 				 	case 252: 
 				 	require "../controlador/albaranes_diferido.php";
 				 	break;
 				 	case 253: 
 				 	require "../controlador/consulta_albaranes.php";
 				 	break;
 			case 26: 
 				 require "facturacion.php"; 
 				 break;
 				 	case 261: 
 				 	require "../controlador/factura_directa.php";
 				 	break;	 
 				 	case 262: 
 				 	require "../controlador/factura_diferido_pedido.php";
 				 	break;
 				 	case 263: 
 				 	require "../controlador/factura_diferido_albaran.php";
 				 	break;
 				 	case 264: 
 				 	require "../controlador/consulta_facturas.php";
 				 	break;
 		// ***********************************

 			case 31: 
 				 require "ficheros_art_alm.php";
 				 break;
 				case 311: 
 				 	require "../controlador/sedes.php";
 					break;
 				case 312: 
 				 	require "../controlador/stocks.php";
 					break;
 			case 32: 
 				 require "historico.php";
 				 break; 
 				 case 321:
 				 	require "../controlador/ficha_historico.php";
 				 	break;
 				 case 322:
 				 	require "../controlador/consulta_historico.php";
 				 	break;	
 			case 33: 
 				 require "traslados.php";
 				 break; 
 				 case 331:
 				 	require "../controlador/confeccion_traslados.php";
 				 	break;
 			case 34: 
 				 require "inventarios.php"; 
 				 break;
			case 35: 
 				 require "faltas.php";
 				 break; 

 		// ***********************************

			case 41: 
 				 require "../controlador/proveedores.php";
 				 break;
 			case 42: 
 				 require "../controlador/compras.php";
 				 break; 
			case 43: 
 				 require "../controlador/consulta_compras.php";
 				 break; 
 		// ***********************************

			case 51: 
 				 require "../controlador/plan_cuentas.php";
 				 break;
 			case 52: 
 				 require "menu_asientos.php";
 				 break; 
				 case 521: 
 				 require "../controlador/asientos.php";
 				 break;
 				 case 522: 
 				 require "../controlador/diario.php";
 				 break;
 			case 53: 
 				 require "extractos.php";
 				 break;
 				 case 531:
 				 require "../controlador/consulta_extractos.php";
 				 break;
 				 case 532:
 				 require "../controlador/consulta_extractos_grupo.php";
 				 break;
 			case 54: 
 				 require "balances.php"; 
 				 break;
 				 case 541: 
 				 require "../controlador/balance_sumas_y_saldos.php";
 				 break;
 				 case 542: 
 				 require "../controlador/balance_situacion.php";
 				 break;
			case 55: 
 				 require "impuestos.php"; 
 				 break;
 			

		// ***********************************

			case 61: 
 				 require "informeventas.php";
 				 break;
 			case 62: 
 				 require "informeclientes.php";
 				 break; 
 			case 63: 
 				 require "informecompras.php";
 				 break; 

			default:
 				 require "recarga.php"; 
 	 
 				}

 			}
	 ?>
</div>

</body>

<script type="text/javascript">
	
	function  ina(){

		window.location.replace('index.php');
	}

</script>



</html>
