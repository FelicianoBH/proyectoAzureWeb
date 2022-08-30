<div id="header-referencias">
		<div id="titulo-referencias">
 			<div>Familias</div>
		</div>
</div> 
<br><br>
<div id="overlay"></div>
<div id="nuevaVentana">

			<div id="box-header">Añadir Familia</div>
				<button onmousedown="ejecutarNuevaVentana()" class="btn btn-primary" id="botonCerrar">
			<i class="fa  fa-door-open"></i>
			</button><br><br>

			<div id="divac1">
				<p>
				<label for="codigo">Código Familia : </label>
				<input type="text" id="codigo" size="12" maxlength="12" onfocus="colorTexto(this.id)"   onblur="noFoco(this.id)" style="width:110px;height:35px"/></p>
		    </div>
		     <div id="divac2"> 
		     	<p>
			    <label for="descripcion">Nombre: </label>
			     <input type="text" id="nombre" size="40" maxlength="40"  style="width:350px;height:35px;font-size:12px;"  /></p>
		    </div>
		     <div id="divac3">
		     	<p>
			    <label for="proveedor">Descuento 1: </label>
			    <input type="text" id="descuento_1" size="5" maxlength="7"  style="width:110px;height:35px;font-size:12px;"/></p>
		    </div> 
 			<div id="divac4">
 				<p>
			    <label for="proveedor">Descuento 2: </label>
			    <input type="text" id="descuento_2" size="5" maxlength="7"  style="width:110px;height:35px;font-size:12px;"/></p>
		    </div> 
 			 <br><br>
		<span id="feedback"></span>
	<button onmousedown="agregarFamilia()" style="margin-left:40%;" class="btn btn-success">Añadir Familia</button><br><br>
</div>

<div id="wrapper" style="margin-left:150px;padding:10px">
	<div id="crud_gral" style="margin-left:0px;"></div>
