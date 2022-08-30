<div id="header-referencias">
 		<div id="titulo-referencias">
   	 		<div>Input Contabilidad</div>
   	  		<div id="aqui"></div>
		</div>   
</div>       
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
	<div id="crud_gral">
	  <div id="input-apuntes">
	  <form>
			<fieldset> 
      			<div id="div1">
					<label for="usuario">Usuario: </label>    
					<input type="text" id="usuario" placeholder="<?php echo $_SESSION["usuario"] ?>" readonly="readonly" size="20" />
      			</div>
      			<div id="div2">
					<label for="fecha">Fecha Contable: </label>    
					<input type="text" id="fecha"  readonly="readonly" size="12"/>
      			</div>
      			<div id="div3">
					<label for="asiento">Asiento: </label>    
					<input type="text" id="asiento"  size="6"/>
      			</div>
      			<div id="div4">
					<label for="apunte">Apunte: </label>    
					<input type="text" id="apunte" readonly="readonly" size="6"/>
      			</div>
      		</fieldset>

      		<fieldset>
      			<div id="div5">
					<label for="codcuenta">Código Cuenta : </label>    
					<input type="text" id="codcuenta-1" size="3" maxlength="3" onfocus="colorTexto(this.id)" onblur="noFoco(this.id)" placeholder="1ºGra." style="width:35px;height:28px"/>
					<input type="text" id="codcuenta-2" size="3" maxlength="3" onfocus="colorTexto(this.id)" onblur="noFoco(this.id)"  placeholder="2ºGra." style="width:35px;height:28px"/>
					<input type="text" id="codcuenta-3" size="6" maxlength="6" onfocus="colorTexto(this.id)" onblur="noFoco(this.id)"  placeholder="3ºGra." style="width:60px;height:28px"/>
					<button type="button" class='botones' onclick="buscaCuenta()">Leer</button>
      			</div>
      			<div id="div51">
					<label for="titulo-1">Mayor 1ºgrado: </label>    
					<input type="text" id="titulo-1" size="30" maxlength="40" readonly="readonly" style="width:350px;height:28px;font-size:16px;"/>
      			</div>
      			<div id="div52">
					<label for="titulo-2">Mayor 2ºgrado: </label>    
					<input type="text" id="titulo-2" size="30" maxlength="40" readonly="readonly" style="width:350px;height:28px;font-size:16px;"/>
      			</div>
				<div id="div6">
					<label for="titulo-3">TÍTULO CUENTA: </label>    
					<input type="text" id="titulo-3" size="30" maxlength="40" readonly="readonly" style="width:350px;height:28px;font-weight:bold;"/>
      			</div>
      			<div id="div7">
      				<label>              </label>
					
					<button type="button" class='botones' onclick="ejecutarNuevaVentana('noedicion','CODIGO_CUENTA')"><u>C</u>onsultar </button>
					<button type="button" class='botones' onclick="ejecutarNuevaVentana('noedicion','TITULO')"><u>A</u>lfabetica</button>
					<button type="button" class='botones' onclick="agregarCuenta()">C<u>R</u>ear Cuenta</button>
					<button type="button" class='botones' onclick="ayuda()">Ayuda contextual</button>
				</div>
      		</fieldset>
      		<fieldset id="tercerfield">
      			<div id="divA">	
      				<label for="concepto_numero">Núm Concepto: </label>    
					<input type="number" id="concepto_numero" size="4" maxlength="5" onfocus="colorTexto(this.id)" onblur="noFoco(this.id)"/>
					<button  type="button" class='botones' onclick="buscaConceptos()">Leer</button>
					<input type="text" id="concepto_texto" size="20" maxlength="40" onfocus="colorTexto(this.id)" onblur="noFoco(this.id)" style="width:250px;height:28px;font-size:16px;"/>
				</div>	
				<div id="divD">
					<label></label>
					<button type="button" class='botones' onclick="consultarConceptos()"><u>V</u>er conceptos</button>
					<button type="button" class='botones' onclick="botonDebe()"><u>D</u>ebe</button>
					<button type="button" class='botones' onclick="botonHaber()"><u>H</u>aber</button>
					<input type="text" id="debehaber" size="5" readonly="readonly" onfocus="colorTexto(this.id)" onblur="noFoco(this.id)"/>
					
				</div>
			</fieldset>
			<fieldset id="cuartofield">
				<div id="divB">
		      		<label for="documento">Documento: </label>    
					<input type="text" id="documento" size="15" maxlength="15" onfocus="colorTexto(this.id)" onblur="noFoco(this.id)"/>
				</div>
				<div id="divC">
		      		<label for="importe">Importe: </label>    
					<input type="text" id="importe" size="10" maxlength="9" onfocus="colorTexto(this.id)" onblur="noFoco(this.id)"/>
					<button type="button" class='botones' onclick="validarApunte()">Validar A<u>P</u>unte</button>
					<button type="button" class='botones' onclick="cerrarAsiento()">CERRAR ASIENTO</button>
				</div>
      		</fieldset>
      		<fieldset id="quintofield">
				<div id="divD">
					<label></label>
					<button type="button" class='botones'>Asiento DEBE:</button>
					<input id="debeasiento" readonly="readonly"  class='botoness'></button>
					<button type="button" class='botones'>Asiento HABER:</button>
					<input id="haberasiento" readonly="readonly" class='botoness'></button>
					<button type="button" class='botones'>Saldo asiento:</button>
					<input id="saldoasiento" readonly="readonly" class='botoness'></button>
				</div>
      		</fieldset>
      		
  		</form>
	  </div>
	<div id="muestra-apuntes"><br></div>
	</div>
</div>

