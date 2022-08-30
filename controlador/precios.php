<div id="header-referencias">
		<div id="titulo-referencias">
 			<div>Productos</div>
 			<div id="aqui"></div>
		</div> 
</div>  
<br><br>  
<div id="overlay"></div> 
<div id="nuevaVentana">
	<div id="box-header" style="max-height:80px;"><label id="leyenda" style="margin-left:35%;">Añadir Producto</label></div>
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

	var user="<?php echo $_SESSION["id_usuario"] ?>"
	var resultado = document.getElementById("crud_gral");
	var resultadoconsulta=document.getElementById("pantallaConsulta");
	var resultadoeditar=document.getElementById("aqui");
	document.getElementById("nuevaVentana").style.height="60%";
	document.getElementById("nuevaVentana").style.width="70%";
	var num_registros;
	var num_paginas;
	var pagina_actual;
	var muestro_pagina;
	var actualizando=false;
	var seleccion="";
	var creandopg="";
	var creandosg="";
	var creandotg="";
	var elfoco="";
	var acrear="";
	var c_1=0;
	var c_2=0;
	var c_3=0;
	var c_1_alfa="";
	var c_2_alfa="";
	var c_3_alfa="";
	var yaexistecuentapg="";
	var yaexistecuentasg="";
	var yaexistecuentatg="";
	var cuenta="";
	var masa="";
	var grado="";
	var titulocuenta="";
	var apunte_fecha="";
 	var guardomasa="";
 	var masacuenta="";
 	var desdecodigo="";
 	var guardofotoid="";

	var editarcodigoID="";
	var editardescripcionID="";
	var editarcostoID="";
	var editarprecio_1ID="";
	var editarprecio_2ID="";
	var editarprecio_3ID="";
	var editarfotoID="";
	var nuevafoto="";
	var borrarsn="";
	var guardo_resultado="";
	var descripcion="";
	var proveedor="";
	var familia="";
	var subfamilia="";
	var existe_proveedor=false;
	var existe_familia=false;
	var existe_subfamilia=false;
	var noexiste_producto=false;
	var permito_alta=false;
	var elcodigo="";
	function mostrarPrecios(pagina){

		
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
				document.getElementById("mostrandopagina").innerHTML=" "+pagina_actual;
				cargaTeclas();

				$(".botones").css({"background-color":'#AACFCF'});
				$(".botones").css({"color":'#fff'});
				
			}
		}
		xmlhttp.open("GET", "../modelo/modelo_precios.php?precios=" + "si"+"&pagina="+pagina+"&num_paginas="+num_paginas+"&desdecodigo="+desdecodigo,false);
		xmlhttp.send();
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
		xmlhttp.open("GET", "../modelo/modelo_precios.php?acontar="+"si"+"&desdecodigo="+desdecodigo,false);
		xmlhttp.send();
	}

	preparoMostrarPrecios();

	function desdeCodigo(){

			if (!actualizando) {
			desdecodigo=document.getElementById("desdecodigo").value;
			preparoMostrarPrecios();
		}
	}

	function iraPagina(){

			if (!actualizando) {
			var eligepagina=document.getElementById("eligepagina").value;
			if (eligepagina >= 1 && eligepagina <=num_paginas) {
				muestro_pagina= eligepagina;
				mostrarPrecios(muestro_pagina);
			}
		}
	}

	function retrocedoPagina() {

			if (!actualizando) {
			if (pagina_actual > 1) {
				pagina_actual--;
				muestro_pagina = pagina_actual;
				mostrarPrecios(muestro_pagina);
			}
		}
	}
	function avanzoPagina() {

			if (!actualizando) {
			if (pagina_actual < num_paginas) {
				pagina_actual++;
				muestro_pagina=pagina_actual;
				document.getElementById("eligepagina").innerHTML=muestro_pagina;
				mostrarPrecios(muestro_pagina);
			}
		}
	}

	function editarPrecios(id) {


		if (!actualizando) {

		actualizando=true;
		elcodigo=id;
		var codigoID="PRE_CODIGO" + id;
		var descripcionID="PRE_DESCRIPCION"+id;
		var costoID="PRE_COSTO"+id;
		var precio_1ID="PRE_PRECIO_1"+id;
		var precio_2ID="PRE_PRECIO_2"+id;
		var precio_3ID="PRE_PRECIO_3"+id;
		var fotoID="PRE_FOTO"+id;
		var foto2ID="PRE_FOTO2"+id;
		var borrar = "BORRAR" + id;
		var actualizar = "ACTUALIZAR" + id;


		editarcodigoID=codigoID+"-editar";
		editardescripcionID=descripcionID+"-editar";
		editarcostoID=costoID+"-editar";
		editarprecio_1ID=precio_1ID+"-editar";
		editarprecio_2ID=precio_2ID+"-editar";
		editarprecio_3ID=precio_3ID+"-editar";
		editarfotoID=fotoID+"-editar";
		

		var pre_codigo=document.getElementById(codigoID).innerHTML; 
		var descripcion=document.getElementById(descripcionID).innerHTML;
		var costo=document.getElementById(costoID).innerHTML;
		var precio_1=document.getElementById(precio_1ID).innerHTML;
		var precio_2=document.getElementById(precio_2ID).innerHTML;
		var precio_3=document.getElementById(precio_3ID).innerHTML;
		var foto=document.getElementById(fotoID).innerHTML;
		guardofotoid=fotoID;
		var parent= document.querySelector("#" + codigoID);

		if (parent.querySelector("#" + editarcodigoID) === null ) {

			document.getElementById(descripcionID).innerHTML = '<input type ="text" id="'+editardescripcionID+'"  value="'+descripcion+'">';
			document.getElementById(costoID).innerHTML = '<input type ="text" id="'+editarcostoID+'" size="7" value="'+costo+'">';
			document.getElementById(precio_1ID).innerHTML = '<input type ="text" id="'+editarprecio_1ID+'" size="7"  value="'+precio_1+'">';
			document.getElementById(precio_2ID).innerHTML = '<input type ="text" id="'+editarprecio_2ID+'" size="7" value="'+precio_2+'">';
			document.getElementById(precio_3ID).innerHTML = '<input type ="text" id="'+editarprecio_3ID+'" size="7" value="'+precio_3+'">';
			document.getElementById(fotoID).innerHTML = '<input type ="button" id="'+editarfotoID+'" value="'+foto+'" onclick="cambiarFoto(this.value)">';
			seleccion="";
			document.getElementById(borrar).disabled="true";
			document.getElementById(actualizar).style.display="block";
		}
	}
}

	function actualizarPrecio(id) {

		

		var confirmacambios=confirm("Desea actualizar cambios?");

		if (confirmacambios) {

		var descripcion=document.getElementById(editardescripcionID).value;
		var costo=document.getElementById(editarcostoID).value;
		var precio_1=document.getElementById(editarprecio_1ID).value;
		var precio_2=document.getElementById(editarprecio_2ID).value;
		var precio_3=document.getElementById(editarprecio_3ID).value;
		var foto=document.getElementById(editarfotoID).value;


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

				}	
			}
			xmlhttp.open("GET", "../modelo/modelo_precios.php?actualizar_precios="+"si"+"&pre_codigo="+id+"&descripcion="+descripcion+"&costo="+costo+"&precio_1="+precio_1+"&precio_2="+precio_2+"&precio_3="+precio_3+"&foto="+foto,false);
			xmlhttp.send();

	}
		
		actualizando=false;
		mostrarPrecios(pagina_actual);
}		
		
		function revisarPrecio(id) {
			
				var xmlhttp;
				if(window.XMLHttpRequest) {
					xmlhttp = new XMLHttpRequest();
					} else {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
				xmlhttp.onreadystatechange = function () {
				if (this.readyState === 4 && this.status === 200) {
					borrarsn=xmlhttp.responseText;
				}
			}
				xmlhttp.open("GET", "../modelo/modelo_precios.php?revisar="+"si"+"&codigo_revisar="+id,false);
				xmlhttp.send();
					if (borrarsn.includes("si")) { return true;} 
					else { return false;}
	 }
	

	var overlay = document.getElementById("overlay");
	var nuevaVentana= document.getElementById("nuevaVentana");

	function borrarPrecio(id){

		
		borraPre(id);
		preparoMostrarPrecios();

	}


	function borraPre(id) {


			if (revisarPrecio(id)) {

			var respuesta = confirm("Estas seguro de borrar este Producto?");
			
			if (respuesta) {

				var xmlhttp;

				if(window.XMLHttpRequest) {
					
					xmlhttp = new XMLHttpRequest();

					} else {

					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

					}
				
				xmlhttp.onreadystatechange = function () {

				if (this.readyState === 4 && this.status === 200) {

				var borrarsn = xmlhttp.responseText;

				}
			}

				xmlhttp.open("GET", "../modelo/modelo_precios.php?eliminar="+"si"+"&codigo_eliminar="+id,false);
				xmlhttp.send();
		}
	} else { alert ("ARTICULO CON MOVIMIENTOS DE ALMACEN"); }

}

	

	function muestraFoto(lafoto){

		if (!actualizando) {

		document.getElementById("nuevaVentana").style.width="20%";

		overlay.style.opacity = .4;
		if (overlay.style.display == "block") {

			overlay.style.display="none";
			nuevaVentana.style.display="none";
		} else {
			overlay.style.display="block";
			nuevaVentana.style.display="block";
		}

		fotoamostrar=lafoto.slice(12);

		document.getElementById("leyenda").innerHTML="Imagen: "+fotoamostrar+" código: "+lafoto.slice(0,12);
		
		resultadoconsulta.innerHTML = '<img src="/PROYECTO3/IMAGEN_SERVIDOR/'+ fotoamostrar +'" width="60%" style="display:block; margin: auto;" alt="IMAGEN NO DISPONIBLE" >'; 
		} else { cambiarFoto(lafoto);}
	}

	function cambiarFoto(lafoto){



		document.getElementById("nuevaVentana").style.width="40%";

		overlay.style.opacity = .4;
		if (overlay.style.display == "block") {

			overlay.style.display="none";
			nuevaVentana.style.display="none";
		} else {
			overlay.style.display="block";
			nuevaVentana.style.display="block";
		}

		nuvevafoto=lafoto;

		document.getElementById("leyenda").innerHTML="Imagen: "+lafoto;
		
		resultadoconsulta.innerHTML = 
		'<form name="nuevafoto" method="post" action="#" enctype="multipart/form-data">'+
		    '<div class="card" style="display:block; margin: auto;" >'+
		        '<img name="here" id ="aqui" width="35%" class="card-img-top" src="/PROYECTO3/IMAGEN_SERVIDOR/'+fotoamostrar+'">'+
		        '<div class="card-body">'+
		            '<p class="card-text">  Seleccione una imagen...</p>'+
		            '<div class="form-group">'+
		                '<input type="file" class="form-control-file" name="image" id="image" required>'+
		            '</div>'+
		            '<input type="button" class="btn btn-primary urload" id="botonsubir" value="Subir">'+
		        '</div>'+
		    '</div>'+
		'</form>';

		$(document).ready(function() {

			    $("#botonsubir").on('click', function() {
			    	
			    	
			    	var valor_input= document.forms['nuevafoto']['image'].files[0];
			    	valor_input=valor_input.name;

			        var formData = new FormData();
			        var files = $('#image')[0].files[0];
			        formData.append('file',files);
			        
			        $.ajax({
			            url: 'subirFoto.php',
			            type: 'post',
			            data: formData,
			            contentType: false,
			            processData: false,
			            success: function(response) {
			                if (response != 0) {
			                		nuevafoto=response;
			                		resultadoconsulta.innerHTML = 
									'<form method="post" action="#" enctype="multipart/form-data">'+
									    '<div class="card" style="display:block; margin: auto;" >'+
									        '<img name="here" id ="aqui" width="35%" class="card-img-top" src="/PROYECTO3/IMAGEN_SERVIDOR/'+response+'">'+
									        '<div class="card-body">'+
									            '<input type="button" class="btn btn-primary " id="botonconfirmar" value=" Confirmar imágen " onclick="confirmaFoto()">'+
									        '</div>'+
									    '</div>'+
									'</form>';
			                } else {
			                    alert('Formato de imagen incorrecto.');
			                }
			            }
			        });
			        return false;
			    });




				$("#botonconfirmar").on('click', function() {

						alert("confirmese");

				});

			});

	}


/*	function envioCodigo(){

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
			xmlhttp.open("GET", "recibocodigo.php?elcodigo="+elcodigo, false);
			xmlhttp.send();

	}*/


	function confirmaFoto(){

		var edicion = guardofotoid+"-editar";
		document.getElementById(edicion).value = nuevafoto;
		 
	}

	function confirmaFotoB(){

		
		document.getElementById("imageB").value = nuevafoto;
		
	}

	function grabarProducto() {


			var confirma_grabar= confirm("Confirma grabar Producto ?");

			if (confirma_grabar) {

					var codigo=document.getElementById("codigo").value;
					var descripcion=document.getElementById("descripcion").value;
					var costo=document.getElementById("costo").value;
					var precio_1=document.getElementById("precio_1").value;
					var precio_2=document.getElementById("precio_2").value;
					var precio_3=document.getElementById("precio_3").value;
					var foto=nuevafoto;
					var xmlhttp;

					if(window.XMLHttpRequest) {
						xmlhttp = new XMLHttpRequest();
					} else {
						xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}

					xmlhttp.onreadystatechange = function () {

						if (this.readyState === 4 && this.status === 200) {

							overlay.style.display="none";
							nuevaVentana.style.display="none";
							ejecutarNuevaVentana();	 
						}
					}
					xmlhttp.open("GET", "../modelo/modelo_precios?grabar_producto="+"si"+"&codigo="+codigo+"&descripcion="+descripcion+"&costo="+costo+"&precio_1="+precio_1+"&precio_2="+"&precio_2="+precio_2+"&precio_3="+precio_3+"&foto="+foto, false);
					xmlhttp.send();
			}
	}

	function cargateclaSubirB() {

				
				setTimeout(function(){

					var a=1;},2000,"Javascript");

			    $("#botonsubirB").on('click', function() {
			    	
			    	
			        var formData = new FormData();
			        var files = $('#imageB')[0].files[0];
			        formData.append('file',files);
			        
			        $.ajax({
			            url: 'subirFoto.php',
			            type: 'post',
			            data: formData,
			            contentType: false,
			            processData: false,
			            success: function(response) {
			                if (response != 0) {

									nuevafoto=response;
			                		var sacanuevafoto='/PROYECTO3/IMAGEN_SERVIDOR/'+response;

			                		document.getElementById("aquiB").setAttribute('src', sacanuevafoto);

			                } else {
			                    alert('Formato de imagen incorrecto.');
			                }
			            }
			        });
			        return false;
			    });

			$("#codigo").focus(function(){

				if (!permito_alta) {
    				$("#descripcion").prop("disabled", true);
    				$("#costo").prop("disabled", true);
    				$("#precio_1").prop("disabled", true);
    				$("#precio_2").prop("disabled", true);
    				$("#precio_3").prop("disabled", true);
    				$("#imageB").prop("disabled", true);
    				$("#botonsubirB").prop("disabled", true);
    				$("#botonGrabar").prop("disabled", true);
    			}
			});

			$("#codigo").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==13 || keycode==40)  {

					var id_producto=document.getElementById("codigo").value;

					if (id_producto.length==12) {

								permito_alta=false;
								buscaProducto(id_producto);
								proveedor=id_producto.slice(0,3);
								familia=id_producto.slice(3,6);
								subfamilia=id_producto.slice(3,9);
								buscaProveedor(proveedor);
								buscaFamilia(familia);
								buscaSubfamilia(subfamilia);

								if (existe_proveedor && existe_familia && existe_subfamilia &&noexiste_producto) {
											$("#descripcion").prop("disabled", false);
						    				$("#costo").prop("disabled", false);
						    				$("#precio_1").prop("disabled", false);
						    				$("#precio_2").prop("disabled", false);
						    				$("#precio_3").prop("disabled", false);
						    				$("#imageB").prop("disabled", false);
						    				$("#botonsubirB").prop("disabled", false);
						    				$("#botonGrabar").prop("disabled", false);
						    				permito_alta=true;
						    				enfoca("descripcion");
									} else { 
											alert("Verifique que existan ya proveedor, familia y subfamilia. Y no debe existir el producto");	
											permito_alta=false;
											enfoca("codigo");
											 }
						}
			}
		});

			$("#descripcion").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==13 || keycode==40) {
							enfoca("costo"); 
				}
				if(keycode==38) { 
					permito_alta=false;
					enfoca("codigo"); }

		});


			$("#costo").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==13 || keycode==40) {
					
						var costo = document.getElementById("costo").value;
						costo=parseFloat(costo.replace(',','.'));
						document.getElementById("costo").value=new Intl.NumberFormat("de-DE").format(costo);
						if (isNaN(costo)) { 
							enfoca("costo");
						} else enfoca("precio_1");
					}
				if(keycode==38) { enfoca("descripcion"); }
		});

			$("#precio_1").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==13 || keycode==40) {
					
						var precio_1 = document.getElementById("precio_1").value;
						precio_1=parseFloat(precio_1.replace(',','.'));
						document.getElementById("precio_1").value=new Intl.NumberFormat("de-DE").format(precio_1);
						if (isNaN(precio_1)) { 
							enfoca("precio_1");
						} else enfoca("precio_2");
					}
				if(keycode==38) { enfoca("costo"); }

		});

			$("#precio_2").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==13 || keycode==40) {

						var precio_2 = document.getElementById("precio_2").value;
						precio_2=parseFloat(precio_2.replace(',','.'));
						document.getElementById("precio_2").value=new Intl.NumberFormat("de-DE").format(precio_2);
						if (isNaN(precio_2)) {
								enfoca("precio_2");
							} else enfoca("precio_3");
					}
				if(keycode==38) { enfoca("precio_1"); }
		});

			$("#precio_3").on('keyup', function(e){

				var keycode= e.keyCode || e.which;
				if(keycode==13 || keycode==40) {
					
						var precio_3 = document.getElementById("precio_3").value;
						precio_3=parseFloat(precio_3.replace(',','.'));
						document.getElementById("precio_3").value=new Intl.NumberFormat("de-DE").format(precio_3);
						if (isNaN(precio_3)) { 
							enfoca("precio_3");
							} else enfoca("imageB");
						
					}
				if(keycode==38) { enfoca("precio_2"); }
		});
			   $("#imageB").on('keyup', function(e){

				var keycode= e.keyCode || e.which;
				
				if(keycode==38) { enfoca("precio_3"); }
		});
	}

	function ejecutarNuevaVentana(){


		if(!actualizando) {
		
		acrear="";

		document.getElementById("leyenda").innerHTML="Agregar Producto";
		document.getElementById("nuevaVentana").style.width="50%";
		
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

				guardo_resultado=xmlhttp.responseText;
				resultadoconsulta.innerHTML = xmlhttp.responseText;
				
				cargateclaSubirB();
				enfoca("codigo");
			}
		}
		xmlhttp.open("GET", "../modelo/modelo_precios?altaprecios="+"si",false);
		xmlhttp.send();
	}
}

	function buscaProducto(id){

			noexiste_producto=false;

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
						
						noexiste_producto=true;

					} else {
							document.getElementById("descripcion").value=xmlhttp.responseText;

							noexiste_producto=false;

							}
					}
			}
			xmlhttp.open("GET", "../modelo/modelo_precios?buscaproducto="+"si"+"&id="+id, false);
			xmlhttp.send();
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

				} else { 
						existe_proveedor=true;
					}
				document.getElementById("proveedor_des").value=xmlhttp.responseText;

			}
		}
		xmlhttp.open("GET", "../modelo/modelo_precios?buscaproveedor="+"si"+"&id="+id, false);
		xmlhttp.send();
	}

	function buscaFamilia(id){

		existe_familia=false;

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

					existe_familia=false;
				}  else { 
						existe_familia=true;
					}

				document.getElementById("familia_des").value=xmlhttp.responseText;

			}
		}
		xmlhttp.open("GET", "../modelo/modelo_precios?buscafamilia="+"si"+"&id="+id, false);
		xmlhttp.send();

	}

	function buscaSubfamilia(id){

		existe_subfamilia=false;

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

					existe_subfamilia=false;
				} else { 
						existe_subfamilia=true;
					}
				document.getElementById("subfamilia_des").value=xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET", "../modelo/modelo_precios?buscasubfamilia="+"si"+"&id="+id, false);
		xmlhttp.send();

	}



	function cierraVentana(){

			document.getElementById("nuevaVentana").style.width="70%";
			overlay.style.display="none";
			nuevaVentana.style.display="none";
			if (!actualizando) { preparoMostrarPrecios(); }

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

	function cargaTeclas() {


			$("#cuenta-1").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==13 || keycode==40) {
					buscaCuentaPG();
					enfoca("cuenta-2");
				}
			});

			$("#cuenta-2").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==13 || keycode==40) {
					buscaCuentaSG();
					enfoca("cuenta-3");
				}
				if (keycode==38) {
					enfoca("cuenta-1");
				}
			});

			$("#cuenta-3").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==13 || keycode==40) {
					buscaCuentaTG();
				}
				if (keycode==38) {
					enfoca("cuenta-2");
				}
			});
	

	$("#codcuenta-1").on('keyup', function(e){
		var keycode= e.keyCode || e.which;
		if(keycode==13 || keycode==40) {
			buscaCuentaPrimerGrado();
			enfoca("codcuenta-2");
		}
	});

	$("#codcuenta-2").on('keyup', function(e){
		var keycode= e.keyCode || e.which;
		if(keycode==13 || keycode==40) {
			buscaCuentaSegundoGrado();
			enfoca("codcuenta-3");
		}
		if (keycode==38) {
			enfoca("codcuenta-1");
		}
	});

	$("#desdecodigo").on('keyup', function(e){
		var keycode= e.keyCode || e.which;
		if(keycode==13 || keycode==40) {
			desdeCodigo();
		}
		
	});

	$("#eligepagina").on('keyup', function(e){
		var keycode= e.keyCode || e.which;
		if(keycode==13 || keycode==40) {
			iraPagina();
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

	});

	$("#codcuenta-3").on('keyup', function(e){
		var keycode= e.keyCode || e.which;
		if(keycode==13 || keycode==40) {
			buscaCuentaTercerGrado();
			enfoca("concepto_numero");
		}
		if (keycode==38) {
			enfoca("codcuenta-2");
		}

	});

}

</script>

					