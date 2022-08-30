<div id="header-referencias">
 		<div id="titulo-referencias">
   	 		<div>Confección traslados</div>
   	  		<div id="aqui"></div>
		</div>   
</div>       
<div id="overlay"></div>  
<div id="nuevaVentana">
	<div id="box-header"><label id="leyenda" style="margin-left:35%;">Consulta</label></div>
	<button onmousedown="cierraVentana()" class="btn btn-primary" id="botonCerrar">
		<i class="fa  fa-door-open"></i>
	</button><br><br><br>
	<div id="pantallaConsulta">  
	</div> 
		<span id="feedback"></span> 
</div>
<div id="wrapper">  
	<div id="crud_gral" style="margin-left:100px;padding:10px">
	  <div id="input-traslados">
	  	<div style="border: #679B9B solid 1px">
	  		<table class = "table">
		  		<td><label for="usuario" style="width:100px;">Usuario: </label></td>
		  		<td><input type="text" id="usuario" placeholder="<?php echo $_SESSION["usuario"] ?>" readonly="readonly" size="15"/></td>
		  		<td><label for="fecha"style="width:150px;">Fecha Contable: </label></td>
		  		<td><input type="text" id="fecha"  readonly="readonly" size="12"/></td>
		  		<td><label for="orden" style="width:100px;">Orden: </label></td>
		  		<td><input type="text" id="orden"  size="6"/></td>
	  		
			</table>
		</div>
		<div style="border: #679B9B solid 1px">
			<table class = "table">
	  			<tr>
	  			<td style="width:120px;"><label for="almacen_ori" style="width:150px;">ALMAC. ORIGEN: </label></td>
	 			<td><input type="text" id="almacen_ori" size="3" maxlength="3" style="width:90px;height:28px;font-weight:bold;"  /></td>
	  			<td><input type="text" id="descripcion_ori" size="40" maxlength="40" readonly="readonly" style="width:400px;height:28px;font-size:16px;"/></td>
	  			<td style="width:120px;"><label for="existencia_o" style="width:150px;">Existencias: </label></td>
	 			<td><input type="text" id="existencia_o" size="3" maxlength="9" style="width:90px;height:28px;font-weight:bold;"  /></td>
	  			<td><button onclick="consultaAlmacen('a')" class="btn btn-info"> CONSULTA ALM </td>
	  			</tr>
	  			<td style="width:120px;"><label for="codigo" style="width:140px;">ARTÍCULO: </label> </td>
	  			<td><input type="text" id="codigo" size="12" maxlength="12"  style="width:120px;height:28px" /></td>
	  			<td><input type="text" id="descripcion_art" size="40" maxlength="40" readonly="readonly" style="width:400px;height:28px;font-size:16px;"/></td>

	  			<td style="width:120px;"></td>
	 			<td  style="width:90px;"></td>

	  			<td><button onclick="consultaPrecios()" class="btn btn-info"> CONSULTA ART </td>
	  		<tr>
	  			<td><label for="almacen_des" style="width:150px;">ALM. DESTINO: </label></td>
	  			<td><input type="text" id="almacen_des" size="3" maxlength="3"  style="width:90px;height:28px;font-weight:bold;"/></td>
	  			<td><input type="text" id="descripcion_des" size="40" maxlength="40"  readonly="readonly" style="width:400px;height:28px;font-size:16px;"/></td>
	  			<td style="width:120px;"><label for="existencia_d" style="width:150px;">Existencias: </label></td>
	 			<td><input type="text" id="existencia_d" size="3" maxlength="9" style="width:90px;height:28px;font-weight:bold;"  /></td>
	  			<td><button onclick="consultaAlmacen('b')" class="btn btn-info"> CONSULTA ALM </td>
	  		</tr>
	  		</table>
	  		<table class = "table">
	  		<td></td>
	  		<td><label for="unidades" style="width:70px;" >UNIDADES: </label></td> 
	  		<td><input type="text" id="unidades" size="6" maxlength="6" style="width:70px;height:28px;font-size:16px;"/></td>
	  		<td><label for="documento" style="width:80px";>DOCUMENTO: </label></td>
	  		<td><input type="text" id="documento" size="16" maxlength="15"  style="width:175px;height:28px;font-size:16px;"/></td>
	  		<td ><button id="botonvalidar" onclick="grabarTraslado()" class="btn btn-success" >VALIDAR</td>
			</table>
	  	</div>
		<div id="muestra-apuntes"><br></div>
	   </div>
	   <div id="plus_crud_general"></div>
     </div>

