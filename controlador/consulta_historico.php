<div>
	<div class="container" >
				<div class="row">
					
			      	<div class="col-md-1">
			      			<div></div>
			      	</div>
			      	<div class="col-md-3">
			      			<div id="programa-en-curso" >
			      				 HISTÓRICO DE STOCKS
			      			</div>
			      	</div>
			    </div>
 		</div>
</div>  
<br>
<div id="wrapper">
	<div id="crud_gral"></div>
</div>
		<div id="contengo" style="margin:0px auto;">
			<div class="container" style="border: 2px solid;padding:15px;">
				
				 <div class="row">
			      
			      <div class="col-md-3">
			      			<div>Desde Fecha: 
					  			<input type="date" id="desde_fecha" value="2000-01-01"size="12"/>
			      			</div>
			      </div>
			      <div class="col-md-3">
			      			<div>Hasta Fecha:
					  			<input type="date" id="hasta_fecha" value="2999-12-31" size="16"/>
			      			</div>
			      </div>
			 	  <div class="col-md-3">
			      				
			      			<div>Desde Almacen:
					  			<input type="text" id="desde_almacen" value="000"  placeholder="000"  size="3"/>
			      			</div>
			      </div>
			      <div class="col-md-3">
			      				
			      			<div>Hasta Almacen:
					  			<input type="text" id="hasta_almacen" value="999" placeholder="999"  size="3"/>
			      			</div>
			      </div>
			      <hr>
			  	</div>
			      <div class="row">
			      
			      <div class="col-md-3">
			      			<div>Desde Artículo:
					  			<input type="text" id="desde_articulo" value="000000000000" placeholder="000000000000" size="12" maxlength="12" style="width:100px;height:28px;font-weight:bold;"  />
			      			</div>
			  	  </div>
			  	  <div class="col-md-3">
			      			<div>Hasta Artículo:
					  			<input type="text" id="hasta_articulo" value="999999999999" placeholder="999999999999" size="12" maxlength="12" style="width:100px;height:28px;font-weight:bold;"  />
			      			</div>
			  	  </div>

					<div class="col-md-3">
			      			<div>Desde Documento:
					  			<input type="text" id="desde_documento" value=""  placeholder="" size="15" maxlength="15" style="width:100px;height:28px;font-weight:bold;"  />
			      			</div>
			  	  </div>
			  	  <div class="col-md-3">
			      			<div>Hasta Documento:
					  			<input type="text" id="hasta_documento" value="ZZZZZZZZZZZZZZZ" placeholder="ZZZZZZZZZZZZZZZ" size="15" maxlength="15" style="width:100px;height:28px;font-weight:bold;"  />
			      			</div>
			  	  </div>
 
			      </div>
			   	<hr>
			   	<div class="row">
			      
			      <div class="col-md-3">
			      			<div>ORDEN POR:
					  			<select id="clasificado">
									  <option value="articulo_y_almacen">Articulo y Almacen</option>
									  <option value="almacen_y_articulo" selected>Almacen y Articulo</option>
									  <option value="orden_cronologico">Orden Cronológico</option>
									  <option value="documento">Documento</option>
								</select>
			      			</div>
			  	  </div>
			  	  <div class="col-md-2">
			      			<div><form name="ordenes">
									<input type="radio"  name="ordenradio" id="ordenasc" value ="asc" checked /> Asc.
									<input type="radio" name="ordenradio" id="ordendesc" value ="desc" /> Desc.
								</form>
			      			</div>
			  	  </div>
			  	  <div class="col-md-2">
			      			<div>
					  			<button class = "btn btn-info" onclick="reseteaConsulta()">Resetea Consulta</button>
			      			</div>
			  	  </div>
			  	   <div class="col-md-2">
					  		<div><button class = "btn btn-info" onclick="consultaTodo()">Consulta Todo</button>
			      			</div>
			  	  </div>
			  	  <div class="col-md-2">
			      			<div><button class = "btn btn-info" onclick="consultaSeleccion()">Consulta Selecciòn </button>
			  	  			</div>
			  	  </div>
			  	 </div>
			  	
			</div>      
		</div>   	   
			      	

   		



