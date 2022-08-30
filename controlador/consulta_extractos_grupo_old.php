<div>
	<div class="container" >
				<div class="row">
					
			      	<div class="col-md-1">
			      			<div></div>
			      	</div>
			      	<div class="col-md-5">
			      			<div id="programa-en-curso" >
			      				 EXTRACTOS POR GRUPO
			      			</div>
			      	</div>
			    </div>
 		</div>
</div>   
<br>


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



<div id="wrapper"> 
	<div id="crud_gral"></div>
</div>
	  <div id="contengo" style="margin:0px auto;">
			<div class="container" style="border: 2px solid;padding:15px;">
	  	<form>
      		<fieldset>
      			<div id="div1">
					<label for="decuenta">Desde Cuenta: </label>    
					<input type="text" id="decuenta" size="12" maxlength="12" onfocus="colorTexto(this.id)" onblur="noFoco(this.id)"/>
      			</div>
				<div id="div2">
					<label for="hacuenta">Hasta Cuenta: </label>    
					<input type="text" id="hacuenta" size="12" maxlength="12" onfocus="colorTexto(this.id)" onblur="noFoco(this.id)"/>
      			</div>

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
      			</div>
      			<div id="div3">
      				<label>              </label>
					<button type="button" class='botones' onclick="preparaExtractos()">LISTAR</button>
				</div>
      		</fieldset>
 
  		</form>

	 </div>
	<div id="muestra_extractos" ><br></div>
	
	