<script type="text/javascript">


	var user="<?php echo $_SESSION["id_usuario"] ?>"
	var resultado = document.getElementById("crud_gral");
	var resultadoconsulta=document.getElementById("pantallaConsulta");
	var resultadoeditar=document.getElementById("aqui");
	document.getElementById("nuevaVentana").style.height="60%";
	document.getElementById("nuevaVentana").style.width="70%";
	var num_registros;
	var num_registrosc;
	var num_paginas;
	var pagina_actual;
	var muestro_pagina;
	var num_paginasc;
	var pagina_actualc;
	var muestro_paginac;
	var num_paginasn;
	var pagina_actualn;
	var cuentaposible="no";
	var muestro_paginan;
	var pagina_actualConcepto;
	var muestro_paginaConcepto;
	var num_paginasConcepto;
    var num_registrosConcepto;
	var actualizando=false;
	var apunteposible=true;
	var apunte_fecha="";
	var apunte_asiento="";
	var apunte_apunte="";
	var ref_debe=0;
	var ref_haber=0;
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
			var guardocuenta="";
			var guardoidconcepto="";
			var guardoconcepto="";
			var guardodebeohaber="";
			var guardoimportedebe=0;
			var guardoimportehaber=0;

 		 v_cuentaid="";
		 v_documentoid="";
		 v_id_conceptoid="";
		 v_conceptoid="";
		 v_debe_o_haberid="";
		 v_importe_debeid=0;
		 v_importe_haberid=0;
		 v_num_debe=0;
		 v_num_haber=0;
	
			var lafecha = "";
			var elasiento = "";
			var elapunte ="";

	var ordena="CODIGO_CUENTA";
	var ordenpor="CONCEPTO_ID";
	var saldocuenta=0;
	var origen="";
	var creandopg="";
	var creandosg="";
	var creandotg="";
	var elfoco="";
	var acrear="";

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
	var masacuenta="";
	var guardo_masa="";
	var desdecodigo="";
	var desdetitulo="";

	function leerRef()  {

		apunteposible=true;
		var buenjason=true;
		var xmlhttp;

		if(window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
				} else {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
			xmlhttp.onreadystatechange = function () {

			if (this.readyState === 4 && this.status === 200) {

					var respuestaref=xmlhttp.responseText;
						try {
							JSON.parse(respuestaref);
						} catch(e) {
							 buenjason=false;
						}

					if (!actualizando) {
						document.getElementById("concepto_numero").value="";
						document.getElementById("concepto_texto").value="";
						document.getElementById("debehaber").value="";
						document.getElementById("codcuenta-1").value="";
						document.getElementById("titulo-3").value="";
						document.getElementById("documento").value="";
						document.getElementById("importe").value="";
					}


					if (buenjason) {

			 			var obj = JSON.parse(xmlhttp.responseText);
						var apunteactual=obj.apunteRef;
						apunteactual++;
						document.getElementById("fecha").value=obj.fechaRef_ed;
						document.getElementById("asiento").value=obj.asientoRef;
						document.getElementById("apunte").value=apunteactual; 
						ref_debe=obj.debeRef;
						ref_haber=obj.haberRef;
						var saldo_asiento=ref_debe-ref_haber;
						document.getElementById("debeasiento").value=formatNumber.new(ref_debe);
						document.getElementById("haberasiento").value=formatNumber.new(ref_haber);
						document.getElementById("saldoasiento").value=formatNumber.new(saldo_asiento);
						apunte_fecha=obj.fechaRef;
						apunte_asiento=document.getElementById("asiento").value;
						apunte_apunte=apunteactual;
					
						} else { 
								apunteposible=false;
								alert("Referencias de Usuario no habilitadas, NO puede grabar apunte nuevo");
							}
			}

		}
		xmlhttp.open("GET", "../modelo/modelo_asientos.php?leer_ref="+'leer_ref', true);
		xmlhttp.send(); 
		actualizando=false;	     
	}

		
		var formatNumber = {            

		 			separador: ".", //  miles
				 	sepDecimal: ',', // decimales

				 formatear:function (num) {
				 		num +='';
				 		var splitStr = num.split('.');
						var splitLeft = splitStr[0];
				 		var splitRight = splitStr.length > 1 ? this.sepDecimal + splitStr[1] : '';
				 		var regx = /(\d+)(\d{3})/;
						while (regx.test(splitLeft)) {
		 						splitLeft = splitLeft.replace(regx, '$1' + this.separador + '$2');
							 }
		 				return this.simbol + splitLeft +splitRight;
		 			},

		 				new:function(num, simbol){
				 				this.simbol = simbol ||'';
		 						return this.formatear(num);
				 }
			}


	function buscaConceptos(){

			
				var concepto_numero =document.getElementById("concepto_numero").value;

				var xmlhttp;

				if(window.XMLHttpRequest) {
					xmlhttp = new XMLHttpRequest();
				} else {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function () {
					if (this.readyState === 4 && this.status === 200) {

						var obj = JSON.parse(xmlhttp.responseText);

						document.getElementById("concepto_texto").value=obj.concepto;
						document.getElementById("debehaber").value=obj.debehaber;
						if (document.getElementById("concepto_texto").value!="CONCEPTO INEXISTENTE"){
							enfoca("documento");
						}  
					}
				}
				xmlhttp.open("GET", "../modelo/modelo_asientos.php?concepto_numero="+concepto_numero, true);
				xmlhttp.send();
	} 

	function buscaConceptosEdicion(){


		var concepto_numero =document.getElementById("nuevoConceptoId").value;

		var xmlhttp;

		if(window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function () {
			if (this.readyState === 4 && this.status === 200) {

				var obj = JSON.parse(xmlhttp.responseText);
				document.getElementById("nuevoTexto").value=obj.concepto;
				document.getElementById("nuevoDebeHaber").value=obj.debehaber;
				
			}
		}
		xmlhttp.open("GET", "../modelo/modelo_asientos.php?concepto_numero="+concepto_numero, true);
		xmlhttp.send();

	} 

	function validaConceptoNuevoEdicion(){

			if ((document.getElementById("nuevoTexto").value=="CONCEPTO INEXISTENTE" || document.getElementById("nuevoTexto").value=="" )||( document.getElementById("nuevoDebeHaber").value!="DEBE"&&document.getElementById("nuevoDebeHaber").value!="HABER")) { 

					alert("INTRODUZCA CONCEPTO VALIDO") } else
					 {
 						overlay.style.display="none";
						nuevaVentana.style.display="none";
						document.getElementById("nuevaVentana").style.width="70%";
						document.getElementById(guardoidconcepto).value=document.getElementById("nuevoConceptoId").value;
						document.getElementById(guardoconcepto).value=document.getElementById("nuevoTexto").value;
						document.getElementById(guardodebeohaber).value=document.getElementById("nuevoDebeHaber").value;
					}
	}

		function validarApunte() {

			if (apunteposible)  {

				var respuesta = confirm("Confirma grabar el Apunte Contable") 
			
				if (respuesta ===true ) {

					// recabar y verificar datos del apunte: cuenta, concepto, documento, debe/haber, importe.

					apuntevalido=true;
					var agrabar_fecha=apunte_fecha;
					var agrabar_asiento=apunte_asiento;
					var agrabar_apunte=apunte_apunte;

					if (document.getElementById("titulo-3")) {
						var agrabar_titulo=document.getElementById("titulo-3").value;
							if (agrabar_titulo=="INEXISTENTE"|| agrabar_titulo=="")
									 { 	apuntevalido=false;
									 	alert("Cuenta inexistente");}
					} else { 	apuntevalido=false;
								alert("Revise la Cuenta");}

					if (document.getElementById("codcuenta-1") && document.getElementById("codcuenta-2") && document.getElementById("codcuenta-3")) {
						var agrabar_c1=document.getElementById("codcuenta-1").value;
						var agrabar_c2=document.getElementById("codcuenta-2").value;
						var agrabar_c3=document.getElementById("codcuenta-3").value;
						var agrabar_cuenta=agrabar_c1+agrabar_c2+agrabar_c3;
						if (agrabar_cuenta=="") {   apuntevalido=false;
													alert("Especifique Cuenta")
													}
					} else { 	apuntevalido=false;
								alert("Revise el Codigo de Cuenta");}

					if (document.getElementById("concepto_numero")) {
						var agrabar_concepto_numero=document.getElementById("concepto_numero").value;
					} else { var agrabar_concepto_numero=0;}

					if(document.getElementById("concepto_texto")) {
						var agrabar_concepto_texto=document.getElementById("concepto_texto").value;
						if (abrabar_concepto_texto="") {	apuntevalido=false;
															alert("Es necesario Concepto Contable");}
					} else {alert("Es necesario Concepto Contable");}

					if(document.getElementById("debehaber")) {
						var agrabar_debehaber=document.getElementById("debehaber").value;
						if (agrabar_debehaber!="DEBE" && agrabar_debehaber!="HABER") {
													apuntevalido=false;
													alert("Especifique DEBE o HABER ");
													}
					}

					if(document.getElementById("documento")) {
						var agrabar_documento=document.getElementById("documento").value;
					} else { var agrabar_documento=""};

					if(document.getElementById("importe")) {
						var agrabar_importe=document.getElementById("importe").value;
						if (agrabar_importe==0)  {	apuntevalido=false;
													alert("Importe CERO");}
					} else { 	apuntevalido=false;
								alert("Es necesario el Importe ");}


						if (apuntevalido) {
 
							// regrabar la tabla referencias:

							grabaReferencias(agrabar_debehaber,  agrabar_importe);
							

							grabaApuntes(agrabar_fecha, agrabar_asiento, agrabar_apunte, agrabar_cuenta, agrabar_debehaber, agrabar_documento, agrabar_importe, agrabar_concepto_numero, agrabar_concepto_texto);
							

							grabaCuentas(agrabar_cuenta, agrabar_importe, agrabar_debehaber);
							
							
							leerRef();
							preparoMostrarApuntes();
							enfoca("codcuenta-1");
						}
				} 

		} else {
			alert( "El usuario no esta habilitado para grabar Apuntes");
				} 
	}

	function grabaReferencias(agrabar_debehaber,  agrabar_importe)	{

			var xmlhttp;

			if(window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
			} else {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
		
			xmlhttp.onreadystatechange = function () {

			if (this.readyState === 4 && this.status === 200) {

				if (xmlhttp.responseText=="Error") { 

					alert("Error de grabacion Referencias");
				}
				
			}
		}
		xmlhttp.open("GET", "../modelo/modelo_asientos.php?agrabar_ref="+"si"+"&agrabar_debehaber="+agrabar_debehaber+"&agrabar_importe="+agrabar_importe, true);
		xmlhttp.send();
 
	}


		function grabaApuntes(agrabar_fecha, agrabar_asiento, agrabar_apunte, agrabar_cuenta, agrabar_debehaber, agrabar_documento, agrabar_importe, agrabar_concepto_numero, agrabar_concepto_texto) {

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
		xmlhttp.open("GET", "../modelo/modelo_asientos.php?agrabar_apu="+"si"+"&agrabar_fecha="+agrabar_fecha+"&agrabar_asiento="+agrabar_asiento+"&agrabar_apunte="+agrabar_apunte+"&agrabar_cuenta="+agrabar_cuenta+"&agrabar_debehaber="+agrabar_debehaber+"&agrabar_documento="+agrabar_documento+"&agrabar_importe="+agrabar_importe+"&agrabar_concepto_numero="+agrabar_concepto_numero+"&agrabar_concepto_texto="+agrabar_concepto_texto+"&saldocuenta="+saldocuenta, true);

		xmlhttp.send();

	}

	function grabaCuentas(agrabar_cuenta, agrabar_importe, agrabar_debehaber) {


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
							// grabar la tabla de apuntes:
			}
		}
		xmlhttp.open("GET", "../modelo/modelo_asientos.php?agrabar_cta="+"si"+"&agrabar_cuenta="+agrabar_cuenta+"&agrabar_importe="+agrabar_importe+"&agrabar_debehaber="+agrabar_debehaber, true);

		xmlhttp.send();

	}

		function buscaPlan(){

		}
		

		function botonDebe() {

			document.getElementById("debehaber").value="DEBE";
			enfoca("documento");
		}
		function botonHaber() {

			document.getElementById("debehaber").value="HABER";
			enfoca("documento");
		}


		function buscaCuentaPrimerGrado(){

					titulocuenta="";
					c_1=document.getElementById("codcuenta-1").value;
					c_1_alfa=c_1.toString();
					if ( c_1_alfa.length<3 || isNaN(c_1_alfa) || c_1_alfa[0]==" " || c_1_alfa[1]==" " || c_1_alfa[2]==" ") { 
										alert("No es válido");
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
										saldocuenta=obj.saldo;
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
									guardo_masa=masacuenta;
									document.getElementById("masa").value=masacuenta;
									//document.getElementById("masa").disabled=true;

								 	if (titulocuenta!="INEXISTENTE") {
										yaexistecuentapg="si";
										document.getElementById("tit-1").value=titulocuenta;
										
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
									saldocuenta=obj.saldo;
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
			document.getElementById("masa").disabled=false;
			$("#tit-1").on('keyup', function(e){

			var keycode= e.keyCode || e.which;
			if(keycode==13 || keycode==40) {
				alert("enfoque");
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
			document.getElementById("masa").disabled=true;

			$("#tit-2").on('keyup', function(e){
			var keycode= e.keyCode || e.which;
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
			document.getElementById("masa").disabled=true;

			$("#tit-3").on('keyup', function(e){
			var keycode= e.keyCode || e.which;
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


		if (creandopg=="si" && document.getElementById("masa").value=="") {
			alert ("DEBE ELEGIR MASA PATRIMONIAL ");
			enfoca("tit-1");


		} else {

		if (creandopg=="si") {
			c_1=document.getElementById("cuenta-1").value;
			c_1_alfa=c_1.toString();
			cuenta=c_1_alfa+"";
			titulocuenta=document.getElementById("tit-1").value;
			masacuenta=document.getElementById("masa").value;
			guardo_masa=masacuenta;
			acrear="si";
			grado="1";

		} 
			if (creandosg=="si") {
			c_1=document.getElementById("cuenta-1").value;
			c_1_alfa=c_1.toString();
			c_2=document.getElementById("cuenta-2").value;
			c_2_alfa=c_2.toString();
			cuenta=c_1_alfa+c_2_alfa+"";
			titulocuenta=document.getElementById("tit-2").value;
			masacuenta=guardo_masa;
			acrear="si";
			grado="2";

		} 
			 if (creandotg=="si") {
			c_1=document.getElementById("cuenta-1").value;
			c_1_alfa=c_1.toString();
			c_2=document.getElementById("cuenta-2").value;
			c_2_alfa=c_2.toString();
			c_3=document.getElementById("cuenta-3").value;
			c_3_alfa=c_3.toString();
			cuenta=c_1_alfa+c_2_alfa+c_3_alfa;
			titulocuenta=document.getElementById("tit-3").value;
			masacuenta=guardo_masa;
			acrear="si";
			grado="3";

		} 
			creandopg="no";
			creandosg="no";
			creandotg="no";

		if (acrear=="si")  {

			acrear="";
			document.getElementById("botoncrearpg").style.backgroundColor='#679B9B';
			document.getElementById("botoncrearsg").style.backgroundColor='#679B9B';
			document.getElementById("botoncreartg").style.backgroundColor='#679B9B';
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
}

		function buscaCuenta() {

			buscaCuentaPrimerGrado();
			buscaCuentaSegundoGrado();
			buscaCuentaTercerGrado();
			enfoca("concepto_numero");

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

						try {
							var obj = JSON.parse(xmlhttp.responseText);
							titulocuenta=obj.titulo;

						} catch(e) {
							 buenjason=false;
						}

			document.getElementById("nuevoTituloId").value= titulocuenta;

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


	var resultado = document.getElementById("muestra-apuntes");


	
	function mostrarApuntes(pagina){

		pagina_actual=pagina;

		num_paginas= Math.ceil(num_registros/9);


		var xmlhttp;

		if(window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function () {
			if (this.readyState === 4 && this.status === 200) {

				resultado.innerHTML = xmlhttp.responseText;
				
				enfoca("codcuenta-1");
				var enBoton=document.getElementById("boton"+pagina);
				document.getElementById("mostrandopagina").innerHTML=" "+pagina_actual;
				$(".botones").css({"background-color":'#AACFCF'});
				$(".botones").css({"color":'#404a4a'});
				$(".botoness").css({"background-color":'#ebfafa'});
				$(".botoness").css({"color":'#404a4a'});
				
			}
		}
		xmlhttp.open("GET", "../modelo/modelo_asientos.php?apuntes=" + "apuntes"+"&pagina="+pagina+"&num_paginas="+num_paginas, true);
		xmlhttp.send();
	}


	function preparoMostrarApuntes(){

			var xmlhttp;

			if(window.XMLHttpRequest) {
				xmlhttp = new XMLHttpRequest();
				} else {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function () {
				if (this.readyState === 4 && this.status === 200) {

 				num_registros = xmlhttp.responseText;

				mostrarApuntes(1);

				}
		}
		xmlhttp.open("GET", "../modelo/modelo_asientos.php?acontarapuntes="+"si", true);
		xmlhttp.send();
	}

		Inicio();

	function Inicio() {

		leerRef();
		document.getElementById("nuevaVentana").style.width="70%";
		preparoMostrarApuntes();
	}

	function retrocedoPaginaConcepto() {

			if (pagina_actualConcepto > 1) {
				muestro_paginaConcepto = pagina_actualConcepto - 1;
				mostrarConceptos(muestro_paginaConcepto);
			}
		
		}

	function avanzoPaginaConcepto() {

		if (pagina_actualConcepto < num_paginasConcepto) {
			muestro_paginaConcepto = pagina_actualConcepto + 1;
			mostrarConceptos(muestro_paginaConcepto);

			}
		}
	function retrocedoPaginaConceptoEdicion() {

			if (pagina_actualConcepto > 1) {
				muestro_paginaConcepto = pagina_actualConcepto - 1;
				mostrarConceptosEdicion(muestro_paginaConcepto);
			}
		
		}

	function avanzoPaginaConceptoEdicion() {

		if (pagina_actualConcepto < num_paginasConcepto) {
			muestro_paginaConcepto = pagina_actualConcepto + 1;
			mostrarConceptosEdicion(muestro_paginaConcepto);

			}
		}

	function iraPagina(){

			var eligepagina=document.getElementById("eligepagina").value;
			if (eligepagina >= 1 && eligepagina <=num_paginas) {
				muestro_pagina= eligepagina;
				mostrarApuntes(muestro_pagina);
			} else { enfoca("codcuenta-1");}

	}

	function retrocedoPagina() {

			if (pagina_actual > 1) {
				pagina_actual--;
				muestro_pagina = pagina_actual;
				mostrarApuntes(muestro_pagina);
		} else { enfoca("codcuenta-1");}
	}
	function avanzoPagina() {


			if (pagina_actual < num_paginas) {
				pagina_actual++;
				muestro_pagina=pagina_actual;
				document.getElementById("eligepagina").innerHTML=muestro_pagina;
				mostrarApuntes(muestro_pagina);
			} else { enfoca("codcuenta-1");}
	}
	
	function iraPaginaC(){

			var eligepagina=document.getElementById("eligepagina").value;
			if (eligepagina >= 1 && eligepagina <=num_paginasc) {
				muestro_paginac= eligepagina;
				mostrarCuentas(muestro_paginac,"noedicion");
			} 
	}

	function retrocedoPaginaC() {

			if (pagina_actualc > 1) {
				pagina_actualc--;
				muestro_paginac = pagina_actualc;
				mostrarCuentas(muestro_paginac,"noedicion");
			}
		}

	function avanzoPaginaC() {

		if (pagina_actualc < num_paginasc) {
			pagina_actualc++;
			muestro_paginac = pagina_actualc;
			mostrarCuentas(muestro_paginac,"noedicion");

			}

		}
	function iraPaginaB(){

			var eligepagina=document.getElementById("eligepagina").value;
			if (eligepagina >= 1 && eligepagina <=num_paginas) {
				muestro_paginac= eligepagina;
				mostrarCuentas(muestro_paginac,"edicion");
			}
	}
	function retrocedoPaginaB() {

			if (pagina_actualc > 1) {
                pagina_actualc--;
				muestro_paginac = pagina_actualc;
				mostrarCuentas(muestro_paginac,"edicion");
			}
		}

	function avanzoPaginaB() {

		if (pagina_actualc < num_paginasc) {
			pagina_actualc++;
			muestro_paginac = pagina_actualc;
			mostrarCuentas(muestro_paginac,"edicion");
			}
		}


	
	var guardocuenta="";

	function editarApunte(id) {

		if (apunteposible) {
				
				if (!actualizando) {

				actualizando=true;

				var apunteID="APUNTE" + id;
				var cuentaID="CUENTA"+id;
				var documentoID="DOCUMENTO"+id;
				var id_conceptoID="ID_CONCEPTO"+id;
				var conceptoID="CONCEPTO"+id;
				var debe_o_haberID="DEBE_HABER"+id;
				var importe_debeID="IMPORTED"+id;
				var importe_haberID="IMPORTEH"+id;
				var borrar = "BORRAR" + id;
				var actualizar = "ACTUALIZAR" + id;
				
				var editarapunteID=apunteID+"-editar";
				var editarcuentaID=cuentaID+"-editar";
				var editardocumentoID=documentoID+"-editar";
				var editarid_conceptoID=id_conceptoID+"-editar";
				var editarconceptoID=conceptoID+"-editar";
				var editardebe_o_haberID=debe_o_haberID+"-editar";
				var editarimporte_debeID=importe_debeID+"-editar";
				var editarimporte_haberID=importe_haberID+"-editar";

				var apunte=document.getElementById(apunteID);
				var cuentaid=document.getElementById(cuentaID).innerHTML;
				var documentoid=document.getElementById(documentoID).innerHTML;
				var id_conceptoid=document.getElementById(id_conceptoID).innerHTML;
				var conceptoid=document.getElementById(conceptoID).innerHTML;
				var debe_o_haberid=document.getElementById(debe_o_haberID).innerHTML;
				var importe_debeid=document.getElementById(importe_debeID).innerHTML;
				var importe_haberid=document.getElementById(importe_haberID).innerHTML;


					// lo siguiente guarda los id, no sus valores.
				apunte_apunte=id;
				guardocuenta=editarcuentaID;
				guardodocumento=editardocumentoID;
				guardoidconcepto=editarid_conceptoID;
				guardoconcepto=editarconceptoID;
				guardodebeohaber=editardebe_o_haberID;
				guardoimportedebe=editarimporte_debeID;
				guardoimportehaber=editarimporte_haberID;

				var parent= document.querySelector("#" + apunteID);

				if (parent.querySelector("#" + editarapunteID) === null ) {


				document.getElementById(cuentaID).innerHTML = '<input type ="button" onclick="cambiarCuenta();" class= "btn btn-success"  id="'+editarcuentaID+'" value="'+cuentaid+'">';
				document.getElementById(documentoID).innerHTML = '<input type ="text" id="'+editardocumentoID+'" value="'+documentoid+'">';
				document.getElementById(id_conceptoID).innerHTML ='<input type ="button" onclick="cambiarIdConcepto();" class= "btn btn-success"  id="'+editarid_conceptoID+'"style="min-width:10px" value="'+id_conceptoid+'">';
				document.getElementById(conceptoID).innerHTML = '<input type ="text" id="'+editarconceptoID+'" value="'+conceptoid+'">';
				document.getElementById(debe_o_haberID).innerHTML = '<input type ="button" onclick="cambiarDebeHaber();" class= "btn btn-success"  id="'+editardebe_o_haberID+'" value="'+debe_o_haberid+'">';
				document.getElementById(importe_debeID).innerHTML = '<input type ="text" id="'+editarimporte_debeID+'" value="'+importe_debeid+'">';
				document.getElementById(importe_haberID).innerHTML = '<input type ="text" id="'+editarimporte_haberID+'" value="'+importe_haberid+'">';

				if(debe_o_haberid=="DEBE") {
					document.getElementById(editarimporte_haberID).disabled=true;
				}  else {
					document.getElementById(editarimporte_debeID).disabled=true;
				}

					// guarda los valores de los campos a editar:
				 v_cuentaid=document.getElementById(editarcuentaID).value;
				 v_documentoid=document.getElementById(editardocumentoID).value;
				 v_id_conceptoid=document.getElementById(editarid_conceptoID).value;
				 v_conceptoid=document.getElementById(editarconceptoID).value;
				 v_debe_o_haberid=document.getElementById(editardebe_o_haberID).value;
				 v_importe_debeid=document.getElementById(editarimporte_debeID).value;
				 v_importe_haberid=document.getElementById(editarimporte_haberID).value;

				 v_num_debe=parseInt(v_importe_debeid);
				 v_num_haber=parseInt(v_importe_haberid);


				document.getElementById(borrar).disabled="true";
				document.getElementById(actualizar).style.display="block";
				}
			}
		} else {
				alert("El usuario no esta habillidado para editar Apuntes");
				}
	}

		function actualizarApunte() {

		 
		  var confirmar=confirm("Desea actualizar los posibles cambios");

		  if (!confirmar) {
		  	Inicio();
		  } else {              //da igual que la cuenta vieja y nueva no sean la misma, a la vieja se le quita
		  						// y a la nueva se le suma. Si son la misma coinciden tambien las nomenclaturas.
		  						// Si ha habido cambio de importe o de Signo debe o haber, es lo mismo, se le restan
		  						// tanto el debe como el haber viejos y se le suman los nuevos. Bien debe o bien  // haber, uno de ellos sera cero.

	   		var apunte_usuario=user;
			var apunte_cuenta=document.getElementById(guardocuenta).value;
			var apunte_documento=document.getElementById(guardodocumento).value;
			var apunte_idconcepto=document.getElementById(guardoidconcepto).value;
			var apunte_concepto=document.getElementById(guardoconcepto).value;
			var apunte_debeohaber=document.getElementById(guardodebeohaber).value;
			var apunte_importedebe=document.getElementById(guardoimportedebe).value;
			var apunte_importehaber=document.getElementById(guardoimportehaber).value;

			var vnum_debe=parseFloat(v_num_debe);
			var vnum_haber=parseFloat(v_num_haber);

			var num_debe=parseFloat(apunte_importedebe);
			var num_haber=parseFloat(apunte_importehaber);

	   		actualizoCuentaResto(v_cuentaid, vnum_debe, vnum_haber);
	   		actualizoCuentaSumo(apunte_cuenta, num_debe, num_haber);

	   	// vemos si hay que modificar los acumulados debe y haber del ref: si cambia importe o signo (debe/haber)

	   		if (v_num_debe != num_debe || v_num_haber != num_haber ||
	   			v_debe_o_haberid != apunte_debeohaber) {
	   			actualizoRefEdicion(v_num_debe, v_num_haber, num_debe, num_haber);
	   		}
	   	// regrabamos el apunte.
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
	xmlhttp.open("GET", "../modelo/modelo_editar_apuntes.php?actualizarapunte="+"si"+"&usuario="+apunte_usuario+"&fecha="+apunte_fecha+"&asiento="+apunte_asiento+"&apunte="+apunte_apunte+"&cuenta="+apunte_cuenta+"&documento="+apunte_documento+"&idconcepto="+apunte_idconcepto+"&concepto="+apunte_concepto+"&debeohaber="+apunte_debeohaber+"&importedebe="+num_debe+"&importehaber="+num_haber, true);
		xmlhttp.send();
 		Inicio();
	   }
	}

	function actualizoRefEdicion(old_debe, old_haber, new_debe, new_haber){

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
		xmlhttp.open("GET", "../modelo/modelo_editar_apuntes.php?editoref="+"si"+"&old_debe="+old_debe+"&old_haber="+old_haber+"&new_debe="+new_debe+"&new_haber="+new_haber, true);

		xmlhttp.send();
	}

	function actualizoCuentaResto(v_cuentaid, v_num_debe, v_num_haber){

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
		xmlhttp.open("GET", "../modelo/modelo_editar_apuntes.php?cuentaresto="+"si"+"&cuenta="+v_cuentaid+"&importedebe="+v_num_debe+"&importehaber="+v_num_haber, true);
		xmlhttp.send();
	}

	function actualizoCuentaSumo(apunte_cuenta, apunte_importedebe, apunte_importehaber){

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
		xmlhttp.open("GET", "../modelo/modelo_editar_apuntes.php?cuentasumo="+"si"+"&cuenta="+apunte_cuenta+"&importedebe="+apunte_importedebe+"&importehaber="+apunte_importehaber, true);
		xmlhttp.send();
	}

	function cambiarIdConcepto(){

		
		document.getElementById("nuevaVentana").style.width="33%";
		document.getElementById("leyenda").innerHTML="Cambiar Concepto";
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
								
			}
		}
		xmlhttp.open("GET", "../modelo/modelo_editar_apuntes.php?idconcepto="+"si", true);
		xmlhttp.send();

	}


	function cambiarCuenta() {

		
		document.getElementById("nuevaVentana").style.width="33%";
		document.getElementById("leyenda").innerHTML="Cambiar Cuenta";
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

				var mirar=xmlhttp.responseText;
				
				resultadoconsulta.innerHTML = xmlhttp.responseText;
								
			}
		}
		xmlhttp.open("GET", "../modelo/modelo_editar_apuntes.php?cambiarcuenta="+"si", true);
		xmlhttp.send();

	}

	function validaCuentaNueva() {


		buscarCuentaB();


		if (cuentaposible=="si"){
			document.getElementById(guardocuenta).value = document.getElementById("nuevaCuentaId").value;
			cuentaposible="no";
			ejecutarNuevaVentana("noedicion");
		} else {
		 		alert("Debe confirmar existe la cuenta, pulse <'Busca Cuenta'>")
				}
	}
	function actualizarConceptos(id) {

		var xmlhttp;

		if(window.XMLHttpRequest) {

			xmlhttp = new XMLHttpRequest();

		} else {

			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}

		
		var debe_o_haberActualizado= document.getElementById("DEBE_O_HABER"+id+"-editar").value;
		var texto_fijoActualizado= document.getElementById("TEXTO_FIJO"+id+"-editar").value;
		

		xmlhttp.onreadystatechange = function () {

			if (this.readyState === 4 && this.status === 200) {

 				var meresponde=xmlhttp.responseText;
				var mensaje=meresponde;
				if (mensaje.includes("No ejecutado")) {
					alert(meresponde);
				}
					actualizando=false;
 				
 				 	mostrarApuntes(pagina_actual);
			}

	}
		

		xmlhttp.open("GET", "../modelo/modelo_asientos.php?param1="+id+"&param2="+debe_o_haberActualizado+"&param3="+texto_fijoActualizado, true);
		xmlhttp.send();
	
}
		 function borrarApunte(id,dh,imp) {


			if (apunteposible) {


					var respuesta = confirm("Esta seguro de borrar este Apunte ?");
					
					if (respuesta ===true ) {

						var xmlhttp;

						if(window.XMLHttpRequest) {
							
							xmlhttp = new XMLHttpRequest();

							} else {

							xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

							}
						
						xmlhttp.onreadystatechange = function () {

						if (this.readyState === 4 && this.status === 200) {

					 	borrarApunteRef(id,dh,imp);
					 	borrarApunteCuenta(id,dh,imp);
		 				Inicio();

						}
					}

					xmlhttp.open("GET", "../modelo/modelo_asientos.php?borrar_apunte="+"si"+"&fecha_eliminar="+apunte_fecha+"&asiento_eliminar="+apunte_asiento+"&apunte_eliminar="+id, true);
					xmlhttp.send();
				
				 }
		} else {
		 		alert( "El usuario no esta habilitado para borrar Apuntes");
				}
	}

 
		function borrarApunteRef(id,dh,imp) {


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

				xmlhttp.open("GET", "../modelo/modelo_asientos.php?borrar_apunte_ref="+"si"+"&borrar_dh="+dh+"&borrar_importe="+imp+"&id="+id, true);
				xmlhttp.send();
	
	}
		function borrarApunteCuenta(id,dh,imp) {


						var cuentaID="CUENTA"+id;
						var la_cuenta=document.getElementById(cuentaID).innerHTML;

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

			xmlhttp.open("GET", "../modelo/modelo_asientos.php?borrar_apunte_cuenta="+"si"+"&cuentaId="+la_cuenta+"&borrar_dh="+dh+"&borrar_importe="+imp, true);
				xmlhttp.send();
	
	}

	function borrarCuenta() {

			

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

						xmlhttp.open("GET", "../modelo/modelo_asientos.php?borrar_apunte="+"si"+"&fecha_eliminar="+apunte_fecha+"&asiento_eliminar="+apunte_asiento+"&apunte_eliminar="+id, true);
						xmlhttp.send();
	
	}

	var overlay = document.getElementById("overlay");
	var nuevaVentana= document.getElementById("nuevaVentana");

	function cierraVentana(){

			document.getElementById("nuevaVentana").style.width="70%";
			overlay.style.display="none";
			nuevaVentana.style.display="none";
			if (origen=="zonacuenta") {
				origen="";
				enfoca("codcuenta-1");
			}
			if (origen=="zonaconcepto") {
				origen="";
				enfoca("concepto_numero");
			}
	}


	function ejecutarNuevaVentana(sw, ordenado){

		origen="zonacuenta";
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

	function ejecutarNuevaVentanaConcepto(){

		document.getElementById("nuevaVentana").style.width="70%";

		overlay.style.opacity = .4;
		if (overlay.style.display == "block") {

			overlay.style.display="none";
			nuevaVentana.style.display="none";
		} else {
			overlay.style.display="block";
			nuevaVentana.style.display="block";
		}
		ordenpor="CONCEPTO_ID";
		document.getElementById("leyenda").innerHTML="Conceptos";
		consultarConceptosEdicion();

	}

	function ejecutarNuevaVentanaAlfaConcepto(){

		document.getElementById("nuevaVentana").style.width="70%";
		document.getElementById("leyenda").innerHTML="Alfabetico concep.";
		overlay.style.opacity = .4;
		if (overlay.style.display == "block") {

			overlay.style.display="none";
			nuevaVentana.style.display="none";
		} else {
			overlay.style.display="block";
			nuevaVentana.style.display="block";
		}
		ordenpor="TEXTO_FIJO";
		consultarConceptosEdicion();

	}

	
	 
	function ejecutarNuevaVentanaB(){

		ordena="CODIGO_CUENTA";
		overlay.style.display="none";
		nuevaVentana.style.display="none";
		document.getElementById("leyenda").innerHTML="Cuentas";
		document.getElementById("nuevaVentana").style.width="70%";
		ejecutarNuevaVentana("edicion",ordena);

	}
	function ejecutarNuevaVentanaBA(){

		ordena="TITULO";
		overlay.style.display="none";
		nuevaVentana.style.display="none";
		document.getElementById("leyenda").innerHTML="Alfabetico";
		document.getElementById("nuevaVentana").style.width="70%";
		ejecutarNuevaVentana("edicion",ordena);


	}

	
	function agregarConcepto() {


	/*	var nuevoConcepto_Id=document.getElementById("nuevoConcepto_IdId").value;	
	 	var nuevoDebe_o_Haber=document.getElementById("nuevoDebe_o_HaberId").value;
	 	var nuevoTexto_Fijo=document.getElementById("nuevoTexto_FijoId").value;

		if (validarAgregar(nuevoConcepto_Id, nuevoDebe_o_Haber, nuevoTexto_Fijo)) { 
			*/

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
 				preparoMostrarApuntes();

 				}
			}


 	/*	xmlhttp.open("GET", "../modelo/modelo_asientos.php?nuevoConcepto_Id="+nuevoConcepto_Id+"&nuevoDebe_o_Haber="+nuevoDebe_o_Haber+"&nuevoTexto_Fijo"+nuevoTexto_Fijo, true);
		xmlhttp.send();
	  } */
					 
/*	} */

}
	/*	function validarAgregar(nuevoConcepto_Id, nuevoDebe_o_Haber, nuevoTexto_Fijo) {

			var mensajeFB=document.getElementById("feedback");

			if(nuevaCuenta<100000000000 || nuevaCuenta>999999999999) {return false;}

			if(isNaN(nuevoGrado)) {
				mensajeFB.innerHTML='<button type = "button" value ="Grado no numerico" class = "btn btn-danger">Grado no numerico</button>';
				mensajeFB.style.margin="31%";
				return false;

			}   mensajeFB.innerHTML="";
				return true;  
				return true;
		}

	 */

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

				resultadoconsulta.innerHTML="<div> Consulta de Cuentas </div>";
				resultadoconsulta.innerHTML += xmlhttp.responseText;
				document.getElementById("mostrandopagina").innerHTML=" "+pagina_actualc;

				$(".botones").css({"background-color":'#AACFCF'});
				$(".botones").css({"color":'#fff'});
				cargaTeclas();
			}
		}
		xmlhttp.open("GET", "../modelo/modelo_consulta_plan.php?cuentas="+"cuentas"+"&pagina="+pagina+"&num_paginas="+num_paginasc+"&edicion="+param+"&ordenado="+ordena+"&desdecodigo="+desdecodigo+"&desdetitulo="+desdetitulo, true);
		xmlhttp.send();
	}


	function preparoMostrarCuentas(param){

			
			var xmlhttp;

			if(window.XMLHttpRequest) {
				xmlhttp = new XMLHttpRequest();
				} else {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function () {
				if (this.readyState === 4 && this.status === 200) {

 				num_registrosc = xmlhttp.responseText;

				mostrarCuentas(1,param);

				}

		}
		xmlhttp.open("GET", "../modelo/modelo_consulta_plan.php?acontar="+"si"+"&ordenado="+ordena+"&desdecodigo="+desdecodigo+"&desdetitulo="+desdetitulo, true);
		xmlhttp.send();
	}

	
	function seleccionarCuentaEdicion(id) {
			document.getElementById(guardocuenta).value = id;
			overlay.style.display="none";
			nuevaVentana.style.display="none";
			preparoMostrarCuentas("edicion");

		}

	function seleccionarCuenta(id) {

			var id_alfa=id.toString();
			c_1=id_alfa.slice(0,3);
			c_2=id_alfa.slice(3,6);
			c_3=id_alfa.slice(6);
			var codigo_buscar=c_1+c_2+c_3;
			document.getElementById("codcuenta-1").value=c_1;
			document.getElementById("codcuenta-2").value=c_2;
			document.getElementById("codcuenta-3").value=c_3;
			overlay.style.display="none";
			nuevaVentana.style.display="none";
			buscaCuentaPrimerGrado();
			buscaCuentaSegundoGrado();
			buscaCuentaTercerGrado();
			enfoca("concepto_numero");
		}
		function seleccionarConcepto(id) {
			document.getElementById("concepto_numero").value=id;
			overlay.style.display="none";
			nuevaVentana.style.display="none";
			buscaConceptos();
		}

		function cambiarDebeHaber(){

			if (document.getElementById(guardodebeohaber).value=="DEBE") {

				document.getElementById(guardodebeohaber).value="HABER";
				var elimporte=document.getElementById(guardoimportedebe).value;
				document.getElementById(guardoimportedebe).value=0;
				document.getElementById(guardoimportedebe).disabled=true;
				document.getElementById(guardoimportehaber).value=elimporte;
				document.getElementById(guardoimportehaber).disabled=false;

			} else {

				document.getElementById(guardodebeohaber).value="DEBE";
				var elimporte=document.getElementById(guardoimportehaber).value;
				document.getElementById(guardoimportehaber).value=0;
				document.getElementById(guardoimportehaber).disabled=true;
				document.getElementById(guardoimportedebe).value=elimporte;
				document.getElementById(guardoimportedebe).disabled=false;
			}
		}

	function seleccionarConceptoEdicion(id,texto,dh) {

			var elimporte="";

			if  (parseFloat(v_importe_debeid)==0) {

				 elimporte=parseFloat(v_importe_haberid);
				} 

				else { 
					elimporte=parseFloat(v_importe_debeid);
				}


			document.getElementById(guardoidconcepto).value=id;
			document.getElementById(guardoconcepto).value=texto;
			document.getElementById(guardodebeohaber).value=dh;

			if (dh=="DEBE") {
				document.getElementById(guardoimportehaber).value="0";
				document.getElementById(guardoimportedebe).value=elimporte;
				document.getElementById(guardoimportedebe).disabled=false;
				document.getElementById(guardoimportehaber).disabled=true;

			} else {
				document.getElementById(guardoimportedebe).value="0";
				document.getElementById(guardoimportehaber).value=elimporte;
				document.getElementById(guardoimportedebe).disabled=true;
				document.getElementById(guardoimportehaber).disabled=false;
			}

			overlay.style.display="none";
			nuevaVentana.style.display="none";
			preparoMostrarCuentas("edicion","ordena");
		}


	function consultarConceptos(){

				origen="zonaconcepto";
				document.getElementById("nuevaVentana").style.width="70%";

				overlay.style.opacity = .4;
				if (overlay.style.display == "block") {

					overlay.style.display="none";
					nuevaVentana.style.display="none";
				} else {
					overlay.style.display="block";
					nuevaVentana.style.display="block";
				}

				preparoMostrarConceptos();

		} 
	

		function consultarConceptosEdicion(){

		document.getElementById("nuevaVentana").style.width="70%";

		overlay.style.opacity = .4;
		if (overlay.style.display == "block") {

			overlay.style.display="none";
			nuevaVentana.style.display="none";
		} else {
			overlay.style.display="block";
			nuevaVentana.style.display="block";
		}
		preparoMostrarConceptosEdicion();
		
	}

	function mostrarConceptos(pagina) {


		pagina_actualConcepto=pagina;

		num_paginasConcepto= Math.ceil(num_registrosConcepto/12);

		var xmlhttp;

		if(window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}

		xmlhttp.onreadystatechange = function () {

			if (this.readyState === 4 && this.status === 200) {

				resultadoconsulta.innerHTML = xmlhttp.responseText;
				var enBoton=document.getElementById("boton"+pagina);
				$(".botones").css({"background-color":'#AACFCF'});
				$(".botones").css({"color":'#fff'});
			   //enBoton.style.background="#679B9B";
			}
		}
			xmlhttp.open("GET", "../modelo/modelo_consulta_concepto.php?conceptos="+"conceptos"+"&pagina="+pagina_actualConcepto+"&num_paginas="+num_paginasConcepto, true);
			xmlhttp.send();

	}


		function mostrarConceptosEdicion(pagina) {

		
		pagina_actualConcepto=pagina;

		num_paginasConcepto= Math.ceil(num_registrosConcepto/12);

		var xmlhttp;

		if(window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}

		xmlhttp.onreadystatechange = function () {

			if (this.readyState === 4 && this.status === 200) {

				resultadoconsulta.innerHTML = xmlhttp.responseText;
				var enBoton=document.getElementById("boton"+pagina);
				$(".botones").css({"background-color":'#AACFCF'});
				$(".botones").css({"color":'#fff'});
			   //enBoton.style.background="#679B9B";
			}
		}
			xmlhttp.open("GET", "../modelo/modelo_consulta_concepto_edicion.php?conceptos="+"conceptos"+"&pagina="+pagina_actualConcepto+"&num_paginas="+num_paginasConcepto+"&ordenpor="+ordenpor, true);
			xmlhttp.send();

	}


	function preparoMostrarConceptos(){

		var xmlhttp;

		if(window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function () {
			if (this.readyState === 4 && this.status === 200) {
 				num_registrosConcepto = xmlhttp.responseText;
				mostrarConceptos(1);
			}
		}
			xmlhttp.open("GET", "../modelo/modelo_consulta_concepto.php?acontar="+"si", true);
			xmlhttp.send();
	}
	function preparoMostrarConceptosEdicion(){

		var xmlhttp;

		if(window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function () {
			if (this.readyState === 4 && this.status === 200) {
 				num_registrosConcepto = xmlhttp.responseText;
				mostrarConceptosEdicion(1);
			}
		}
			xmlhttp.open("GET", "../modelo/modelo_consulta_concepto_edicion.php?acontar="+"si", true);
			xmlhttp.send();
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
				enfoca("cuenta-1");
			}
		}
		xmlhttp.open("GET", "../modelo/modelo_nueva_cuenta_apunte", true);
		xmlhttp.send();

	}

	function agregarCuenta(){

		origen="zonacuenta";
		creandopg="";
		creandosg="";
		creandotg="";
		acrear="";
		yaexistecuentapg="";
		yaexistecuentasg="";
		yaexistecuentatg="";
		document.getElementById("leyenda").innerHTML="Agregar Cuenta";
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

	function ayuda(){

		document.getElementById("leyenda").innerHTML="Ayuda";
		document.getElementById("nuevaVentana").style.width="75%";
		
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
			}
		}
		xmlhttp.open("GET", "../modelo/modelo_asientos?ayuda="+"si", true);
		xmlhttp.send();

	
}
	function validarCuentaNuevaApunte() {

		
		var nuevaCuenta=document.getElementById("nuevaCuentaId").value;	
	 	var nuevoTitulo=document.getElementById("nuevoTituloId").value;
	 	var nuevaMasaPatrimonial=document.getElementById("nuevaMasaPatrimonialId").value;
	 	var nuevoGrado=document.getElementById("nuevoGradoId").value;

		if (validarAgregar(nuevaCuenta, nuevoTitulo, nuevaMasaPatrimonial, nuevoGrado)) {

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
				document.getElementById("nuevaVentana").style.width="70%";
				document.getElementById("codcuenta-1").value=nuevaCuenta;
				document.getElementById("titulo-3").value=nuevoTitulo;
 			}
		}

		xmlhttp.open("GET", "../modelo/modelo_plan_cuentas.php?nuevaCuenta="+nuevaCuenta+"&nuevoTitulo="+nuevoTitulo+"&nuevaMasaPatrimonial="+nuevaMasaPatrimonial+"&nuevoGrado="+nuevoGrado, true);
		xmlhttp.send();

	  } 
					 
	}

		function validarAgregar(nuevaCuenta, nuevoTitulo, nuevaMasaPatrimonial, nuevoGrado) {

			var mensajeFB=document.getElementById("feedback");

			if(nuevaCuenta<100000000000 || nuevaCuenta>999999999999) {return false;}

			if(isNaN(nuevoGrado)) {
				mensajeFB.innerHTML='<button type = "button" value ="Grado no numerico" class = "btn btn-danger">Grado no numerico</button>';
				mensajeFB.style.margin="35%";
				return false;

			}   mensajeFB.innerHTML="";
				return true;
		}


	function cerrarAsiento() {

		var confirmacierra=confirm("Seguro desea CERRAR ASIENTO ?");

		if (confirmacierra) {

		var xmlhttp;

		if (document.getElementById("apunte").value > 1) {

		if(window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
			xmlhttp.onreadystatechange = function () {
			if (this.readyState === 4 && this.status === 200) {
 				var respondecuadre = xmlhttp.responseText;
				if (!respondecuadre.includes("CUADRE")) {
					alert(" El asiento esta descuadrado");
				} else {
						grabaApunteResumen();
						cierraAsiento();
						}
				}
			}
				xmlhttp.open("GET", "../modelo/modelo_asientos.php?cuadre="+"si", true);
				xmlhttp.send();
		}
	  }
	}
	function cierraAsiento()	{
			


			var asientocierre;
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
						grabaExtractos();
						}
		}
 		xmlhttp.open("GET", "../modelo/modelo_asientos.php?cierre="+"si"+"&fechacerrar="+apunte_fecha+"&asientocerrar="+apunte_asiento, true);
		xmlhttp.send();
}

	
 		function grabaExtractos()	{
			
			var asientocierre;
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
						darDeBajaApunte();
						}
		}
 		xmlhttp.open("GET", "../modelo/modelo_asientos.php?extractos="+"si"+"&fechacerrar="+apunte_fecha+"&asientocerrar="+apunte_asiento, true);

		xmlhttp.send();
}

		function grabaApunteResumen()	{


			var asientocierre;
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
 		xmlhttp.open("GET", "../modelo/modelo_asientos.php?grabaapunteresumen="+"si"+"&agrabar_fecha="+apunte_fecha+"&agrabar_asiento="+apunte_asiento+"&agrabar_apunte="+apunte_apunte+"&ref_debe="+ref_debe+"&ref_haber="+ref_haber, true);

		xmlhttp.send();
}

		function darDeBajaApunte ()	{


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
						preparoOtroAsiento();
							}
						}
		
 		xmlhttp.open("GET", "../modelo/modelo_asientos.php?dar_baja_apuntes="+"si"+"&fechacerrar="+apunte_fecha+"&asientocerrar="+apunte_asiento, true);
		xmlhttp.send();
}
 

	function preparoOtroAsiento()  {

		var xmlhttp;

		if(window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
				} else {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
			xmlhttp.onreadystatechange = function () {

			if (this.readyState === 4 && this.status === 200) {

					var respuestaref=xmlhttp.responseText;
					Inicio();
			}
		}
		xmlhttp.open("GET", "../modelo/modelo_asientos.php?asientonuevo="+'si', true);
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

	$("#concepto_numero").on('keyup', function(e){
		var keycode= e.keyCode || e.which;
		if(keycode==13 || keycode==40) {
			buscaConceptos();
		}
		if (keycode==38) {
			enfoca("codcuenta-3");
		}
	});

	$("#documento").on('keyup', function(e){
		var keycode= e.keyCode || e.which;
		if(keycode==13 || keycode==40) {
			enfoca("importe");
		}
		if(keycode==38) {
			enfoca("concepto_numero");
		}
	});

	$("#importe").on('keyup', function(e){
		var keycode= e.keyCode || e.which;
		if(keycode==13 || keycode==40) {
				validarApunte();
		}
		if (keycode==38) {
			enfoca("documento");
		}
	});

	$("#concepto_texto").on('keyup', function(e){
		var keycode= e.keyCode || e.which;
		if(keycode==13 || keycode==40) {
			enfoca("debehaber");
		}
		if(keycode==38) {
			enfoca("concepto_numero");
		}
	});

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
			iraPaginaC();
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
            if (e.ctrlKey  && e.which === 67) {
                ejecutarNuevaVentana('noedicion','CODIGO_CUENTA');
                e.preventDefault();

            }
            if (e.ctrlKey  && e.which === 65) {
                ejecutarNuevaVentana('noedicion','TITULO');
                e.preventDefault();
            }
            if (e.ctrlKey  && e.which ===82) {
                agregarCuenta();
                e.preventDefault();
            }
            if (e.ctrlKey  && e.which ===86) {
                consultarConceptos();
                e.preventDefault();
            }
            if (e.ctrlKey  && e.which ===68) {
                botonDebe();
                e.preventDefault();
            }
            if (e.ctrlKey  && e.which ===72) {
                botonHaber();
                e.preventDefault();
            }
			if (e.ctrlKey  && e.which ===80) {
                validarApunte();
                e.preventDefault();
            }
			if (e.ctrlKey  && e.which ===79) {
                validarAsiento();
                e.preventDefault();
            }
        });


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

