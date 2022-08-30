<div id="header-referencias">
		<div id="titulo-referencias">
 			<div> CLIENTES </div>
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

<div id="wrapper" style="margin-left:150px;padding:10px">
	<div id="crud_gral" style="margin-left:0px;"></div>
</div>

<script type="text/javascript">
	
	document.getElementById('lateral-opcion2').style.backgroundColor='#0A4A45';
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
 	var operacion="";
 	var existe_cliente=false;
 	var limite_origen=0.00;

	function mostrarClientes(pagina) {

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
		xmlhttp.open("GET", "../modelo/modelo_clientes.php?clientes="+"si"+"&pagina="+pagina+"&num_paginas="+num_paginas+"&desdecodigo="+desdecodigo, false);
		xmlhttp.send();
	}

	
	function preparoMostrarClientes(){

			var xmlhttp;
			if(window.XMLHttpRequest) {
				xmlhttp = new XMLHttpRequest();
				} else {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function () {
				if (this.readyState === 4 && this.status === 200) {

 				num_registros = xmlhttp.responseText;

				mostrarClientes(1);

				}
		}
		xmlhttp.open("GET", "../modelo/modelo_clientes.php?acontar="+"si"+"&desdecodigo="+desdecodigo, true);
		xmlhttp.send();
	}

	preparoMostrarClientes();

	function desdeCodigo(){

			if (!actualizando) {
			desdecodigo=document.getElementById("desdecodigo").value;
			preparoMostrarClientes();
		} 
	}

	function iraPagina(){

			if (!actualizando) {
			var eligepagina=document.getElementById("eligepagina").value;
			if (eligepagina >= 1 && eligepagina <=num_paginas) {
				muestro_pagina= eligepagina;
				mostrarClientes(muestro_pagina);
			}
		}
	}

	function retrocedoPagina() {

			if (!actualizando) {
			if (pagina_actual > 1) {
				pagina_actual--;
				muestro_pagina = pagina_actual;
				mostrarClientes(muestro_pagina);
			}
		}
	}

	function avanzoPagina() {

			if (!actualizando) {

			if (pagina_actual < num_paginas) {
				pagina_actual++;
				muestro_pagina=pagina_actual;
				document.getElementById("eligepagina").innerHTML=muestro_pagina;
				mostrarClientes(muestro_pagina);
			}
		}
	}
	
	function cierraVentana(){

			overlay.style.display="none";
			nuevaVentana.style.display="none";
			actualizando=false;
	}
	function editarCliente(id) {

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
					 muestraDatos(id);
					 codigo_grabar=id;
					 document.getElementById("leyenda").innerHTML="EDITAR CLIENTE";
					 document.getElementById("codigo").disabled=true;
					 document.getElementById("saldo").disabled=true;
					 document.getElementById("ventas").disabled=true;
	 				}
				}
	 		xmlhttp.open("GET", "../modelo/modelo_clientes.php?formulario="+"si"+"&operacion="+operacion, false);
			xmlhttp.send();
			cargaTeclas();
			enfoca("nif");
	}
}
	function actualizarCliente() {

				var confirma= confirm("¿ Actualizar datos ?");

				if (confirma) {
						var xmlhttp;
						if(window.XMLHttpRequest) {
							xmlhttp = new XMLHttpRequest();
						} else {
							xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
						}
						var nifAc= document.getElementById("nif").value;
						var razonAc= document.getElementById("razon").value;
						var nombreAc= document.getElementById("nombre").value;
						var direccionAc= document.getElementById("direccion").value;
						var telefonoAc= document.getElementById("telefono").value;
						var correoAc= document.getElementById("correo").value;
						var tarifaAc= document.getElementById("tarifa").value;
						var formaAc= document.getElementById("forma").value;
						//var limiteAc= document.getElementById("limite").value;
						var bancoAc= document.getElementById("banco").value;
						limiteAc=limite_origen;
						xmlhttp.onreadystatechange = function () {

							if (this.readyState === 4 && this.status === 200) {
				 				var meresponde=xmlhttp.responseText;
								var mensaje=meresponde;
								if (mensaje.includes("No ejecutado")) {
									alert(meresponde);
								}
									actualizando=false;
				 					cierraVentana();
				 				 	mostrarClientes(pagina_actual);
							}
					}
					xmlhttp.open("GET", "../modelo/modelo_clientes.php?actualizar_cliente="+"si"+"&codigo="+codigo_grabar+"&nif="+nifAc+"&razon="+razonAc+"&nombre="+nombreAc+"&direccion="+direccionAc+"&telefono="+telefonoAc+"&correo="+correoAc+"&tarifa="+tarifaAc+"&forma="+formaAc+"&limite="+limiteAc+"&banco="+bancoAc, true);
						xmlhttp.send();
		} else {
			actualizando=false;
			mostrarClientes(pagina_actual);
		}
	}
		function borrarCliente(id) {

			var respuesta = confirm("Estas seguro de borrar esta Cliente?");
			if (respuesta ===true ) {
				var xmlhttp;
				if(window.XMLHttpRequest) {
					xmlhttp = new XMLHttpRequest();
					} else {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
				xmlhttp.onreadystatechange = function () {
				if (this.readyState === 4 && this.status === 200) {
 				preparoMostrarClientes();
				}
			}
				xmlhttp.open("GET", "../modelo/modelo_clientes.php?borrar="+"si"+"&cliente_borrar="+id,true);
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
				 document.getElementById("leyenda").innerHTML="AGREGAR CLIENTE";
				 cargaTeclas();
 				}
			}
 		xmlhttp.open("GET", "../modelo/modelo_Clientes.php?formulario="+"si"+"&operacion="+operacion, false);
		xmlhttp.send();
		enfoca("codigo");
	}

	function ampliarCliente(id) {

		operacion="consulta";
		//cargaTeclas();
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
				 document.getElementById("leyenda").innerHTML="AMPLIA DATOS";
				 muestraDatos(id);
				 disableCliente();
				 document.getElementById("codigo").disabled=true;
 				}
			}
 		xmlhttp.open("GET", "../modelo/modelo_Clientes.php?formulario="+"si"+"&operacion="+operacion, false);
		xmlhttp.send();
	}


	function muestraDatos(id) {

		document.getElementById("codigo").value=document.getElementById("CLI_CODIGO"+id).innerHTML;
		document.getElementById("nif").value=document.getElementById("CLI_NIF"+id).innerHTML;
		document.getElementById("nif").value=document.getElementById("CLI_NIF"+id).innerHTML;
		document.getElementById("razon").value=document.getElementById("CLI_RAZON"+id).innerHTML;
		document.getElementById("nombre").value=document.getElementById("CLI_NOMBRE"+id).innerHTML;
		document.getElementById("ventas").value=document.getElementById("CLI_VENTAS"+id).innerHTML;
		var ventas=document.getElementById("CLI_VENTAS"+id).innerHTML;
		document.getElementById("saldo").value=document.getElementById("CLI_SALDO"+id).innerHTML;
		document.getElementById("limite").value=document.getElementById("CLI_LIMITE_RIESGO"+id).innerHTML;
		limite_origen=document.getElementById("VALOR"+id).innerHTML;
		document.getElementById("direccion").value=document.getElementById("CLI_DIRECCION"+id).innerHTML;
		document.getElementById("telefono").value=document.getElementById("CLI_TELEFONO"+id).innerHTML;
		document.getElementById("correo").value=document.getElementById("CLI_CORREO"+id).innerHTML;
		document.getElementById("tarifa").value=document.getElementById("CLI_TIPO_TARIFA"+id).innerHTML;
		document.getElementById("forma").value=document.getElementById("CLI_TIPO_PAGO"+id).innerHTML;
		document.getElementById("banco").value=document.getElementById("CLI_BANCO_IBAN"+id).innerHTML;
	}

	function disableCliente() {

		document.getElementById("nif").disabled=true;
		document.getElementById("razon").disabled=true;
		document.getElementById("nombre").disabled=true;
		document.getElementById("ventas").disabled=true;
		document.getElementById("saldo").disabled=true;
		document.getElementById("limite").disabled=true;
		document.getElementById("direccion").disabled=true;
		document.getElementById("telefono").disabled=true;
		document.getElementById("correo").disabled=true;
		document.getElementById("tarifa").disabled=true;
		document.getElementById("forma").disabled=true;
		document.getElementById("banco").disabled=true;

	}
	function enableCliente() {

		
		document.getElementById("nif").disabled=false;
		document.getElementById("razon").disabled=false;
		document.getElementById("nombre").disabled=false;
		document.getElementById("ventas").disabled=false;
		document.getElementById("saldo").disabled=false;
		document.getElementById("limite").disabled=false;
		document.getElementById("direccion").disabled=false;
		document.getElementById("telefono").disabled=false;
		document.getElementById("correo").disabled=false;
		document.getElementById("tarifa").disabled=false;
		document.getElementById("forma").disabled=false;
		document.getElementById("banco").disabled=false;
		
	}

	function agregarCliente() {

			var n_limite=document.getElementById("limite").value;

			if (n_limite=="") {n_limite=0;}
			if (isNaN(n_limite)) {n_limite=0;}
			n_limite=parseFloat(n_limite);

			if (permito_alta) {
				var n_codigo=document.getElementById("codigo").value;	
				var n_nif=document.getElementById("nif").value;	
				var n_razon=document.getElementById("razon").value;	
				var n_nombre=document.getElementById("nombre").value;	
				var n_direccion=document.getElementById("direccion").value;	
				var n_telefono=document.getElementById("telefono").value;	
				var n_correo=document.getElementById("correo").value;	
				var n_tarifa=document.getElementById("tarifa").value;	
				var n_forma=document.getElementById("forma").value;
			 	var n_banco=document.getElementById("banco").value;

			 	var valida=confirm("Confirma Alta de Cliente ?");
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
		 				preparoMostrarClientes();
		 				}
					}
		 		xmlhttp.open("GET", "../modelo/modelo_clientes.php?alta="+"si"+"&codigo="+n_codigo+"&nif="+n_nif+"&razon="+n_razon+"&nombre="+n_nombre+"&direccion="+n_direccion+"&telefono="+n_telefono+"&correo="+n_correo+"&tarifa="+n_tarifa+"&forma="+n_forma+"&limite="+n_limite+"&banco="+n_banco, true);
				xmlhttp.send();
			 } 
		} else { 

			alert("No se puede grabar este Cliente");
		}
	}


	function cargaTeclas() {


			$("#codigo").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==13 || keycode==40)  {

					var id_cliente=document.getElementById("codigo").value;
					
					if (id_cliente.length==6) {

								permito_alta=false;

								buscaCliente(id_cliente);
								
								if (!existe_cliente) {
						    				permito_alta=true;
						    				enableCliente();
						    				enfoca("nif");
									} else { 
											alert("Cliente ya existe");	
											permito_alta=false;
											disableCliente();
											enfoca("codigo");

											 }
						}
			}
		});

				$("#nif").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==13 || keycode==40)  {
					enfoca("razon");
				}
				if(keycode==38 && operacion=="alta")  {
					enfoca("codigo");
				}
			});

				$("#razon").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==13 || keycode==40)  {
					enfoca("nombre");
				}
				if(keycode==38)  {
					enfoca("nif");
				}
			});

				$("#nombre").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==13 || keycode==40)  {
					enfoca("direccion");
				}
				if(keycode==38)  {
					enfoca("razon");
				}
			});

				$("#direccion").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==13 || keycode==40)  {
					enfoca("telefono");
				}
				if(keycode==38)  {
					enfoca("nombre");
				}
			});

				$("#telefono").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==13 || keycode==40)  {
					enfoca("correo");
				}
				if(keycode==38)  {
					enfoca("direccion");
				}
			});	

				$("#correo").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==13 || keycode==40)  {
					enfoca("tarifa");
				}
				if(keycode==38)  {
					enfoca("telefono");
				}
			});

				$("#tarifa").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==13 || keycode==40)  {
					enfoca("forma");
				}
				if(keycode==38)  {
					enfoca("correo");
				}
			});

				$("#forma").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==13 || keycode==40)  {
					enfoca("limite");
				}
				if(keycode==38)  {
					enfoca("tarifa");
				}
			});

				$("#limite").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==13 || keycode==40)  {
					limiteAc=document.getElementById("limite").value;
					limiteAc=limiteAc.replace(/,/g, '.');
					limite_origen=limiteAc;
					enfoca("banco");
				}
				if(keycode==38)  {
					enfoca("forma");
				}
			});

				$('#limite').on('change', function(e) {
					limiteAc=document.getElementById("limite").value;
					limiteAc=limiteAc.replace(/,/g, '.');
					limite_origen=limiteAc;
   				})

				$("#banco").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==38)  {
					enfoca("limite");
				}
			});
				$("#desdecodigo").on('keyup', function(e){
					var keycode= e.keyCode || e.which;
					if(keycode==13 || keycode==40) {
						desdeCodigo();
					}
					
				});
			
	}

	function buscaCliente(id){

			existe_cliente=false;
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

					existe_cliente=false;

					} else

					 {
					 	
						document.getElementById("nombre").value=respuesta;
						existe_cliente=true;

				}
			}
		}
		xmlhttp.open("GET", "../modelo/modelo_clientes.php?buscacliente="+"si"+"&id="+id, false);
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


					