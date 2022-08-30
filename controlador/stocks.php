<div id="header-referencias">
		<div id="titulo-referencias">
 			<div> STOCKS </div>
		</div>
</div> 
<br><br>
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
</div>

<div id="wrapper">
	<div id="crud_gral"></div>
</div>

<script type="text/javascript">

	var resultado = document.getElementById("crud_gral");
	var resultadoconsulta=document.getElementById("pantallaConsulta");
	document.getElementById("nuevaVentana").style.height="60%";
	document.getElementById("nuevaVentana").style.width="875px";
	var resultado = document.getElementById("crud_gral");
	var num_registros;
	var num_paginas;
	var pagina_actual;
	var muestro_pagina;
	var actualizando=false;
	var g_nombreID="";
 	var permito_alta=false;
 	var desdecodigo="";
 	var desdealmacen="";
 	var operacion="";
 	var existe_stocks=false;
 	var limite_origen=0.00;
 	var existe_almacen=false;
 	var existe_precios=false;
 	var existe_stock=false;
 	var id_almacen="";
 	var id_codigo="";
 	var ubi_calleAc="";
 	var ubi_pasilloAc="";
 	var ubi_numeroAc="";
 	var minimoAc="";
 	var p_pedidoAc="";
 	var codigoAc="";
 	var almacenAc="";
 	var nombre_almacen="";
	var nombre_articulo="";

	function mostrarStocks(pagina) {

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
			}
		}
		xmlhttp.open("GET", "../modelo/modelo_stocks.php?stocks="+"si"+"&pagina="+pagina+"&num_paginas="+num_paginas+"&desdecodigo="+desdecodigo+"&desdealmacen="+desdealmacen, false);
		xmlhttp.send();
	}


	function preparoMostrarStocks(){

			var xmlhttp;
			if(window.XMLHttpRequest) {
				xmlhttp = new XMLHttpRequest();
				} else {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function () {
				if (this.readyState === 4 && this.status === 200) {

 				num_registros = xmlhttp.responseText;

				mostrarStocks(1);

				}
		}
		xmlhttp.open("GET", "../modelo/modelo_stocks.php?acontar="+"si"+"&desdecodigo="+desdecodigo+"&desdealmacen="+desdealmacen, true);
		xmlhttp.send();
	}

	preparoMostrarStocks();

	function desdeCodigo(){

			if (!actualizando) {
			desdecodigo=document.getElementById("desdecodigo").value;
			desdealmacen=document.getElementById("desdealmacen").value;
			preparoMostrarStocks();
		} 
	}

	function iraPagina(){

			if (!actualizando) {
			var eligepagina=document.getElementById("eligepagina").value;
			if (eligepagina >= 1 && eligepagina <=num_paginas) {
				muestro_pagina= eligepagina;
				mostrarStocks(muestro_pagina);
			}
		}
	}

	function retrocedoPagina() {

			if (!actualizando) {
			if (pagina_actual > 1) {
				pagina_actual--;
				muestro_pagina = pagina_actual;
				mostrarStocks(muestro_pagina);
			}
		}
	}

	function avanzoPagina() {

			if (!actualizando) {

			if (pagina_actual < num_paginas) {
				pagina_actual++;
				muestro_pagina=pagina_actual;
				document.getElementById("eligepagina").innerHTML=muestro_pagina;
				mostrarStocks(muestro_pagina);
			}
		}
	}
	
	function cierraVentana(){

			overlay.style.display="none";
			nuevaVentana.style.display="none";
			actualizando=false;
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
					var existe=xmlhttp.responseText;
					if (existe.includes("INEXISTENTE")) {
						existe_almacen=false;
						nombre_almacen=existe;
					} else {
		 					document.getElementById("nom_almacen").value=existe;
		 					existe_almacen=true;
		 					nombre_almacen=existe;
		 				}
				}
		}
		xmlhttp.open("GET", "../modelo/modelo_stocks.php?busca_almacen="+"si"+"&id_almacen="+id_almacen, false);
		xmlhttp.send();

	}

	function editarStocks(id) {

		operacion="edicion";

		if (!actualizando) {

			actualizando=true;
			document.getElementById("pantallaConsulta").style.width="875px";
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
					document.getElementById("leyenda").innerHTML="EDITAR STOCKS";
					muestraDatos(id);
					buscaAlmacen(document.getElementById("almacen").value);
					document.getElementById("nom_almacen").value=nombre_almacen;
					buscaPrecio(document.getElementById("codigo").value);
					document.getElementById("descripcion")=nombre_articulo;
					document.getElementById("almacen").disabled=true;
					document.getElementById("codigo").disabled=true;
					document.getElementById("existencias").disabled=true;
					document.getElementById("faltas").disabled=true;
					document.getElementById("entradas").disabled=true;
					document.getElementById("salidas").disabled=true;

					cargaTeclas();
	 				}
				}
	 		xmlhttp.open("GET", "../modelo/modelo_stocks.php?formulario="+"si"+"&operacion="+operacion, false);
			xmlhttp.send();
	}
}
	function actualizarStocks() {

				var confirma= confirm("¿ Actualizar datos ?");

				if (confirma) {
						var xmlhttp;
						if(window.XMLHttpRequest) {
							xmlhttp = new XMLHttpRequest();
						} else {
							xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
						}
						
						ubi_calleAc=document.getElementById("ubi_calle").value;
						ubi_pasilloAc=document.getElementById("ubi_pasillo").value;
						ubi_numeroAc=document.getElementById("ubi_numero").value;
						minimoAc=document.getElementById("minimo").value;
						p_pedidoAc=document.getElementById("p_pedido").value;

						xmlhttp.onreadystatechange = function () {

							if (this.readyState === 4 && this.status === 200) {
				 				var meresponde=xmlhttp.responseText;
								var mensaje=meresponde;
								if (mensaje.includes("No ejecutado")) {
									alert(meresponde);
								}
									actualizando=false;
				 					cierraVentana();
				 				 	mostrarStocks(pagina_actual);
							}
					}
					xmlhttp.open("GET", "../modelo/modelo_stocks.php?actualizar_stock="+"si"+"&almacenAc="+almacenAc+"&codigoAc="+codigoAc+"&ubi_calleAc="+ubi_calleAc+"&ubi_pasilloAc="+ubi_pasilloAc+"&ubi_numeroAc="+ubi_numeroAc+"&minimoAc="+minimoAc+"&p_pedidoAc="+p_pedidoAc, true);
						xmlhttp.send();
		} else {

			actualizando=false;
			mostrarStocks(pagina_actual);
		}
	}
		function borrarStocks(id_almacen, id_codigo) {


			var respuesta = confirm("Estas seguro de borrar este Stock?");
			if (respuesta ===true ) {
				var xmlhttp;
				if(window.XMLHttpRequest) {
					xmlhttp = new XMLHttpRequest();
					} else {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
				xmlhttp.onreadystatechange = function () {
				if (this.readyState === 4 && this.status === 200) {
 				preparoMostrarStocks();
				}
			}
				xmlhttp.open("GET", "../modelo/modelo_stocks.php?borrar_stock="+"si"+"&id_almacen="+id_almacen+"&id_codigo="+id_codigo, true);
				xmlhttp.send();
		 }
	}
	var overlay = document.getElementById("overlay");
	var nuevaVentana= document.getElementById("nuevaVentana");

	function ejecutarNuevaVentana(){

		operacion="alta";
		document.getElementById("nuevaVentana").style.width="875px";
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
				 document.getElementById("leyenda").innerHTML="AGREGAR STOCKS";
				 cargaTeclas();
 				}
			}
 		xmlhttp.open("GET", "../modelo/modelo_stocks.php?formulario="+"si"+"&operacion="+operacion, false);
		xmlhttp.send();
		enfoca("almacen");
	}

	function muestraDatos(id) {

		document.getElementById("almacen").value=document.getElementById("STOCKS_ALMACEN"+id).innerHTML;
		document.getElementById("codigo").value=document.getElementById("STOCKS_CODIGO"+id).innerHTML;
		almacenAc=document.getElementById("almacen").value;
		codigoAc=document.getElementById("codigo").value;
		document.getElementById("existencias").value=document.getElementById("STOCKS_EXISTENCIAS"+id).innerHTML;
		var ubicacion = document.getElementById("UBICACION"+id).innerHTML;
		document.getElementById("ubi_calle").value=ubicacion.slice(0,3);
		document.getElementById("ubi_pasillo").value=ubicacion.slice(4,7);
		document.getElementById("ubi_numero").value=ubicacion.slice(8,11);
		document.getElementById("minimo").value=document.getElementById("STOCKS_MINIMO"+id).innerHTML;
		document.getElementById("p_pedido").value=document.getElementById("STOCKS_PUNTO_PEDIDO"+id).innerHTML;
		document.getElementById("faltas").value=document.getElementById("STOCKS_FALTAS"+id).innerHTML;
		document.getElementById("entradas").value=document.getElementById("STOCKS_UNI_ENTRADA"+id).innerHTML;
		document.getElementById("salidas").value=document.getElementById("STOCKS_UNI_SALIDA"+id).innerHTML;

	}

	function disableStocks() {

	
		document.getElementById("ubi_calle").disabled=true;
		document.getElementById("ubi_pasillo").disabled=true;
		document.getElementById("ubi_numero").disabled=true;
		document.getElementById("minimo").disabled=true;
		document.getElementById("p_pedido").disabled=true;
	}

	function enableStocks() {

	
		document.getElementById("ubi_calle").disabled=false;
		document.getElementById("ubi_pasillo").disabled=false;
		document.getElementById("ubi_numero").disabled=false;
		document.getElementById("minimo").disabled=false;
		document.getElementById("p_pedido").disabled=false;
	}

	function agregarStocks() {

			
			if (permito_alta) {

				var n_almacen=document.getElementById("almacen").value;
				var n_codigo=document.getElementById("codigo").value;	
				var n_existencias=0;
				var n_ubi_calle=document.getElementById("ubi_calle").value;
				var n_ubi_pasillo=document.getElementById("ubi_pasillo").value;
				var n_ubi_numero=document.getElementById("ubi_numero").value;
				var n_minimo=document.getElementById("minimo").value;
				var n_p_pedido=document.getElementById("p_pedido").value;
				var n_faltas=0;
				var n_entradas=0;
				var n_salidas=0;
			 	var valida=confirm("Confirma Alta de Stocks ?");
				if (valida) {
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
		 				preparoMostrarStocks();
		 				}
					}
		 		xmlhttp.open("GET", "../modelo/modelo_stocks.php?alta="+"si"+"&n_almacen="+n_almacen+"&n_codigo="+n_codigo+"&n_existencias="+0+"&n_ubi_calle="+n_ubi_calle+"&n_ubi_pasillo="+n_ubi_pasillo+"&n_ubi_numero="+n_ubi_numero+"&n_minimo="+n_minimo+"&n_p_pedido="+n_p_pedido+"&n_faltas="+n_faltas+"&n_entradas="+n_entradas+"&n_salidas="+n_salidas, true);
				xmlhttp.send();
			 } 
		} else { 

			alert("No se puede grabar este stock");
		}
	}


	function cargaTeclas() {

				$("#almacen").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==13 || keycode==40)  {
					
					id_almacen=document.getElementById("almacen").value;
					permito_alta=false;

					if (id_almacen.length==3) {

								buscaAlmacen(id_almacen);

					if (existe_almacen) {
						    				enfoca("codigo");

									} else { 
											alert("Almacen Inexistente");	
											enfoca("almacen");
								}
							}
						}
					});



			$("#codigo").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==13 || keycode==40)  {

					id_codigo=document.getElementById("codigo").value;

					if (id_codigo.length==12) {

									permito_alta=false;
									
									buscaStock(id_almacen, id_codigo);

									if (existe_stock) {
						    						alert("Stock ya existe");	
													permito_alta=false;
													enfoca("codigo");
												} else {	 
															
															buscaPrecio(id_codigo);

															if (!existe_precios) {
																					alert("Articulo no creado");
																					permito_alta=false;
																					enfoca("codigo");
																				} else {
																						enableStocks();
																						permito_alta=true; 
								    													enfoca("ubi_calle");

																					}
													}
							}
				}
				if(keycode==38 && operacion=="alta")  {
					enfoca("almacen");
				}
		});

				$("#ubi_calle").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==13 || keycode==40)  {
					enfoca("ubi_pasillo");
				}
				if(keycode==38 && operacion=="alta")  {
					enfoca("codigo");
				}
			});

				$("#ubi_pasillo").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==13 || keycode==40)  {
					enfoca("ubi_numero");
				}
				if(keycode==38)  {
					enfoca("ubi_calle");
				}
			});

				$("#ubi_numero").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==13 || keycode==40)  {
					enfoca("minimo");
				}
				if(keycode==38)  {
					enfoca("ubi_pasillo");
				}
			});

				$("#minimo").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==13 || keycode==40)  {
					enfoca("p_pedido");
				}
				if(keycode==38)  {
					enfoca("ubi_numero");
				}
			});

				$("#p_pedido").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==13 || keycode==40)  {
					enfoca("faltas");
				}
				if(keycode==38)  {
					enfoca("minimo");
				}
			});	

				$("#faltas").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				
				if(keycode==38)  {
					enfoca("p_pedido");
				}
			});

				$("#desdecodigo").on('keyup', function(e){
					var keycode= e.keyCode || e.which;
					if(keycode==13 || keycode==40) {
						desdeCodigo();
					}
				});
			
	}
			$("#codigo").focus(function(){

				disableStocks();

			});

			$("#almacen").focus(function(){

				disableStocks();

			});

	function buscaStock(id_almacen, id_codigo) {

			existe_stock=false;

			var xmlhttp;
			if(window.XMLHttpRequest) {
				xmlhttp = new XMLHttpRequest();
				} else {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function () {
				if (this.readyState === 4 && this.status === 200) {

					var respuesta=xmlhttp.responseText;

					if (respuesta.includes("INEXISTENTE")) {

					existe_stock=false;

					} else

					 {
					 	
						existe_stock=true;
				}
			}
		}
		xmlhttp.open("GET", "../modelo/modelo_stocks.php?busca_stock="+"si"+"&id_almacen="+id_almacen+"&id_codigo="+id_codigo, false);
		xmlhttp.send();
	}

	function buscaPrecio(id_codigo){

			existe_precios=false;

			var xmlhttp;
			if(window.XMLHttpRequest) {
				xmlhttp = new XMLHttpRequest();
				} else {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function () {
				if (this.readyState === 4 && this.status === 200) {

					var respuesta=xmlhttp.responseText;
					nombre_articulo=xmlhttp.responseText;
					if (respuesta.includes("INEXISTENTE")) {

					existe_precios=false;

					} else

					 {
					 	
						document.getElementById("descripcion").value=respuesta;
						existe_precios=true;

				}
			}
		}
		xmlhttp.open("GET", "../modelo/modelo_stocks.php?busca_codigo="+"si"+"&id_codigo="+id_codigo, false);
		xmlhttp.send();
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


</script>


					