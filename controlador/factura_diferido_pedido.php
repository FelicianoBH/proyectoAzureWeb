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
			      			<div ></div>
			      	</div>
			      	<div class="col-md-4">
			      			<div id="programa-en-curso" >
			      				 FACTURAR PEDIDO EN DIFERIDO
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
			<div class="container" style="border: 1px solid;padding:15px;"  >

				<div class="row">
			      <div class="col-md-4">
			      			<div style="font-weight:bold;font-size:17px">Generar FACTURA a partir de un PEDIDO:</div>
			  	  </div>
			      <div class="col-md-2">
			      			<div>
					  			<button class = "btn btn-success" onclick="unicoPedido()">Un Pedido</button>
			      			</div>
			      </div>
			      <div class="col-md-2">
			      			<div>
			      				<button class = "btn btn-success" onclick="editarCabecera(this.id)">Varios (selección) </button>
			      			</div>
			      </div>
			    </div>
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
			      				
			      			<div>PEDIDO:
					  			<input type="text" readonly id="numero_factura"  size="14"/>
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
					  			<input type="text" readonly id="total_fac" size="3" maxlength="6" style="width:90px;height:28px;font-weight:bold;"/>
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
	var nombre_art="";
	var id_articulo="";
	var unidades=0;
	var g_almacen_d="";
	var g_almacen_o="";
	var g_articulo="";
	var g_unidades="";
	var g_descuento_por="";
	var descuento_por="";
	var g_documento="";
	var e_s="";
	var ordenactual=0;
	var fecha;
	var origen="";
	var desdecodigo="";
	var desdealmacen="";
	var pre_descripcion="";
	var	pre_precio_1=0.0;
	var	pre_tipo_iva=0;
	var	iva_por=0.0;
	var pre_iva_importe=0.0;
	var pre_precio_linea=0.0;
	var pre_dto_importe=0.0;
	var precio_final=0.0;
	var total_linea=0.0;		
	var iva_tipo=[7];
	var numero_linea=0;
	var numero_factura=0;
	var nuevo_numero=0;
	var operacion="";
	var cliente_valido="false";
	var almacen_valido="false";
	var nombre_cliente="";
	var direccion_cliente="";
	var nif_cliente="";
	var tlf_cliente="";
	var cliente_valido=false;
	var almacen_valido=false;

	var ed_cliente="";
	var ed_cliente_nombre="";
	var ed_nif="";
	var ed_direccion="";
	var ed_tlf="";
	var ed_alm_vta="";
	var ed_alm_descripcion="";
	var ed_observaciones="";
	var gr_importe_neto="";

	var anterior_alm_ori="";
	var anterior_articulo="";
	var anterior_descripcion="";
	var anterior_precio="";
	var anterior_unidades="";
	var anterior_tipo_iva="";
	var anterior_iva_por="";
	var anterior_iva_importe="";
	var anterior_descuento_por="";
	var anterior_descuento_importe="";
	var anterior_importe_linea="";
	var anterior_importe_neto="";
	var gr_alm_ori="";
	var gr_articulo="";
	var gr_descripcion="";
	var gr_precio="";
	var gr_unidades="";
	var gr_tipo_iva="";
	var gr_iva_por="";
	var gr_iva_importe="";
	var gr_descuento_por="";
	var gr_descuento_importe="";
	var gr_importe_linea="";
	var numero_pedido="";
	var sw_consulta=false;
	var g_numero_pedido="";


		function irAtras(){

			window.history.back();
		}


		function unicoPedido(){

					sw_consulta=true;
					document.getElementById("leyenda").innerHTML="Seleccionar un Pedido";
					document.getElementById("nuevaVentana").style.width="70%";
					overlay.style.opacity = .7;
					if (overlay.style.display == "block") {
						overlay.style.display="none";
						nuevaVentana.style.display="none";
					} else {
						overlay.style.display="block";
						nuevaVentana.style.display="block";
					}
					resultadoconsulta.innerHTML=
					'<div class="container">'+
						'<div class="row">'+
							'<div class="col-md-2">'+
				    	  		'<div></div>'+
				    	  	'</div>'+
							'<div class="col-md-4">'+
								'<div style="font-size:16px;font-weight:bold;">Pedido núm.:'+'<input type="text" id="numero_pedido" size="14" onchange="leoPedido()"/>'+
				    	  			'</div>'+
				      		'</div>'+
				 	     	'<div class="col-md-1">'+
				    	  		'<div></div>'+
				      		'</div>'+
				 	     	'<div class="col-md-3">'+
				    	  		'<div>'+
				      			'<button onclick="preparoMostrarPedidos()" class="btn btn-info">CONSULTAR PEDIDOS</button>'+
				      			'</div>'+
				      		'</div>'+
				      	'</div>'+
				     '</div>';

				}

		/*function consultarPedidos() {

				resultadoconsulta.innerHTML=
					'<div class="container">'+
						'<div class="row">'+
							'<div class="col-md-4">'+
				    	  		'<div style="font-size:18px;font-weight:bold;">Consulta de Pedidos'+'</div>'+
				    	  	'</div>'+
							'<div class="col-md-4">'+
								'<div style="font-size:16px;font-weight:bold;">Desde núm:'+'<input type="text" id="desde_numero_pedido" size="14" onchange="consultaDesdePedido()"/>'+
				    	  			'</div>'+
				      		'</div>'+
				      	'</div>'+
				     '</div>';

		}
		*/

		function preparoMostrarPedidos() {
			
			var xmlhttp;

			if(window.XMLHttpRequest) {
				xmlhttp = new XMLHttpRequest();
				} else {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function () {
				if (this.readyState === 4 && this.status === 200) {
 				num_registros = xmlhttp.responseText;
 				numero_linea=num_registros;
				mostrarPedidos(1);
				}
		}
		xmlhttp.open("GET", "../modelo/modelo_factura_diferido_pedido.php?acontar_pedidos="+"si", true);
		xmlhttp.send();
	}	

	function mostrarPedidos(pagina) {

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
		xmlhttp.open ("GET", "../modelo/modelo_factura_diferido_pedido.php?consulta_pedidos=" + "si"+"&pagina="+pagina+"&num_paginas="+num_paginas, false);
		xmlhttp.send();
	}

		function consultaDesdePedido() {

			numero_pedido = document.getElementById("desde_numero_pedido").value;

			var xmlhttp;
				if(window.XMLHttpRequest) {
					xmlhttp = new XMLHttpRequest();
				} else {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function () {
					if (this.readyState === 4 && this.status === 200) {

						resultadoconsulta.innerHTML=xmlhttp.responseText;
						
					}
				}
				xmlhttp.open("GET", "../modelo/modelo_factura_diferido_pedido.php?consulta_pedidos="+"si"+"&desde_numero_pedido="+desde_numero_pedido, false);
				xmlhttp.send();
		}

		function seleccionaPedido(pedido_numero) {

			overlay.style.display="none";
			nuevaVentana.style.display="none";
			numero_pedido=pedido_numero;
			numero_factura=numero_pedido;
			
			veoCab();

		}

		function generarLaFactura(){

			var confirmar = confirm("CONFIRMA GENERAR FACTURA DE ESTE PEDIDO ?");

			if (confirmar) {
				leerRef();
				nuevo_numero=numero_factura;
				nuevo_numero++;
				grabaRefNumeroFac();
				generaFacturaCab();
				generaFacturaLin();
				generaHPedCab();
				generaHPedLin();
				borraPedCab();
				borraPedLin();
				leerRef();
			 	document.getElementById("estado").value="";
			 	document.getElementById("numero_factura").value="";
			 	document.getElementById("cliente").value="";
			 	document.getElementById("direccion").value="";
			 	document.getElementById("tlf").value="";
			 	document.getElementById("alm_vta").value="";
			 	document.getElementById("dtos").value="";
			 	document.getElementById("impuestos").value="";
			 	document.getElementById("total_fac").value="";
			 	document.getElementById("cliente_nombre").value="";
			 	document.getElementById("nif").value="";
			 	resultado_plus.innerHTML = "";
			}
		}
		function borraPedCab() {

				var xmlhttp;
				if(window.XMLHttpRequest) {
					xmlhttp = new XMLHttpRequest();
				} else {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function () {
					if (this.readyState === 4 && this.status === 200) {

						resultadoconsulta.innerHTML=xmlhttp.responseText;
						
					}
				}
				xmlhttp.open("GET", "../modelo/modelo_factura_diferido_pedido.php?borra_ped_cab="+"si"+"&numero_pedido="+numero_pedido, false);
				xmlhttp.send();
		}
		function borraPedLin() {

				var xmlhttp;
				if(window.XMLHttpRequest) {
					xmlhttp = new XMLHttpRequest();
				} else {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function () {
					if (this.readyState === 4 && this.status === 200) {

						resultadoconsulta.innerHTML=xmlhttp.responseText;
						
					}
				}
				xmlhttp.open("GET", "../modelo/modelo_factura_diferido_pedido.php?borra_ped_lin="+"si"+"&numero_pedido="+numero_pedido, false);
				xmlhttp.send();
		}
		function generaHPedLin() {

				var xmlhttp;
				if(window.XMLHttpRequest) {
					xmlhttp = new XMLHttpRequest();
				} else {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function () {
					if (this.readyState === 4 && this.status === 200) {

						resultadoconsulta.innerHTML=xmlhttp.responseText;
						
					}
				}
				xmlhttp.open("GET", "../modelo/modelo_factura_diferido_pedido.php?genera_historico_pedido_lin="+"si"+"&numero_pedido="+numero_pedido+"&nuevo_numero="+nuevo_numero, false);
				xmlhttp.send();
		}

		function generaHPedCab() {

				var xmlhttp;
				if(window.XMLHttpRequest) {
					xmlhttp = new XMLHttpRequest();
				} else {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function () {
					if (this.readyState === 4 && this.status === 200) {

						resultadoconsulta.innerHTML=xmlhttp.responseText;
						
					}
				}
				xmlhttp.open("GET", "../modelo/modelo_factura_diferido_pedido.php?genera_historico_pedido_cab="+"si"+"&numero_pedido="+numero_pedido+"&nuevo_numero="+nuevo_numero, false);
				xmlhttp.send();
		}

		function generaFacturaCab() {

				var xmlhttp;
				if(window.XMLHttpRequest) {
					xmlhttp = new XMLHttpRequest();
				} else {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function () {
					if (this.readyState === 4 && this.status === 200) {

						resultadoconsulta.innerHTML=xmlhttp.responseText;
						
					}
				}
				xmlhttp.open("GET", "../modelo/modelo_factura_diferido_pedido.php?genera_factura_cab="+"si"+"&numero_pedido="+numero_pedido+"&nuevo_numero="+nuevo_numero, false);
				xmlhttp.send();
		}

		function generaFacturaLin() {

				var xmlhttp;
				if(window.XMLHttpRequest) {
					xmlhttp = new XMLHttpRequest();
				} else {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function () {
					if (this.readyState === 4 && this.status === 200) {

						resultadoconsulta.innerHTML=xmlhttp.responseText;
						
					}
				}
				xmlhttp.open("GET", "../modelo/modelo_factura_diferido_pedido.php?genera_factura_lineas="+"si"+"&numero_pedido="+numero_pedido+"&nuevo_numero="+nuevo_numero, false);
				xmlhttp.send();
		}


		function leoPedido(){

			numero_pedido=document.getElementById("numero_pedido").value;
			numero_factura=numero_pedido;
			veoCab();

		}
		function agregarLineas(){

					document.getElementById("leyenda").innerHTML="Agregar Linea";
					document.getElementById("nuevaVentana").style.width="60%";
					overlay.style.opacity = .7;
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
						cargaTeclas();
					}
				}
				xmlhttp.open("GET", "../modelo/modelo_factura_diferido_pedido.php?crear_pedido="+"si", false);
				xmlhttp.send();

		}
	
		

		function editarLinea(num_linea) {


					document.getElementById("leyenda").innerHTML="Editar Linea";
					document.getElementById("nuevaVentana").style.width="60%";
					overlay.style.opacity = .7;
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
						resultadoconsulta.innerHTML+='<button class = "btn btn-success" onclick="guardarCambiosLinea('+num_linea+')" style="margin-left:75%;">GRABAR CAMBIOS</button>';
						muestraLinea(num_linea);
						guardoLinea();
						cargaTeclas();
					}
				}
				xmlhttp.open("GET", "../modelo/modelo_factura_diferido_pedido.php?detalle_linea="+"si", false);
				xmlhttp.send();

		}
		function guardoLinea() {

				anterior_alm_ori=document.getElementById("fl_almacen_ori").value;
				anterior_articulo=document.getElementById("fl_codigo").value;
				anterior_descripcion=document.getElementById("fl_descripcion").value;
				anterior_precio=document.getElementById("fl_precio").value;
				anterior_unidades=document.getElementById("fl_unidades").value;
				anterior_tipo_iva=document.getElementById("fl_tipo_iva").value;
				anterior_iva_por=document.getElementById("fl_iva_porcentaje").value;
				anterior_iva_importe=document.getElementById("fl_iva_importe").value;
				anterior_descuento_por=document.getElementById("fl_dto_porcentaje").value;
				anterior_descuento_importe=document.getElementById("fl_dto_importe").value;
				anterior_importe_linea=document.getElementById("fl_total_linea").value;
				anterior_importe_neto=anterior_precio*anterior_unidades;
		}

		function detallesLinea(num_linea){

				document.getElementById("leyenda").innerHTML="Detalle Linea";
					document.getElementById("nuevaVentana").style.width="60%";
					overlay.style.opacity = .7;
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

						document.getElementById("fl_almacen_ori").disabled=true;
						document.getElementById("fl_almacen_descripcion").disabled=true;
						document.getElementById("fl_codigo").disabled=true;
						document.getElementById("fl_descripcion").disabled=true;
						document.getElementById("fl_precio").disabled=true;
						document.getElementById("fl_precio_con_dto").disabled=true;
						document.getElementById("fl_precio_final").disabled=true;
						document.getElementById("fl_unidades").disabled=true;
						document.getElementById("fl_tipo_iva").disabled=true;
						document.getElementById("fl_iva_porcentaje").disabled=true;
						document.getElementById("fl_iva_importe").disabled=true;
						document.getElementById("fl_dto_porcentaje").disabled=true;
						document.getElementById("fl_dto_importe").disabled=true;
						document.getElementById("fl_total_linea").disabled=true;
						muestraLinea(num_linea);
					}
				}
				xmlhttp.open("GET", "../modelo/modelo_factura_diferido_pedido.php?detalle_linea="+"si", false);
				xmlhttp.send();

		}


		function muestraLinea(num_linea) {

				var buenjason=true;
				var xmlhttp;
				if(window.XMLHttpRequest) {
					xmlhttp = new XMLHttpRequest();
				} else {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function () {
					if (this.readyState === 4 && this.status === 200) {

						var respuestalin=xmlhttp.responseText;
						
						try {
							JSON.parse(respuestalin);
						} catch(e) {
							 buenjason=false;
						}

						if (buenjason) {
			 			var obj = JSON.parse(xmlhttp.responseText);
			 			document.getElementById("fl_almacen_ori").value=obj.alm_ori;
						document.getElementById("fl_almacen_descripcion").value=obj.almacen_descripcion;
						document.getElementById("fl_codigo").value=obj.codigo;
						document.getElementById("fl_descripcion").value=obj.descripcion;
						document.getElementById("fl_precio").value=obj.precio;
						document.getElementById("fl_precio_con_dto").value=obj.precio-obj.descuento_importe;
						document.getElementById("fl_precio_final").value=obj.precio_sin_iva;
						document.getElementById("fl_unidades").value=obj.unidades;
						document.getElementById("fl_tipo_iva").value=obj.tipo_iva;
						document.getElementById("fl_iva_porcentaje").value=obj.iva_porcentaje;
						document.getElementById("fl_iva_importe").value=obj.importe_iva;
						document.getElementById("fl_dto_porcentaje").value=obj.descuento_por;
						document.getElementById("fl_dto_importe").value=obj.descuento_importe;
						document.getElementById("fl_total_linea").value=obj.importe_linea;
						}
					}
				}
				xmlhttp.open("GET", "../modelo/modelo_factura_diferido_pedido.php?muestra_linea="+"si"+"&num_albaran="+g_numero_pedido+"&num_linea="+num_linea, false);
				xmlhttp.send();
			}	

		function borrarLinea(num_linea) {

				var confirma=confirm("Conforme Borrar Linea?");
				if (confirma){
							var xmlhttp;
							if(window.XMLHttpRequest) {
								xmlhttp = new XMLHttpRequest();
							} else {
								xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
							}
							xmlhttp.onreadystatechange = function () {
								if (this.readyState === 4 && this.status === 200) {
									resultadoconsulta.innerHTML=xmlhttp.responseText;
									//actualizaCabBorrado();
									preparoMostrarFacLineas();
								}
							}
						xmlhttp.open("GET", "../modelo/modelo_factura_diferido_pedido.php?borrar_linea="+"si"+"&num_albaran="+g_numero_pedido+"&num_linea="+num_linea, false);
							xmlhttp.send();
				}
		}

        
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
		xmlhttp.open("GET", "../modelo/modelo_factura_diferido_pedido.php?acontar_precios="+"si",true);
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
						resultado.innerHTML = xmlhttp.responseText;
					}
				}
				xmlhttp.open ("GET", "../modelo/modelo_factura_diferido_pedido.php?precios=" + "si"+"&pagina="+pagina+"&num_paginas="+num_paginas+"&desdecodigo="+desdecodigo, true);
				xmlhttp.send();
	}
 	
	function preparoMostrarFacLineas() {
			
			
			var xmlhttp;

			if(window.XMLHttpRequest) {
				xmlhttp = new XMLHttpRequest();
				} else {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function () {
				if (this.readyState === 4 && this.status === 200) {
 				num_registros = xmlhttp.responseText;
 				numero_linea=num_registros;
				mostrarFacLineas(1);
				}
		}
		xmlhttp.open("GET", "../modelo/modelo_factura_diferido_pedido.php?acontar_alblineas="+"si"+"&numero_factura="+numero_factura, true);
		xmlhttp.send();
	}
	
	function mostrarFacLineas(pagina) {

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

						resultado_plus.innerHTML = xmlhttp.responseText;
						overlay.style.display="none";
						nuevaVentana.style.display="none";
						g_numero_pedido=numero_factura;
					}
				}
		xmlhttp.open ("GET", "../modelo/modelo_factura_diferido_pedido.php?alb_lineas=" + "si"+"&pagina="+pagina+"&num_paginas="+num_paginas+"&numero_factura="+numero_factura, false);
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

		num_paginas= Math.ceil(num_registros/8);

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
					document.getElementById("almacen_ori").value=id;
					document.getElementById("descripcion_ori").value = nombre_almacen;
					g_almacen_o=id;
					inhabilita("almacen_ori");
					habilita("codigo");
					enfoca("codigo");
				}  else {
					document.getElementById("almacen_des").value=id;
					document.getElementById("descripcion_des").value = nombre_almacen;
					g_almacen_d=id;
					inhabilita("almacen_des");
					habilita("unidades");
					enfoca("unidades");
			}
		}

	

	function seleccionarPrecio(id) {

			overlay.style.display="none";
			nuevaVentana.style.display="none";
			buscaArticulo(id, g_almacen_o);
			if (existe_art) {
								document.getElementById("codigo").value = id;
								document.getElementById("descripcion_art").value = nombre_art;
								g_articulo=id;
								id_articulo=id;
								inhabilita("codigo");
								habilita("almacen_des");
								enfoca("almacen_des");

						} else {
								alert("STOCK INEXISTENTE");
								enfoca("codigo");
								}
		}
 
	function veoStatus(){

		if (operacion=="inicio") {

				veoCab();

		}
	}
		

	function veoCab() {


				var buenjason=true;

				var xmlhttp;

				if(window.XMLHttpRequest) {
					xmlhttp = new XMLHttpRequest();
				} else {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
					xmlhttp.onreadystatechange = function () {
					if (this.readyState === 4 && this.status === 200) {

						var respuestacab=xmlhttp.responseText;
						
						try {
							JSON.parse(respuestacab);
						} catch(e) {
							 buenjason=false;
						}


						if (buenjason) {

			 			var obj = JSON.parse(xmlhttp.responseText);
			 			document.getElementById("fecha").value=obj.fecha;
			 			document.getElementById("estado").value=obj.estado;
			 			document.getElementById("numero_factura").value=numero_factura;
			 			document.getElementById("cliente").value=obj.cliente;
			 			document.getElementById("direccion").value=obj.domicilio;
			 			document.getElementById("tlf").value=obj.tlf;
			 			document.getElementById("alm_vta").value=obj.almacen_vta;
			 			document.getElementById("dtos").value=obj.importe_dto;
			 			document.getElementById("impuestos").value=obj.importe_iva;
			 			document.getElementById("total_fac").value=obj.importe_total;
			 			buscaCliente(obj.cliente);
			 			document.getElementById("cliente_nombre").value=nombre_cliente;
			 			document.getElementById("nif").value=nif_cliente;
			 			buscaAlmacen(obj.almacen_vta);

			 			ed_cliente=obj.cliente;
			 			ed_cliente_nombre=nombre_cliente;
			 			ed_nif=nif_cliente;
			 			ed_direccion=obj.domicilio;
			 			ed_tlf=obj.tlf;
			 			ed_alm_vta=obj.almacen_vta;
			 			ed_alm_descripcion=nombre_almacen;
			 			ed_observaciones=obj.observaciones;

			 			
			 			preparoMostrarFacLineas();
						} else { 
								alert(" Inexistente");

							}
					}
				}
				xmlhttp.open ("GET", "../modelo/modelo_factura_diferido_pedido.php?veo_cab=" + "si"+"&numero_factura="+numero_factura, false);
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
			 			numero_factura=obj.numero_factura;
			 			fecha=obj.fechaRef;
			 			iva_tipo[0]=obj.iva_1;
			 			iva_tipo[1]=obj.iva_2;
			 			iva_tipo[2]=obj.iva_3;
			 			iva_tipo[3]=obj.iva_4;
			 			iva_tipo[4]=obj.iva_5;
			 			iva_tipo[5]=obj.iva_6;
			 			iva_tipo[6]=obj.iva_7;
						document.getElementById("fecha").value=obj.fechaRef_ed;
						} else { 
								alert("Referencias de Usuario no habilitadas, NO puede grabar apunte nuevo");
							}
			}
		}
		xmlhttp.open("GET", "../modelo/modelo_factura_diferido_pedido.php?leer_ref="+"si", false);
		xmlhttp.send(); 
		actualizando=false;	     
	}

	function grabarLinea() {

		var confirma=confirm("Grabar linea de albaran?");

			if (confirma) {

				calculaDto();
				var gr_alm_ori=document.getElementById("fl_almacen_ori").value;
				var gr_articulo=document.getElementById("fl_codigo").value;
				var gr_descripcion=document.getElementById("fl_descripcion").value;
				var gr_precio=document.getElementById("fl_precio").value;
				var gr_unidades=document.getElementById("fl_unidades").value;
				var gr_tipo_iva=document.getElementById("fl_tipo_iva").value;
				var gr_iva_por=document.getElementById("fl_iva_porcentaje").value;
				var gr_iva_importe=document.getElementById("fl_iva_importe").value;
				var gr_descuento_por=document.getElementById("fl_dto_porcentaje").value;
				var gr_descuento_importe=document.getElementById("fl_dto_importe").value;
				gr_importe_linea=document.getElementById("fl_total_linea").value;
				numero_linea++;
				var xmlhttp;
				if(window.XMLHttpRequest) {
					xmlhttp = new XMLHttpRequest();
					} else {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
				xmlhttp.onreadystatechange = function () {
				if (this.readyState === 4 && this.status === 200) {
					regrabaCab();
					limpiaCampos();
					enfoca("fl_almacen_ori");
				}
			}
				xmlhttp.open("GET", "../modelo/modelo_factura_diferido_pedido.php?graba_linea="+"si"+"&numero_factura="+numero_factura+"&numero_linea="+numero_linea+"&almacen_ori="+gr_alm_ori+"&articulo="+gr_articulo+"&descripcion="+gr_descripcion+"&unidades="+gr_unidades+"&precio="+gr_precio+"&tipo_iva="+gr_tipo_iva+"&iva_por="+gr_iva_por+"&iva_importe="+gr_iva_importe+"&descuento_por="+gr_descuento_por+"&descuento_importe="+gr_descuento_importe+"&precio_sin_iva="+pre_precio_linea+"&importe_linea="+gr_importe_linea, false);
				xmlhttp.send();
		}
	}

	function guardarCambiosLinea(num_linea) {

		var confirma=confirm("Grabar cambios?");

			if (confirma) {

				calculaDto();
				 gr_alm_ori=document.getElementById("fl_almacen_ori").value;
				 gr_articulo=document.getElementById("fl_codigo").value;
				 gr_descripcion=document.getElementById("fl_descripcion").value;
				 gr_precio=document.getElementById("fl_precio").value;
				 gr_unidades=document.getElementById("fl_unidades").value;
				 gr_tipo_iva=document.getElementById("fl_tipo_iva").value;
				 gr_iva_por=document.getElementById("fl_iva_porcentaje").value;
				 gr_iva_importe=document.getElementById("fl_iva_importe").value;
				 gr_descuento_por=document.getElementById("fl_dto_porcentaje").value;
				 gr_descuento_importe=document.getElementById("fl_dto_importe").value;
				 gr_importe_linea=document.getElementById("fl_total_linea").value;
				
				var xmlhttp;
				if(window.XMLHttpRequest) {
					xmlhttp = new XMLHttpRequest();
					} else {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
				xmlhttp.onreadystatechange = function () {
				if (this.readyState === 4 && this.status === 200) {
					
					actualizaCab();
					preparoMostrarFacLineas();
					overlay.style.display="none";
					nuevaVentana.style.display="none";
				}
			}
				xmlhttp.open("GET", "../modelo/modelo_factura_diferido_pedido.php?regraba_linea="+"si"+"&numero_factura="+g_numero_pedido+"&numero_linea="+num_linea+"&almacen_ori="+gr_alm_ori+"&articulo="+gr_articulo+"&descripcion="+gr_descripcion+"&unidades="+gr_unidades+"&precio="+gr_precio+"&tipo_iva="+gr_tipo_iva+"&iva_por="+gr_iva_por+"&iva_importe="+gr_iva_importe+"&descuento_por="+gr_descuento_por+"&descuento_importe="+gr_descuento_importe+"&precio_sin_iva="+pre_precio_linea+"&importe_linea="+gr_importe_linea, false);
				xmlhttp.send();
		}
	}
	function actualizaCab() {

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
				xmlhttp.open("GET", "../modelo/modelo_factura_diferido_pedido.php?actualiza_cab="+"si"+"&numero_factura="+numero_factura+"&old_importe_neto="+anterior_importe_neto+"&new_importe_neto="+gr_importe_neto+"&old_descuento_importe="+anterior_descuento_importe+"&new_descuento_importe="+gr_descuento_importe+"&old_iva_importe="+anterior_iva_importe+"&new_iva_importe="+gr_iva_importe+"&old_importe_total="+anterior_importe_linea+"&new_importe_total="+gr_importe_linea, false);

				xmlhttp.send();

	}
	function regrabaCab() {

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
				xmlhttp.open("GET", "../modelo/modelo_factura_diferido_pedido.php?regraba_cab="+"si"+"&numero_factura="+numero_factura+"&importe_neto="+gr_importe_neto+"&descuento_importe="+pre_dto_importe+"&iva_importe="+pre_iva_importe+"&importe_total="+gr_importe_linea, false);

				xmlhttp.send();


	}
	function limpiaCampos(){

				 document.getElementById("fl_almacen_ori").value="";
				 document.getElementById("fl_almacen_descripcion").value="";
				 document.getElementById("fl_codigo").value="";
				 document.getElementById("fl_descripcion").value="";
				 document.getElementById("fl_precio").value=" ";
				 document.getElementById("fl_precio_con_dto").value="";
				 document.getElementById("fl_precio_final").value="";
				 document.getElementById("fl_unidades").value="";
				 document.getElementById("fl_tipo_iva").value="";
				 document.getElementById("fl_iva_porcentaje").value="";
				 document.getElementById("fl_iva_importe").value="";
				 document.getElementById("fl_dto_porcentaje").value="";
				 document.getElementById("fl_dto_importe").value="";
				 document.getElementById("fl_total_linea").value="";
	}

	function limpiaCabecera(){

				 document.getElementById("cc_cliente").value="";
				 document.getElementById("cc_cliente_nombre").value="";
				 document.getElementById("cc_cliente_nif").value="";
				 document.getElementById("cc_cliente_direccion").value="";
				 document.getElementById("cc_cliente_tlf").value=" ";
				 document.getElementById("cc_alm_vta").value="";
				 document.getElementById("cc_alm_descripcion").value="";
				 document.getElementById("cc_observaciones").value="";

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
						almacen_valido=false;
					} else {
						existe_alm=true;
						almacen_valido=true;

					}
					nombre_almacen=recibo; 
				}
			}
				xmlhttp.open("GET", "../modelo/modelo_factura_diferido_pedido.php?busca_almacen="+"si"+"&id_almacen="+id_almacen,false);
				xmlhttp.send();
	}

	function buscaCliente(id_cliente) {

			var buenjason=true;
			var xmlhttp;
				if(window.XMLHttpRequest) {
					xmlhttp = new XMLHttpRequest();
					} else {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
				xmlhttp.onreadystatechange = function () {

				if (this.readyState === 4 && this.status === 200) {

						var respuestacli=xmlhttp.responseText;
						
						try {
							JSON.parse(respuestacli);
						} catch(e) {
							 buenjason=false;
						}

					if (buenjason) {

			 			var obj = JSON.parse(xmlhttp.responseText);

						nombre_cliente=obj.nombre;
						direccion_cliente=obj.direccion;
						nif_cliente=obj.nif;
						tlf_cliente=obj.tlf;
						cliente_valido=true;

						} else { 
								cliente_valido=false;
							}
					}
				}
			
				xmlhttp.open("GET", "../modelo/modelo_factura_diferido_pedido.php?busca_cliente="+"si"+"&id_cliente="+id_cliente,false);
				xmlhttp.send();

	}

	function buscaPrecios(id_articulo) {

				var buenjason=true;
				var xmlhttp;
				if(window.XMLHttpRequest) {
					xmlhttp = new XMLHttpRequest();
					} else {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
				xmlhttp.onreadystatechange = function () {
				if (this.readyState === 4 && this.status === 200) {
					var recibo=xmlhttp.responseText;

						var respuestapre=xmlhttp.responseText;

						try {
							JSON.parse(respuestapre);
						} catch(e) {
							 buenjason=false;
						}

					if (buenjason) {

			 			var obj = JSON.parse(xmlhttp.responseText);
						pre_descripcion=obj.descripcion;
						pre_precio_1=obj.precio_1;
						pre_tipo_iva=obj.tipo_iva;
						iva_por=iva_tipo[pre_tipo_iva-1];
						pre_iva_importe=(iva_por*pre_precio_1)/100;
						pre_precio_linea=pre_precio_1+pre_iva_importe;
						existe_precio=true;
						} else { 
								existe_precio=false;
							}
				}
			}
				xmlhttp.open("GET", "../modelo/modelo_factura_diferido_pedido.php?busca_precio="+"si"+"&id_articulo="+id_articulo,false);
				xmlhttp.send();
	}
	function calculaDto() {

			gr_importe_neto=pre_precio_1*unidades;
			pre_dto_importe=(pre_precio_1*g_descuento_por)/100;
			pre_precio_linea=pre_precio_1-pre_dto_importe;
			pre_iva_importe=(iva_por*pre_precio_linea)/100;
			precio_final=pre_precio_linea+pre_iva_importe;
			total_linea=precio_final*unidades;
			document.getElementById("fl_dto_importe").value=pre_dto_importe;
			document.getElementById("fl_precio_con_dto").value=pre_precio_linea;
			document.getElementById("fl_iva_importe").value=pre_iva_importe;
			document.getElementById("fl_precio_final").value=precio_final;
			document.getElementById("fl_total_linea").value=total_linea;

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

			if (existe_o && existe_d && existe_art) { 
					
					g_documento=document.getElementById("documento").value;
					grabarHistorico_o();
					grabarHistorico_d();
					grabarStocks_o();
					grabarStocks_d();
					leerRef();
					grabaRef();
					ponEnBlanco();
		} else {
			alert("Revise que existan Almacenes y Artículo");
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
				xmlhttp.open("GET", "../modelo/modelo_traslados.php?graba_historico_o="+"si"+"&id_almacen_o="+g_almacen_o+"&id_almacen_d="+g_almacen_d+"&codigo="+g_articulo+"&unidades="+g_unidades+"&documento="+g_documento+"&fecha="+fecha+"&orden="+ordenactual,false);
				xmlhttp.send();
	}
		function grabarHistorico_d() {

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
				xmlhttp.open("GET", "../modelo/modelo_traslados.php?graba_historico_d="+"si"+"&id_almacen_o="+g_almacen_o+"&id_almacen_d="+g_almacen_d+"&codigo="+g_articulo+"&unidades="+g_unidades+"&documento="+g_documento+"&fecha="+fecha+"&orden="+ordenactual,false);
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
				xmlhttp.open("GET", "../modelo/modelo_factura_diferido_pedido.php?graba_ref="+"si"+"$numero_linea="+numero_linea,false);
				xmlhttp.send();
	}
		function grabaRefNumeroFac(){

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
				xmlhttp.open("GET", "../modelo/modelo_factura_diferido_pedido.php?graba_ref_numero_fac="+"si", false);
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

		operacion="inicio";
		leerRef();
		//veoStatus();
	}


	function iraPaginaPedidos(){

			var eligepagina=document.getElementById("eligepagina").value;
			if (eligepagina >= 1 && eligepagina <=num_paginas) {
				muestro_pagina= eligepagina;
				mostrarPedidos(muestro_pagina);
			} 
	}

	function retrocedoPaginaPedidos() {

			if (pagina_actual > 1) {
				pagina_actual--;
				muestro_pagina = pagina_actual;
				mostrarPedidos(muestro_pagina);
		}
	}

	function avanzoPaginaPedidos() {

			if (pagina_actual < num_paginas) {
				pagina_actual++;
				muestro_pagina=pagina_actual;
				document.getElementById("eligepagina").innerHTML=muestro_pagina;
				mostrarPedidos(muestro_pagina);
			} 
	}

	function iraPaginaFacLineas(){

			var eligepagina=document.getElementById("eligepagina").value;
			if (eligepagina >= 1 && eligepagina <=num_paginas) {
				muestro_pagina= eligepagina;
				mostrarFacLineas(muestro_pagina);
			} 
	}

	function retrocedoPaginaFacLineas() {

			if (pagina_actual > 1) {
				pagina_actual--;
				muestro_pagina = pagina_actual;
				mostrarFacLineas(muestro_pagina);
		}
	}

	function avanzoPaginaFacLineas() {

			if (pagina_actual < num_paginas) {
				pagina_actual++;
				muestro_pagina=pagina_actual;
				document.getElementById("eligepagina").innerHTML=muestro_pagina;
				mostrarFacLineas(muestro_pagina);
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

			operacion="inicio";
			overlay.style.display="none";
			nuevaVentana.style.display="none";
			if (!sw_consulta) {
				preparoMostrarFacLineas();
			}
			sw_consulta=false;
	}

	function consultaAlmacen(letra){

				if (letra=='a') {
					origen="almacen_ori";
				} else {
					origen="almacen_des";
				}
				document.getElementById("leyenda").innerHTML="Consulta Almacenes";
				overlay.style.opacity = .7;
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

				overlay.style.opacity =.7;

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

	 		$("#fl_almacen_ori").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==13) {
					id_almacen_o=document.getElementById("fl_almacen_ori").value;
					existe_alm=false;
					if (id_almacen_o.length==3) {
												buscaAlmacen(id_almacen_o);
												if (existe_alm) {
															document.getElementById("fl_almacen_descripcion").value= nombre_almacen;
															g_almacen_o=id_almacen_o;
															//inhabilita("fl_almacen_ori");
															//habilita("fl_codigo");
															enfoca("fl_codigo");
													} else {
																alert("ALMACEN DE ORIGEN INEXISTENTE");
																enfoca("fl_almacen_ori");
															}
												} 
									}
					
					if (keycode==40) {
						if (g_almacen_o!="") {
							id_almacen_o=g_almacen_o;
							document.getElementById("almacen_ori").value=g_almacen_o;
							//inhabilita("almacen_ori");
							//habilita("codigo");
							enfoca("codigo");
						}
					}
				});

		 		$("#fl_codigo").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==13) {
					id_articulo=document.getElementById("fl_codigo").value;
					existe_art=false;
					existe_precio=false;
					if (id_articulo.length==12) {
													buscaPrecios(id_articulo);
													if (existe_precio){
															buscaArticulo(id_articulo, id_almacen_o);
															if (existe_art) {
																	document.getElementById("fl_descripcion").value = nombre_art;
																	document.getElementById("fl_precio").value=pre_precio_1;
																	document.getElementById("fl_tipo_iva").value=pre_tipo_iva;
																	document.getElementById("fl_iva_porcentaje").value=iva_por;
																	document.getElementById("fl_iva_importe").value=pre_iva_importe;	
																	g_articulo=id_articulo;
																	//inhabilita("fl_codigo");
																	//habilita("fl_dto_porcentaje");
																	enfoca("fl_dto_porcentaje");

																} else {
																		alert("STOCK INEXISTENTE");
																		enfoca("fl_codigo");
																	}
													}	else {

															 alert("Artículo Inexistente");

															}	
											} 
				}
				if (keycode==38) {
					document.getElementById("fl_codigo").value=g_articulo;
					//inhabilita("fl_codigo");
					//habilita("fl_almacen_ori");
					enfoca("fl_almacen_ori");
				}

				if (keycode==40) {
						if (g_articulo!="") {
							id_articulo=g_articulo;
							document.getElementById("codigo").value=g_articulo;
							//inhabilita("codigo");
							//habilita("fl_dto_porcentaje");
							enfoca("fl_dto_porcentaje");
						}
					}

			});
				$("#fl_dto_porcentaje").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==13) {
					
						descuento_por=document.getElementById("fl_dto_porcentaje").value;

						if (!isNaN(descuento_por)) {
							g_descuento_por=descuento_por;
							calculaDto();
							//habilita("fl_unidades")
							enfoca("fl_unidades");
						} else {
								enfoca ("fl_dto_porcentaje");
							}

				}
				if (keycode==38) {
					document.getElementById("fl_dto_porcentaje").value=g_descuento_por;
					//inhabilita("fl_dto_porcentaje");
					//habilita("fl_codigo")
					enfoca("fl_codigo");

				}
				if (keycode==40) {
						if (g_descuento_por!=""&& !isNaN(descuento_por)) {
							document.getElementById("fl_dto_porcentaje").value=g_descuento_por;
							calculaDto(); 
							//habilita("fl_unidades")
							enfoca("fl_unidades");

						}
					}
			});


			$("#fl_unidades").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==13) {
					
						unidades=document.getElementById("fl_unidades").value;

						if (!isNaN(unidades)) {
							g_unidades=unidades;
							calculaDto();
						} else {
								enfoca ("fl_unidades");
							}

				}
				if (keycode==38) {
					document.getElementById("fl_unidades").value=g_unidades;
					//inhabilita("fl_unidades");
					//habilita("fl_dto_porcentaje")
					enfoca("fl_dto_porcentaje");

				}
				if (keycode==40) {
						if (g_unidades!=""&& !isNaN(unidades)) {
							calculaDto();
							document.getElementById("fl_unidades").value=g_unidades;
						}
					}
			});


			$("#cc_cliente").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==13) {
					
					cc_cliente=document.getElementById("cc_cliente").value;
					cliente_valido=false;
					
					if (cc_cliente.length==6) {
									buscaCliente(cc_cliente);
									if (cliente_valido) {
									document.getElementById("cc_cliente_nombre").value= nombre_cliente;
									document.getElementById("cc_cliente_nif").value= nif_cliente;
									document.getElementById("cc_cliente_direccion").value= direccion_cliente;
									document.getElementById("cc_cliente_tlf").value=tlf_cliente;
									enfoca("cc_alm_vta");
									} else {
										alert("Cliente Inexistente");
										enfoca("cc_cliente");
								}
							} 
						}
					});

			$("#cc_alm_vta").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==13) {
					cc_alm_vta=document.getElementById("cc_alm_vta").value;
					almacen_valido=false;
					if (cc_alm_vta.length==3) {
										buscaAlmacen(cc_alm_vta);
										if (almacen_valido) {
										document.getElementById("cc_alm_descripcion").value= nombre_almacen;
										enfoca("cc_observaciones");
											} else {
												alert("ALMACEN DE VENTA INEXISTENTE");
												enfoca("cc_alm_vta");
										}
									} 
								}
							});

			$("#ed_cliente").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==13) {
					
					ed_cliente=document.getElementById("ed_cliente").value;
					cliente_valido=false;
					
					if (ed_cliente.length==6) {
									buscaCliente(ed_cliente);
									if (cliente_valido) {
									document.getElementById("ed_cliente_nombre").value= nombre_cliente;
									document.getElementById("ed_cliente_nif").value= nif_cliente;
									document.getElementById("ed_cliente_direccion").value= direccion_cliente;
									document.getElementById("ed_cliente_tlf").value=tlf_cliente;
									enfoca("ed_alm_vta");
									} else {
										alert("Cliente Inexistente");
										enfoca("ed_cliente");
								}
							} 
						}
					});

			$("#ed_alm_vta").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==13) {
					ed_alm_vta=document.getElementById("ed_alm_vta").value;
					almacen_valido=false;
					if (ed_alm_vta.length==3) {
										buscaAlmacen(ed_alm_vta);
										if (almacen_valido) {
										document.getElementById("ed_alm_descripcion").value= nombre_almacen;
										enfoca("ed_observaciones");
											} else {
												alert("ALMACEN DE VENTA INEXISTENTE");
												enfoca("ed_alm_vta");
										}
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

		
	}

	function inhabilitaTodo(){
 
			document.getElementById("fl_almacen_ori").disabled=true;
			document.getElementById("fl_almacen_descripcion").disabled=true;
			document.getElementById("fl_codigo").disabled=true;
			document.getElementById("fl_descripcion").disabled=true;
			document.getElementById("fl_precio").disabled=true;
			document.getElementById("fl_unidades").disabled=true;
			document.getElementById("fl_tipo_iva").disabled=true;
			document.getElementById("fl_iva_porcentaje").disabled=true;
			document.getElementById("fl_iva_importe").disabled=true;
			document.getElementById("fl_dto_porcentaje").disabled=true;
			document.getElementById("fl_dto_importe").disabled=true;
			document.getElementById("fl_precio_con_dto").disabled=true;
			document.getElementById("fl_precio_final").disabled=true;
			document.getElementById("fl_total_linea").disabled=true;
							 
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