<script type="text/javascript">

	var resultado = document.getElementById("crud_gral");
	var resultadoconsulta=document.getElementById("pantallaConsulta");
	var resultado_consulta = document.getElementById("muestra_extractos");
	document.getElementById("nuevaVentana").style.height="70%";
	var num_registros;
	var num_paginas;
	var pagina_actual;
	var muestro_pagina;
	var actualizando=false;
	var muestra="";

	var num_registrosc;
	var pagina_actual;
	var muestro_pagina;
	var num_paginasc;
	var pagina_actualc;
	var muestro_paginac;
	var num_paginasn;
	var pagina_actualn;
 	var decuenta="";
 	var hacuenta="";
	var desdefecha="";
	var desdeasto="";
	var hastafecha="";
	var hastaasto="";
	var veces=0;
	var consultar="";
	var desdecodigo="";
	var desdetitulo="";
	var ordenado="";

	document.getElementById("nuevaVentana").style.width="70%";

	function todosMovimientos(){

		document.getElementById("desdefecha").value="0000-00-00";
		document.getElementById("hastafecha").value="9999-12-31";
		document.getElementById("desdeasto").value="0000";
		document.getElementById("hastaasto").value="9999";
		preparaExtractos();
	}

	function preparaExtractos(){

			
			decuenta=document.getElementById("decuenta").value;
			hacuenta=document.getElementById("hacuenta").value;
			desdefecha=document.getElementById("desdefecha").value;
			hastafecha=document.getElementById("hastafecha").value;
			desdeasto=document.getElementById("desdeasto").value;
			hastaasto=document.getElementById("hastaasto").value;

			var xmlhttp;
			if(window.XMLHttpRequest) {
				xmlhttp = new XMLHttpRequest();
				} else {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function () {
				if (this.readyState === 4 && this.status === 200) {
 				num_registros = xmlhttp.responseText;
				mostrarExtractos(1);
				}
		}
		xmlhttp.open("GET", "../modelo/modelo_extracto_grupos.php?acontar="+"si"+"&decuenta="+decuenta+"&hacuenta="+hacuenta+"&desdefecha="+desdefecha+"&desdeasto="+desdeasto+"&hastafecha="+hastafecha+"&hastaasto="+hastaasto, true);
		xmlhttp.send();
	}

	function mostrarExtractos(pagina){

		pagina_actual=pagina;
		num_paginas= Math.ceil(num_registros/12);
		alert(nu)
		var xmlhttp;
		if(window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function () {
			if (this.readyState === 4 && this.status === 200) {
				enfoca("decuenta");
			 	var resultado_consulta = document.getElementById("muestra_extractos");
				resultado_consulta.innerHTML = xmlhttp.responseText;

				if (consultar=="s") { muestra=" Sólo movimientos Conciliados"; 
					} else if (consultar=="n") { muestra=" Sólo movimientos No Conciliados";
						} else { muestra="";}
				document.getElementById("mostrandopaginaext").innerHTML=" "+pagina_actual+" "+muestra;
				enfoca("decuenta");
				$(".botones").css({"background-color":'#AACFCF'});
				$(".botones").css({"color":'#fff'});
			}

		}
		xmlhttp.open("GET", "../modelo/modelo_extracto_grupos.php?extractos="+"si"+"&pagina="+pagina+"&num_paginas="+num_paginas+"&decuenta="+decuenta+"&hacuenta="+hacuenta+"&desdefecha="+desdefecha+"&desdeasto="+desdeasto+"&hastafecha="+hastafecha+"&hastaasto="+hastaasto, true);
		xmlhttp.send();
	}

	function despejaScreen(){
			
			var xmlhttp;
			if(window.XMLHttpRequest) {
				xmlhttp = new XMLHttpRequest();
				} else {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function () {
				if (this.readyState === 4 && this.status === 200) {
				var resultado_consulta = document.getElementById("muestra_extractos");
				resultado_consulta.innerHTML = xmlhttp.responseText;
				enfoca("defecha");
				}
		}
		xmlhttp.open("GET", "../modelo/modelo_extracto_grupos.php?inicio="+"si", true);
		xmlhttp.send();
	}

	function cargaTeclas() {

			$("#desdecodigo").on('keyup', function(e){
				var keycode= e.keyCode || e.which;
				if(keycode==13 || keycode==40) {
					desdeCodigo();
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
					iraPaginaCta();
				}
				
			});


		}



	function Inicio(){
			
				$(".botones").css({"background-color":'#AACFCF'});
				$(".botones").css({"color":'#fff'});

			cargaTeclas();
			var xmlhttp;
			if(window.XMLHttpRequest) {
				xmlhttp = new XMLHttpRequest();
				} else {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function () {
				if (this.readyState === 4 && this.status === 200) {
				var resultado_consulta = document.getElementById("muestra_extractos");
				resultado_consulta.innerHTML = xmlhttp.responseText;
				enfoca("decuenta");
				}
		}

		xmlhttp.open("GET", "../modelo/modelo_extracto_grupos.php?inicio="+"si", true);
		xmlhttp.send();
	}
	function desdeCodigo(){

			if (!actualizando) {
			desdecodigo=document.getElementById("desdecodigo").value;
			preparoMostrarCuentas();
		}
	}
	function desdeTitulo(){

			if (!actualizando) {
			desdetitulo=document.getElementById("desdetitulo").value;
			preparoMostrarCuentas();
		}
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

 				num_registrosc = xmlhttp.responseText;

				mostrarCuentas(1);

				}
		}
		xmlhttp.open("GET", "../modelo/modelo_plan_cuentas.php?acontar="+"si"+"&ordenado="+ordena+"&desdecodigo="+desdecodigo+"&desdetitulo="+desdetitulo, true);
		xmlhttp.send();
	}

	function mostrarCuentas(pagina, param){

		
		pagina_actualc=pagina;

		num_paginasc= Math.ceil(num_registrosc/12);

		
		var xmlhttp;

		if(window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function () {

			if (this.readyState === 4 && this.status === 200) {

				resultadoconsulta.innerHTML = xmlhttp.responseText;

				document.getElementById("mostrandopagina").innerHTML=" "+pagina_actualc;


				$(".botones").css({"background-color":'#AACFCF'});
				$(".botones").css({"color":'#fff'});

				cargaTeclas();
			
			}
		}
		xmlhttp.open("GET", "../modelo/modelo_consulta_plan.php?cuentas="+"cuentas"+"&edicion="+"consulta_extractos"+"&pagina="+pagina+"&num_paginas="+num_paginasc+"&ordenado="+ordena+"&desdecodigo="+desdecodigo+"&desdetitulo="+desdetitulo, true);
		xmlhttp.send();
	}


	function retrocedoPaginaCta() {

			if (pagina_actualc > 1) {
				pagina_actualc--;
				muestro_pagina = pagina_actualc;
				mostrarCuentas(muestro_pagina);
			
		}
	}


	function iraPaginaCta(){

			var eligepagina=document.getElementById("eligepagina").value;
			if (eligepagina >= 1 && eligepagina <=num_paginasc) {
				muestro_pagina= eligepagina;
				mostrarCuentas(muestro_pagina);
			}
	}

	function avanzoPaginaCta() {


		if (pagina_actualc < num_paginasc) {
			pagina_actualc++;
			muestro_pagina = pagina_actualc;
			mostrarCuentas(muestro_pagina);

		}

	}

	function iraPagina(){

			var eligepagina=document.getElementById("eligepaginaext").value;
			if (eligepagina >= 1 && eligepagina <=num_paginas) {
				muestro_pagina= eligepagina;
				mostrarExtractos(muestro_pagina);
			}

	}

	function retrocedoPagina() {

			if (pagina_actual > 1) {
				pagina_actual--;
				muestro_pagina = pagina_actual;
				mostrarExtractos(muestro_pagina);
		}
	}
	function avanzoPagina() {

			if (pagina_actual < num_paginas) {
				pagina_actual++;
				muestro_pagina=pagina_actual;
				document.getElementById("eligepaginaext").innerHTML=muestro_pagina;
				mostrarExtractos(muestro_pagina);
			}
	}

		function seleccionarCuentaExtractos(id) {
			document.getElementById("codcuenta").value = id;
			overlay.style.display="none";
			nuevaVentana.style.display="none";
			buscaCuenta();

		}

		function buscaCuenta() {

			document.getElementById("nuevaVentana").style.width="70%";
			var codigo_cuenta=document.getElementById("codcuenta").value;
			
			var xmlhttp;
			
		if(window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function () {
			if (this.readyState === 4 && this.status === 200) {

						try {
							var obj = JSON.parse(xmlhttp.responseText);
							var titulocuenta=obj.titulo;
							var saldocuenta=obj.saldo;

						} catch(e) {
							 buenjason=false;
						}

			document.getElementById("titulo").value= titulocuenta;
			consultar="";
			document.getElementById("conciliados").style.backgroundColor='#AACFCF';
			document.getElementById("noconciliados").style.backgroundColor='#AACFCF';
			document.getElementById("ambos").style.backgroundColor='#AACFCF';
			despejaScreen();

			}
		}
		xmlhttp.open("GET", "../modelo/modelo_asientos.php?cuenta="+codigo_cuenta, true);
		xmlhttp.send();

	}


	function buscarCuentaB() {
			
			var codigo_cuenta=document.getElementById("nuevaCuentaId").value;
			var xmlhttp;

		if(window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}

		xmlhttp.onreadystatechange = function () {

			if (this.readyState === 4 && this.status === 200) {

			document.getElementById("nuevoTituloId").value = xmlhttp.responseText;

			var nuevotitulox=document.getElementById("nuevoTituloId").value;

			if (document.getElementById("nuevoTituloId").value=="INEXISTENTE" ||
				document.getElementById("nuevoTituloId").value=="") {

						cuentaposible="no"
					}
					else
						{
							cuentaposible="si";
					}
			} 
		} 

		xmlhttp.open("GET", "../modelo/modelo_asientos.php?cuenta="+codigo_cuenta, true);
		xmlhttp.send();

	}

	var overlay = document.getElementById("overlay");
	var nuevaVentana= document.getElementById("nuevaVentana");
	Inicio();
	function cierraVentana() {

			document.getElementById("nuevaVentana").style.width="70%";
			overlay.style.display="none";
			nuevaVentana.style.display="none";
			enfoca("desdefecha");
	}

	function ejecutarNuevaVentana(sw, ordenado){


		ordena=ordenado;

		if (ordena=="CODIGO_CUENTA") {
			document.getElementById("leyenda").innerHTML="Cuentas";
		} else {document.getElementById("leyenda").innerHTML="Alfabético cuentas";}

		if (!sw) { sw="--"};

		overlay.style.opacity = .4;

		if (overlay.style.display == "block") {
			overlay.style.display="none";
			nuevaVentana.style.display="none";

		} else {
			overlay.style.display="block";
			nuevaVentana.style.display="block";
		}

		preparoMostrarCuentas(sw);
	}

	$("#codcuenta").on('keyup', function(e){
		var keycode= e.keyCode || e.which;
		if(keycode==13 || keycode==40) {
			buscaCuenta();
		}
	});

	$("#desdefecha").on('keyup', function(e){
		var keycode= e.keyCode || e.which;
		if(keycode==13 || keycode==40) {
			enfoca("hafecha");
		}
		if (keycode==38) {
			enfoca("decuenta");
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
		if (keycode==38) {
			enfoca("desdeasto");
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

$('body').on("keydown", function(e) { 
            if (e.ctrlKey  && e.which === 66) {
                buscaCuenta();
                e.preventDefault();
            }
            if (e.ctrlKey  && e.which === 67) {
                ejecutarNuevaVentana('noedicion','CODIGO_CUENTA');
                e.preventDefault();
            }
            if (e.ctrlKey  && e.which === 65) {
                ejecutarNuevaVentana('noedicion','TITULO');
                e.preventDefault();
            }
            if (e.ctrlKey  && e.which ==84) {
                todosMovimientos();
                e.preventDefault();
            }
            if (e.ctrlKey  && e.which ===79) {
                consultarConciliados();
                e.preventDefault();
            }
            if (e.ctrlKey  && e.which ===83) {
                consultarNoConciliados();
                e.preventDefault();
            }
            if (e.ctrlKey  && e.which ===77) {
                 consultarAmbos();
                e.preventDefault();
            }
			 if (e.ctrlKey  && e.which ===77) {
                 preparaExtractos();
                e.preventDefault();
            }
			
            if (e.which ===112) {
                ayuda();
                e.preventDefault();
            }
        });

	function consultaConciliados(){

			consultar="s";
			document.getElementById("conciliados").style.backgroundColor='#679B9B';
			document.getElementById("noconciliados").style.backgroundColor='#AACFCF';
			document.getElementById("ambos").style.backgroundColor='#AACFCF';
	}

	function consultaNoConciliados(){

			consultar="n";
			document.getElementById("noconciliados").style.backgroundColor='#679B9B';
			document.getElementById("conciliados").style.backgroundColor='#AACFCF';
			document.getElementById("ambos").style.backgroundColor='#AACFCF';
	}
	function consultaAmbos(){

			consultar="a";
			document.getElementById("ambos").style.backgroundColor='#679B9B';
			document.getElementById("conciliados").style.backgroundColor='#AACFCF';
			document.getElementById("noconciliados").style.backgroundColor='#AACFCF';
	}

	function conciliarExtracto(cuenta_reg) {

			ctaid="cuenta"+cuenta_reg;
			fecid="fecha"+cuenta_reg;
			astoid="asiento"+cuenta_reg;
			apuid="apunte"+cuenta_reg;
			var cta=document.getElementById(ctaid).value;
			var fec=document.getElementById(fecid).value;
			var asto=document.getElementById(astoid).value;
			var apu=document.getElementById(apuid).value;
			var xmlhttp;
			if(window.XMLHttpRequest) {
				xmlhttp = new XMLHttpRequest();
				} else {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function () {
				if (this.readyState === 4 && this.status === 200) {
				mostrarExtractos(pagina_actual);
				}
		}
		xmlhttp.open("GET", "../modelo/modelo_extracto_grupos.php?concilio="+"si"+"&cta="+cta+"&fec="+fec+"&asto="+asto+"&apu="+apu, true);
		xmlhttp.send();
	}
	function desconciliarExtracto(cuenta_reg) {

			ctaid="cuenta"+cuenta_reg;
			fecid="fecha"+cuenta_reg;
			astoid="asiento"+cuenta_reg;
			apuid="apunte"+cuenta_reg;
			var cta=document.getElementById(ctaid).value;
			var fec=document.getElementById(fecid).value;
			var asto=document.getElementById(astoid).value;
			var apu=document.getElementById(apuid).value;
			var xmlhttp;
			if(window.XMLHttpRequest) {
				xmlhttp = new XMLHttpRequest();
				} else {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function () {
				if (this.readyState === 4 && this.status === 200) {
				mostrarExtractos(pagina_actual);
				}
		}
		xmlhttp.open("GET", "../modelo/modelo_extracto_grupos.php?concilio="+"no"+"&cta="+cta+"&fec="+fec+"&asto="+asto+"&apu="+apu, true);
		xmlhttp.send();
	}

</script>


					