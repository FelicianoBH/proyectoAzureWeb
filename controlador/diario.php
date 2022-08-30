
<div id="header-referencias">
		<div id="titulo-referencias">
 			<div>Diario Contable </div>
	 	</div>
</div>  
<div id="overlay"></div>
<div id="nuevaVentana">
	<div id="box-header"><label id="leyenda" style="margin-left:70%;">Consulta</label></div>
	<button onmousedown="cierraVentana()" class="btn btn-primary" maxlength="12" id="botonCerrar">
		<i class="fa  fa-door-open"></i>
	</button><br><br><br>
	<div id="pantallaConsulta"> 
	</div> 
		<span id="feedback"></span>
</div> 
<div id="wrapper"> 
	<div id="crud_gral">
	  <div id="selecciona-cuenta">
	  	<form>
      		<fieldset>
      			<div id="div1">
					
      		</fieldset>
      		<fieldset>
       			<div id="div4">
					<label for="desdefecha">Desde Fecha: </label>    
					<input type="date" id="desdefecha" size="12" maxlength="12" onfocus="colorTexto(this.id)" onblur="noFoco(this.id)"/>
      			</div>
      			<div id="div5">
					<label for="hastafecha">Hasta Fecha: </label>    
					<input type="date" id="hastafecha" size="12" maxlength="12" onfocus="colorTexto(this.id)" onblur="noFoco(this.id)"/>
      			</div>
      		</fieldset>
      		<fieldset>
      			<div id="div4">
					<label for="desdeasto">Desde Asiento: </label>    
					<input type="text" id="desdeasto" size="12" maxlength="12" onfocus="colorTexto(this.id)" onblur="noFoco(this.id)"/>
      			</div>
      			<div id="div5"> 
					<label for="hastaasto">Hasta Asiento: </label>    
					<input type="text" id="hastaasto" size="12" maxlength="12" onfocus="colorTexto(this.id)" onblur="noFoco(this.id)"/>
      			
					<button type="button" class='botones' onclick="preparaDiario()">  <u>L</u>ISTAR </button>
					<button type="button" class='botones' onclick="imprimirDiario()">  IMPRIMIR </button>
      			</div>
      		</fieldset>
  		</form>
 
	<div id="muestra_diario"><br></div>
	</div>
</div>

