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
					<label for="orden">Orden: </label>    
					<input type="text" id="orden"  size="6"/>
      			</div>
      		</fieldset>

      		<fieldset>
      			<div id="div5">
					<label for="codigo">Código Artículo : </label>    
					<input type="text" id="codigo" size="12" maxlength="12" onfocus="colorTexto(this.id)" onblur="noFoco(this.id)"  style="width:150px;height:28px"/>
					
      			</div>
      			<div id="div51">
					<label for="descripcion">Descripción: </label>    
					<input type="text" id="descripcion" size="40" maxlength="40" readonly="readonly" style="width:400px;height:28px;font-size:16px;"/>
      			</div>
      			
				<div id="div6">
					<label for="titulo-3">Almacen cod.: </label>    
					<input type="text" id="titulo-3" size="3" maxlength="3" readonly="readonly" style="width:90px;height:28px;font-weight:bold;"/>
      			</div>
				<div id="div51">
					<label for="descripcion_alm">Alm. Lugar: </label>    
					<input type="text" id="descripcion" size="40" maxlength="40" readonly="readonly" style="width:400px;height:28px;font-size:16px;"/>
      			</div>
				<div id="div51">
					<p>	<label for="tipo">TIPO DE TRASLADO: </label> 
  						 <input type="radio" name="tipo" value="E"/>  ENTRADA <br/>
  						 <input type="radio" name="tipo" value="S"/>  SALIDA </p>
      			</div>
      			<div id="div7">
					<button type="button" class='botones' onclick="ejecutarNuevaVentana('noedicion','CODIGO_CUENTA')"><u>C</u>onsultar </button>
					<button type="button" class='botones' onclick="ejecutarNuevaVentana('noedicion','TITULO')"><u>A</u>lfabetica</button>
					<button type="button" class='botones' onclick="agregarCuenta()">C<u>R</u>ear Cuenta</button>
					<button type="button" class='botones' onclick="ayuda()">Ayuda contextual</button>
				</div>
      		</fieldset>
      		
  		</form>
	  </div>
	<div id="muestra-apuntes"><br></div>
	</div>
</div>


						if (buenjason) {
			 			var obj = JSON.parse(xmlhttp.responseText);
			 			document.getElementById("fl_almacen_ori").value=obj.alm_ori;
						//document.getElementById("fl_almacen_descripcion").value=obj.;
						document.getElementById("fl_codigo").value=obj.codigo;
						document.getElementById("fl_descripcion").value=obj.descripcion;
						document.getElementById("fl_precio").value=obj.precio;
						//document.getElementById("fl_precio_con_dto").value=obj.;

						document.getElementById("fl_precio_final").value=obj.precio_sin_iva;
						document.getElementById("fl_unidades").value=obj.unidades;
						document.getElementById("fl_tipo_iva").value=obj.tipo_iva;
						//document.getElementById("fl_iva_porcentaje").value=obj.;
						document.getElementById("fl_iva_importe").value=obj.importe_iva;
						document.getElementById("fl_dto_porcentaje").value=obj.descuento_por;
						document.getElementById("fl_dto_importe").value=obj.descuento_importe;
						document.getElementById("fl_total_linea").value=obj.importe_linea;
					


					$table .= '<td id="'.$feditar.$fila['FLIN_NUMERO_FACTURA'].$fila['FLIN_NUMERO_LINEA'].'"><button class = "btn btn-success onclick="editarLinea('.$fila['FLIN_NUMERO_FACTURA'].','.$fila['FLIN_NUMERO_LINEA'].'))">Editare</button></td>';