<!DOCTYPE html>
<html>
<head>
	<title>  MIS LIBROS  </title>
<meta charset="utf-8">
	<link rel="shortcut icon" type="image/png" href="../arnetlogo2.png">
 	<link rel="stylesheet" href="../vista/fontawesome/css/all.css">
 	<link rel="stylesheet" href="../vista/css/esalvaro.css">

	<!-- BOOTSTRAP CSS -->
	<link rel="stylesheet" href="../vista/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../vista/bootstrap/css/bootstrap-theme.min.css">

  	<script type="text/javascript" src="../controlador/jquery/jquery-3.4.1.min.js"></script>
 <!-- 	<script type="text/javascript" src="../controlador/jquery/jquery.js"></script><-->
  	<style type="text/css">

*/ 		#principale {
 
  			width:1200px; 
  			height:950px;
  			margin:0 auto;
  			border:1px solid;
  			background-color:white;
  		}
*/
		#principale {
			display:block;
			background-color:#DFECF0;
  			width:90%;
  			min-width:360px;
  			padding: 1%;
  			margin:0 auto;
  			border: groove #0084d1;
  			opacity:0.4;
			margin-top:10%;			
		 	text-align:center;
 			
		} 
  		
		
  	</style>

</head>
<body>
<div id="header-referencias">
		<div id="titulo-referencias">
 			<div> Mis Libros     v 2.0</div>
		</div>
</div>
<div id="overlay"></div>
<div id="nuevaVentana">
	<div id="box-header">Añadir Ejemplar</div>
	<button onmousedown="ejecutarNuevaVentana()" class="btn btn-primary" id="botonCerrar">
		<i class="fa  fa-door-open"></i>
	</button><br><br><br>
		<br><br>
		<label style="margin-left:2%;">Autor: </label><input type="" size="30" maxlength="30" id="nuevoAutorId"/><br><br>
		<label style="margin-left:2%;">Editorial: </label><input type="" size="30" maxlength="30" id="nuevoEditorialId" style="white-space:nowrap"/><br><br>
		<label style="margin-left:2%;">Isbn: </label><input type="" size="15" maxlength="15" id="nuevoIsbnId"/><br><br>
		<label style="margin-left:2%;" >Ubicación: </label><input type="" size="15" maxlength="15" id="nuevoUbicacionId"/><br><br>
		<label style="margin-left:2%;">Título: </label><input type="" size="40" maxlength="40" id="nuevoTituloId"/><br><br>
		<label style="margin-left:2%;">Género: </label><input type="" size="20" maxlength="20" id="nuevoGeneroId"/><br><br>
		<label style="margin-left:2%;">Sub-genero: </label><input type="" size="20" maxlength="20" id="nuevoSubgeneroId"/><br><br>
		<label style="margin-left:2%;">Propiedad:  </label>;
				<select id="nuevoPropiedadId">
				<option value="Elija ">Elija propietario</option>
				<option value="ABH">ALVARO</option>';
				<option value="MHR">MARIBEL</option>';
				<option value="DBH">DANIEL</option>';
				<option value="FBH">FELI</option>';
				<option value="FBF">TATO</option>';
				</select>';
				<br><br>
		<span id="feedback"></span>
	<button onmousedown="agregarLibro()" style="margin-left:40%;" class="btn btn-success">Añadir Ejemplar</button><br>
</div>

<div id="wrapper">
	<div id="crud_gral"></div>
</div>