<div id="wrapper2">
	<div id="plus_crud_general" style="margin:0px auto;"></div>
</div>


<script type="text/javascript">


	var user="<?php echo $_SESSION["id_usuario"] ?>"
	var resultado = document.getElementById("crud_gral");
	var resultadoconsulta=document.getElementById("pantallaConsulta");
	var resultado_plus = document.getElementById("plus_crud_general");
	var resultadoeditar=document.getElementById("aqui");
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
	var desdearticulo="";
	var desdealmacen="";
	var desde_fecha="";
	var hasta_documento="";
	var hastaarticulo="";
	var hastaalmacen="";
	var desde_fecha="";
	var hastadocumento="";
	var guardo_unidades="";
	var guardo_almacen="";
	var guardo_articulo="";
	var nuevas_unidades="";
	var consulta_total=true;
	var clasificado="";	
	var opcion="";
	var ascendente="";

	function consultaTodo() {

			opcion="todo";

			if (document.getElementById("ordenasc").checked==true) {
				ascendente="si";
			} else { ascendente="no"; }

			clasificado = document.getElementById("clasificado").value;
			preparoMostrarHistorico();

		}
	function consultaSeleccion() {

			if (document.getElementById("ordenasc").checked==true) {
				ascendente="si";
			} else { ascendente="no"; }

			opcion="seleccion";

			clasificado = document.getElementById("clasificado").value;
			desde_fecha=document.getElementById("desde_fecha").value;
			hasta_fecha=document.getElementById("hasta_fecha").value;
			desde_almacen=document.getElementById("desde_almacen").value;
			hasta_almacen=document.getElementById("hasta_almacen").value;
			desde_articulo=document.getElementById("desde_articulo").value;
			hasta_articulo=document.getElementById("hasta_articulo").value;
			desde_documento=document.getElementById("desde_documento").value;
			hasta_documento=document.getElementById("hasta_documento").value;
			preparoMostrarHistorico();

		}

	function reseteaConsulta(){

			document.getElementById("clasificado").value="articulo_y_almacen";
			document.getElementById("desde_fecha").value="2000-01-01";
			document.getElementById("hasta_fecha").value="2999-12-31";
			document.getElementById("desde_almacen").value="000";
			document.getElementById("hasta_almacen").value="999";
			document.getElementById("desde_articulo").value="000000000000";
			document.getElementById("hasta_articulo").value="999999999999";
			document.getElementById("desde_documento").value="";
			document.getElementById("hasta_documento").value="ZZZZZZZZZZZZZZZ";
			document.getElementById("ordenasc").checked=true;
			resultado_plus.innerHTML="";
	}

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
		xmlhttp.open("GET", "../modelo/modelo_consulta_historico.php?acontar_historico="+"si"+"&desde_fecha="+desde_fecha+"&desde_almacen="+desde_almacen+"&desde_articulo="+desde_articulo+"&desde_documento="+desde_documento+"&hasta_fecha="+hasta_fecha+"&hasta_almacen="+hasta_almacen+"&hasta_articulo="+hasta_articulo+"&hasta_documento="+hasta_documento+"&clasificado="+clasificado+"&opcion="+opcion, true);

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

						resultado_plus.innerHTML = xmlhttp.responseText;
					}
				}
		xmlhttp.open ("GET", "../modelo/modelo_consulta_historico.php?historico=" + "si"+"&pagina="+pagina+"&num_paginas="+num_paginas+"&desde_fecha="+desde_fecha+"&desde_almacen="+desde_almacen+"&desde_articulo="+desde_articulo+"&desde_documento="+desde_documento+"&hasta_fecha="+hasta_fecha+"&hasta_almacen="+hasta_almacen+"&hasta_articulo="+hasta_articulo+"&hasta_documento="+hasta_documento+"&clasificado="+clasificado+"&opcion="+opcion+"&ascendente="+ascendente, false);
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
		xmlhttp.open("GET", "../modelo/modelo_consulta_historico.php?leer_ref="+"si", true);
		xmlhttp.send(); 
		actualizando=false;	     
	}


	Inicio();

	function Inicio() {

		leerRef();
		
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

