
</style>

<div id="header-referencias">
		<div id="titulo-referencias">
 			<div>BALANCE DE SITUACION </div>
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
	<div id="crud_gral" style="margin-left:100px;">
	  <div id="selecciona-cuenta">
  		<table>
      			<tr>
      				<td><button type="button" id="agradouno" class='botones' onclick="agradoUno();" style="white-space:nowrap; color:#fff;"> A 1º Grado </button></td>
					<td><button type="button" id="agradodos" class='botones' onclick="agradoDos();" style="white-space:nowrap; color:#fff;"> A 2º Grado </button></td>
      				<td><button type="button" id="agradotres" class='botones' onclick="agradoTres();" style="white-space:nowrap; color:#fff;"> A 3º Grado </button></td>
      				<td><button type="button" id="soloresumen" class='botones' onclick="soloResumen();" style="white-space:nowrap; color:#fff;">Solo Resumen </button></td>
      				<td><button type="button" class='botones' onclick="preparoMostrarCuentas()" style="white-space:nowrap; color:#fff;">  Mostrar </button></td>
      				<td><button type="button" class='botones' onclick="imprimir()" style="white-space:nowrap; color:#fff;">  Listar  </button></td>
      			</tr>
	 </table>
	<div id="muestra_balance"><br></div>
	</div>
	</div>

<script type="text/javascript">
	
 
	var resultado = document.getElementById("crud_gral");
	var resultado_consulta=document.getElementById("muestra_balance");
	document.getElementById("nuevaVentana").style.height="20%";
	var num_registros;
	var num_paginas;
	var pagina_actual;
	var muestro_pagina;
	var actualizando=false;
	var totaldebe=0;
	var totalhaber=0;
	var saldosdeudores=0;
	var saldosacreedores=0;
	var sw_grado="";
	var sw_imprimir=false;
 
	function soloResumen(){

		sw_grado='4';
		document.getElementById("agradouno").style.backgroundColor='#679B9B';
		document.getElementById("agradodos").style.backgroundColor='#679B9B';
		document.getElementById("agradotres").style.backgroundColor='#679B9B';
		document.getElementById("soloresumen").style.backgroundColor='#AACFCF';

	}

	function agradoUno(){

		sw_grado='1';
		document.getElementById("agradouno").style.backgroundColor='#AACFCF';
		document.getElementById("agradodos").style.backgroundColor='#679B9B';
		document.getElementById("agradotres").style.backgroundColor='#679B9B';
		document.getElementById("soloresumen").style.backgroundColor='#679B9B';

	}

	function agradoDos(){

		sw_grado='2';
		document.getElementById("agradouno").style.backgroundColor='#679B9B';
		document.getElementById("agradodos").style.backgroundColor='#AACFCF';
		document.getElementById("soloresumen").style.backgroundColor='#679B9B';
		document.getElementById("agradotres").style.backgroundColor='#679B9B';

	}
	function agradoTres(){

		sw_grado='3';
		document.getElementById("agradouno").style.backgroundColor='#679B9B';
		document.getElementById("agradodos").style.backgroundColor='#679B9B';
		document.getElementById("agradotres").style.backgroundColor='#AACFCF';
		document.getElementById("soloresumen").style.backgroundColor='#679B9B';

	}
	function balanceImpresora() {

		 var nuevaventana=window.open(' ', 'popimpr');
		 nuevaventana.document.write(resultado_consulta.innerHTML);
		 nuevaventana.document.close();
		 nuevaventana.print();
		 nuevaventana.close();
		 sw_imprimir=false;
	}

	function preparoMostrarCuentas(){

		
			if (sw_grado==""){

				alert("Elija primero a que nivel desea el Balance: grado 1, 2 o 3");

			} else {
				var xmlhttp;
				if(window.XMLHttpRequest) {
					xmlhttp = new XMLHttpRequest();
					} else {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
					xmlhttp.onreadystatechange = function () {
					if (this.readyState === 4 && this.status === 200) {
							
							num_registros=xmlhttp.responseText;
							
							mostrarCuentas(1);
					}
			}
			xmlhttp.open("GET", "../modelo/modelo_balance_situacion.php?acontar="+"si"+"&grado="+sw_grado, true);
			xmlhttp.send();
		}
	}

	function imprimir() {

		sw_imprimir=true;
		preparoMostrarCuentas();
	}

	function mostrarCuentas(pagina){


		var xmlhttp;

		if(window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function () {
			if (this.readyState === 4 && this.status === 200) {

				resultado_consulta.innerHTML = xmlhttp.responseText;
				if (sw_imprimir) {
					balanceImpresora();
				}
				
			}
		}
		xmlhttp.open("GET", "../modelo/modelo_balance_situacion.php?mostrar="+"si"+"&grado="+sw_grado+"&sw_imprimir="+sw_imprimir, true);
		xmlhttp.send();
	
}

	function iraPagina(){

			var eligepagina=document.getElementById("eligepagina").value;
			if (eligepagina >= 1 && eligepagina <=num_paginas) {
				muestro_pagina= eligepagina;
				mostrarCuentas(muestro_pagina);
			}
	}

	function retrocedoPagina() {

			if (pagina_actual > 1) {
				pagina_actual--;
				muestro_pagina = pagina_actual;
				mostrarCuentas(muestro_pagina);
		}
	}
	function avanzoPagina() {

			if (pagina_actual < num_paginas) {
				pagina_actual++;
				muestro_pagina=pagina_actual;
				document.getElementById("eligepagina").innerHTML=muestro_pagina;
				mostrarCuentas(muestro_pagina);
			}
	}



</script>


					