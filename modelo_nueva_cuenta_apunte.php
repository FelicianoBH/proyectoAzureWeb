
<div id="overlay"></div>
<div id="nuevaVentana">
	<div id="box-header">Añadir Cuenta</div>
	<button onmousedown="ejecutarNuevaVentana()" class="btn btn-primary" id="botonCerrar">
		<i class="fa  fa-door-open"></i>
	</button><br><br><br>
		<label style="margin-left:10%;">Codigo Cuenta: </label><input type="text" id ="nuevaCuentaId"/><br><br>
		<label style="margin-left:10%;">Titulo: </label><input type="" id="nuevoTituloId"/><br><br>
		<label style="margin-left:10%;">Masa Patrimonial: </label><input type="" id="nuevaMasaPatrimonialId"/><br><br>
		<label style="margin-left:10%;">Grado: </label><input type="" id="nuevoGradoId"/><br><br>
		<label style="margin-left:10%;">Desarrollo: </label><input type="" id="nuevoDesarrolloId"/><br><br>
		<label style="margin-left:10%;">Con Enlace: </label><input type="" id="nuevoConEnlaceId"/><br><br>
		<span id="feedback"></span>
	<button onmousedown="agregarCuenta()" style="margin-left:40%;" class="btn btn-success">Añadir Cuenta</button><br>
</div>

<div id="wrapper">
	<div id="crud_gral"></div>
</div>

<script type="text/javascript">
	

	var resultado = document.getElementById("crud_gral");
	document.getElementById("nuevaVentana").style.height="20%";
	var num_registros;
	var num_paginas;
	var pagina_actual;
	var muestro_pagina;
	var actualizando=false;
 
	
	var overlay = document.getElementById("overlay");
	var nuevaVentana= document.getElementById("nuevaVentana");

	function ejecutarNuevaVentana(){


		overlay.style.opacity = .7;

		if (overlay.style.display == "block") {

			overlay.style.display="none";
			nuevaVentana.style.display="none";
		} else {
			overlay.style.display="block";
			nuevaVentana.style.display="block";
		}

		document.getElementById("feedback").innerHTML="";
		document.getElementById("nuevaCuentaId").value="";
		document.getElementById("nuevoTituloId").value="";
		document.getElementById("nuevaMasaPatrimonialId").value="";
		document.getElementById("nuevoGradoId").value="";
		document.getElementById("nuevoDesarrolloId").value="";
		document.getElementById("nuevoConEnlaceId").value="";
	}

	function agregarCuenta() {


		var nuevaCuenta=document.getElementById("nuevaCuentaId").value;	
	 	var nuevoTitulo=document.getElementById("nuevoTituloId").value;
	 	var nuevaMasaPatrimonial=document.getElementById("nuevaMasaPatrimonialId").value;
	 	var nuevoGrado=document.getElementById("nuevoGradoId").value;
	 	var nuevoDesarrollo=document.getElementById("nuevoDesarrolloId").value;
	 	var nuevoConEnlace=document.getElementById("nuevoConEnlaceId").value;

		if (validarAgregar(nuevaCuenta, nuevoTitulo, nuevaMasaPatrimonial, nuevoGrado, nuevoDesarrollo, nuevoConEnlace)) {

		overlay.style.display ="none";
		nuevaVentana.style.display = "none";

		var xmlhttp;

			if(window.XMLHttpRequest) {
					xmlhttp = new XMLHttpRequest();
					} else {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}

				xmlhttp.onreadystatechange = function () {

				if (this.readyState === 4 && this.status === 200) {

				var meresponde=xmlhttp.responseText;
				var mensaje=meresponde;
				if (mensaje.includes("No ejecutado")) {
					alert(meresponde);
				}
 				preparoMostrarCuentas();

 				}
			}


 		xmlhttp.open("GET", "../modelo/modelo_plan_cuentas.php?nuevaCuenta="+nuevaCuenta+"&nuevoTitulo="+nuevoTitulo+"&nuevaMasaPatrimonial="+nuevaMasaPatrimonial+"&nuevoGrado="+nuevoGrado+"&nuevoDesarrollo="+nuevoDesarrollo+"&nuevoConEnlace="+nuevoConEnlace, true);
		xmlhttp.send();
	  } 
					 
	}


		function validarAgregar(nuevaCuenta, nuevoTitulo, nuevaMasaPatrimonial, nuevoGrado, nuevoDesarrollo, nuevoConEnlace) {

			var mensajeFB=document.getElementById("feedback");

			if(nuevaCuenta<100000000000 || nuevaCuenta>999999999999) {return false;}

			if(isNaN(nuevoGrado)) {
				mensajeFB.innerHTML='<button type = "button" value ="Grado no numerico" class = "btn btn-danger">Grado no numerico</button>';
				mensajeFB.style.margin="35%";
				return false;

			}   mensajeFB.innerHTML="";
				return true;
		}

</script>


					