<script type="text/javascript">
	
	var clasifica="ID";
	var resultado = document.getElementById("crud_gral");
	document.getElementById("nuevaVentana").style.height="20%";
	var num_registros;
	var num_paginas;
	var pagina_actual;
	var muestro_pagina;
	var actualizando=false;
	var sw_solo=false;
	var propietario="";
 
	function mostrarLibros(pagina){

		if (!actualizando) {

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

				resultado.innerHTML = xmlhttp.responseText;
				document.getElementById("mostrarpagina").innerHTML+=" ("+clasifica+")";
				$(".botones").css({"background-color":'#AACFCF'});
				$(".botones").css({"color":'#fff'});
			}
		}
		xmlhttp.open("GET", "../modelo/modelo_libros.php?libros=" + "libros"+"&clasifica="+clasifica+"&pagina="+pagina+"&num_paginas="+num_paginas+"&sw_solo="+sw_solo+"&propietario="+propietario, true);
		xmlhttp.send();
	}
}
	function porId(){

		if (!actualizando){
		clasifica="ID";
		preparoMostrarLibros();
		}
	}
	function porA(){

		if (!actualizando) {
		clasifica="Autor";
		preparoMostrarLibros();
		}
	}
	function porE(){

		if (!actualizando) {
		clasifica="Editorial";
		preparoMostrarLibros();
		}
	}
	function porT(){

		if (!actualizando) {
		clasifica="titulo";
		preparoMostrarLibros();
		}
	}
	function porP(){

		if (!actualizando) {
		clasifica="propietario";
		preparoMostrarLibros();
		}
	}

	function vertodos(){

		sw_solo=false;
		preparoMostrarLibros();
	}



	function preparoMostrarLibros(){

			var xmlhttp;
			if(window.XMLHttpRequest) {
				xmlhttp = new XMLHttpRequest();
				} else {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function () {
				if (this.readyState === 4 && this.status === 200) {

 				num_registros = xmlhttp.responseText;
				mostrarLibros(1);

				}
		}
		xmlhttp.open("GET", "../modelo/modelo_libros.php?acontar="+"si"+"&sw_solo="+sw_solo+"&propietario="+propietario, true);
		xmlhttp.send();
	}

	clasifica="ID";
	preparoMostrarLibros();

	function retrocedoPagina(hastaDonde) {

		if (!actualizando){

		if (hastaDonde=="inicio"){

				mostrarLibros(1);

		} else {
		
			if (pagina_actual > 1) {

				muestro_pagina = pagina_actual - 1;

				mostrarLibros(muestro_pagina);
			}
		}
	  }
	}

	function avanzoPagina(hastaDonde, paginaFinal) {

		if (!actualizando) {

		if (hastaDonde=="final") {

				mostrarLibros(paginaFinal);
 
		} else {
 
		if (pagina_actual < num_paginas) {

			muestro_pagina = pagina_actual + 1;

			mostrarLibros(muestro_pagina);

			}
		}
      }
	}

	function avanzoNpaginas(hasta){

		var hacia=document.getElementById("avanzonpaginas").value;
		
		document.getElementById("avanzonpaginas").value=("1-"+hasta);

		if (hacia>=0 && hacia<=hasta && !isNaN(hacia) && hacia!=""){
			mostrarLibros(hacia);
		}
	}
	
	function editarLibros(id) {


		if (!actualizando) {

		actualizando=true;
		var idID="ID" + id;
		var autorID="Autor"+id;
		var editorialID="Editorial"+id;
		var isbnID="isbn"+id;
		var ubicacionID="ubicacion"+id;
		var tituloID="titulo"+id;
		var generoID="genero"+id;
		var sub_generoID="sub_genero"+id;
		var propietarioID="propietario"+id;

		var borrar = "BORRAR" + id;
		var actualizar = "ACTUALIZAR" + id;

		var editaridID=idID+"-editar";
		var editarautorID=autorID+"-editar";
		var editareditorialID=editorialID+"-editar";
		var editarisbnID=isbnID+"-editar";
		var editarubicacionID=ubicacionID+"-editar";
		var editartituloID=tituloID+"-editar";
		var editargeneroID=generoID+"-editar";
		var editarsub_generoID=sub_generoID+"-editar";
		var editarpropietarioID=propietarioID+"-editar";


		//var id=document.getElementById(idID).innerHTML; 
		var autor=document.getElementById(autorID).innerHTML;
		var editorial=document.getElementById(editorialID).innerHTML;
		var isbn=document.getElementById(isbnID).innerHTML;
		var ubicacion=document.getElementById(ubicacionID).innerHTML;
		var titulo=document.getElementById(tituloID).innerHTML;
		var genero=document.getElementById(generoID).innerHTML;
		var sub_genero=document.getElementById(sub_generoID).innerHTML;
		var propietario=document.getElementById(propietarioID).innerHTML;


		var parent= document.querySelector("#" + idID);

		if (parent.querySelector("#" + editaridID) === null ) {


			document.getElementById(autorID).innerHTML = '<input type ="text" size="15" maxlength="30" id="'+editarautorID+'" value="'+autor+'">';
			document.getElementById(editorialID).innerHTML = '<input type ="text" size="15" maxlength="30" id="'+editareditorialID+'" value="'+editorial+'">';
			document.getElementById(isbnID).innerHTML = '<input type ="text" size="15" maxlength="25" id="'+editarisbnID+'" value="'+isbn+'">';
			document.getElementById(ubicacionID).innerHTML = '<input type ="text" size="15" maxlength="15" id="'+editarubicacionID+'" value="'+ubicacion+'">';
			document.getElementById(tituloID).innerHTML = '<input type ="text" size="15" maxlength="40" id="'+editartituloID+'" value="'+titulo+'">';
			document.getElementById(generoID).innerHTML = '<input type ="text" size="15" maxlength="20" id="'+editargeneroID+'" value="'+genero+'">';
			document.getElementById(sub_generoID).innerHTML = '<input type ="text" size="15" maxlength="20" id="'+editarsub_generoID+'" value="'+sub_genero+'">';

			document.getElementById(propietarioID).innerHTML = '<select  id="'+editarpropietarioID+'">'+
				'<option value="Elija">Elija </option><option value="ABH">ALVARO</option><option value="MHR">MARIBEL</option><option value="DBH">DANIEL</option><option value="FBH">FELI</option><option value="FBF">TATO</option></select>';

			document.getElementById(borrar).disabled="true";
			document.getElementById(actualizar).style.display="block";
		}
	}
}

	

	function actualizarLibros(id) {

		var xmlhttp;

		if(window.XMLHttpRequest) {

			xmlhttp = new XMLHttpRequest();

		} else {

			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}

		var autorActualizado= document.getElementById("Autor"+id+"-editar").value;
		var editorialActualizada= document.getElementById("Editorial"+id+"-editar").value;
		var isbnActualizada= document.getElementById("isbn"+id+"-editar").value;
		var ubicacionActualizada= document.getElementById("ubicacion"+id+"-editar").value;
		var tituloActualizado= document.getElementById("titulo"+id+"-editar").value;
		var generoActualizado= document.getElementById("genero"+id+"-editar").value;
		var sub_generoActualizado= document.getElementById("sub_genero"+id+"-editar").value;
		var propietarioActualizado= document.getElementById("propietario"+id+"-editar").value;

		xmlhttp.onreadystatechange = function () {

			if (this.readyState === 4 && this.status === 200) {

 				var meresponde=xmlhttp.responseText;
				var mensaje=meresponde;
				if (mensaje.includes("No ejecutado")) {
					alert(meresponde);
				}
					actualizando=false;
 				
 				 	mostrarLibros(pagina_actual);
			}

	}

		xmlhttp.open("GET", "../modelo/modelo_libros.php?param1="+id+"&param2="+autorActualizado+"&param3="+editorialActualizada+"&param4="+isbnActualizada+"&param5="+ubicacionActualizada+"&param6="+tituloActualizado+"&param7="+generoActualizado+"&param8="+sub_generoActualizado+"&param9="+propietarioActualizado, true);
		xmlhttp.send();
	
}
		

		function borrarLibro(id) {


			var respuesta = confirm("Estas seguro de borrar este Libraco, señor Inquisidor?");
			
			if (respuesta ===true ) {

				var xmlhttp;

				if(window.XMLHttpRequest) {
					
					xmlhttp = new XMLHttpRequest();

					} else {

					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

					}
				
				xmlhttp.onreadystatechange = function () {

				if (this.readyState === 4 && this.status === 200) {

 				preparoMostrarLibros();

				}
			}

				xmlhttp.open("GET", "../modelo/modelo_libros.php?borrarlibro="+"si"+"&idEliminado="+id,true);
				xmlhttp.send();
		
		 }
	}


	var overlay = document.getElementById("overlay");
	
	var nuevaVentana= document.getElementById("nuevaVentana");
	

	function soloPropietario() {


	}

	function marcaSeleccion(){


		sw_solo=true;
		propietario=document.getElementById("solopropiedad").value;
		preparoMostrarLibros();

	}



	function ejecutarNuevaVentana(){


		overlay.style.opacity = .7;

		if (overlay.style.display == "block") {

			overlay.style.display="none";
			nuevaVentana.style.display="none";
		} else {
			overlay.style.display="block";
			nuevaVentana.style.display="block";
		}

		document.getElementById("feedback").innerHTML="";

		document.getElementById("nuevoAutorId").value="";
		document.getElementById("nuevoEditorialId").value="";
		document.getElementById("nuevoIsbnId").value="";
		document.getElementById("nuevoUbicacionId").value="";
		document.getElementById("nuevoTituloId").value="";
		document.getElementById("nuevoGeneroId").value="";
		document.getElementById("nuevoSubgeneroId").value="";
		document.getElementById("nuevoPropiedadId").value="";
	}

	function agregarLibro() {


		var nuevoAutor=document.getElementById("nuevoAutorId").value;	
		var nuevoEditorial=document.getElementById("nuevoEditorialId").value;	
		var nuevoIsbn=document.getElementById("nuevoIsbnId").value;	
		var nuevoUbicacion=document.getElementById("nuevoUbicacionId").value;
		var nuevoTitulo=document.getElementById("nuevoTituloId").value;	
		var nuevoGenero=document.getElementById("nuevoGeneroId").value;	
		var nuevoSubgenero=document.getElementById("nuevoSubgeneroId").value;	
		var nuevoPropiedad=document.getElementById("nuevoPropiedadId").value;	
	 	

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

 				preparoMostrarLibros();

 				}
			}


 		xmlhttp.open("GET", "../modelo/modelo_libros.php?nuevoLibro="+"si"+"&nuevoAutor="+nuevoAutor+"&nuevoEditorial="+nuevoEditorial+"&nuevoIsbn="+nuevoIsbn+"&nuevoUbicacion="+nuevoUbicacion+"&nuevoTitulo="+nuevoTitulo+"&nuevoGenero="+nuevoGenero+"&nuevoSubgenero="+nuevoSubgenero+"&nuevoPropiedad="+nuevoPropiedad, true);
		xmlhttp.send();
	 
					 
	}


</script>

</body>
</html>



					