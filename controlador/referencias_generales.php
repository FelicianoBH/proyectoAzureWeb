<div id="header-referencias">
		<div id="titulo-referencias">
			<div>Referencias Generales</div>
		</div>
</div>
<br><br>   
<div id="overlay"></div>
<div id="nuevaVentana"> 
	<div id="box-header">Añadir Referencia</div>
	<button onmousedown="ejecutarNuevaVentana()" class="btn btn-primary" id="botonCerrar">
		<i class="fa  fa-door-open"></i>
	</button><br><br><br>
		<label style="margin-left:20%;">Fecha Contable: </label><input type="text" id ="nuevaFechaId"/><br><br>
		<label style="margin-left:20%;">Asiento Contable: </label><input type="" id="nuevoAsientoId"/><br><br><br>
	<button onmousedown="agregarReferencia()" style="margin-left:40%;" class="btn btn-success">Añadir Referencias</button><br>
</div>

<div id="wrapper" style="margin-left:150px;padding:10px">
	<div id="crud_gral" style="margin-left:0px;"></div>
</div>

<script type="text/javascript">

	var resultado = document.getElementById("crud_gral");
	
	var num_registros;
	var num_paginas;
	var pagina_actual;
	var muestro_pagina;
 	var actualizando=false;
	

	function mostrarReferencias(pagina){

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
				$(".botones").css({"background-color":'#AACFCF'});
				$(".botones").css({"color":'#fff'});

			}
		}

		xmlhttp.open("GET", "../modelo/modelo_ref_gral.php?referencias=" + "referencias"+"&pagina="+pagina+"&num_paginas="+num_paginas, true);
		xmlhttp.send();
	}




	function preparoMostrarReferencias(){

			var xmlhttp;
			if(window.XMLHttpRequest) {
				xmlhttp = new XMLHttpRequest();
				} else {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function () {
				if (this.readyState === 4 && this.status === 200) {

 				num_registros = xmlhttp.responseText;

				mostrarReferencias(1);

				}
		}

		xmlhttp.open("GET", "../modelo/modelo_ref_gral.php?acontar=" +"si", true);
		xmlhttp.send();

	}

	preparoMostrarReferencias();

	function iraPagina(){

			var eligepagina=document.getElementById("eligepagina").value;
			if (eligepagina >= 1 && eligepagina <=num_paginas) {
				muestro_pagina= eligepagina;
				mostrarReferencias(muestro_pagina);
			}
	}

	function retrocedoPagina() {

			if (pagina_actual > 1) {
				pagina_actual--;
				muestro_pagina = pagina_actual;
				mostrarReferencias(muestro_pagina);
		}
	}
	function avanzoPagina() {

			if (pagina_actual < num_paginas) {
				pagina_actual++;
				muestro_pagina=pagina_actual;
				document.getElementById("eligepagina").innerHTML=muestro_pagina;
				mostrarReferencias(muestro_pagina);
			}
	}
	
	function editarReferencias(id) {

				if (!actualizando) {

		actualizando=true;


		var fechacontableID="FECHA_CONTABLE" + id;
		var asientocontableID="ASIENTO_CONTABLE" + id;
		var apuntecontableID="APUNTE_CONTABLE"+id;
		var debe_asientoID="DEBE_ASIENTO_ACTUAL"+id;
		var haber_asientoID="HABER_ASIENTO_ACTUAL"+id;
		var num_facID="NUM_FACTURA"+id;
		var num_pedID="NUM_PEDIDO"+id;
		var num_albID="NUM_ALBARAN"+id;
		var num_recID="NUM_RECIBO"+id;



		var borrar = "BORRAR" + id;
		var actualizar = "ACTUALIZAR" + id;
		var editarfechacontableID=fechacontableID+"-editar";
		var editarasientocontableID=asientocontableID+"-editar";
		var editarapuntecontableID=apuntecontableID+"-editar";
		var editardebe_asientoID=debe_asientoID+"-editar";
		var editarhaber_asientoID=haber_asientoID+"-editar";
		var editarnum_facID=num_facID+"-editar";
		var editarnum_pedID=num_pedID+"-editar";
		var editarnum_albID=num_albID+"-editar";
		var editarnum_recID=num_recID+"-editar";


		var fechacontable=document.getElementById(fechacontableID).innerHTML; 
		var asientocontable=document.getElementById(asientocontableID).innerHTML;
		var apuntecontable=document.getElementById(apuntecontableID).innerHTML;
		var debe_asiento=document.getElementById(debe_asientoID).innerHTML;
		var haber_asiento=document.getElementById(haber_asientoID).innerHTML;
		var num_fac=document.getElementById(num_facID).innerHTML;
		var num_ped=document.getElementById(num_pedID).innerHTML;
		var num_alb=document.getElementById(num_albID).innerHTML;
		var num_rec=document.getElementById(num_recID).innerHTML;


		var parent= document.querySelector("#" + fechacontableID);

		if (parent.querySelector("#" + editarfechacontableID) === null ) {

			document.getElementById(fechacontableID).innerHTML = '<input type ="date" id="'+editarfechacontableID+'" value="'+fechacontable+'">'; 

			document.getElementById(asientocontableID).innerHTML = '<input type ="text" id="'+editarasientocontableID+'" value="'+asientocontable+'" size="3" maxlength="3">';

			document.getElementById(apuntecontableID).innerHTML = '<input type ="text" id="'+editarapuntecontableID+'" value="'+apuntecontable+'" size="3" maxlength="3">';

			document.getElementById(debe_asientoID).innerHTML = '<input type ="text" id="'+editardebe_asientoID+'" value="'+debe_asiento+'">';
			document.getElementById(haber_asientoID).innerHTML = '<input type ="text" id="'+editarhaber_asientoID+'" value="'+haber_asiento+'">';
			document.getElementById(num_facID).innerHTML = '<input type ="text" id="'+editarnum_facID+'" value="'+num_fac+'" size="3" maxlength="3">';
			document.getElementById(num_pedID).innerHTML = '<input type ="text" id="'+editarnum_pedID+'" value="'+num_ped+'"size="3" maxlength="3">';
			document.getElementById(num_albID).innerHTML = '<input type ="text" id="'+editarnum_albID+'" value="'+num_alb+'"size="3" maxlength="3">';
			document.getElementById(num_recID).innerHTML = '<input type ="text" id="'+editarnum_recID+'" value="'+num_rec+'"size="3" maxlength="3">';

			document.getElementById(borrar).disabled="true";
			document.getElementById(actualizar).style.display="block";
		}
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
		var asientoActualizado= document.getElementById("ASIENTO_CONTABLE"+id+"-editar").value;
		var apunteActualizado= document.getElementById("APUNTE_CONTABLE"+id+"-editar").value;
		var debe_asientoActualizado= document.getElementById("DEBE_ASIENTO_ACTUAL"+id+"-editar").value;
		var haber_asientoActualizado= document.getElementById("HABER_ASIENTO_ACTUAL"+id+"-editar").value;
		var num_facActualizado= document.getElementById("NUM_FACTURA"+id+"-editar").value;
		var num_pedActualizado= document.getElementById("NUM_PEDIDO"+id+"-editar").value;
		var num_albActualizado= document.getElementById("NUM_ALBARAN"+id+"-editar").value;
		var num_recActualizado= document.getElementById("NUM_RECIBO"+id+"-editar").value;

		var	debe_act = parseFloat(debe_asientoActualizado);
		var haber_act = parseFloat(haber_asientoActualizado);

		xmlhttp.onreadystatechange = function () {

			if (this.readyState === 4 && this.status === 200) {

 					actualizando=false;
 					
 					mostrarReferencias(pagina_actual);

			}

	}

		xmlhttp.open("GET", "../modelo/modelo_ref_gral.php?param1="+id+"&param2="+fechaActualizada+"&param3="+asientoActualizado+"&param4="+apunteActualizado+"&param5="+debe_act+"&param6="+haber_act+"&param7="+num_facActualizado+"&param8="+num_pedActualizado+"&param9="+num_albActualizado+"&param10="+num_recActualizado, true);
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

 				preparoMostrarReferencias();

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

		document.getElementById("nuevaFechaId").value="";
		document.getElementById("nuevoAsientoId").value="";

	}

	function agregarReferencia() {

		overlay.style.display ="none";
		nuevaVentana.style.display = "none";

		var xmlhttp;

			if(window.XMLHttpRequest) {
					xmlhttp = new XMLHttpRequest();
					} else {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}

		var nuevaFecha=document.getElementById("nuevaFechaId").value;	
		var nuevoAsiento=document.getElementById("nuevoAsientoId").value;




				xmlhttp.onreadystatechange = function () {

				if (this.readyState === 4 && this.status === 200) {

 				preparoMostrarReferencias();

 				}
			}


 		xmlhttp.open("GET", "../modelo/modelo_ref_gral.php?nuevaF="+nuevaFecha+"&nuevoA="+nuevoAsiento, true);
		xmlhttp.send();
		
					 
	}



</script>


					