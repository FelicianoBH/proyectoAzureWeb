<div id="header-referencias">
		<div id="titulo-referencias">
 			<div>Sedes/Almacenes</div>
		</div>
</div> 
<br><br>
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

<div id="wrapper" style="margin-left:150px;padding:10px">
	<div id="crud_gral" style="margin-left:0px;"></div>
</div>

<script type="text/javascript">
	
	var resultadoconsulta=document.getElementById("pantallaConsulta");
	var resultado = document.getElementById("crud_gral");
	document.getElementById("nuevaVentana").style.height="60%";
	document.getElementById("nuevaVentana").style.width="35%";
	var num_registros;
	var num_paginas;
	var pagina_actual;
	var muestro_pagina;
	var actualizando=false;
 	var desdecodigo="";
 	var cod_responsable="";
 	var responsable="";
 	var responsable_grabar="";
 	var id_responsable_grabar="";
 	editarsede_codigoID="";
	editardescripcionID="";
	editardireccionID="";
	editartelefonoID="";
	editarresponsableID="";
	editarplan_ventasID="";
	editarventas_realizadasID="";

 	
	function mostrarSedes(pagina) {

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

				$(".botones").css({"background-color":'#AACFCF'});
				$(".botones").css({"color":'#fff'});
				
			}
		}
		xmlhttp.open ("GET", "../modelo/modelo_sedes.php?sedes=" + "sedes"+"&pagina="+pagina+"&num_paginas="+num_paginas+"&desdecodigo="+desdecodigo, true);
		xmlhttp.send();
	}


	function preparoMostrarSedes() {


			var xmlhttp;
			if(window.XMLHttpRequest) {
				xmlhttp = new XMLHttpRequest();
				} else {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function () {
				if (this.readyState === 4 && this.status === 200) {

 				num_registros = xmlhttp.responseText;
				mostrarSedes(1);

				}
		}
		xmlhttp.open("GET", "../modelo/modelo_sedes.php?acontar="+"si"+"&desdecodigo="+desdecodigo, true);
		xmlhttp.send();
	}

	preparoMostrarSedes();



	function desdeCodigo(){

			if (!actualizando) {
			desdecodigo=document.getElementById("desdecodigo").value;
			preparoMostrarSedes();
		}
	}

	function iraPagina(){

			if (!actualizando) {
			var eligepagina=document.getElementById("eligepagina").value;
			if (eligepagina >= 1 && eligepagina <=num_paginas) {
				muestro_pagina= eligepagina;
				mostrarSedes(muestro_pagina);
			}
		}
	}

	function retrocedoPagina() {

			if (!actualizando) {
			if (pagina_actual > 1) {
				pagina_actual--;
				muestro_pagina = pagina_actual;
				mostrarSedes(muestro_pagina);
			}
		}
	}

	function avanzoPagina() {

			if (!actualizando) {
			if (pagina_actual < num_paginas) {
				pagina_actual++;
				muestro_pagina=pagina_actual;
				document.getElementById("eligepagina").innerHTML=muestro_pagina;
				mostrarSedes(muestro_pagina);
			}
		}
	}
	


	function editarSedes(id) {


		if (!actualizando) {


		actualizando=true;
		var sede_codigoID="SEDE_CODIGO" + id;
		var nombreID="SEDE_NOMBRE"+id;
		var descripcionID="SEDE_DESCRIPCION"+id;
		var direccionID="SEDE_DIRECCION"+id;
		var telefonoID="SEDE_TELEFONO"+id;
		var responsableID="EMP_NOMBRE"+id;
		var plan_ventasID="SEDE_PLAN_VENTAS"+id;
		var ventas_realizadasID="SEDE_VENTAS_REALIZADAS"+id;
		var cod_responsableID="SEDE_COD_RESPONSABLE"+id;
		var borrar = "BORRAR" + id;
		var actualizar = "ACTUALIZAR" + id;

		editarsede_codigoID=sede_codigoID+"-editar";
		editarnombreID=nombreID+"-editar";
		editardescripcionID=descripcionID+"-editar";
		editardireccionID=direccionID+"-editar";
		editartelefonoID=telefonoID+"-editar";
		editarresponsableID=responsableID+"-editar";
		editarplan_ventasID=plan_ventasID+"-editar";
		editarventas_realizadasID=ventas_realizadasID+"-editar";


		var sede_codigo=document.getElementById(sede_codigoID).innerHTML; 
		var nombre=document.getElementById(nombreID).innerHTML;
		var descripcion=document.getElementById(descripcionID).innerHTML;
		var direccion=document.getElementById(direccionID).innerHTML;
		var telefono=document.getElementById(telefonoID).innerHTML;
		responsable=document.getElementById(responsableID).innerHTML;
		var plan_ventas=document.getElementById(plan_ventasID).innerHTML;
		var ventas_realizadas=document.getElementById(ventas_realizadasID).innerHTML;
		cod_responsable=document.getElementById(cod_responsableID).innerHTML;
		var parent= document.querySelector("#" + sede_codigoID);
		if (parent.querySelector("#" + editarsede_codigoID) === null ) {


			document.getElementById(nombreID).innerHTML = '<input type ="text" id="'+editarnombreID+'" value="'+nombre+'">';
			document.getElementById(descripcionID).innerHTML = '<input type ="text" id="'+editardescripcionID+'" value="'+descripcion+'">';
			document.getElementById(direccionID).innerHTML = '<input type ="text" id="'+editardireccionID+'" value="'+direccion+'">';
			document.getElementById(telefonoID).innerHTML = '<input type ="text" id="'+editartelefonoID+'" value="'+telefono+'">';
			document.getElementById(responsableID).innerHTML = '<input type ="button" id="'+editarresponsableID+'" value="'+responsable+' " onclick="cambioResponsable()">';
			document.getElementById(plan_ventasID).innerHTML = '<input type ="text" id="'+editarplan_ventasID+'" value="'+plan_ventas+'">';
			document.getElementById(ventas_realizadasID).innerHTML = '<input type ="text" id="'+editarventas_realizadasID+'" value="'+ventas_realizadas+'">';
			document.getElementById(borrar).disabled="true"; 
			document.getElementById(actualizar).style.display="block";
			
		}
	}
}

	function cambioResponsable() {

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
				document.getElementById("responsable_actual").value=cod_responsable;
				document.getElementById("responsable_actual_nombre").value=responsable;
				cargaTeclas();
			}
		}
		xmlhttp.open("GET", "../modelo/modelo_sedes.php?cambiar_responsable="+"si", false);
		xmlhttp.send();

	}

	function buscaResponsable(responsable_buscar) {

		var xmlhttp;

		if(window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function () {
			if (this.readyState === 4 && this.status === 200) {

				document.getElementById("responsable_nuevo_nombre").value=xmlhttp.responseText;
				responsable_grabar=document.getElementById("responsable_nuevo_nombre").value;
				id_responsable_grabar=responsable_buscar;
			}
		}
		xmlhttp.open("GET", "../modelo/modelo_sedes.php?busca_responsable="+"si"+"&responsable_buscar="+responsable_buscar, false);
		xmlhttp.send();

	}
	function buscaResponsableNuevo(responsable_buscar) {

		var xmlhttp;

		if(window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function () {
			if (this.readyState === 4 && this.status === 200) {

				var resultado_responsable=xmlhttp.responseText;
				document.getElementById("nom_responsable_sede").value=resultado_responsable;
				if (resultado_responsable.includes("INEXISTENTE")) {
					alert("Responsable Inexistente");
					enfoca("cod_responsable_sede");
				} else {
					enfoca("plan_vtas_sede");
				}
			}
		}
		xmlhttp.open("GET", "../modelo/modelo_sedes.php?busca_responsable="+"si"+"&responsable_buscar="+responsable_buscar, false);
		xmlhttp.send();

	}

	function buscaSede(sede_buscar) {

		var xmlhttp;

		if(window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function () {
			if (this.readyState === 4 && this.status === 200) {

				var sede_nombre = xmlhttp.responseText;

				if (!sede_nombre.includes("INEXISTENTE")) {

					document.getElementById("nombre_sede").value=xmlhttp.responseText;

					alert("Sede ya Existe");
					} else {
						sede_grabar=sede_buscar;
						habilitaCampos();
						enfoca("nombre_sede");
					}
			}
		}
		xmlhttp.open("GET", "../modelo/modelo_sedes.php?buscar_sede="+"si"+"&sede_buscar="+sede_buscar, false);
		xmlhttp.send();

	}

	function leeresponsableActual() {

		var xmlhttp;
		if(window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function () {
			if (this.readyState === 4 && this.status === 200) {
				resultadoconsulta.innerHTML=xmlhttp.responseText;
				leeresponsableActual();
			}
		}
		xmlhttp.open("GET", "../modelo/modelo_sedes.php?cambiar_responsable="+"si", true);
		xmlhttp.send();
	}

	function confirmarResponsable(){

		if (!responsable_grabar.includes ("INEXISTENTE")) {
			
			document.getElementById(editarresponsableID).value=responsable_grabar;
		}
	}

	function cierraVentana(){

			document.getElementById("nuevaVentana").style.width="35%";
			overlay.style.display="none";
			nuevaVentana.style.display="none";
	}
	function actualizarSedes(id) {

				var confirma= confirm("¿ Actualizar datos ?");

				if (confirma) {

						var xmlhttp;
						if(window.XMLHttpRequest) {

							xmlhttp = new XMLHttpRequest();

						} else {
							xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
						}

						var nombreAc= document.getElementById(editarnombreID).value;
						var descripcionAc= document.getElementById(editardescripcionID).value;
						var direccionAc= document.getElementById(editardireccionID).value;
						var telefonoAc=document.getElementById(editartelefonoID).value;
						var responsableAc=document.getElementById(editarresponsableID).value;
						var plan_ventasAc=document.getElementById(editarplan_ventasID).value;
						var ventas_realizadasAc=document.getElementById(editarventas_realizadasID).value;
						var id_responsableAc=id_responsable_grabar;
						xmlhttp.onreadystatechange = function () {
							if (this.readyState === 4 && this.status === 200) {
				 				var meresponde=xmlhttp.responseText;
								var mensaje=meresponde;
								if (mensaje.includes("No ejecutado")) {
									alert(meresponde);
								}
									actualizando=false;
				 				 	mostrarSedes(pagina_actual);
							}
					}
				xmlhttp.open("GET", "../modelo/modelo_sedes.php?actualizar="+"si"+"&codigoAc="+id+"&nombreAc="+nombreAc+"&descripcionAc="+descripcionAc+"&direccionAc="+direccionAc+"&telefonoAc="+telefonoAc+"&id_responsableAc="+id_responsableAc+"&plan_ventasAc="+plan_ventasAc+"&ventas_realizadasAc="+ventas_realizadasAc, true);

				xmlhttp.send();
		} else {
			actualizando=false;
			
			mostrarSedes(pagina_actual);
		}
	}
		

		function borrarSede(id) {

			var respuesta = confirm("Estas seguro de borrar esta Sedes?");

			if (respuesta ===true ) {
				var xmlhttp;
				if(window.XMLHttpRequest) {
					xmlhttp = new XMLHttpRequest();
					} else {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
				xmlhttp.onreadystatechange = function () {
				if (this.readyState === 4 && this.status === 200) {
 				preparoMostrarSedes();

				}
			}
				xmlhttp.open("GET", "../modelo/modelo_sedes.php?id_sedeeliminada="+id,true);
				xmlhttp.send();
		 }
	}


	var overlay = document.getElementById("overlay");
	var nuevaVentana= document.getElementById("nuevaVentana");

	function ejecutarNuevaVentana(){

		//document.getElementById("nuevaVentana").style.height="70%";
		document.getElementById("nuevaVentana").style.width="35%";

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
				inhabilitaCampos();
				cargaTeclas();
			}
		}
		xmlhttp.open("GET", "../modelo/modelo_sedes.php?crear_sede="+"si", false);
		xmlhttp.send();



	}

	function agregarSede() {

		var confirmado = confirm("Conforme Alta de Sede ?");

			if (confirmado) {

				var nuevo_codigo_sede=document.getElementById("codigo_sede").value;	
			 	var nuevo_nombre=document.getElementById("nombre_sede").value;
			 	var nueva_descripcion=document.getElementById("descripcion_sede").value;
			 	var nueva_direccion=document.getElementById("direccion_sede").value;
			 	var nuevo_telefono=document.getElementById("telefono_sede").value;
			 	var nuevo_cod_responsable=document.getElementById("cod_responsable_sede").value;
			 	var nuevo_plan_vtas=document.getElementById("plan_vtas_sede").value;
			 	var nuevo_vtas_realizadas=document.getElementById("vtas_realizadas_sede").value;

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
		 				preparoMostrarSedes();

		 			}
				}

		 xmlhttp.open("GET", "../modelo/modelo_sedes.php?alta_sede="+"si"+"&nuevo_codigo_sede="+nuevo_codigo_sede+"&nuevo_nombre="+nuevo_nombre+"&nueva_descripcion="+nueva_descripcion+"&nueva_direccion="+nueva_direccion+"&nuevo_telefono="+nuevo_telefono+"&nuevo_cod_responsable="+nuevo_cod_responsable+"&nuevo_plan_vtas="+nuevo_plan_vtas+"&nuevo_vtas_realizadas="+nuevo_vtas_realizadas, true);
				xmlhttp.send();
		
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

	function cargaTeclas(){

			$("#responsable_nuevo").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==13 || keycode==40)  {
					var responsable_buscar=document.getElementById("responsable_nuevo").value;
					buscaResponsable(responsable_buscar);
				}
    			
			});

			$("#codigo_sede").focus( function(e){
				
				inhabilitaCampos();

			});

			$("#codigo_sede").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==13 || keycode==40)  {
						var sede_buscar=document.getElementById("codigo_sede").value;
						if (sede_buscar.length==3){
						buscaSede(sede_buscar);
					}
				}
			});

			$("#nombre_sede").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==13 || keycode==40)  {
					enfoca("descripcion_sede");
				}
				if(keycode==38)  {
					enfoca("codigo_sede");
				}
			});

			$("#descripcion_sede").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==13 || keycode==40)  {
					enfoca("direccion_sede");
				}
				if(keycode==38)  {
					enfoca("nombre_sede");
				}
			});

			$("#direccion_sede").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==13 || keycode==40)  {
					enfoca("telefono_sede");
				}
				if(keycode==38)  {
					enfoca("descripcion_sede");
				}
			});
			$("#telefono_sede").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==13 || keycode==40)  {
					enfoca("cod_responsable_sede");
				}
				if(keycode==38)  {
					enfoca("direccion_sede");
				}
			});

			$("#cod_responsable_sede").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==13 || keycode==40)  {
						var cod_responsable_buscar=document.getElementById("cod_responsable_sede").value;
						if (cod_responsable_buscar.length==3){
						buscaResponsableNuevo(cod_responsable_buscar);
					}
				}

				if(keycode==38)  {
					enfoca("telefono_sede");
				}
			});

			$("#plan_vtas_sede").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==13 || keycode==40)  {
					enfoca("vtas_realizadas_sede");
				}
				if(keycode==38)  {
					enfoca("cod_responsable_sede");
				}
			});
			$("#vtas_realizadas_sede").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==38)  {
					enfoca("plan_vtas_sede");
				}
			});

		}

	function habilitaCampos() {

				document.getElementById("nombre_sede").disabled=false;
				document.getElementById("descripcion_sede").disabled=false;
				document.getElementById("direccion_sede").disabled=false;
				document.getElementById("telefono_sede").disabled=false;
				document.getElementById("cod_responsable_sede").disabled=false;
				
				document.getElementById("plan_vtas_sede").disabled=false;
				document.getElementById("vtas_realizadas_sede").disabled=false;
				
			}

	function inhabilitaCampos() {

				document.getElementById("nombre_sede").disabled=true;
				document.getElementById("descripcion_sede").disabled=true;
				document.getElementById("direccion_sede").disabled=true;
				document.getElementById("telefono_sede").disabled=true;
				document.getElementById("cod_responsable_sede").disabled=true;
				document.getElementById("nom_responsable_sede").disabled=true;
				document.getElementById("plan_vtas_sede").disabled=true;
				document.getElementById("vtas_realizadas_sede").disabled=true;
		
		}

</script>

