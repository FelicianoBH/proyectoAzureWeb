<div id="header-referencias">
 		<div id="titulo-referencias">
   	 		<div>COMPRAS</div>
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
	  			<td style="width:120px;"><label for="almacen" style="width:150px;">ALMACEN: </label></td>
	 			<td><input type="text" id="almacen" size="3" maxlength="3" style="width:90px;height:28px;font-weight:bold;"  /></td>
	  			<td><input type="text" id="descripcion" size="40" maxlength="40" readonly="readonly" style="width:500px;height:28px;font-size:16px;"/></td>
	  			<td><button onclick="consultaAlmacen('a')" class="btn btn-info"> CONSULTA ALMACEN </td>
	  			</tr>
	  			<tr>
	  			<td style="width:120px;"><label for="codigo" style="width:150px;">ARTÍCULO: </label> </td>
	  			<td><input type="text" id="codigo" size="12" maxlength="12"  style="width:120px;height:28px" /></td>
	  			<td><input type="text" id="descripcion_art" size="40" maxlength="40" readonly="readonly" style="width:500px;height:28px;font-size:16px;"/></td>
	  			<td><button onclick="consultaPrecios()" class="btn btn-info"> CONSULTA ARTICULO </td>
	  			</tr>
	  		</table>
	  		<table class = "table">
	  		<td></td>
	  		<td><label for="unidades" style="width:130px;">UNIDADES: </label></td> 
	  		<td><input type="text" id="unidades" size="6" maxlength="6" style="width:70px;height:28px;font-size:16px;"/></td>
	  		<td><label for="precio" style="width:100px;">PRECIO: </label></td> 
	  		<td><input type="text" id="precio" size="6" maxlength="6" style="width:70px;height:28px;font-size:16px;"/></td>
	  		<td><label for="documento" style="width:80px";>DOCUMENTO: </label></td>
	  		<td><input type="text" id="documento" size="16" maxlength="15"  style="width:175px;height:28px;font-size:16px;"/></td>
	  		<td ><button id="botonvalidar" onclick="grabarCompra()" class="btn btn-success" >VALIDAR</td>
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
	var existencia="";



	inhabilitaTodo();
	habilita("almacen");
		
		

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
		xmlhttp.open("GET", "../modelo/modelo_compras.php?acontar_precios="+"si",true);
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
		xmlhttp.open ("GET", "../modelo/modelo_compras.php?precios=" + "si"+"&pagina="+pagina+"&num_paginas="+num_paginas+"&desdecodigo="+desdecodigo, true);
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
		xmlhttp.open("GET", "../modelo/modelo_compras.php?acontar_historico="+"si", true);
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
						enfoca("almacen");
					}
				}
		xmlhttp.open ("GET", "../modelo/modelo_compras.php?historico=" + "si"+"&pagina="+pagina+"&num_paginas="+num_paginas, false);
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
		xmlhttp.open("GET", "../modelo/modelo_compras.php?acontar_sedes="+"si",true);
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
		xmlhttp.open ("GET", "../modelo/modelo_compras.php?sedes=" + "si"+"&pagina="+pagina+"&num_paginas="+num_paginas+"&desdecodigo="+desdecodigo, true);
		xmlhttp.send();
	}

	function seleccionarAlmacen(id) {

			overlay.style.display="none";
			nuevaVentana.style.display="none";

			buscaAlmacen(id);
			document.getElementById("almacen").value=id;
			document.getElementById("descripcion").value = nombre_almacen;
			g_almacen=id;
			inhabilita("almacen");
			habilita("codigo");
			enfoca("codigo");
		}
	function seleccionarPrecio(id) {

			overlay.style.display="none";
			nuevaVentana.style.display="none";
			buscaPrecios(id);
			buscaArticulo(id, g_almacen);
			
			if (existe_art) {
								document.getElementById("codigo").value = id;
								document.getElementById("descripcion_art").value = nombre_art;
								g_articulo=id;
								id_articulo=id;
								inhabilita("codigo");
								habilita("unidades");
								enfoca("unidades");

						} else {
								var altasn=confirm("ARTICULO NO EXISTE EN EL STOCK DEL ALMACEN, ¿ DESEA DARLO DE ALTA ?");
								if (altasn) {
											dartaltaStockDestino(g_almacen, id);
											document.getElementById("codigo").value=id;
											document.getElementById("descripcion_art").value = nombre_art;
											existe_art=true;
											g_articulo=id;
											inhabilita("codigo");
											habilita("unidades");
											enfoca("unidades");
											} else { 
													enfoca("codigo")
													}
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
		xmlhttp.open("GET", "../modelo/modelo_compras.php?leer_ref="+"si", true);
		xmlhttp.send(); 
		actualizando=false;	     
	}

	function ponEnBlanco() {

		leerRef();
		document.getElementById("almacen").value="";
		document.getElementById("descripcion").value="";
		document.getElementById("descripcion_art").value="";
		document.getElementById("descripcion").value="";
		document.getElementById("codigo").value=""; 
		document.getElementById("almacen").value=""; 
		document.getElementById("unidades").value=""; 
		document.getElementById("precio").value=""; 
		document.getElementById("documento").value=""; 
		inhabilitaTodo();
		habilita("almacen");
		enfoca("almacen");
	}

	function dartaltaStockDestino(id_almacen, id_articulo) {
				
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
				xmlhttp.open("GET", "../modelo/modelo_compras.php?alta_stock="+"si"+"&id_almacen="+id_almacen+"&id_articulo="+id_articulo, false);
				xmlhttp.send();
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
				xmlhttp.open("GET", "../modelo/modelo_compras.php?busca_almacen="+"si"+"&id_almacen="+id_almacen,false);
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
					nombre_art=recibo;
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

	function grabarCompra(){

					
					g_documento=document.getElementById("documento").value;
					grabarHistorico();
					grabarStocks();
					leerRef();
					grabaRef();
					ponEnBlanco();
					preparoMostrarHistorico();
	}

	function grabarHistorico() {

				var xmlhttp;
				if(window.XMLHttpRequest) {
					xmlhttp = new XMLHttpRequest();
					} else {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
				xmlhttp.onreadystatechange = function () {
				if (this.readyState === 4 && this.status === 200) {

					var recibo=xmlhttp.responseText;
					
				}
			}
				xmlhttp.open("GET", "../modelo/modelo_compras.php?graba_historico="+"si"+"&id_almacen="+g_almacen+"&codigo="+g_articulo+"&unidades="+g_unidades+"&precio="+g_precio+"&documento="+g_documento+"&fecha="+fecha+"&orden="+ordenactual+"&existencia="+existencia,false);
				xmlhttp.send();
	}
		
		function grabarStocks() {

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
				xmlhttp.open("GET", "../modelo/modelo_compras.php?graba_stocks="+"si"+"&id_almacen="+g_almacen+"&id_almacen="+g_almacen+"&codigo="+g_articulo+"&unidades="+g_unidades,false);
				xmlhttp.send();
		}

		function actualizarStocks() {

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
				xmlhttp.open("GET", "../modelo/modelo_compras.php?actualiza_stocks="+"si"+"&id_almacen="+guardo_almacen+"&codigo="+guardo_articulo+"&unidades_antes="+guardo_unidades+"&unidades_despues="+nuevas_unidades,false);
				xmlhttp.send();
		}	
		function actualizarStocksBorrar() {

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
				xmlhttp.open("GET", "../modelo/modelo_compras.php?actualiza_stocks_borrar="+"si"+"&id_almacen="+guardo_almacen+"&codigo="+guardo_articulo+"&unidades_antes="+guardo_unidades,false);
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
				xmlhttp.open("GET", "../modelo/modelo_compras.php?graba_ref="+"si",false);
				xmlhttp.send();
	}


	Inicio();

	cargaTeclas();

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

	function consultaPrecios(){


			if (existe_alm && !existe_art) {

				origen="codigo";

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

	function editarCompra(id) {

			document.getElementById("nuevaVentana").style.width="40%";
			overlay.style.opacity = .4;

			if (overlay.style.display == "block") {

				overlay.style.display="none";
				nuevaVentana.style.display="none";
			} else {
				overlay.style.display="block";
				nuevaVentana.style.display="block";
			}
				var xmlhttp;

				if(window.XMLHttpRequest) {
						xmlhttp = new XMLHttpRequest();
						} else {
						xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
					xmlhttp.onreadystatechange = function () {

					if (this.readyState === 4 && this.status === 200) {

					resultadoconsulta.innerHTML=xmlhttp.responseText;
					muestraDatos(id);
					codigo_grabar=id;
					document.getElementById("leyenda").innerHTML="EDITAR COMPRA";

	 				}
				}
	 		xmlhttp.open("GET", "../modelo/modelo_compras.php?formulario="+"si", false);
			xmlhttp.send();
			//cargaTeclas();
	}

	/*function desdeCodigo(){

			if (!actualizando) {
			desdecodigo=document.getElementById("desdecodigoH").value;
			desdealmacen=document.getElementById("desdealmacenH").value;
			preparoMostrarHistorico();
		}
	} */

	function muestraDatos(id){

			document.getElementById("almacen_ed").value=document.getElementById("HIS_ALMACEN"+id).innerHTML;
			document.getElementById("codigo_ed").value=document.getElementById("HIS_CODIGO"+id).innerHTML;
			document.getElementById("descripcion_ed").value=document.getElementById("PRE_DESCRIPCION"+id).innerHTML;
			document.getElementById("fecha_ed").value=document.getElementById("HIS_FECHA"+id).innerHTML;
			document.getElementById("orden_ed").value=document.getElementById("HIS_ORDEN"+id).innerHTML;
			document.getElementById("documento_ed").value=document.getElementById("HIS_DOCUMENTO"+id).innerHTML;
			document.getElementById("unidades_ed").value=document.getElementById("HIS_UNIDADES"+id).innerHTML;
			document.getElementById("precio_ed").value=document.getElementById("HIS_PRECIO"+id).innerHTML;
			guardo_almacen=document.getElementById("almacen_ed").value;
			guardo_articulo=document.getElementById("codigo_ed").value;
			guardo_unidades=document.getElementById("unidades_ed").value;
			inhabilita("almacen_ed");
			inhabilita("codigo_ed");
			inhabilita("descripcion_ed");
			inhabilita("fecha_ed");
			inhabilita("orden_ed");

	}



	function actualizarCompra() {

				var confirma= confirm("¿ Actualizar datos ?");

				if (confirma) {
						var xmlhttp;
						if(window.XMLHttpRequest) {
							xmlhttp = new XMLHttpRequest();
						} else {
							xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
						}
						var almacen_ac= document.getElementById("almacen_ed").value;
						var codigo_ac= document.getElementById("codigo_ed").value;
						var fecha_ac=document.getElementById("fecha_ed").value;
						var orden_ac=document.getElementById("orden_ed").value;
						var documento_ac= document.getElementById("documento_ed").value;
						var unidades_ac= document.getElementById("unidades_ed").value;
						var precio_ac= document.getElementById("precio_ed").value;
						nuevas_unidades=unidades_ac;

						xmlhttp.onreadystatechange = function () {

							if (this.readyState === 4 && this.status === 200) {
				 				var meresponde=xmlhttp.responseText;
									
									actualizarStocks();	
				 					cierraVentana();
				 					mostrarHistorico(pagina_actual);
							}
					}
					xmlhttp.open("GET", "../modelo/modelo_compras.php?actualizar_compra="+"si"+"&almacen_ac="+almacen_ac+"&codigo_ac="+codigo_ac+"&fecha_ac="+fecha_ac+"&orden_ac="+orden_ac+"&documento_ac="+documento_ac+"&unidades_ac="+unidades_ac+"&precio_ac="+precio_ac, true);
						xmlhttp.send();
		} else {
			
			mostrarHistorico(pagina_actual);
		}
	}

	function borrarCompra(id) {

				var confirma= confirm("¿ Borrar Compra ?");
				
				if (confirma) {
						var xmlhttp;
						if(window.XMLHttpRequest) {
							xmlhttp = new XMLHttpRequest();
						} else {
							xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
						}
					
						var almacen_ac= document.getElementById("HIS_ALMACEN"+id).innerHTML;
						var codigo_ac= document.getElementById("HIS_CODIGO"+id).innerHTML;
						var fecha_ac=document.getElementById("HIS_FECHA"+id).innerHTML;
						var orden_ac=document.getElementById("HIS_ORDEN"+id).innerHTML;
						var unidades_ac=document.getElementById("HIS_UNIDADES"+id).innerHTML;

						guardo_unidades=unidades_ac;

						xmlhttp.onreadystatechange = function () {

							if (this.readyState === 4 && this.status === 200) {
				 				var meresponde=xmlhttp.responseText;
									
									actualizarStocksBorrar();	
				 					cierraVentana();
				 					mostrarHistorico(pagina_actual);
							}
					}
					xmlhttp.open("GET", "../modelo/modelo_compras.php?borrar_compra="+"si"+"&almacen_ac="+almacen_ac+"&codigo_ac="+codigo_ac+"&fecha_ac="+fecha_ac+"&orden_ac="+orden_ac, true);
						xmlhttp.send();
		} else {
			
			mostrarHistorico(pagina_actual);
		}
	}

	function desdeTitulo(){

			if (!actualizando) {
			desdetitulo=document.getElementById("desdetitulo").value;
			preparoMostrarCuentas();
		}
	}
	function cargaTeclas() {

			$("#almacen").focus(function(){

					existe_alm=false;

			})

			$("#codigo").focus(function(){

					existe_art=false;

			})

	 		$("#almacen").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==13) {
					id_almacen=document.getElementById("almacen").value;
					existe_alm=false;
					if (id_almacen.length==3) {
												buscaAlmacen(id_almacen);
												existe=existe_alm;
												if (existe_alm) {
															document.getElementById("descripcion").value = nombre_almacen;
															g_almacen=id_almacen;
															inhabilita("almacen");
															habilita("codigo");
															enfoca("codigo");
													} else {
																alert("ALMACEN INEXISTENTE");
																enfoca("almacen");
															}
												} 
					
									}
					
					if (keycode==40) {
						if (g_almacen!="") {
							id_almacen=g_almacen;
							document.getElementById("almacen").value=g_almacen;
							buscaAlmacen(id_almacen);
							existe=existe_alm;
							if (existe_alm) {
											document.getElementById("descripcion").value = nombre_almacen;
											g_almacen=id_almacen;
											inhabilita("almacen");
											habilita("codigo");
											enfoca("codigo");
											} else {
													alert("ALMACEN INEXISTENTE");
													enfoca("almacen");
												}
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
															buscaArticulo(id_articulo, g_almacen);
															if (existe_art) {
																	document.getElementById("descripcion_art").value = nombre_art;
																	g_articulo=id_articulo;
																	inhabilita("codigo");
																	habilita("unidades");
																	enfoca("unidades");

																} else {
																		var altasn=confirm("ARTICULO NO EXISTE EN EL STOCK DEL ALMACEN, ¿ DESEA DARLO DE ALTA ?");

																		if (altasn) {
																				dartaltaStockDestino(g_almacen, id_articulo);
																				document.getElementById("descripcion").value = nombre_art;
																				existe_art=true;
																				g_articulo=id_articulo;
																				inhabilita("codigo");
																				habilita("unidades");
																				enfoca("unidades");
																				} else { 
																					enfoca("codigo")
																					}
																	}
													}	else {

															 alert("Artículo Inexistente");

															}	
											} 
				}
				if (keycode==38) {
					document.getElementById("codigo").value=g_articulo;
					inhabilita("codigo");
					habilita("almacen");
					enfoca("almacen");
				}

				if (keycode==40) {
						if (g_articulo!="") {
												id_articulo=g_articulo;
												document.getElementById("codigo").value=g_articulo;
												buscaPrecios(id_articulo);
												if (existe_precio){
													buscaArticulo(id_articulo, id_almacen);
													if (existe_art) {
															document.getElementById("descripcion_art").value = nombre_art;
																g_articulo=id_articulo;
															inhabilita("codigo");
															habilita("unidades");
															enfoca("unidades");
															} else {
																	var altasn=confirm("ARTICULO NO EXISTE EN EL STOCK DEL ALMACEN, ¿ DESEA DARLO DE ALTA ?");

																	if (altasn) {
																		dartaltaStockDestino(g_almacen, id_articulo);
																		document.getElementById("descripcion").value = nombre_art;
																		existe_art=true;
																		g_articulo=id_articulo;
																		inhabilita("codigo");
																		habilita("unidades");
																		enfoca("unidades");
																		} else { 
																				enfoca("codigo")
																			  }
																	}
													}	else {

															 alert("Artículo Inexistente");

															}	
															
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
							habilita("precio");
							enfoca("precio");
						} else {
								enfoca ("unidades");
							}

				}
				if (keycode==38) {
					document.getElementById("unidades").value=g_unidades;
					inhabilita("unidades");
					habilita("codigo");
					enfoca("codigo");
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


			$("#precio").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==13) {
					
						precio=document.getElementById("precio").value;

					if (!isNaN(precio)) {
							g_precio=precio;
							inhabilita("precio");
							habilita("documento");
							enfoca("documento");
						} else {
								enfoca ("precio");
							}
				}
				if (keycode==38) {
					document.getElementById("precio").value=g_precio;
					inhabilita("precio");
					habilita("unidades");
					enfoca("unidades");
				}

				if (keycode==40) {
						if (g_precio!="") {
							document.getElementById("precio").value=g_precio;
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
					habilita("precio");
					enfoca("precio");
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

	function inhabilitaTodo(){

			
			document.getElementById("codigo").disabled=true;
			document.getElementById("almacen").disabled=true;
			document.getElementById("unidades").disabled=true;
			document.getElementById("precio").disabled=true;
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

