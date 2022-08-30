<div id="header-referencias">
		<div id="titulo-referencias">
 			<div>Balance de Sumas y Saldos</div>
		</div>
</div>
<br><br> 
<div id="overlay"></div>
<div id="nuevaVentana">
	<div id="box-header"></div>
</div>

<div id="wrapper">
	<div id="crud_gral" style="margin-left:100px;"></div>
</div>

<script type="text/javascript">
	

	var resultado = document.getElementById("crud_gral");
	document.getElementById("nuevaVentana").style.height="20%";
	var num_registros;
	var num_paginas;
	var pagina_actual;
	var muestro_pagina;
	var actualizando=false;
	var totaldebe=0;
	var totalhaber=0;
	var saldosdeudores=0;
	var saldosacreedores=0;
 
	function mostrarCuentas(pagina){

		pagina_actual=pagina;

		num_paginas= Math.ceil(num_registros/12);

		var xmlhttp;

		if(window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function () {
			if (this.readyState === 4 && this.status === 200) {

				resultado.innerHTML = xmlhttp.responseText;
				document.getElementById("mostrandopagina").innerHTML=" "+pagina_actual;
				//var enBoton=document.getElementById("boton"+pagina);

				$(".botones").css({"background-color":'#AACFCF'});
				$(".botones").css({"color":'#fff'});
				//enBoton.style.background="#679B9B";
			}
		}
		xmlhttp.open("GET", "../modelo/modelo_balance_sumas_y_saldos.php?cuentas=" + "cuentas"+"&pagina="+pagina+"&num_paginas="+num_paginas+"&totaldebe="+totaldebe+"&totalhaber="+totalhaber+"&saldosdeudores="+saldosdeudores+"&saldosacreedores="+saldosacreedores, true);
		xmlhttp.send();
	}

	function preparoMostrarCuentas(){

			var xmlhttp;
			if(window.XMLHttpRequest) {
				xmlhttp = new XMLHttpRequest();
				} else {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function () {
				if (this.readyState === 4 && this.status === 200) {
						try {
								var obj = JSON.parse(xmlhttp.responseText);
								totaldebe=obj.totalesdebe;
								totalhaber=obj.totaleshaber;
								saldosdeudores=obj.saldosdeudores;
								saldosacreedores=obj.saldosacreedores;
								num_registros=obj.num_filas;
								buenjason=true;
								} catch(e) {
									 buenjason=false;
								}

				mostrarCuentas(1);

				}
		}
		xmlhttp.open("GET", "../modelo/modelo_balance_sumas_y_saldos.php?acontar="+"si", true);
		xmlhttp.send();
	}

	preparoMostrarCuentas();


									try {
										var obj = JSON.parse(xmlhttp.responseText);
										titulocuenta=obj.titulo;
										saldocuenta=obj.saldo;
										buenjason=true;
										} catch(e) {
											 buenjason=false;
										}

									if (buenjason) {

								 	var obj = JSON.parse(xmlhttp.responseText);
											titulocuenta=obj.titulo;
									} else { titulocuenta=xmlhttp.responseText;}




/*
	function retrocedoPagina(hastaDonde) {

		if (hastaDonde=="inicio"){

				mostrarCuentas(1);

		} else {

			if (pagina_actual > 1) {

				muestro_pagina = pagina_actual - 1;

				mostrarCuentas(muestro_pagina);
			}
		}
	}

	function avanzoPagina(hastaDonde, paginaFinal) {

		if (hastaDonde=="final") {

				mostrarCuentas(paginaFinal);
 
		} else {
 
		if (pagina_actual < num_paginas) {

			muestro_pagina = pagina_actual + 1;

			mostrarCuentas(muestro_pagina);

			}
		}

	}

*/
	function iraPagina(){

			var eligepagina=document.getElementById("eligepagina").value;
			if (eligepagina >= 1 && eligepagina <=num_paginas) {
				muestro_pagina= eligepagina;
				mostrarCuentas(muestro_pagina);
			}
	}

	function retrocedoPagina() {

			if (pagina_actual > 1) {
				pagina_actual--;
				muestro_pagina = pagina_actual;
				mostrarCuentas(muestro_pagina);
		}
	}
	function avanzoPagina() {

			if (pagina_actual < num_paginas) {
				pagina_actual++;
				muestro_pagina=pagina_actual;
				document.getElementById("eligepagina").innerHTML=muestro_pagina;
				mostrarCuentas(muestro_pagina);
			}
	}



	function editarCuentas(id) {


		if (!actualizando) {

		actualizando=true;
		var codigo_cuentaID="CODIGO_CUENTA" + id;
		var tituloID="TITULO"+id;
		var masa_patrimonialID="MASA_PATRIMONIAL"+id;
		var gradoID="GRADO"+id;
		var borrar = "BORRAR" + id;
		var actualizar = "ACTUALIZAR" + id;

		var editarcodigo_cuentaID=codigo_cuentaID+"-editar";
		var editartituloID=tituloID+"-editar";
		var editarmasa_patrimonialID=masa_patrimonialID+"-editar";
		var editargradoID=gradoID+"-editar";

		var codigo_cuenta=document.getElementById(codigo_cuentaID).innerHTML; 
		var titulo=document.getElementById(tituloID).innerHTML;
		var masa_patrimonial=document.getElementById(masa_patrimonialID).innerHTML;
		var grado=document.getElementById(gradoID).innerHTML;
		
		var parent= document.querySelector("#" + codigo_cuentaID);

		if (parent.querySelector("#" + editarcodigo_cuentaID) === null ) {


			document.getElementById(tituloID).innerHTML = '<input type ="text" id="'+editartituloID+'" value="'+titulo+'">';
			document.getElementById(masa_patrimonialID).innerHTML = '<input type ="text" id="'+editarmasa_patrimonialID+'" value="'+masa_patrimonial+'">';
			document.getElementById(gradoID).innerHTML = '<input type ="text" id="'+editargradoID+'" value="'+grado+'">';
			
			document.getElementById(borrar).disabled="true";
			document.getElementById(actualizar).style.display="block";
		}
	}
}

	function actualizarCuentas(id) {

		var xmlhttp;

		if(window.XMLHttpRequest) {

			xmlhttp = new XMLHttpRequest();

		} else {

			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}

		
		var tituloActualizado= document.getElementById("TITULO"+id+"-editar").value;
		var masa_patrimonialActualizada= document.getElementById("MASA_PATRIMONIAL"+id+"-editar").value;
		var gradoActualizado= document.getElementById("GRADO"+id+"-editar").value;

		xmlhttp.onreadystatechange = function () {

			if (this.readyState === 4 && this.status === 200) {

 				var meresponde=xmlhttp.responseText;
				var mensaje=meresponde;
				if (mensaje.includes("No ejecutado")) {
					alert(meresponde);
				}
					actualizando=false;
 				 //	preparoMostrarCuentas();
 				 	mostrarCuentas(pagina_actual);
			}

	}

		xmlhttp.open("GET", "../modelo/modelo_plan_cuentas.php?param1="+id+"&param2="+tituloActualizado+"&param3="+masa_patrimonialActualizada+"&param4="+gradoActualizado, true);
		xmlhttp.send();
	
}
		

		function borrarCuenta(id) {


			var respuesta = confirm("Estas seguro de borrar esta Cuenta?");
			
			if (respuesta ===true ) {

				var xmlhttp;

				if(window.XMLHttpRequest) {
					
					xmlhttp = new XMLHttpRequest();

					} else {

					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

					}
				
				xmlhttp.onreadystatechange = function () {

				if (this.readyState === 4 && this.status === 200) {

 				preparoMostrarCuentas();

				}
			}

				xmlhttp.open("GET", "../modelo/modelo_ref_gral.php?refeliminada="+id,true);
				xmlhttp.send();
		
		 }
	}


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
		
	}

	function agregarCuenta() {


		var nuevaCuenta=document.getElementById("nuevaCuentaId").value;	
	 	var nuevoTitulo=document.getElementById("nuevoTituloId").value;
	 	var nuevaMasaPatrimonial=document.getElementById("nuevaMasaPatrimonialId").value;
	 	var nuevoGrado=document.getElementById("nuevoGradoId").value;

		if (validarAgregar(nuevaCuenta, nuevoTitulo, nuevaMasaPatrimonial, nuevoGrado)) {

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


 		xmlhttp.open("GET", "../modelo/modelo_plan_cuentas.php?nuevaCuenta="+nuevaCuenta+"&nuevoTitulo="+nuevoTitulo+"&nuevaMasaPatrimonial="+nuevaMasaPatrimonial+"&nuevoGrado="+nuevoGrado, true);
		xmlhttp.send();
	  } 
					 
	}


		function validarAgregar(nuevaCuenta, nuevoTitulo, nuevaMasaPatrimonial, nuevoGrado) {

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


					