<script type="text/javascript">

	var resultado = document.getElementById("crud_gral");
	var resultadoconsulta=document.getElementById("pantallaConsulta");
	var resultado_consulta = document.getElementById("muestra_diario");
	var resultado_imprimir = document.getElementById("muestra_diario");
	document.getElementById("nuevaVentana").style.height="70%";
	var num_registros;
	var num_paginas;
	var pagina_actual;
	var muestro_pagina;
	var muestra="";
	var contenido_imprimir;
	var pagina_actual;
	var muestro_pagina;
 	var decuenta="";
	var desdefecha="";
	var desdeasto="";
	var hastafecha="";
	var hastaasto="";
	var tdebe=0;
	var thaber=0;
	var recibodebe=0;
	var recibohaber=0;

	document.getElementById("nuevaVentana").style.width="70%";

	
	function preparaDiario(){

			
			desdefecha=document.getElementById("desdefecha").value;
			hastafecha=document.getElementById("hastafecha").value;
			desdeasto=document.getElementById("desdeasto").value;
			hastaasto=document.getElementById("hastaasto").value;

			if (desdefecha=="") {
				desdefecha="0001-01-01";
				document.getElementById("desdefecha").value=desdefecha;
			}

			if (hastafecha=="") {
				hastafecha = "2100-12-31";
				document.getElementById("hastafecha").value=hastafecha;

			}

			if (desdeasto=="") {
				desdehasto=0;
				document.getElementById("desdeasto").value=desdeasto;
			}
			if (hastaasto=="") {
				hastaasto="99999";
				document.getElementById("hastaasto").value=hastaasto;
			}


			var xmlhttp;
			if(window.XMLHttpRequest) {
				xmlhttp = new XMLHttpRequest();
				} else {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function () {
				if (this.readyState === 4 && this.status === 200) {
 				num_registros = xmlhttp.responseText;
				mostrarDiario(1);
				}
		}
		xmlhttp.open("GET", "../modelo/modelo_diario.php?acontar="+"si"+"&desdefecha="+desdefecha+"&desdeasto="+desdeasto+"&hastafecha="+hastafecha+"&hastaasto="+hastaasto, true);
		xmlhttp.send();
	}

	function imprimir() {

		 
		 var nuevaventana=window.open(' ', 'popimpr');
		 nuevaventana.document.write(resultado_imprimir.innerHTML);
		 nuevaventana.document.close();
		 nuevaventana.print();
		 nuevaventana.close();
	}


	function Inicio(){
			
				$(".botones").css({"background-color":'#AACFCF'});
				$(".botones").css({"color":'#fff'});

			var xmlhttp;
			if(window.XMLHttpRequest) {
				xmlhttp = new XMLHttpRequest();
				} else {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function () {
				if (this.readyState === 4 && this.status === 200) {
				resultado_consulta.innerHTML = xmlhttp.responseText;
				sw_imprime=false;
				enfoca("desdefecha");
				}
		}

		xmlhttp.open("GET", "../modelo/modelo_diario.php?inicio="+"si", true);
		xmlhttp.send();
	}

	function mostrarDiario(pagina){

		
		pagina_actual=pagina;

		num_paginas= Math.ceil(num_registros/15);

		var xmlhttp;
		if(window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function () {

			if (this.readyState === 4 && this.status === 200) {

				
				resultado_consulta.innerHTML = xmlhttp.responseText;
				document.getElementById("mostrandopaginadia").innerHTML=" "+pagina_actual;
		} 
	}	
		xmlhttp.open("GET", "../modelo/modelo_diario.php?diario="+"si"+"&pagina="+pagina+"&num_paginas="+num_paginas+"&desdefecha="+desdefecha+"&desdeasto="+desdeasto+"&hastafecha="+hastafecha+"&hastaasto="+hastaasto, true);
		xmlhttp.send();
}
	function imprimirDiario(){
		
		var xmlhttp;
		if(window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function () {

			if (this.readyState === 4 && this.status === 200) {
				
					resultado_imprimir.innerHTML = xmlhttp.responseText;
					imprimir();
					Inicio();
						
		} 
	}	
		xmlhttp.open("GET", "../modelo/modelo_diario.php?imprimirdiario="+"si", true);
		xmlhttp.send();
}
	function iraPagina(){

		
			var eligepagina=document.getElementById("eligepaginaext").value;
			if (eligepagina >= 1 && eligepagina <=num_paginas) {
				muestro_pagina= eligepagina;
				mostrarDiario(muestro_pagina);
			}

	}

	function retrocedoPagina() {
			

			if (pagina_actual > 1) {
				pagina_actual--;
				muestro_pagina = pagina_actual;
				mostrarDiario(muestro_pagina);
		}
	}
	function avanzoPagina() {
			

			if (pagina_actual < num_paginas) {
				pagina_actual++;
				muestro_pagina=pagina_actual;
				document.getElementById("eligepaginaext").innerHTML=muestro_pagina;
				mostrarDiario(muestro_pagina);
			}
	}
		
	Inicio();

	$("#desdefecha").on('keyup', function(e){
		var keycode= e.keyCode || e.which;
		if(keycode==13 || keycode==40) {
			enfoca("hastafecha");
		}
		if (keycode==38) {
			enfoca("codcuenta");
		}
	});

	$("#hastafecha").on('keyup', function(e){
		var keycode= e.keyCode || e.which;
		if(keycode==13 || keycode==40) {
			enfoca("desdeasto");
		}
		if (keycode==38) {
			enfoca("desdefecha");
		}
	});

	$("#desdeasto").on('keyup', function(e){
		var keycode= e.keyCode || e.which;
		if(keycode==13 || keycode==40) {
			enfoca("hastaasto");
		}
		if (keycode==38) {
			enfoca("hastafecha");
		}
	});

	$("#hastaasto").on('keyup', function(e){
		var keycode= e.keyCode || e.which;
		if (keycode==13 || keycode==38) {
			preparaDiario();
		}
	});

	function enfoca(idelemento){
		
		document.getElementById(idelemento).focus();
	}

	function colorTexto(elid){

		document.getElementById(elid).style.backgroundColor='#c7f3ed';

	}
	function noFoco(elid){

		document.getElementById(elid).style.backgroundColor='#fff';

	}


</script>


					