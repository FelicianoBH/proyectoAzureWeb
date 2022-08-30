<!--	<div id="header-referencias">
		<div id="titulo-referencias">
 			<div>CONSULTA DE PEDIDOS</div>
 			<div id="aqui"></div>
		</div> 
</div> -->
 
<div id="wrapper" style="margin-left:150px;padding:10px">
	<div id="crud_gral" style="margin-left:0px;"></div>
</div>
<div>

	<div class="container" style="margin-left:150px;">
				<div class="row" >
					<div class="col-md-1"  onmousedown="irAtras();">
			      			<div id="boton-atras">
			      				<div>

			      				<i class="fas fa-arrow-alt-circle-left fa-1x"></i>
			      				</div>
			      			</div>
			      	</div>
			      	<div class="col-md-1">
			      			<div ></div>
			      	</div>
			      	<div class="col-md-4">
			      			<div id="programa-en-curso" >
			      				 CONSULTA DE ALBARANES
			      			</div>
			      	</div>
			    </div>
			    <div class="row">
			    	<div class="col-md-1">
			      			<div ></div>
			      	</div>
			    </div>
 		</div>
</div>		
<br>
<div id="overlay"></div>
<div id="nuevaVentana">
	<div id="box-header"><label id="leyenda" style="margin-left:35%;">Detalle Albaran</label></div>
	<button onmousedown="cierraVentana()" class="btn btn-primary"  id="botonCerrar">
		<i class="fa  fa-door-open"></i>
	</button><br><br><br>
	<div id="pantallaConsulta"> 
	</div>
		<span id="feedback"></span>
</div>



<script type="text/javascript">
	
	var user="<?php echo $_SESSION["id_usuario"] ?>"
	var resultado = document.getElementById("crud_gral");
	var resultadoconsulta=document.getElementById("pantallaConsulta");
	//var resultadoeditar=document.getElementById("aqui");
	document.getElementById("nuevaVentana").style.height="60%";
	document.getElementById("nuevaVentana").style.width="70%";
	var num_registros;
	var num_paginas;
	var pagina_actual;
	var muestro_pagina;
	var actualizando=false;
	var seleccion="";
	
	var elfoco="";
	var acrear="";
	var desdecodigo="";
	var numero_albaran="";

		function irAtras(){
			
			window.history.back();
		}
	
	function MostrarAlbaranes(pagina){

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
			}
		}
		xmlhttp.open("GET", "../modelo/modelo_consulta_albaranes.php?albaranes=" + "si"+"&pagina="+pagina+"&num_paginas="+num_paginas, true);
		xmlhttp.send();
	}


	function preparoMostrarAlbaranes(){

			var xmlhttp;
			if(window.XMLHttpRequest) {
				xmlhttp = new XMLHttpRequest();
				} else {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function () {
				if (this.readyState === 4 && this.status === 200) {

 				num_registros = xmlhttp.responseText;
				MostrarAlbaranes(1);
				}
		}
		xmlhttp.open("GET", "../modelo/modelo_consulta_albaranes.php?acontar="+"si", true);
		xmlhttp.send();
	}

	function verLineas(num_albaran) {


		numero_albaran=num_albaran;
		document.getElementById("leyenda").innerHTML="Detalle Albaran";
		document.getElementById("nuevaVentana").style.width="70%";
					
					overlay.style.opacity = .7;
					if (overlay.style.display == "block") {
						overlay.style.display="none";
						nuevaVentana.style.display="none";
					} else {
						overlay.style.display="block";
						nuevaVentana.style.display="block";
					}
				
					preparoMostrarAlbLineas();
	}

	function preparoMostrarAlbLineas() {
			
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
				mostrarAlbLineas(1);
				}
		}
		xmlhttp.open("GET", "../modelo/modelo_consulta_albaranes.php?acontar_alblineas="+"si"+"&numero_albaran="+numero_albaran, true);
		xmlhttp.send();
	}
	
	function mostrarAlbLineas(pagina) {

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
		xmlhttp.open ("GET", "../modelo/modelo_consulta_albaranes.php?alb_lineas=" + "si"+"&pagina="+pagina+"&num_paginas="+num_paginas+"&numero_albaran="+numero_albaran, false);
		xmlhttp.send();
	}

	leerRef();
	preparoMostrarAlbaranes();

	function desdeCodigoAL(){

			desdecodigo=document.getElementById("desdecodigo").value;
			preparoMostrarAlbLineas();
	}

	function iraPaginaAL(){

			var eligepagina=document.getElementById("eligepagina").value;
			if (eligepagina >= 1 && eligepagina <=num_paginas) {
				muestro_pagina= eligepagina;
				mostrarAlbLineas(muestro_pagina);
			}
	}

	function retrocedoPaginaAL() {

			
			if (pagina_actual > 1) {
				pagina_actual--;
				muestro_pagina = pagina_actual;
				mostrarAlbLineas(muestro_pagina);
			
		}
	}

	function avanzoPaginaAL() {

			if (pagina_actual < num_paginas) {
				pagina_actual++;
				muestro_pagina=pagina_actual;
				document.getElementById("eligepagina").innerHTML=muestro_pagina;
				mostrarAlbLineas(muestro_pagina);
			}
		
	}

	function desdeCodigo(){

			desdecodigo=document.getElementById("desdecodigo").value;
			preparoMostrarAlbaranes();
	}

	function iraPagina(){

			var eligepagina=document.getElementById("eligepagina").value;
			if (eligepagina >= 1 && eligepagina <=num_paginas) {
				muestro_pagina= eligepagina;
				MostrarAlbaranes(muestro_pagina);
			}
	}

	function retrocedoPagina() {

			
			if (pagina_actual > 1) {
				pagina_actual--;
				muestro_pagina = pagina_actual;
				MostrarAlbaranes(muestro_pagina);
			
		}
	}
	function avanzoPagina() {

			
			if (pagina_actual < num_paginas) {
				pagina_actual++;
				muestro_pagina=pagina_actual;
				document.getElementById("eligepagina").innerHTML=muestro_pagina;
				MostrarAlbaranes(muestro_pagina);
			}
		
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

	
	function cierraVentana(){

			document.getElementById("nuevaVentana").style.width="70%";
			overlay.style.display="none";
			nuevaVentana.style.display="none";
			preparoMostrarAlbaranes();
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

					