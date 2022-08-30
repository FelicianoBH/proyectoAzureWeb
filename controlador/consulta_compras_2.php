<div>
	<div class="container" >
				<div class="row">
					<div class="col-md-1">
			      			<div id="boton-atras">
			      				<div>
			      				<i class="fas fa-arrow-alt-circle-left fa-1x" onclick="irAtras();"></i>
			      				</div>
			      			</div>
			      	</div>
			      	<div class="col-md-1">
			      			<div></div>
			      	</div>
			      	<div class="col-md-3">
			      			<div id="programa-en-curso" >
			      				 CONFECCION ALBARAN
			      			</div>
			      	</div>
			    </div>
 		</div>
</div>  
<br>
<div id="overlay"></div> 
<div id="nuevaVentana">
	<div id="box-header" style="max-height:40px;"><label id="leyenda" style="margin-left:35%;"></label></div>
	<button onmousedown="cierraVentana()" class="btn btn-primary"  id="botonCerrar">
	<i class="fa  fa-door-open"></i>
	</button><br><br><br>
	<div id="pantallaConsulta"> 
	</div>
		<span id="feedback"></span>
</div>
 
<div id="wrapper">
	<div id="crud_gral"></div>
</div>
		<div id="contengo" style="margin:0px auto;">
			<div class="container" style="border: 2px solid;padding:15px;">

				 <div class="row">
			      <div class="col-md-3">
			      			<div>
					  			<input type="text" readonly id="usuario" placeholder="<?php echo $_SESSION["usuario"] ?>"  size="15"/>
			      			</div>
			  	  </div>
			      <div class="col-md-3">
			      			<div>Fecha: 
					  			<input type="text" readonly id="fecha"  size="12"/>
			      			</div>
			      </div>
			      <div class="col-md-3">
			      			<div>Estado:
					  			<input type="text" readonly id="estado" size="16"/>
			      			</div>
			      </div>
			 	  <div class="col-md-3">
			      				
			      			<div>Albarán:
					  			<input type="text" readonly id="numero_albaran"  size="14"/>
			      			</div>
			      </div>
			      </div>
			    
			      <div class="row">
			      <div class="col-md-2">
			      			<div>Cliente:
					  			<input type="text" readonly id="cliente" size="3" maxlength="6" style="width:100px;height:28px;font-weight:bold;"  />
			      			</div>
			  	  </div>
			      <div class="col-md-6">
			      			<div> 
					  			<input type="text" readonly id="cliente_nombre" size="30" maxlength="30"  style="width:470px;height:28px;font-size:16px;"/>
			      			</div>
			      </div>
			      </div>
			   
			      <div class="row">
			      	<div class="col-md-2">
			      			<div>Nif:
					  			<input type="text" readonly id="nif" size="15" maxlength="15" style="width:90px;height:28px;font-weight:bold;"/>
			      			</div>
			      	</div>
			      
			      	<div class="col-md-6">
			      			<div>Direccion :
					  			<input type="text" readonly id="direccion" size="40" maxlength="40" style="width:400px;height:28px;font-weight:bold;"/>
			      			</div>
			      	</div>
			      	<div class="col-md-2">
			      			<div>Tlf :
					  			<input type="text" readonly id="tlf" size="3" maxlength="6" style="width:90px;height:28px;font-weight:bold;"/>
			      			</div>
			      	</div> 
			  	   </div>
			     
			      <div class="row">
			      	<div class="col-md-2">
			      			<div>Alm Vta. :
					  			<input type="text" readonly id="alm_vta" size="3" maxlength="6" style="width:90px;height:28px;font-weight:bold;"  />
			      			</div>
			  	  	</div>
			     	 <div class="col-md-2">
			      			<div>Dtos:
					  			<input type="text" readonly id="dtos" size="3" maxlength="6" style="width:90px;height:28px;font-weight:bold;"/>
			      			</div>
			     	 </div>
			      
			     	 <div class="col-md-3">
			      			<div>Impuestos :
					  			<input type="text" readonly id="impuestos" size="3" maxlength="6" style="width:90px;height:28px;font-weight:bold;"/>
			      			</div>
			      	</div>
			     	 <div class="col-md-3">
			      			<div><strong>Total Albaran :</strong>
					  			<input type="text" readonly id="total_alb" size="3" maxlength="6" style="width:90px;height:28px;font-weight:bold;"/>
			      			</div>
			     	 </div>
			      </div>
			      	<hr>
			      <div class="row">
			      	<div id="linea_botones">
			      	</div>
			      </div>
			      
			</div>
   		</div>




<div id="wrapper2">
	<div id="plus_crud_general" style="margin:0px auto;"></div>
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

