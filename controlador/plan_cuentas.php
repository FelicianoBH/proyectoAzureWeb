<div id="header-referencias">
		<div id="titulo-referencias">
 			<div>Plan de Cuentas</div>
 			<div id="aqui"></div>
		</div> 
</div>  
<br><br> 
<div id="overlay"></div>
<div id="nuevaVentana">
	<div id="box-header"><label id="leyenda" style="margin-left:35%;">Añadir Cuenta</label></div>
	<button onmousedown="cierraVentana()" class="btn btn-primary"  id="botonCerrar">
		<i class="fa  fa-door-open"></i>
	</button><br><br><br>
	<div id="pantallaConsulta"> 
	</div>
		<span id="feedback"></span>
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

	function mostrarCuentas(pagina){

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
		xmlhttp.open("GET", "../modelo/modelo_plan_cuentas.php?cuentas=" + "cuentas"+"&pagina="+pagina+"&num_paginas="+num_paginas+"&desdecodigo="+desdecodigo, true);
		xmlhttp.send();
	}


	function preparoMostrarCuentas(){

			var xmlhttp;
			if(window.XMLHttpRequest) {
				xmlhttp = new XMLHttpRequest();
				} else {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function () {
				if (this.readyState === 4 && this.status === 200) {

 				num_registros = xmlhttp.responseText;
				mostrarCuentas(1);
				}
		}
		xmlhttp.open("GET", "../modelo/modelo_plan_cuentas.php?acontar="+"si"+"&desdecodigo="+desdecodigo, true);
		xmlhttp.send();
	}

	leerRef();
	preparoMostrarCuentas();


/*
	function retrocedoPagina(hastaDonde) {

		if (hastaDonde=="inicio"){

				mostrarCuentas(1);

		} else {

			if (pagina_actual > 1) {

				muestro_pagina = pagina_actual - 1;

				mostrarCuentas(muestro_pagina);
			}
		}
	}

	function avanzoPagina(hastaDonde, paginaFinal) {

		if (hastaDonde=="final") {

				mostrarCuentas(paginaFinal);
 
		} else {
 
		if (pagina_actual < num_paginas) {

			muestro_pagina = pagina_actual + 1;

			mostrarCuentas(muestro_pagina);

			}
		}

	}

*/
	function desdeCodigo(){

			if (!actualizando) {
			desdecodigo=document.getElementById("desdecodigo").value;
			preparoMostrarCuentas();
		}
	}

	function iraPagina(){

			if (!actualizando) {
			var eligepagina=document.getElementById("eligepagina").value;
			if (eligepagina >= 1 && eligepagina <=num_paginas) {
				muestro_pagina= eligepagina;
				mostrarCuentas(muestro_pagina);
			}
		}
	}

	function retrocedoPagina() {

			if (!actualizando) {
			if (pagina_actual > 1) {
				pagina_actual--;
				muestro_pagina = pagina_actual;
				mostrarCuentas(muestro_pagina);
			}
		}
	}
	function avanzoPagina() {

			if (!actualizando) {
			if (pagina_actual < num_paginas) {
				pagina_actual++;
				muestro_pagina=pagina_actual;
				document.getElementById("eligepagina").innerHTML=muestro_pagina;
				mostrarCuentas(muestro_pagina);
			}
		}
	}

	function editarCuentas(id) {


		if (!actualizando) {

		actualizando=true;
		var codigo_cuentaID="CODIGO_CUENTA" + id;
		var tituloID="TITULO"+id;
		var masa_patrimonialID="MASA_PATRIMONIAL"+id;
		var gradoID="GRADO"+id;
		var borrar = "BORRAR" + id;
		var actualizar = "ACTUALIZAR" + id;

		var editarcodigo_cuentaID=codigo_cuentaID+"-editar";
		var editartituloID=tituloID+"-editar";
		var editarmasa_patrimonialID=masa_patrimonialID+"-editar";
		var editargradoID=gradoID+"-editar";

		var codigo_cuenta=document.getElementById(codigo_cuentaID).innerHTML; 
		var titulo=document.getElementById(tituloID).innerHTML;
		var masa_patrimonial=document.getElementById(masa_patrimonialID).innerHTML;
		var grado=document.getElementById(gradoID).innerHTML;
		
		var parent= document.querySelector("#" + codigo_cuentaID);

		if (parent.querySelector("#" + editarcodigo_cuentaID) === null ) {


			document.getElementById(tituloID).innerHTML = '<input type ="text" id="'+editartituloID+'" value="'+titulo+'">';
		
			guardomasa=document.getElementById(masa_patrimonialID).innerHTML;
			seleccion="";
			
			document.getElementById(masa_patrimonialID).innerHTML = '<select onchange="marcaSeleccion()" id="'+editarmasa_patrimonialID+'">'+
				'<option value="Elija opciones">Elija opción (Necesaria para Balance de Situación) </option><option value="GESTION"  onchange="marcaSeleccion()">GESTION</option><option value="1110INMOVILIZADO INTANGIBLE"  onchange="marcaSeleccion()">INMOVILIZADO INTANGIBLE</option><option onchange="marcaSeleccion()"  value="1120INMOVILIZADO FINANCIERO">INMOVILIZADO FINANCIERO</option><option  onchange="marcaSeleccion()" value="1131MAQUINARIA">MAQUINARIA</option><option onchange="marcaSeleccion()"  value="1132ELE.TRANSPORTE">ELE.TRANSPORTE</option><option onchange="marcaSeleccion()" value="1133MOBILIARIO">MOBILIARIO</option><option onchange="marcaSeleccion()" value="1210EXISTENCIAS">EXISTENCIAS</option><option   onchange="marcaSeleccion()" value="1221CLIENTES">CLIENTES</option><option onchange="marcaSeleccion()" value="1222INVERSIONES A C.P.">INVERSIONES A C.P.</option><option  onchange="marcaSeleccion()" value="1223BANCOS">BANCOS</option><option onchange="marcaSeleccion()" value="1230DISPONIBLE CAJA">DISPONIBLE CAJA</option><option  onchange="marcaSeleccion()" value="2110CAPITAL SOCIAL">CAPITAL SOCIAL</option><option  onchange="marcaSeleccion()" value="2120RESULTADOS EJERCICIO">RESULTADOS EJERCICIO</option><option  onchange="marcaSeleccion()" value="2210DEUDAS A L.P.">DEUDAS A L.P.</option><option  onchange="marcaSeleccion()" value="2221PROVEEDORES">PROVEEDORES</option><option  onchange="marcaSeleccion()" value="2222ACREEDORES">ACREEDORES</option>';

			if (grado!="1") {
				document.getElementById(editarmasa_patrimonialID).disabled=true;
				} else {document.getElementById(editarmasa_patrimonialID).disabled=false;}
			document.getElementById(borrar).disabled="true";
			document.getElementById(actualizar).style.display="block";
		}
	}
}

	function marcaSeleccion(){
		
		seleccion="si";
	}

	function actualizarCuentas(id) {


		var confirmacambios=confirm("Desea actualizar cambios?");

		if (confirmacambios) {

		var xmlhttp;
		if(window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();

		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		var tituloActualizado= document.getElementById("TITULO"+id+"-editar").value;

		if (seleccion=="si") {

				var masa_patrimonialActualizada= document.getElementById("MASA_PATRIMONIAL"+id+"-editar").value;

		} else { 	document.getElementById("MASA_PATRIMONIAL"+id+"-editar").innerHTML = guardomasa;

					var masa_patrimonialActualizada=guardomasa; }	

		xmlhttp.onreadystatechange = function () {

			if (this.readyState === 4 && this.status === 200) {

 				var meresponde=xmlhttp.responseText;
				var mensaje=meresponde;
				if (mensaje.includes("No ejecutado")) {
					alert(meresponde);
					actualizando=false;
					mostrarCuentas(pagina_actual);
				}
					if (seleccion=="si") {
						cambiaMasas(id, masa_patrimonialActualizada);
						actualizando=false;
					} 
				} 
			}	

			xmlhttp.open("GET", "../modelo/modelo_plan_cuentas.php?param1="+id+"&param2="+tituloActualizado+"&param3="+masa_patrimonialActualizada, true);
			xmlhttp.send();
		    
		} 
		actualizando=false;
		mostrarCuentas(pagina_actual);
	}
		
		
		function cambiaMasas(id, masa_nueva) {

				var xmlhttp;

				if(window.XMLHttpRequest) {
					
					xmlhttp = new XMLHttpRequest();

					} else {

					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

					}
				
				xmlhttp.onreadystatechange = function () {

				if (this.readyState === 4 && this.status === 200) {
						mostrarCuentas(pagina_actual);
				} 
			}

			xmlhttp.open("GET", "../modelo/modelo_plan_cuentas.php?cambiamasas="+"si"+"&codigo_cuenta="+id+"&masa_nueva="+masa_nueva,true);

			xmlhttp.send();
		
		}

		function borrarCuenta(id) {

			if (!actualizando) {

			var respuesta = confirm("Estas seguro de borrar esta Cuenta?");
			
			if (respuesta ===true ) {

				var xmlhttp;

				if(window.XMLHttpRequest) {
					
					xmlhttp = new XMLHttpRequest();

					} else {

					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

					}
				
				xmlhttp.onreadystatechange = function () {

				if (this.readyState === 4 && this.status === 200) {

						var respuestacta=xmlhttp.responseText;
						var obj = JSON.parse(respuestacta);
						var borrarsn=obj.responde;

				confirmaBorrar(borrarsn, id);
				}
			}

				xmlhttp.open("GET", "../modelo/modelo_plan_cuentas.php?revisar="+"si"+"&cuentarevisar="+id,true);
				xmlhttp.send();
		
		 }
		}
	}

	var overlay = document.getElementById("overlay");
	var nuevaVentana= document.getElementById("nuevaVentana");


	function confirmaBorrar(borrarsn, id) {


		if (borrarsn=="1") {
			alert("iria a confiramdo borrar cuetna");
			confirmadoBorrarCuenta(id);
		}  
		if(borrarsn=="2")  {
							alert("CUENTA CON MOVIMIENTOS");
					}  
		if (borrarsn=="3") {
		
					var reconfirma=confirm("CUENTA NO ES DE TERCER GRADO, DESEA BORRAR ?");
		
					if (reconfirma==true) {
								confirmadoBorrarCuenta(id);
								} 
			}		
	}

	function confirmadoBorrarCuenta(id) {

				alert("confiramdo borrar cuetna");
				var xmlhttp;

				if(window.XMLHttpRequest) {
					
					xmlhttp = new XMLHttpRequest();

					} else {

					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

					}
				
				xmlhttp.onreadystatechange = function () {

				if (this.readyState === 4 && this.status === 200) {

				var borrarsn = xmlhttp.responseText;
				confirmaBorrar(borrarsn, id);
 				preparoMostrarCuentas();

				}
			}

				xmlhttp.open("GET", "../modelo/modelo_plan_cuentas.php?eliminar="+"si"+"&cuentaeliminar="+id,true);
				xmlhttp.send();
		
	}



	function ejecutarNuevaVentana(){

		if(!actualizando) {
		origen="zonacuenta";
		creandopg="";
		creandosg="";
		creandotg="";
		acrear="";
		yaexistecuentapg="";
		yaexistecuentasg="";
		yaexistecuentatg="";
		document.getElementById("leyenda").innerHTML="Agregar Cuentas";
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

				resultadoconsulta.innerHTML = xmlhttp.responseText;
				cargaTeclas();
			}
		}
		xmlhttp.open("GET", "../modelo/modelo_nueva_cuenta_apunte", true);
		xmlhttp.send();
	}	
}

		function buscaCuentaPrimerGrado(){


					titulocuenta="";
					c_1=document.getElementById("codcuenta-1").value;
					c_1_alfa=c_1.toString();
					if ( c_1_alfa.length<3 || isNaN(c_1_alfa) || c_1_alfa[0]==" " || c_1_alfa[1]==" " || c_1_alfa[2]==" ") { 
										alert("No válido");
									 }	 else  {
			
							//var codigo_buscar=c_1_alfa+"*********";
							var codigo_buscar=c_1;
							var xmlhttp;
							if(window.XMLHttpRequest) {
								xmlhttp = new XMLHttpRequest();
							} else {
								xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
							}
							xmlhttp.onreadystatechange = function () {
								
								if (this.readyState === 4 && this.status === 200) {

									var obj = JSON.parse(xmlhttp.responseText);
									titulocuenta=obj.titulo;
									masacuenta=obj.masa_patrimonial;
									document.getElementById("titulo-1").value=titulocuenta;

								}
						}
					xmlhttp.open("GET", "../modelo/modelo_asientos.php?cuenta="+codigo_buscar, true);
					xmlhttp.send();
			}
		}
		function buscaCuentaSegundoGrado(){


					c_2=document.getElementById("codcuenta-2").value;
					c_2_alfa=c_2.toString();
					if ( c_2_alfa.length<3 || isNaN(c_2_alfa) || c_2_alfa[0]==" " || c_2_alfa[1]==" " || c_2_alfa[2]==" ") { 
										alert("No válido");
									 }	 else  {
			
							//var codigo_buscar=c_1_alfa+c_2_alfa+"******";
							var codigo_buscar=c_1_alfa+c_2;
							var xmlhttp;
							if(window.XMLHttpRequest) {
								xmlhttp = new XMLHttpRequest();
							} else {
								xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
							}
							xmlhttp.onreadystatechange = function () {
								
								if (this.readyState === 4 && this.status === 200) {

										var obj = JSON.parse(xmlhttp.responseText);
										titulocuenta=obj.titulo;
										document.getElementById("titulo-2").value= titulocuenta;
										
								}
						}
					xmlhttp.open("GET", "../modelo/modelo_asientos.php?cuenta="+codigo_buscar, true);
					xmlhttp.send();
			}
		}
		function buscaCuentaTercerGrado(){

					c_3=document.getElementById("codcuenta-3").value;
					c_3_alfa=c_3.toString();
					
					if ( c_3_alfa.length<6 || isNaN(c_3_alfa) || c_3_alfa[0]==" " || c_3_alfa[1]==" " || c_3_alfa[2]==" "|| c_3_alfa[3]==" " || c_3_alfa[4]==" " || c_3_alfa[5]==" ") { 

										alert("No válido");
									 }	 else  {
			
							var codigo_buscar=c_1_alfa+c_2_alfa+c_3_alfa;
							var xmlhttp;
							if(window.XMLHttpRequest) {
								xmlhttp = new XMLHttpRequest();
							} else {
								xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
							}
							xmlhttp.onreadystatechange = function () {

									if (this.readyState === 4 && this.status === 200) {
										var obj = JSON.parse(xmlhttp.responseText);
										titulocuenta=obj.titulo;
										document.getElementById("titulo-3").value= titulocuenta;
										
							}	
						}
					xmlhttp.open("GET", "../modelo/modelo_asientos.php?cuenta="+codigo_buscar, true);
					xmlhttp.send();
			}
		}

		function leerCuenta() {

			if (elfoco=="cuenta-1") {
				buscaCuentaPG();
			}
			if (elfoco=="cuenta-2") {
				buscaCuentaPG();
				buscaCuentaSG();
			}
			if (elfoco=="cuenta-3") {
				buscaCuentaPG();
				buscaCuentaSG();
				buscaCuentaTG();
			}

		}

		function buscaCuentaPG() {
					
					yaexistecuentapg="";
					titulocuenta="";
					c_1=document.getElementById("cuenta-1").value;
					c_1_alfa=c_1.toString();
					if ( c_1_alfa.length<3 || isNaN(c_1_alfa) || c_1_alfa[0]==" " || c_1_alfa[1]==" " || c_1_alfa[2]==" ") { 
										alert("No válido 1º grado");
									 }	 else  {
			
							var codigo_buscar=c_1;
							var xmlhttp;
							if(window.XMLHttpRequest) {
								xmlhttp = new XMLHttpRequest();
							} else {
								xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
							}
							xmlhttp.onreadystatechange = function () {
								
								if (this.readyState === 4 && this.status === 200) {
									
									var obj = JSON.parse(xmlhttp.responseText);
									titulocuenta=obj.titulo;
									masacuenta=obj.masa_patrimonial;
									
									
								 	if (titulocuenta!="INEXISTENTE") {
										yaexistecuentapg="si";
										document.getElementById("tit-1").value=titulocuenta;
										document.getElementById("masa").value=masacuenta;
										
									} else {
										yaexistecuentapg="no";
										document.getElementById("tit-1").value=titulocuenta;
										
									}
								}
						}
					xmlhttp.open("GET", "../modelo/modelo_asientos.php?cuenta="+codigo_buscar, true);
					xmlhttp.send();
			}
		}

		function buscaCuentaSG(){

					yaexistecuentasg="";
					c_2=document.getElementById("cuenta-2").value;
					c_2_alfa=c_2.toString();
					if ( c_2_alfa.length<3 || isNaN(c_2_alfa) || c_2_alfa[0]==" " || c_2_alfa[1]==" " || c_2_alfa[2]==" ") { 
										alert("No válido 2º grado");
									 }	 else  {
			
							var codigo_buscar=c_1_alfa+c_2;
							var xmlhttp;
							if(window.XMLHttpRequest) {
								xmlhttp = new XMLHttpRequest();
							} else {
								xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
							}
							xmlhttp.onreadystatechange = function () {
								
								if (this.readyState === 4 && this.status === 200) {

									var obj = JSON.parse(xmlhttp.responseText);
									titulocuenta=obj.titulo;
									document.getElementById("masa").disabled=true;
								 	if (titulocuenta!="INEXISTENTE") {
										yaexistecuentasg="si";
										document.getElementById("tit-2").value=titulocuenta;
										
									} else {
										yaexistecuentasg="no";
										document.getElementById("tit-2").value=titulocuenta;
										
									}
								}
						}
					xmlhttp.open("GET", "../modelo/modelo_asientos.php?cuenta="+codigo_buscar, true);
					xmlhttp.send();
			}
		}

		function buscaCuentaTG(){

					yaexistecuentatg="";
					c_3=document.getElementById("cuenta-3").value;
					c_3_alfa=c_3.toString();
					
					if ( c_3_alfa.length<6 || isNaN(c_3_alfa) || c_3_alfa[0]==" " || c_3_alfa[1]==" " || c_3_alfa[2]==" "|| c_3_alfa[3]==" " || c_3_alfa[4]==" " || c_3_alfa[5]==" ") { 

										alert("No válido 3º grado");
									 }	 else  {
			
							var codigo_buscar=c_1_alfa+c_2_alfa+c_3_alfa;
							var xmlhttp;
							if(window.XMLHttpRequest) {
								xmlhttp = new XMLHttpRequest();
							} else {
								xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
							}
							xmlhttp.onreadystatechange = function () {
								
								if (this.readyState === 4 && this.status === 200) {

									var obj = JSON.parse(xmlhttp.responseText);
									titulocuenta=obj.titulo;
									document.getElementById("masa").disabled=true;
								 	if (titulocuenta!="INEXISTENTE") {
										yaexistecuentatg="si";
										document.getElementById("tit-3").value=titulocuenta;
									} else {
										yaexistecuentatg="no";
										document.getElementById("tit-3").value=titulocuenta;
									}
								}
						}
					xmlhttp.open("GET", "../modelo/modelo_asientos.php?cuenta="+codigo_buscar, true);
					xmlhttp.send();
			}
		}

	function crearPrimerGrado(){

			if (yaexistecuentapg=="no") {
			creandopg="si";
			document.getElementById("botoncrearpg").style.backgroundColor='#c7f3ed';
			document.getElementById("tit-1").readOnly=false;
			$("#tit-1").on('keyup', function(e){
			var keycode= e.keyCode || e.which;
			if(keycode==13 || keycode==40) {
				enfoca("masa");
			}
			if(keycode==38) {
				document.getElementById("tit-1").readOnly=true;
				document.getElementById("botoncrearpg").style.backgroundColor='#679B9B';
				creandopg="no";
				enfoca("cuenta-1");
			} 
		});
			enfoca("tit-1");
		} else { alert("Para crear el primer grado de una cuenta introduzca primeros tres digitos e <intro> y comprobar que NO EXISTA");}
	}

	function crearSegundoGrado(){

			if (yaexistecuentasg=="no" && yaexistecuentapg=="si") {
			creandosg="si";
			document.getElementById("botoncrearsg").style.backgroundColor='#c7f3ed';
			document.getElementById("tit-2").readOnly=false;

			$("#tit-2").on('keyup', function(e){
			var keycode= e.keyCode || e.which;
			if(keycode==13 || keycode==40) {
				enfoca("masa");
			}
			if(keycode==38) {
				document.getElementById("tit-2").readOnly=true;
				document.getElementById("botoncrearsg").style.backgroundColor='#679B9B';
				creandosg="no";
				enfoca("cuenta-2");
			}
		});
			enfoca("tit-2");
		} else { alert("Para crear Segundo grado debe primero introducir los tres digitos del Primer grado seguido de <intro> y comprobar que SI EXISTE. Luego los digitos de segundo grado seguido de <intro> y comprobar que NO EXISTE");}
	}

	function crearTercerGrado(){

			if (yaexistecuentatg=="no" && yaexistecuentapg=="si" && yaexistecuentasg=="si") {
			creandotg="si";
			document.getElementById("botoncreartg").style.backgroundColor='#c7f3ed';
			document.getElementById("tit-3").readOnly=false;

			$("#tit-3").on('keyup', function(e){
			var keycode= e.keyCode || e.which;
			if(keycode==13 || keycode==40) {
				enfoca("masa");
			}

			if(keycode==38) {
				document.getElementById("tit-3").readOnly=true;
				document.getElementById("botoncreartg").style.backgroundColor='#679B9B';
				creandotg="no";
				enfoca("cuenta-3");
			}
		});
			enfoca("tit-3");
		} else { alert("Para crear Tercer grado debe primero introducir los tres digitos del Primer grado seguido de <intro> y comprobar que SI EXISTE. Luego los digitos de segundo grado seguido de <intro> y comprobar que  EXISTE. Por último los seis digitos del Tercer Grado mas <intro> y comprobar que NO EXISTE");}
	}

	function crearCuenta(){


		if (creandopg=="si") {
			c_1=document.getElementById("cuenta-1").value;
			c_1_alfa=c_1.toString();
			cuenta=c_1_alfa+"";
			titulocuenta=document.getElementById("tit-1").value;
			masacuenta=document.getElementById("masa").value;
			acrear="si";
			grado="1";

		} else if (creandosg=="si") {
			c_1=document.getElementById("cuenta-1").value;
			c_1_alfa=c_1.toString();
			c_2=document.getElementById("cuenta-2").value;
			c_2_alfa=c_2.toString();
			cuenta=c_1_alfa+c_2_alfa+"";
			titulocuenta=document.getElementById("tit-2").value;
			acrear="si";
			grado="2";

		} else if (creandotg="si") {
			c_1=document.getElementById("cuenta-1").value;
			c_1_alfa=c_1.toString();
			c_2=document.getElementById("cuenta-2").value;
			c_2_alfa=c_2.toString();
			c_3=document.getElementById("cuenta-3").value;
			c_3_alfa=c_3.toString();
			cuenta=c_1_alfa+c_2_alfa+c_3_alfa;
			titulocuenta=document.getElementById("tit-3").value;
			acrear="si";
			grado="3";
			alert("titulo: "+titulocuenta);

		} 
			creandopg="no";
			creandosg="no";
			creandotg="no";

		if (acrear="si")  {
			acrear="";
			document.getElementById("botoncrearpg").style.backgroundColor='#679B9B';
			document.getElementById("botoncrearsg").style.backgroundColor='#679B9B';
			document.getElementById("botoncreartg").style.backgroundColor='#679B9B';
		//	masa=document.getElementById("masa").value;
			var xmlhttp;
			if(window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
			} else {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function () {

			if (this.readyState === 4 && this.status === 200) {

				if (xmlhttp.responseText=="Error"){
					alert("Error de grabacion Cuentas");
				} 
				//enfoca("cuenta-1");
				agregarCuentaReset();
			}
		} 
		xmlhttp.open("GET", "../modelo/modelo_plan_cuentas.php?cuentanueva="+"si"+"&nuevacuenta="+cuenta+"&agrabar_titulo="+titulocuenta+"&fecha="+apunte_fecha+"&agrabar_masa="+masacuenta+"&agrabar_grado="+grado, true);
		xmlhttp.send();
	}
}


	function agregarCuentaReset() {

		var xmlhttp;

		if(window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}

		xmlhttp.onreadystatechange = function () {

			if (this.readyState === 4 && this.status === 200) {

				resultadoconsulta.innerHTML = xmlhttp.responseText;
				cargaTeclas();
			}
		}
		xmlhttp.open("GET", "../modelo/modelo_nueva_cuenta_apunte", true);
		xmlhttp.send();

	}

	function cierraVentana(){

			document.getElementById("nuevaVentana").style.width="70%";
			overlay.style.display="none";
			nuevaVentana.style.display="none";
			preparoMostrarCuentas();
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
	function leerRef()  {

		var xmlhttp;

		if(window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
				} else {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
			xmlhttp.onreadystatechange = function () {

			if (this.readyState === 4 && this.status === 200) {

					apunte_fecha=xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET", "../modelo/modelo_plan_cuentas.php?leer_ref="+"si"+"&user="+user, true);
		xmlhttp.send(); 
	}

</script>

					