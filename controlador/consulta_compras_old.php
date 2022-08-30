<div id="wrapper" style="margin-left:150px;padding:10px">
	<div id="crud_gral" style="margin-left:0px;"></div>
</div>
<div>

	<div class="container" style="margin-left:150px;">
				<div class="row" >
					<div class="col-md-1"  onmousedown="irAtras();">
			      			<div id="boton-atras">
			      				<div>

			      				<i class="fas fa-arrow-alt-circle-left fa-1x"></i>
			      				</div>
			      			</div>
			      	</div>
			      	<div class="col-md-1">
			      			<div ></div>
			      	</div>
			      	<div class="col-md-4">
			      			<div id="programa-en-curso" >
			      				 CONSULTA DE COMPRAS
			      			</div>
			      	</div>
			    </div>
			    <div class="row">
			    	<div class="col-md-1">
			      			<div ></div>
			      	</div>
			    </div>
 		</div>
</div>		
<br>
<div id="overlay"></div>
<div id="nuevaVentana">
	<div id="box-header"><label id="leyenda" style="margin-left:35%;">Detalle Albaran</label></div>
	<button onmousedown="cierraVentana()" class="btn btn-primary"  id="botonCerrar">
		<i class="fa  fa-door-open"></i>
	</button><br><br><br>
	<div id="pantallaConsulta"> 
	</div>
		<span id="feedback"></span>
</div>

<script type="text/javascript">

		function irAtras(){
			
			window.history.back();
		}
	
	var user="<?php echo $_SESSION["id_usuario"] ?>"
	var resultado = document.getElementById("crud_gral");
	var resultadoconsulta=document.getElementById("pantallaConsulta");
	var resultadoeditar=document.getElementById("aqui");
	document.getElementById("nuevaVentana").style.height="60%";
	document.getElementById("nuevaVentana").style.width="70%";
	var num_registros;
	var num_registrosc;
	var num_paginas;
	var pagina_actual;
	var muestro_pagina;
	var num_paginasc;
	var actualizando=false;
	var elfoco="";
	var acrear="";
	var existe_alm=false;
	var existe_d=false;
	var existe_o=false;
	var nombre_almacen="";
	var id_almacen="";
	var existe_art=false;
	var nombre_art="";
	var id_articulo="";
	var unidades=0;
	var g_almacen="";
	var g_articulo="";
	var g_unidades="";
	var g_precio="";
	var precio="";
	var g_documento="";
	var e_s="";
	var ordenactual=0;
	var fecha;
	var origen="";
	var desdecodigo="";
	var desdealmacen="";
	var guardo_unidades="";
	var guardo_almacen="";
	var guardo_articulo="";
	var nuevas_unidades="";
		
		


	function preparoMostrarHistorico() {
			
			var xmlhttp;
			if(window.XMLHttpRequest) {
				xmlhttp = new XMLHttpRequest();
				} else {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function () {
				if (this.readyState === 4 && this.status === 200) {
 				num_registros = xmlhttp.responseText;
				mostrarHistorico(1);
				}
		}
		xmlhttp.open("GET", "../modelo/modelo_consulta_compras.php?acontar_historico="+"si", true);
		xmlhttp.send();
	}

	function mostrarHistorico(pagina) {

				pagina_actual=pagina;

				num_paginas= Math.ceil(num_registros/14);

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
		xmlhttp.open ("GET", "../modelo/modelo_consulta_compras.php?historico=" + "si"+"&pagina="+pagina+"&num_paginas="+num_paginas, false);
		xmlhttp.send();
	}

	
 
	function leerRef()  {

		var buenjason=true;
		var xmlhttp;

		if(window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
				} else {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
			xmlhttp.onreadystatechange = function () {

			if (this.readyState === 4 && this.status === 200) {

					var respuestaref=xmlhttp.responseText;
						try {
							JSON.parse(respuestaref);
						} catch(e) {
							 buenjason=false;
						}
					if (buenjason) {

			 			var obj = JSON.parse(xmlhttp.responseText);
			 			ordenactual=obj.ordenRef;
			 			ordenactual++;
			 			fecha=obj.fechaRef;
						} else { 
								alert("Referencias de Usuario no habilitadas, NO puede grabar apunte nuevo");
							}
			}
		}
		xmlhttp.open("GET", "../modelo/modelo_consulta_compras.php?leer_ref="+"si", true);
		xmlhttp.send(); 
		actualizando=false;	     
	}


	Inicio();

	function Inicio() {

		leerRef();
		preparoMostrarHistorico();
	}

	function iraPaginaHistorico(){

			var eligepagina=document.getElementById("eligepagina").value;
			if (eligepagina >= 1 && eligepagina <=num_paginas) {
				muestro_pagina= eligepagina;
				mostrarHistorico(muestro_pagina);
			} 
	}

	function retrocedoPaginaHistorico() {

			if (pagina_actual > 1) {
				pagina_actual--;
				muestro_pagina = pagina_actual;
				mostrarHistorico(muestro_pagina);
		}
	}

	function avanzoPaginaHistorico() {

			if (pagina_actual < num_paginas) {
				pagina_actual++;
				muestro_pagina=pagina_actual;
				document.getElementById("eligepagina").innerHTML=muestro_pagina;
				mostrarHistorico(muestro_pagina);
			} 
	}



	function cierraVentana(){

			overlay.style.display="none";
			nuevaVentana.style.display="none";
			//enfoca(origen);
	}


	function consultaAlmacen(letra){

				if (!existe_alm) {
				origen="almacen";
				document.getElementById("leyenda").innerHTML="Consulta Almacenes";
				overlay.style.opacity = .4;
				if (overlay.style.display == "block") {
					overlay.style.display="none";
					nuevaVentana.style.display="none";
				} else {
					overlay.style.display="block";
					nuevaVentana.style.display="block";
				}
				preparoMostrarAlmacen();
		}
	}


	function enfoca(idelemento) {
		
		document.getElementById(idelemento).value="";
		document.getElementById(idelemento).focus();

	}

	function colorTexto(elid){

		document.getElementById(elid).style.backgroundColor='#c7f3ed';

	}
	function noFoco(elid) {

		
		document.getElementById(elid).style.backgroundColor='#fff';
		elfoco=elid;

	}

	function habilita(casilla) {

			document.getElementById(casilla).disabled=false;
		}
	
	function inhabilita(casilla) {
			document.getElementById(casilla).disabled=true;
		}

</script>

