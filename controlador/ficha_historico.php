<div>
	<div class="container" >
				<div class="row">
					
			      	<div class="col-md-1">
			      			<div></div>
			      	</div>
			      	<div class="col-md-5">
			      			<div id="programa-en-curso" >
			      				 HISTÓRICO POR ALMACEN Y ARTÍCULO
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
			      <div class="col-md-2">
			      			<div>Almacen:
					  			<input type="text" id="almacen" value="000"  size="3"/>
			      			</div>
			      </div>
			      <div class="col-md-4">
			      			<div> 
					  			<input type="text" id="descripcion_almacen" readonly  size="40"/>
			      			</div>
			      </div>
			  	</div>
			  		<hr>
			    <div class="row">	
			      <div class="col-md-2">
			      			<div>  Artículo:
					  			<input type="text" id="articulo" value="000000000000" size="12" maxlength="12" style="width:100px;height:28px;font-weight:bold;"  />
			      			</div>
			  	  </div>
			  	  <div class="col-md-6">
			      			<div>Descripción:
					  			<input type="text" id="descripcion_articulo" size="40" maxlength="40" style="width:300px;height:28px;font-weight:bold;" readonly=""  />
			      			</div>
			  	  </div>

			    </div>
			   	<hr>
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
			 	  <div class="col-md-2">
			      			<div>
					  			<button class = "btn btn-info" onclick="consultar()">Consultar</button>
			      			</div>
			  	  </div>
			  	   <div class="col-md-2">
			      			<div>
					  			<button class = "btn btn-info" onclick="reseteaConsulta()">Resetea Consulta</button>
			      			</div>
			  	  </div>
			      <hr>
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
	var hasta_fecha="";
	var hastadocumento="";
	var guardo_unidades="";
	var guardo_almacen="";
	var guardo_articulo="";
	var nuevas_unidades="";
	var consulta_total=true;
	var clasificado="";	
	var opcion="";
	var ascendente="";
	var existe_precio="";

	function consultar() {

			if (existe_alm && existe_art) {
			desde_fecha=document.getElementById("desde_fecha").value;
			hasta_fecha=document.getElementById("hasta_fecha").value;
			preparoMostrarHistorico();
		} else {
			alert("Especificar un articulo con stock");
		}

	}
	function consultaSeleccion() {

			if (document.getElementById("ascendente").checked==true) {
				ascendente="si";
			} else {
					ascendente="no"; 
				}
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

			id_almacen="000";
			id_articulo="000000000000";
			existe_art=false;
			existe_alm=false;
			document.getElementById("desde_fecha").value="2000-01-01";
			document.getElementById("hasta_fecha").value="2999-12-31";
			document.getElementById("almacen").value="000";
			document.getElementById("articulo").value="000000000000";
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
		xmlhttp.open("GET", "../modelo/modelo_ficha_historico.php?acontar_historico="+"si"+"&id_almacen="+id_almacen+"&id_articulo="+id_articulo+"&desde_fecha="+desde_fecha+"&hasta_fecha="+hasta_fecha, true);

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
		xmlhttp.open ("GET", "../modelo/modelo_ficha_historico.php?historico=" + "si"+"&pagina="+pagina+"&num_paginas="+num_paginas+"&id_almacen="+id_almacen+"&id_articulo="+id_articulo+"&desde_fecha="+desde_fecha+"&hasta_fecha="+hasta_fecha, true);
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
		xmlhttp.open("GET", "../modelo/modelo_ficha_historico.php?leer_ref="+"si", true);
		xmlhttp.send(); 
		actualizando=false;	     
	}


	Inicio();

	function Inicio() {

		leerRef();
		cargaTeclas();
		
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

				if (!existe_alm ) {
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


	function buscaAlmacen(id_almacen) {

				var xmlhttp;
				if(window.XMLHttpRequest) {
					xmlhttp = new XMLHttpRequest();
					} else {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
				xmlhttp.onreadystatechange = function () {
				if (this.readyState === 4 && this.status === 200) {
					var recibo=xmlhttp.responseText;
					if (recibo.includes("INEXISTENTE")) {
						existe_alm=false;
					} else {
						existe_alm=true;
					}
					nombre_almacen=recibo;
				}
			}
				xmlhttp.open("GET", "../modelo/modelo_ficha_historico.php?busca_almacen="+"si"+"&id_almacen="+id_almacen,false);
				xmlhttp.send();
	}

	function buscaPrecios(id_articulo) {

				var xmlhttp;
				if(window.XMLHttpRequest) {
					xmlhttp = new XMLHttpRequest();
					} else {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
				xmlhttp.onreadystatechange = function () {
				if (this.readyState === 4 && this.status === 200) {
					var recibo=xmlhttp.responseText;
					if (recibo.includes("INEXISTENTE")) {
						existe_precio=false;
					} else {
						existe_precio=true;
					}
					nombre_almacen=recibo;
				}
			}
				xmlhttp.open("GET", "../modelo/modelo_ficha_historico.php?busca_precio="+"si"+"&id_articulo="+id_articulo,false);
				xmlhttp.send();
	}

	function buscaArticulo(id_articulo, id_almacen) {

				var xmlhttp;
				if(window.XMLHttpRequest) {
					xmlhttp = new XMLHttpRequest();
					} else {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
				xmlhttp.onreadystatechange = function () {
				if (this.readyState === 4 && this.status === 200) {
					var recibo=xmlhttp.responseText;
					if (recibo.includes("INEXISTENTE")) {
						existe_art=false;
					} else {
						existe_art=true;
					}
					nombre_art=recibo;
				}
			}
				xmlhttp.open("GET", "../modelo//modelo_ficha_historico.php?busca_articulo="+"si"+"&id_articulo="+id_articulo+"&id_almacen="+id_almacen,false);
				xmlhttp.send();
	}

	function buscaStockAlmacen(id_articulo, id_almacen) {

				var xmlhttp;
				if(window.XMLHttpRequest) {
					xmlhttp = new XMLHttpRequest();
					} else {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
				xmlhttp.onreadystatechange = function () {
				if (this.readyState === 4 && this.status === 200) {
					var recibo=xmlhttp.responseText;
					if (recibo.includes("INEXISTENTE")) {
						existe_art=false;
					} else {
						existe_art=true;
					}
					nombre_art=recibo;
				}
			}
				xmlhttp.open("GET", "../modelo//modelo_ficha_historico.php?busca_stock_almacen="+"si"+"&id_articulo="+id_articulo+"&id_almacen="+id_almacen,false);
				xmlhttp.send();
	}

	function cargaTeclas() {

	 		$("#almacen").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==13) {
					id_almacen=document.getElementById("almacen").value;
					existe_alm=false;
					if (id_almacen.length==3) {
												buscaAlmacen(id_almacen);
												if (existe_alm) {
															document.getElementById("descripcion_almacen").value = nombre_almacen;
															enfoca("articulo");
													} else {
																alert("ALMACEN INEXISTENTE");
																enfoca("almacen");
															}
												} 
					
									}
				});

		 		$("#articulo").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==13) {
					id_articulo=document.getElementById("articulo").value;
					existe_art=false;
					existe_precio=false;
					if (id_articulo.length==12) {
													buscaPrecios(id_articulo);
													if (existe_precio){
															buscaArticulo(id_articulo, id_almacen);
															if (existe_art) {
																document.getElementById("descripcion_articulo").value = nombre_art;
																enfoca("desde_fecha");

																} else {
																	alert("STOCK INEXISTENTE");
																	enfoca("articulo");
																	}
													}	else {

															 alert("Artículo Inexistente");

															}	
											} 
				}
				if (keycode==38) {
					document.getElementById("articulo").value=g_articulo;
					enfoca("desde_fecha");
				}

				if (keycode==40) {
						if (g_articulo!="") {
							id_articulo=g_articulo;
							document.getElementById("articulo").value=g_articulo;
							enfoca("almacen");
						}
					}

			});

	}
</script>