<script type="text/javascript">

	var user="<?php echo $_SESSION["id_usuario"] ?>"
	var resultado = document.getElementById("crud_gral");
	var resultado_plus = document.getElementById("plus_crud_general");
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
	var id_almacen_o="";
	var id_almacen_d="";
	var existe_art=false;
	var existe_art_o=false;
	var existe_art_d=false;
	var nombre_art="";
	var id_articulo="";
	var unidades=0;
	var g_almacen_d="";
	var g_almacen_o="";
	var g_articulo="";
	var g_unidades="";
	var g_documento="";
	var e_s="";
	var ordenactual=0;
	var fecha;
	var origen="";
	var desdecodigo="";
	var desdealmacen="";
	var existencia="";
	var g_existencia_o="";
	var g_existencia_d="";
	var comprobado=false;

	inhabilitaTodo();

		function preparoMostrarPrecios() {
			
			var xmlhttp;
			if(window.XMLHttpRequest) {
				xmlhttp = new XMLHttpRequest();
				} else {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function () {
				if (this.readyState === 4 && this.status === 200) {
 				num_registros = xmlhttp.responseText;
				mostrarPrecios(1);
				}
		}
		xmlhttp.open("GET", "../modelo/modelo_traslados.php?acontar_precios="+"si",true);
		xmlhttp.send();
	}

		function mostrarPrecios(pagina) {

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
				resultadoconsulta.innerHTML = xmlhttp.responseText;
			}
		}
		xmlhttp.open ("GET", "../modelo/modelo_traslados.php?precios=" + "si"+"&pagina="+pagina+"&num_paginas="+num_paginas+"&desdecodigo="+desdecodigo, true);
		xmlhttp.send();
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
		xmlhttp.open("GET", "../modelo/modelo_traslados.php?acontar_historico="+"si", true);
		xmlhttp.send();
	}

	function mostrarHistorico(pagina) {

				pagina_actual=pagina;

				num_paginas= Math.ceil(num_registros/10);

				var xmlhttp;

				if(window.XMLHttpRequest) {
					xmlhttp = new XMLHttpRequest();
				} else {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function () {
					if (this.readyState === 4 && this.status === 200) {

						resultado_plus.innerHTML = xmlhttp.responseText;
						enfoca("almacen_ori");
					}
				}
		xmlhttp.open ("GET", "../modelo/modelo_traslados.php?historico=" + "si"+"&pagina="+pagina+"&num_paginas="+num_paginas, false);
		xmlhttp.send();
	}


	function preparoMostrarAlmacen() {
			
			var xmlhttp;
			if(window.XMLHttpRequest) {
				xmlhttp = new XMLHttpRequest();
				} else {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function () {
				if (this.readyState === 4 && this.status === 200) {
 				num_registros = xmlhttp.responseText;
				mostrarAlmacen(1);
				}
		}
		xmlhttp.open("GET", "../modelo/modelo_traslados.php?acontar_sedes="+"si",true);
		xmlhttp.send();
	}

	function mostrarAlmacen(pagina) {

		pagina_actual=pagina;

		num_paginas= Math.ceil(num_registros/10);

		var xmlhttp;

		if(window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function () {
			if (this.readyState === 4 && this.status === 200) {

				resultadoconsulta.innerHTML = xmlhttp.responseText;
				
			}
		}
		xmlhttp.open ("GET", "../modelo/modelo_traslados.php?sedes=" + "si"+"&pagina="+pagina+"&num_paginas="+num_paginas+"&desdecodigo="+desdecodigo, true);
		xmlhttp.send();
	}

	function seleccionarAlmacen(id) {

			overlay.style.display="none";
			nuevaVentana.style.display="none";

			buscaAlmacen(id);
			
			if (origen=="almacen_ori") {
					existe_o=existe_alm;
					document.getElementById("almacen_ori").value=id;
					document.getElementById("descripcion_ori").value = nombre_almacen;
					g_almacen_o=id;
					inhabilita("almacen_ori");
					habilita("codigo");
					enfoca("codigo");
				}  else {
					existe_d=existe_alm;
					document.getElementById("almacen_des").value=id;
					document.getElementById("descripcion_des").value = nombre_almacen;
					g_almacen_d=id;
					compruebaArticulo(id, g_articulo);
					if (comprobado) {
										document.getElementById("existencia_d").value = g_existencia_d;
										inhabilita("almacen_des");
										habilita("unidades");
										enfoca("unidades");
								}
			}
		}
	function seleccionarPrecio(id) {
			
			overlay.style.display="none";
			nuevaVentana.style.display="none";
			buscaArticulo(id, g_almacen_o);
			existe_art_o=existe_art;
			if (existe_art) {
								document.getElementById("codigo").value = id;
								document.getElementById("descripcion_art").value = nombre_art;
								document.getElementById("existencia_o").value = existencia;
								g_articulo=id;
								g_existencia_o=existencia;
								id_articulo=id;
								inhabilita("codigo");
								habilita("almacen_des");
								enfoca("almacen_des");
						} else {
								alert("STOCK INEXISTENTE");
								enfoca("codigo");
								}
		}
 
	function leerRef()  {

		apunteposible=true;
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
						document.getElementById("fecha").value=obj.fechaRef_ed;
						document.getElementById("orden").value=ordenactual; 
						} else { 
								alert("Referencias de Usuario no habilitadas, NO puede grabar apunte nuevo");
							}
			}
		}
		xmlhttp.open("GET", "../modelo/modelo_traslados.php?leer_ref="+"si", true);
		xmlhttp.send(); 
		actualizando=false;	     
	}

	function ponEnBlanco() {

		leerRef();
		document.getElementById("almacen_ori").value="";
		document.getElementById("descripcion_ori").value="";
		document.getElementById("descripcion_art").value="";
		document.getElementById("descripcion_des").value="";
		document.getElementById("existencia_o").value = "";
		document.getElementById("existencia_d").value = "";
		document.getElementById("codigo").value=""; 
		document.getElementById("almacen_des").value=""; 
		document.getElementById("unidades").value=""; 
		document.getElementById("documento").value=""; 
		inhabilitaTodo();
		habilita("almacen_ori");
		enfoca("almacen_ori");
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
				xmlhttp.open("GET", "../modelo/modelo_traslados.php?busca_almacen="+"si"+"&id_almacen="+id_almacen,false);
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
				xmlhttp.open("GET", "../modelo/modelo_traslados.php?busca_precio="+"si"+"&id_articulo="+id_articulo,false);
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

					var obj = JSON.parse(xmlhttp.responseText);
			 			existencia=obj.stock_existencia;
			 			nombre_art=obj.stock_descripcion;
			 			alert(nombre_art+" "+existencia);
					if (nombre_art=="INEXISTENTE") {
						existe_art=false;
					} else {
						existe_art=true;
					}
					
				}
			}
				xmlhttp.open("GET", "../modelo/modelo_traslados.php?busca_articulo="+"si"+"&id_articulo="+id_articulo+"&id_almacen="+id_almacen,false);
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
				xmlhttp.open("GET", "../modelo/modelo_traslados.php?busca_stock_almacen="+"si"+"&id_articulo="+id_articulo+"&id_almacen="+id_almacen,false);
				xmlhttp.send();
	}

	function grabarTraslado(){

			if (existe_o && existe_d && existe_art_o && existe_art_d) { 
					
					g_documento=document.getElementById("documento").value;
					grabarHistorico_o();
					grabarHistorico_d();
					grabarStocks_o();
					grabarStocks_d();
					leerRef();
					grabaRef();
					ponEnBlanco();
					preparoMostrarHistorico();

		} else {
			alert("Verifique que existan Almacenes y Artículo");
		}	
	}

	function grabarHistorico_o() {

				var xmlhttp;
				if(window.XMLHttpRequest) {
					xmlhttp = new XMLHttpRequest();
					} else {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
				xmlhttp.onreadystatechange = function () {
				if (this.readyState === 4 && this.status === 200) {
				}
			}
				xmlhttp.open("GET", "../modelo/modelo_traslados.php?graba_historico_o="+"si"+"&id_almacen_o="+g_almacen_o+"&id_almacen_d="+g_almacen_d+"&codigo="+g_articulo+"&unidades="+g_unidades+"&documento="+g_documento+"&fecha="+fecha+"&orden="+ordenactual+"&existencia_o="+g_existencia_o,false);
				xmlhttp.send();
	}
		function grabarHistorico_d() {

				alert("g_existencia_d:"+g_existencia_d);
				var xmlhttp;
				if(window.XMLHttpRequest) {
					xmlhttp = new XMLHttpRequest();
					} else {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
				xmlhttp.onreadystatechange = function () {
				if (this.readyState === 4 && this.status === 200) {
				}
			}
				xmlhttp.open("GET", "../modelo/modelo_traslados.php?graba_historico_d="+"si"+"&id_almacen_o="+g_almacen_o+"&id_almacen_d="+g_almacen_d+"&codigo="+g_articulo+"&unidades="+g_unidades+"&documento="+g_documento+"&fecha="+fecha+"&orden="+ordenactual+"&existencia_d="+g_existencia_d,false);

				xmlhttp.send();
		}
		function grabarStocks_o() {

				var xmlhttp;
				if(window.XMLHttpRequest) {
					xmlhttp = new XMLHttpRequest();
					} else {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
				xmlhttp.onreadystatechange = function () {
				if (this.readyState === 4 && this.status === 200) {
				}
			}
				xmlhttp.open("GET", "../modelo/modelo_traslados.php?graba_stocks_o="+"si"+"&id_almacen_o="+g_almacen_o+"&id_almacen_d="+g_almacen_d+"&codigo="+g_articulo+"&unidades="+g_unidades,false);
				xmlhttp.send();
		}
		function grabarStocks_d() {

				var xmlhttp;
				if(window.XMLHttpRequest) {
					xmlhttp = new XMLHttpRequest();
					} else {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
				xmlhttp.onreadystatechange = function () {
				if (this.readyState === 4 && this.status === 200) {
				}
			}
				xmlhttp.open("GET", "../modelo/modelo_traslados.php?graba_stocks_d="+"si"+"&id_almacen_o="+g_almacen_o+"&id_almacen_d="+g_almacen_d+"&codigo="+g_articulo+"&unidades="+g_unidades,false);
				xmlhttp.send();
		}

		function grabaRef(){

				var xmlhttp;
				if(window.XMLHttpRequest) {
					xmlhttp = new XMLHttpRequest();
					} else {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
				xmlhttp.onreadystatechange = function () {
				if (this.readyState === 4 && this.status === 200) {
				}
			}
				xmlhttp.open("GET", "../modelo/modelo_traslados.php?graba_ref="+"si",false);
				xmlhttp.send();
	}

	function dartaltaStockDestino(id_almacen_d, id_articulo) {

				
				var xmlhttp;
				if(window.XMLHttpRequest) {
					xmlhttp = new XMLHttpRequest();
					} else {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
				xmlhttp.onreadystatechange = function () {
				if (this.readyState === 4 && this.status === 200) {

				}
			}
				xmlhttp.open("GET", "../modelo/modelo_traslados.php?alta_stock="+"si"+"&id_almacen_d="+id_almacen_d+"&id_articulo="+id_articulo, false);
				xmlhttp.send();
	}

	Inicio();

	cargaTeclas();

	function Inicio() {

		leerRef();
		enfoca("almacen_ori");
		//document.getElementById("nuevaVentana").style.width="70%";
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

	function avanzoPaginaAlmacen() {


			if (pagina_actual < num_paginas) {
				pagina_actual++;
				muestro_pagina=pagina_actual;
				document.getElementById("eligepagina").innerHTML=muestro_pagina;
				mostrarAlmacen(muestro_pagina);
			} 
	}
		function iraPaginaAlmacen(){

			var eligepagina=document.getElementById("eligepagina").value;
			if (eligepagina >= 1 && eligepagina <=num_paginas) {
				muestro_pagina= eligepagina;
				mostrarAlmacen(muestro_pagina);
			} 
	}

	function retrocedoPaginaAlmacen() {

			if (pagina_actual > 1) {
				pagina_actual--;
				muestro_pagina = pagina_actual;
				mostrarAlmacen(muestro_pagina);
		}
	}

		function avanzoPaginaPrecios() {

			if (pagina_actual < num_paginas) {
				pagina_actual++;
				muestro_pagina=pagina_actual;
				document.getElementById("eligepagina").innerHTML=muestro_pagina;
				mostrarPrecios(muestro_pagina);
			} 
	}
		function iraPaginaPrecios(){

			var eligepagina=document.getElementById("eligepagina").value;
			if (eligepagina >= 1 && eligepagina <=num_paginas) {
				muestro_pagina= eligepagina;
				mostrarPrecios(muestro_pagina);
			} 
	}

	function retrocedoPaginaPrecios() {

			if (pagina_actual > 1) {
				pagina_actual--;
				muestro_pagina = pagina_actual;
				mostrarPrecios(muestro_pagina);
		}
	}
	

	function cierraVentana(){

			overlay.style.display="none";
			nuevaVentana.style.display="none";
			enfoca(origen);
	}


	function consultaAlmacen(letra){

				if (letra=='a') {
					origen="almacen_ori";
				} else {
					origen="almacen_des";
				}
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

	function consultaPrecios(){

		if (g_almacen_o!="") {

				document.getElementById("leyenda").innerHTML="Consulta Artículos";

				overlay.style.opacity = .4;

				if (overlay.style.display == "block") {
					overlay.style.display="none";
					nuevaVentana.style.display="none";

				} else {
					overlay.style.display="block";
					nuevaVentana.style.display="block";
				}

			preparoMostrarPrecios();
		}
	}


	/*function desdeCodigo(){

			if (!actualizando) {
			desdecodigo=document.getElementById("desdecodigoH").value;
			desdealmacen=document.getElementById("desdealmacenH").value;
			preparoMostrarHistorico();
		}
	} */

	function desdeTitulo(){

			if (!actualizando) {
			desdetitulo=document.getElementById("desdetitulo").value;
			preparoMostrarCuentas();
		}
	}
	function cargaTeclas() {

	 		$("#almacen_ori").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==13) {
					id_almacen_o=document.getElementById("almacen_ori").value;
					existe_alm=false;
					if (id_almacen_o.length==3) {
												buscaAlmacen(id_almacen_o);
												existe_o=existe_alm;
												if (existe_alm) {
															document.getElementById("descripcion_ori").value = nombre_almacen;
															g_almacen_o=id_almacen_o;
															inhabilita("almacen_ori");
															habilita("codigo");
															enfoca("codigo");
													} else {
																alert("ALMACEN DE ORIGEN INEXISTENTE");
																enfoca("almacen_ori");
															}
												} 
					
									}
					
					if (keycode==40) {
						if (g_almacen_o!="") {
							id_almacen_o=g_almacen_o;
							document.getElementById("almacen_ori").value=g_almacen_o;
							inhabilita("almacen_ori");
							habilita("codigo");
							enfoca("codigo");
						}
					}

				});

		 		$("#codigo").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==13) {
					id_articulo=document.getElementById("codigo").value;
					existe_art=false;
					existe_precio=false;
					if (id_articulo.length==12) {
													buscaPrecios(id_articulo);
													if (existe_precio){
															buscaArticulo(id_articulo, id_almacen_o);
															existe_art_o=existe_art;
															if (existe_art) {
																	document.getElementById("descripcion_art").value = nombre_art;
																	document.getElementById("existencia_o").value = existencia;
																	g_articulo=id_articulo;
																	g_existencia_o=existencia;
																	inhabilita("codigo");
																	habilita("almacen_des");
																	enfoca("almacen_des");

																} else {
																		alert("STOCK INEXISTENTE");
																		enfoca("codigo");
																	}
													}	else {

															 alert("Artículo Inexistente");

															}	
											} 
				}
				if (keycode==38) {
					document.getElementById("codigo").value=g_articulo;
					inhabilita("codigo");
					habilita("almacen_ori");
					enfoca("almacen_ori");
				}

				if (keycode==40) {
						if (g_articulo!="") {
							id_articulo=g_articulo;
							document.getElementById("codigo").value=g_articulo;
							inhabilita("codigo");
							habilita("almacen_des");
							enfoca("almacen_des");
						}
					}

			});

			$("#almacen_des").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==13) {

					id_almacen_d=document.getElementById("almacen_des").value;
					
					if (id_almacen_d==id_almacen_o) {
						alert("ES EL MISMO ALMACEN");
						enfoca("almacen_des");
					}

					if (id_almacen_d.length==3) { existe_alm=false;
												existe_art=false;
												buscaAlmacen(id_almacen_d);
												buscaArticulo(id_articulo, id_almacen_d);
												existe_art_d=existe_art;
												existe_d=existe_alm;
												if (existe_alm && existe_art) {
															document.getElementById("descripcion_des").value = nombre_almacen;
															document.getElementById("existencia_d").value = existencia;
															g_almacen_d=id_almacen_d;
															g_existencia_d=existencia;
															inhabilita("almacen_des");
															habilita("unidades");
															enfoca("unidades");
													} else {
																if (!existe_alm) {
																		alert("ALMACEN DESTINO INEXISTENTE");
																		enfoca("almacen_des");
																	} else {
																			var altasn=confirm("ARTICULO NO EXISTE EN EL STOCK DEL ALMACEN DE DESTINO, ¿ DESEA DARLO DE ALTA ?");
																			if (altasn) {
																				dartaltaStockDestino(id_almacen_d, id_articulo);
																				document.getElementById("descripcion_des").value = nombre_almacen;
																				document.getElementById("existencia_o").value = 0;
																				existe_art=true;
																				existe_art_d=existe_art;
																				g_almacen_d=id_almacen_d;
																				inhabilita("almacen_des");
																				habilita("unidades");
																				enfoca("unidades");
																				} else { 
																					enfoca("almacen_des")
																					}
																			}
															}		
											} 
									}
					if (keycode==38) {
					document.getElementById("almacen_des").value=g_almacen_d;	
					inhabilita("almacen_des");
					habilita("codigo");	
					enfoca("codigo");
				}	
					if (keycode==40) {
						if (g_almacen_d!="") {
							id_almacen_d=g_almacen_d;
							document.getElementById("almacen_des").value=g_almacen_d;
							inhabilita("almacen_des");
							habilita("unidades");
							enfoca("unidades");
						}
					}
			});	

			$("#unidades").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==13) {
					
						unidades=document.getElementById("unidades").value;

						if (!isNaN(unidades)) {
							g_unidades=unidades;
							inhabilita("unidades");
							habilita("documento");
							enfoca("documento");
						} else {
								enfoca ("unidades");
							}

				}
				if (keycode==38) {
					document.getElementById("unidades").value=g_unidades;
					inhabilita("unidades");
					habilita("almacen_des");
					enfoca("almacen_des");
				}
				if (keycode==40) {
						if (g_unidades!="") {
							document.getElementById("unidades").value=g_unidades;
							inhabilita("unidades");
							habilita("documento");
							enfoca("documento");
						}
					}
			});

			$("#documento").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==13) {
					
					g_documento=document.getElementById("documento").value;
					enfoca("botonvalidar");
				}
				if (keycode==38) {
					document.getElementById("documento").value=g_documento;
					habilita("unidades");
					enfoca("unidades");
				}

				if (keycode==40) {
						if (g_documento!="") {
							document.getElementById("documento").value=g_documento;
							
							enfoca("botonvalidar");
						}
					}
			});


	 		$("#botonvalidar").on('keyup', function(e){
	 			var keycode= e.keyCode || e.which;
	 			if (keycode==38) {
 
 							enfoca("documento");
 					}
 			});

	$("#desdetitulo").on('keyup', function(e){
		var keycode= e.keyCode || e.which;
		if(keycode==13 || keycode==40) {
			desdeTitulo();
		}
		
	});
	$("#eligepagina").on('keyup', function(e){
		var keycode= e.keyCode || e.which;
		if(keycode==13 || keycode==40) {
			iraPaginaC();
		}
		
	});

		$('body').on("keydown", function(e) { 

            if (e.which === 112) {
                crearPrimerGrado();
                e.preventDefault();
            }
            if (e.which === 113) {
                crearSegundoGrado();
                e.preventDefault();
            }
            if (e.which === 114) {
                crearTercerGrado();
                e.preventDefault();
            }
            if (e.ctrlKey  && e.which === 67) {
                ejecutarNuevaVentana('noedicion','CODIGO_CUENTA');
                e.preventDefault();

            }
            if (e.ctrlKey  && e.which === 65) {
                ejecutarNuevaVentana('noedicion','TITULO');
                e.preventDefault();
            }
            if (e.ctrlKey  && e.which ===82) {
                agregarCuenta();
                e.preventDefault();
            }
            if (e.ctrlKey  && e.which ===86) {
                consultarConceptos();
                e.preventDefault();
            }
            if (e.ctrlKey  && e.which ===68) {
                botonDebe();
                e.preventDefault();
            }
            if (e.ctrlKey  && e.which ===72) {
                botonHaber();
                e.preventDefault();
            }
			if (e.ctrlKey  && e.which ===80) {
                validarApunte();
                e.preventDefault();
            }
			if (e.ctrlKey  && e.which ===79) {
                validarAsiento();
                e.preventDefault();
            }
        });


	}

		function compruebaArticulo(alm, art ) {

					comprobado=false;
					buscaArticulo(art, alm);
					existe_art_d=existe_art;
					if (existe_art) {
						g_existencia_d=existencia;
						comprobado=true;
					} else {
							var altasn=confirm("ALTICULO NO EXISTE EN EL STOCK DEL ALMACEN DE DESTINO, ¿ DESEA DARLO DE ALTA ?");
							if (altasn) {
											alert("alm="+alm+" art="+art);
											dartaltaStockDestino(alm, art);
											g_existencia_d=0;
											comprobado=true;
											existe_art=true;
											existe_art_d=existe_art;	
										} else {
												comprobado=false
												}
							}
			}

	function inhabilitaTodo(){

			
			document.getElementById("codigo").disabled=true;
			document.getElementById("almacen_des").disabled=true;
			document.getElementById("unidades").disabled=true;
			document.getElementById("documento").disabled=true;
			
	}
	function enfoca(idelemento) {
		
		document.getElementById(idelemento).value="";
		document.getElementById(idelemento).focus();

	}

	function colorTexto(elid){

		document.getElementById(elid).style.backgroundColor='#c7f3ed';

	}
	function noFoco(elid) {

		alert("no foco");
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