</div>
<script type="text/javascript">

	

	var resultado = document.getElementById("crud_gral");
	document.getElementById("nuevaVentana").style.height="20%";
	var num_registros;
	var num_paginas;
	var pagina_actual;
	var muestro_pagina;
	var actualizando=false;
	var g_nombreID="";
	var g_descuento1ID="";
	var g_descuento2ID="";
 	var permito_alta=false;
 	var desdecodigo="";


	function mostrarFamilias(pagina){

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
		xmlhttp.open("GET", "../modelo/modelo_familia.php?familias="+"si"+"&pagina="+pagina+"&num_paginas="+num_paginas+"&desdecodigo="+desdecodigo, true);
		xmlhttp.send();
	}


	function preparoMostrarFamilias(){

			var xmlhttp;
			if(window.XMLHttpRequest) {
				xmlhttp = new XMLHttpRequest();
				} else {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function () {
				if (this.readyState === 4 && this.status === 200) {

 				num_registros = xmlhttp.responseText;
				mostrarFamilias(1);

				}
		}
		xmlhttp.open("GET", "../modelo/modelo_familia.php?acontar="+"si"+"&desdecodigo="+desdecodigo, true);
		xmlhttp.send();
	}

	preparoMostrarFamilias();

	function desdeCodigo(){

			if (!actualizando) {
			desdecodigo=document.getElementById("desdecodigo").value;
			preparoMostrarFamilias();
		}
	}

	function iraPagina(){

			if (!actualizando) {
			var eligepagina=document.getElementById("eligepagina").value;
			if (eligepagina >= 1 && eligepagina <=num_paginas) {
				muestro_pagina= eligepagina;
				mostrarFamilias(muestro_pagina);
			}
		}
	}

	function retrocedoPagina() {

			if (!actualizando) {
			if (pagina_actual > 1) {
				pagina_actual--;
				muestro_pagina = pagina_actual;
				mostrarFamilias(muestro_pagina);
			}
		}
	}

	function avanzoPagina() {

			if (!actualizando) {
			if (pagina_actual < num_paginas) {
				pagina_actual++;
				muestro_pagina=pagina_actual;
				document.getElementById("eligepagina").innerHTML=muestro_pagina;
				mostrarFamilias(muestro_pagina);
			}
		}
	}
	

	function editarFamilia(id) {


		if (!actualizando) {

		actualizando=true;
		var codigoID="FAM_CODIGO" + id;
		var nombreID="FAM_NOMBRE"+id;
		var descuento1ID="FAM_DESCUENTO1"+id;
		var descuento2ID="FAM_DESCUENTO2"+id;
		var borrar = "BORRAR" + id;
		var actualizar = "ACTUALIZAR" + id;

		var editarcodigoID=codigoID+"-editar";
		var editarnombreID=nombreID+"-editar";
		var editardescuento1ID=descuento1ID+"-editar";
		var editardescuento2ID=descuento2ID+"-editar";



		var codigo=document.getElementById(codigoID).innerHTML; 
		var nombre=document.getElementById(nombreID).innerHTML;
		var descuento1=document.getElementById(descuento1ID).innerHTML;
		var descuento2=document.getElementById(descuento2ID).innerHTML;
		g_nombreID=editarnombreID;
		g_descuento1ID=editardescuento1ID;
		g_descuento2ID=editardescuento2ID;
		var parent= document.querySelector("#" + codigoID);

		if (parent.querySelector("#" + editarcodigoID) === null ) {


			document.getElementById(nombreID).innerHTML = '<input type ="text" id="'+editarnombreID+'" value="'+nombre+'">';
			document.getElementById(descuento1ID).innerHTML = '<input type ="text" id="'+editardescuento1ID+'" value="'+descuento1+'">';
			document.getElementById(descuento2ID).innerHTML = '<input type ="text" id="'+editardescuento2ID+'" value="'+descuento2+'">';
			
			document.getElementById(borrar).disabled="true";
			document.getElementById(actualizar).style.display="block";
		}
	}
}

	function actualizarFamilia(id) {

				var confirma= confirm("¿ Actualizar datos ?");

				if (confirma) {

						var xmlhttp;
						if(window.XMLHttpRequest) {

							xmlhttp = new XMLHttpRequest();

						} else {
							xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
						}
						var nombreActualizado= document.getElementById(g_nombreID).value;
						var descuento1Actualizado= document.getElementById(g_descuento1ID).value;
						var descuento2Actualizado= document.getElementById(g_descuento2ID).value;
						xmlhttp.onreadystatechange = function () {

							if (this.readyState === 4 && this.status === 200) {

				 				var meresponde=xmlhttp.responseText;
								var mensaje=meresponde;
								if (mensaje.includes("No ejecutado")) {
									alert(meresponde);
								}
									actualizando=false;
				 				
				 				 	mostrarFamilias(pagina_actual);
							}
					}
					xmlhttp.open("GET", "../modelo/modelo_familia.php?actualizar_fam="+"si"+"&codigo="+id+"&nombreActualizado="+nombreActualizado+"&descuento1Actualizado="+descuento1Actualizado+"&descuento2Actualizado="+descuento2Actualizado, true);

				xmlhttp.send();
		} else {
			actualizando=false;
			
			mostrarFamilias(pagina_actual);
		}
	}
		

		function borrarFamilia(id) {


			var respuesta = confirm("Estas seguro de borrar esta Familia?");
			
			if (respuesta ===true ) {

				var xmlhttp;

				if(window.XMLHttpRequest) {
					
					xmlhttp = new XMLHttpRequest();

					} else {

					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

					}
				
				xmlhttp.onreadystatechange = function () {

				if (this.readyState === 4 && this.status === 200) {

 				preparoMostrarFamilias();

				}
			}

				xmlhttp.open("GET", "../modelo/modelo_familia.php?borrar="+"si"+"&familia_borrar="+id,true);
				xmlhttp.send();
		
		 }
	}


	var overlay = document.getElementById("overlay");
	var nuevaVentana= document.getElementById("nuevaVentana");

	function ejecutarNuevaVentana(){

		cargaTeclas();
		document.getElementById("nuevaVentana").style.width="30%";

		overlay.style.opacity = .7;

		if (overlay.style.display == "block") {

			overlay.style.display="none";
			nuevaVentana.style.display="none";
		} else {
			overlay.style.display="block";
			nuevaVentana.style.display="block";
		}

		
		enfoca("codigo");
	}

	function agregarFamilia() {

		var nuevoCodigo=document.getElementById("codigo").value;	
	 	var nuevoNombre=document.getElementById("nombre").value;
	 	var nuevoDescuento1=document.getElementById("descuento_1").value;
	 	var nuevoDescuento2=document.getElementById("descuento_2").value;

	 	var valida=confirm("Confirma Alta de Familia ?");

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
 				preparoMostrarFamilias();

 				}
			}

 		xmlhttp.open("GET", "../modelo/modelo_familia.php?alta="+"si"+"&nuevoCodigo="+nuevoCodigo+"&nuevoNombre="+nuevoNombre+"&nuevoDescuento1="+nuevoDescuento1+"&nuevoDescuento2="+nuevoDescuento2, true);
		xmlhttp.send();
	  } 
					 
	}

	function cargaTeclas() {


			$("#codigo").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==13 || keycode==40)  {

					var id_familia=document.getElementById("codigo").value;

					if (id_familia.length==3) {

								permito_alta=false;
								buscaFamilia(id_familia);

								if (!existe_familia) {

											$("#nombre").prop("disabled", false);
						    				$("#descuento_1").prop("disabled", false);
						    				$("#descuento_2").prop("disabled", false);
						    				$("#botonGrabar").prop("disabled", false);
						    				permito_alta=true;
						    				enfoca("nombre");
									} else { 
											alert("Familia ya existe");	
											permito_alta=false;
											enfoca("codigo");

											 }
						}
			}
		});
				$("#codigo").focus(function(){
					document.getElementById("codigo").value="";
					document.getElementById("nombre").value="";
					document.getElementById("descuento_1").value="";
					document.getElementById("descuento_2").value="";
    				$("#nombre").prop("disabled", true);
    				$("#descuento_1").prop("disabled", true);
    				$("#descuento_2").prop("disabled", true);
    				$("#botonGrabar").prop("disabled", true);
    			
			});
				$("#nombre").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==13 || keycode==40)  {
					enfoca("descuento_1");
				}
				if(keycode==38)  {
					enfoca("codigo");
				}
			});

			$("#descuento_1").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==13 || keycode==40)  {
						var descuento_1 = document.getElementById("descuento_1").value;
						descuento_1=parseFloat(descuento_1.replace(',','.'));
						document.getElementById("descuento_1").value=new Intl.NumberFormat("de-DE").format(descuento_1);
						if (isNaN(descuento_1)) { 
							enfoca("descuento_1");
						} else enfoca("descuento_2");
					}
					if(keycode==38)  {
						enfoca("nombre");
				}
			});

			$("#descuento_2").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==13 || keycode==40)  {
						var descuento_2 = document.getElementById("descuento_2").value;
						descuento_2=parseFloat(descuento_2.replace(',','.'));
						document.getElementById("descuento_2").value=new Intl.NumberFormat("de-DE").format(descuento_2);
						if (isNaN(descuento_2)) { 
							enfoca("descuento_2");
						} 
					}
					
				if(keycode==38)  {
					enfoca("descuento_1");
				}
			});

				$("#desdecodigo").on('keyup', function(e){
					var keycode= e.keyCode || e.which;
					if(keycode==13 || keycode==40) {
						desdeCodigo();
					}
					
				});
			
	}

	function buscaFamilia(id){

		existe_familia =false;

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

				} else { 
						existe_familia=true;
					}
				document.getElementById("nombre").value=xmlhttp.responseText;

			}
		}
		xmlhttp.open("GET", "../modelo/modelo_familia?buscafamilia="+"si"+"&id="+id, false);
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


					