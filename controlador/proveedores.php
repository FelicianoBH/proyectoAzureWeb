<div id="header-referencias">
		<div id="titulo-referencias">
 			<div> PROVEEDORES </div>
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
 	var existe_proveedor=false;
 	var limite_origen=0.00;

	function mostrarProveedores(pagina) {

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
		xmlhttp.open("GET", "../modelo/modelo_proveedores.php?proveedores="+"si"+"&pagina="+pagina+"&num_paginas="+num_paginas+"&desdecodigo="+desdecodigo, false);
		xmlhttp.send();
	}


	function preparoMostrarProveedores(){

			var xmlhttp;
			if(window.XMLHttpRequest) {
				xmlhttp = new XMLHttpRequest();
				} else {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function () {
				if (this.readyState === 4 && this.status === 200) {

 				num_registros = xmlhttp.responseText;

				mostrarProveedores(1);

				}
		}
		xmlhttp.open("GET", "../modelo/modelo_proveedores.php?acontar="+"si"+"&desdecodigo="+desdecodigo, true);
		xmlhttp.send();
	}

	preparoMostrarProveedores();

	function desdeCodigo(){

			if (!actualizando) {
			desdecodigo=document.getElementById("desdecodigo").value;
			preparoMostrarProveedores();
		} 
	}

	function iraPagina(){

			if (!actualizando) {
			var eligepagina=document.getElementById("eligepagina").value;
			if (eligepagina >= 1 && eligepagina <=num_paginas) {
				muestro_pagina= eligepagina;
				mostrarProveedores(muestro_pagina);
			}
		}
	}

	function retrocedoPagina() {

			if (!actualizando) {
			if (pagina_actual > 1) {
				pagina_actual--;
				muestro_pagina = pagina_actual;
				mostrarProveedores(muestro_pagina);
			}
		}
	}

	function avanzoPagina() {

			if (!actualizando) {

			if (pagina_actual < num_paginas) {
				pagina_actual++;
				muestro_pagina=pagina_actual;
				document.getElementById("eligepagina").innerHTML=muestro_pagina;
				mostrarProveedores(muestro_pagina);
			}
		}
	}
	
	function cierraVentana(){

			overlay.style.display="none";
			nuevaVentana.style.display="none";
			actualizando=false;
	}
	function editarProveedor(id) {

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
					 document.getElementById("leyenda").innerHTML="EDITAR PROVEEDOR";
					 document.getElementById("codigo").disabled=true;
					 muestraDatos(id);
					 codigo_grabar=id;
	 				}
				}
	 		xmlhttp.open("GET", "../modelo/modelo_proveedores.php?formulario="+"si"+"&operacion="+operacion, false);
			xmlhttp.send();
			cargaTeclas();
			enfoca("nombre");
	}
}
	function actualizarProveedor() {

				var confirma= confirm("¿ Actualizar datos ?");

				if (confirma) {
						var xmlhttp;
						if(window.XMLHttpRequest) {
							xmlhttp = new XMLHttpRequest();
						} else {
							xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
						}
						var nifAc= document.getElementById("nif").value;
						var nombreAc= document.getElementById("nombre").value;
						var direccionAc= document.getElementById("direccion").value;
						var telefonoAc= document.getElementById("telefono").value;
						var correoAc= document.getElementById("correo").value;
						var bancoAc= document.getElementById("banco").value;
						xmlhttp.onreadystatechange = function () {

							if (this.readyState === 4 && this.status === 200) {
				 				var meresponde=xmlhttp.responseText;
								var mensaje=meresponde;
								if (mensaje.includes("No ejecutado")) {
									alert(meresponde);
								}
									actualizando=false;
				 					cierraVentana();
				 				 	mostrarProveedores(pagina_actual);
							}
					}
					xmlhttp.open("GET", "../modelo/modelo_proveedores.php?actualizar_proveedor="+"si"+"&codigo="+codigo_grabar+"&nif="+nifAc+"&nombre="+nombreAc+"&direccion="+direccionAc+"&telefono="+telefonoAc+"&correo="+correoAc+"&banco="+bancoAc, true);
						xmlhttp.send();
		} else {
			actualizando=false;
			mostrarProveedores(pagina_actual);
		}
	}
		function borrarProveedor(id) {

			var respuesta = confirm("Estas seguro de borrar esta Proveedor?");
			if (respuesta ===true ) {
				var xmlhttp;
				if(window.XMLHttpRequest) {
					xmlhttp = new XMLHttpRequest();
					} else {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
				xmlhttp.onreadystatechange = function () {
				if (this.readyState === 4 && this.status === 200) {
 				preparoMostrarProveedores();
				}
			}
				xmlhttp.open("GET", "../modelo/modelo_proveedores.php?borrar="+"si"+"&proveedor_borrar="+id,true);
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
				 document.getElementById("leyenda").innerHTML="AGREGAR PROVEEDOR";
				 cargaTeclas();
 				}
			}
 		xmlhttp.open("GET", "../modelo/modelo_proveedores.php?formulario="+"si"+"&operacion="+operacion, false);
		xmlhttp.send();
		enfoca("codigo");
	}

	function ampliarProveedor(id) {

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
				 disableProveedor();
				 document.getElementById("codigo").disabled=true;
 				}
			}
 		xmlhttp.open("GET", "../modelo/modelo_Proveedores.php?formulario="+"si"+"&operacion="+operacion, false);
		xmlhttp.send();
	}


	function muestraDatos(id) {

		document.getElementById("codigo").value=document.getElementById("PRO_CODIGO"+id).innerHTML;
		document.getElementById("nif").value=document.getElementById("PRO_NIF"+id).innerHTML;
		document.getElementById("nombre").value=document.getElementById("PRO_NOMBRE"+id).innerHTML;
		document.getElementById("direccion").value=document.getElementById("PRO_DIRECCION"+id).innerHTML;
		document.getElementById("telefono").value=document.getElementById("PRO_TLF"+id).innerHTML;
		document.getElementById("correo").value=document.getElementById("PRO_EMAIL"+id).innerHTML;
		document.getElementById("banco").value=document.getElementById("PRO_BANCO_IBAN"+id).innerHTML;
	}

	function disableProveedor() {

		document.getElementById("nif").disabled=true;
		document.getElementById("nombre").disabled=true;
		document.getElementById("direccion").disabled=true;
		document.getElementById("telefono").disabled=true;
		document.getElementById("correo").disabled=true;
		document.getElementById("banco").disabled=true;

	}
	function enableProveedor() {

		
		document.getElementById("nif").disabled=false;
		document.getElementById("nombre").disabled=false;
		document.getElementById("direccion").disabled=false;
		document.getElementById("telefono").disabled=false;
		document.getElementById("correo").disabled=false;
		document.getElementById("banco").disabled=false;
		
	}

	function agregarProveedor() {


			if (permito_alta) {
				var n_codigo=document.getElementById("codigo").value;	
				var n_nif=document.getElementById("nif").value;	
				var n_nombre=document.getElementById("nombre").value;	
				var n_direccion=document.getElementById("direccion").value;	
				var n_telefono=document.getElementById("telefono").value;	
				var n_correo=document.getElementById("correo").value;	
			 	var n_banco=document.getElementById("banco").value;

			 	var valida=confirm("Confirma Alta de Proveedor ?");
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
		 				preparoMostrarProveedores();
		 				}
					}
		 		xmlhttp.open("GET", "../modelo/modelo_proveedores.php?alta="+"si"+"&codigo="+n_codigo+"&nif="+n_nif+"&nombre="+n_nombre+"&direccion="+n_direccion+"&telefono="+n_telefono+"&correo="+n_correo+"&banco="+n_banco, true);
				xmlhttp.send();
			 } 
		} else { 

			alert("No se puede grabar este Proveedor");
		}
	}


	function cargaTeclas() {


			$("#codigo").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==13 || keycode==40)  {

					var id_proveedor=document.getElementById("codigo").value;
					
					if (id_proveedor.length==3) {

								permito_alta=false;

								buscaProveedor(id_proveedor);
								
								if (!existe_proveedor) {
						    				permito_alta=true;
						    				enableProveedor();
						    				enfoca("nombre");
									} else { 
											alert("Proveedor ya existe");	
											permito_alta=false;
											disableProveedor();
											enfoca("codigo");

											 }
						}
			}
		});

				$("#nombre").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==13 || keycode==40)  {
					enfoca("nif");
				}
				if(keycode==38)  {
					enfoca("codigo");
				}
			});

				$("#nif").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==13 || keycode==40)  {
					enfoca("direccion");
				}
				if(keycode==38 && operacion=="alta")  {
					enfoca("nombre");
				}
			});
				$("#direccion").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==13 || keycode==40)  {
					enfoca("telefono");
				}
				if(keycode==38)  {
					enfoca("nif");
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

							validaCorreo(document.getElementById("correo").value);
							if (document.getElementById("correo").value!="" && !email_valido)  {
								alert("Dirección de correo electrónico no válido");
								enfoca("correo");
							} else {
									enfoca("banco");
								}
				}
				if(keycode==38)  {
					enfoca("telefono");
				}
			});
				
				$("#banco").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==38)  {
					enfoca("correo");
				}
			});
				$("#desdecodigo").on('keyup', function(e){
					var keycode= e.keyCode || e.which;
					if(keycode==13 || keycode==40) {
						desdeCodigo();
					}
					
				});
			
	}

	function buscaProveedor(id){

			existe_proveedor=false;
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
					
					existe_proveedor=false;

					} else

					 {
					 	
						document.getElementById("nombre").value=respuesta;
						existe_proveedor=true;

				}
			}
		}
		xmlhttp.open("GET", "../modelo/modelo_proveedores.php?buscaproveedor="+"si"+"&id="+id, false);
		xmlhttp.send();
}


	function enfoca(idelemento) {
		
		//document.getElementById(idelemento).value="";
		document.getElementById(idelemento).focus();

	} 

	function colorTexto(elid){

		document.getElementById(elid).style.backgroundColor='#c7f3ed';

	}
	function noFoco(elid) {

		document.getElementById(elid).style.backgroundColor='#fff';
		elfoco=elid;
	}

	function validaCorreo(email) {

		
  		if (/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(email)) {

   				email_valido=true;
   				
  			}
 				else {
 					email_valido=false;
 					
 				}
 	}

</script>


					