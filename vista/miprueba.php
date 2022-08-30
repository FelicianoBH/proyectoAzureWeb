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
  	<script type="text/javascript" src="../controlador/jquery/jquery.js"></script>
	
</head>
<body>
		<br><br>
<div id="overlay"></div>
<div id="nuevaVentana">
	<div id="box-header"></div>
	<button onmousedown="ejecutarNuevaVentana()" id= "botonCerrar"></button><br><br><br>
		<label style="margin-left:20%;">Fecha Contable: </label><input type="text" id ="nuevaFechaId"/><br><br>
		<label style="margin-left:20%;">Asiento Contable: </label><input type="" id="nuevoAsientoId"/><br><br><br>
	<button onmousedown="agregarReferencia()" style="margin-left:20%;" class="btn btn-success">Añadir Referencia</button>
</div>

<div id="wrapper">
	<div id="crud_ref_gral"></div>
</div>


<script type="text/javascript">
	
	var resultado = document.getElementById("crud_ref_gral");

	function mostrarReferencias(){

		var xmlhttp;

		if(window.XMLHttpRequest) {

			xmlhttp = new XMLHttpRequest();

		} else {

			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}

		xmlhttp.onreadystatechange = function () {

			if (this.readyState === 4 && this.status === 200) {

				resultado.innerHTML = xmlhttp.responseText;

			}

		}
		
		xmlhttp.open("GET", "../modelo/selvidol.php?referencias=" + "referencias", true);
		xmlhttp.send();
	}
	

	mostrarReferencias();

	function editarReferencias(id) {

		var fechacontableID="FECHA_CONTABLE" + id;
		var asientocontableID="ASIENTO_CONTABLE" + id;
		var borrar = "BORRAR" + id;
		var actualizar = "ACTUALIZAR" + id;
		var editarfechacontableID=fechacontableID+"-editar";

		var fechacontable=document.getElementById(fechacontableID).innerHTML; 

		var parent= document.querySelector("#" + fechacontableID);

		if (parent.querySelector("#" + editarfechacontableID) === null ) {

			document.getElementById(fechacontableID).innerHTML = '<input type ="text" id="'+editarfechacontableID+'" value="'+fechacontable+'">';
			document.getElementById(borrar).disabled="true";
			document.getElementById(actualizar).style.display="block";
	}
}

	function actualizarReferencias(id){


		var xmlhttp;

		if(window.XMLHttpRequest) {

			xmlhttp = new XMLHttpRequest();

		} else {

			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}

		var fechaActualizada= document.getElementById("FECHA_CONTABLE"+id+"-editar").value;

		xmlhttp.onreadystatechange = function () {

			if (this.readyState === 4 && this.status === 200) {
 				
 				 	mostrarReferencias();

			}

	}

		xmlhttp.open("GET", "../modelo/selvidol.php?param1="+id+"&param2="+fechaActualizada, true);
		xmlhttp.send();
}
		

		function borrarReferencia(id) {


			var respuesta = confirm("Estas seguro de borrar esta referencia?");
			
			if (respuesta ===true ) {

				var xmlhttp;

				if(window.XMLHttpRequest) {
					
					xmlhttp = new XMLHttpRequest();

					} else {

					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

					}
				
				xmlhttp.onreadystatechange = function () {

				if (this.readyState === 4 && this.status === 200) {

 				mostrarReferencias();

				}
			}

				xmlhttp.open("GET", "../modelo/selvidol.php?param3="+id,true);
				xmlhttp.send();
		
		 }
	}

	var overlay = document.getElementById("overlay");
	var nuevaVentana= document.getElementById("nuevaVentana");

	function ejecutarNuevaVentana(){

		overlay.style.opacity = .5;

		if (overlay.style.display == "block") {

			overlay.style.display="none";
			nuevaVentana.style.display="none";
		} else {

			overlay.style.display="block";
			nuevaVentana.style.display="block";
		}

		document.getElementById("nuevaFechaId").value="";
		document.getElementById("nuevoAsientoId").value="";

	}

	overlay.style.display="none";

</script>

					