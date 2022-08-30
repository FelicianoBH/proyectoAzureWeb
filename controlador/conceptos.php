<div id="header-referencias">
		<div id="titulo-referencias">
 			<div>Conceptos Contables</div>
		</div>
</div>
<br><br>  
<div id="overlay"></div>
<div id="nuevaVentana">
	<div id="box-header">Añadir Concepto</div>
	<button onmousedown="ejecutarNuevaVentana()" class="btn btn-primary" id="botonCerrar">
		<i class="fa  fa-door-open"></i>
	</button><br><br><br>
		<label style="margin-left:10%;">Debe o Haber: </label>
			<select id="nuevoDebe_o_HaberId"> 
			   <option value="DEBE">DEBE</option>
			   <option value="HABER">HABER</option>
			 </select> <br><br>
		<label style="margin-left:10%;">Texto Fijo </label><input type="" id="nuevoTexto_FijoId"/><br><br>
		<span id="feedback"></span>
	<button onmousedown="agregarConcepto()" style="margin-left:40%;" class="btn btn-success">Añadir Concepto</button><br>
</div>

<div id="wrapper" style="margin-left:150px;padding:10px">
	<div id="crud_gral" style="margin-left:0px;"></div>
</div>
<script type="text/javascript">
	

	var resultado = document.getElementById("crud_gral");
	document.getElementById("nuevaVentana").style.height="20%";
	var num_registros;
	var num_paginas;
	var pagina_actual;
	var muestro_pagina;
	var actualizando=false;
 
	function mostrarConceptos(pagina){

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

				var enBoton=document.getElementById("boton"+pagina);

				$(".botones").css({"background-color":'#AACFCF'});
				$(".botones").css({"color":'#fff'});
				enBoton.style.background="#679B9B";
			}
		}
		xmlhttp.open("GET", "../modelo/modelo_conceptos.php?conceptos=" + "conceptos"+"&pagina="+pagina+"&num_paginas="+num_paginas, true);
		xmlhttp.send();
	}


	function preparoMostrarConceptos(){

			var xmlhttp;
			if(window.XMLHttpRequest) {
				xmlhttp = new XMLHttpRequest();
				} else {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function () {
				if (this.readyState === 4 && this.status === 200) {

 				num_registros = xmlhttp.responseText;
				mostrarConceptos(1);

				}
		}
		xmlhttp.open("GET", "../modelo/modelo_conceptos.php?acontar="+"si", true);
		xmlhttp.send();
	}

	preparoMostrarConceptos();

	function retrocedoPagina(hastaDonde) {

		if (hastaDonde=="inicio"){

				mostrarConceptos(1);

		} else {

			if (pagina_actual > 1) {

				muestro_pagina = pagina_actual - 1;

				mostrarConceptos(muestro_pagina);
			}
		}
	}

	function avanzoPagina(hastaDonde, paginaFinal) {

		if (hastaDonde=="final") {

				mostrarConceptos(paginaFinal);
 
		} else {
 
		if (pagina_actual < num_paginas) {

			muestro_pagina = pagina_actual + 1;

			mostrarConceptos(muestro_pagina);

			}
		}

	}

	function editarConceptos(id) {


		if (!actualizando) {

		actualizando=true;
		var concepto_idID="CONCEPTO_ID" + id;
		var debe_o_haberID="DEBE_O_HABER"+id;
		var texto_fijoID="TEXTO_FIJO"+id;
		var borrar = "BORRAR" + id;
		var actualizar = "ACTUALIZAR" + id;

		var editarconcepto_idID=concepto_idID+"-editar";
		var editardebe_o_haberID=debe_o_haberID+"-editar";
		var editartexto_fijoID=texto_fijoID+"-editar";

		var concepto_id=document.getElementById(concepto_idID).innerHTML; 
		var debe_o_haber=document.getElementById(debe_o_haberID).innerHTML;
		var texto_fijo=document.getElementById(texto_fijoID).innerHTML;

		var parent= document.querySelector("#" + concepto_idID);

		if (parent.querySelector("#" + editarconcepto_idID) === null ) {

			document.getElementById(debe_o_haberID).innerHTML ='<select id="'+editardebe_o_haberID+'"><option value="DEBE">DEBE</option><option value="HABER">HABER</option></select>';

			document.getElementById(texto_fijoID).innerHTML = '<input type ="text" id="'+editartexto_fijoID+'" value="'+texto_fijo+'">';
			
			document.getElementById(borrar).disabled="true";
			document.getElementById(actualizar).style.display="block";
		}
	}
}

	function actualizarConceptos(id) {

		var confirmar=confirm("Actualizar Concepto ?");

		if (confirmar) {

		var debe_o_haberActualizado= document.getElementById("DEBE_O_HABER"+id+"-editar").value;
		var texto_fijoActualizado= document.getElementById("TEXTO_FIJO"+id+"-editar").value;

		if (debe_o_haberActualizado=="DEBE" || debe_o_haberActualizado=="HABER") {

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
								actualizando=false;
			 				 	mostrarConceptos(pagina_actual);
						}

				}

				xmlhttp.open("GET", "../modelo/modelo_conceptos.php?actualizo="+"si"+"&param1="+id+"&param2="+debe_o_haberActualizado+"&param3="+texto_fijoActualizado, true);
				xmlhttp.send();
	} else { 
		alert('"Valores válidos: "DEBE" o "HABER"');
		actualizando=false;
		mostrarConceptos(pagina_actual);
		}
	} else {

		actualizando=false;
		mostrarConceptos(pagina_actual);
	}
}
		

		function borrarConcepto(id) {


			var respuesta = confirm("Estas seguro de borrar este Concepto?");
			
			if (respuesta ===true ) {

				var xmlhttp;

				if(window.XMLHttpRequest) {
					
					xmlhttp = new XMLHttpRequest();

					} else {

					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

					}
				
				xmlhttp.onreadystatechange = function () {

				if (this.readyState === 4 && this.status === 200) {

 				preparoMostrarConceptos();

				}
			}

				xmlhttp.open("GET", "../modelo/modelo_conceptos.php?concepto_ideliminado="+id,true);
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

		document.getElementById("nuevoConcepto_IdId").value="";
		document.getElementById("nuevoDebe_o_HaberId").value="";
		document.getElementById("nuevoTexto_FijoId").value="";
	}

	function agregarConcepto() {
		
	 	var nuevoDebe_o_Haber=document.getElementById("nuevoDebe_o_HaberId").value;
	 	var nuevoTexto_Fijo=document.getElementById("nuevoTexto_FijoId").value;

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
 				preparoMostrarConceptos();

 				}
			}

 		xmlhttp.open("GET", "../modelo/modelo_conceptos.php?nuevoConcepto="+"si"+"&nuevoDebe_o_Haber="+nuevoDebe_o_Haber+"&nuevoTexto_Fijo="+nuevoTexto_Fijo, true);
		xmlhttp.send();
	
					 
	}



</script>


					