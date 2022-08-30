<table class = "table">
	  		<tr>
		  		<td><label for="usuario" style="width:90px;">Usuario: </label></td>
		  		<td><input type="text" id="usuario" placeholder="<?php echo $_SESSION["usuario"] ?>" readonly="readonly" size="15"/></td>
		  		<td><label for="fecha"style="width:130px;">Fecha Contable: </label></td>
		  		<td><input type="text" id="fecha"  readonly="readonly" size="12"/></td>
		  		<td><label for="orden" style="width:90px;">Numero: </label></td>
		  		<td><input type="text" id="orden"  size="6"/></td>
		  		<td><label for="orden" style="width:100px;">Estado: </label></td>
		  		<td><input type="text" id="estado"  size="16"/></td>
			</tr>
	  		<tr>
	  			<td><label for="cliente" style="width:150px;">COD.CLIENTE: </label></td>
	 			<td><input type="text" id="cliente" size="3" maxlength="6" style="width:90px;height:28px;font-weight:bold;"  /></td>
	  			<td><input type="text" id="cliente_nombre" size="30" maxlength="30" readonly="readonly" style="width:500px;height:28px;font-size:16px;"/></td>
	  			<td><button onclick="consultaAlmacen('a')" class="btn btn-info"> CONSULTA CLI.</td>
	  		</tr>
	  		<tr>
	  			<td><label for="almacen" style="width:140px;">ALMACEN: </label> </td>
	  			<td><input type="text" id="almacen" size="3" maxlength="3"  style="width:90px;height:28px" /></td>
	  			<td><input type="text" id="descripcion_alm" size="40" maxlength="40" readonly="readonly" style="width:500px;height:28px;font-size:16px;"/></td>
	  			<td><button onclick="consultaPrecios()" class="btn btn-info"> CONSULTA ALM. </td>
	  		</tr>
	  		<tr>
	  			<td><label for="bruto" style="width:150px;"> BRUTO: </label></td>
	  			<td><input type="text" id="bruto" size="9" maxlength="9"  style="width:90px;height:28px;font-weight:bold;" readonly="readonly"/></td>
	  			<td><label for="descuentos" style="width:150px;"> DTOS.: </label></td>
	  			<td><input type="text" id="descuentos" size="9" maxlength="9"  readonly="readonly" style="width:100px;height:28px;font-size:16px;"/></td>
	  			<td><label for="impuestos" style="width:150px;"> IMPUESTOS.: </label></td>
	  			<td><input type="text" id="impuestos" size="9" maxlength="9"  readonly="readonly" style="width:100px;height:28px;font-size:16px;"/></td>
	  			<td><label for="neto" style="width:150px;"> NETO.: </label></td>
	  			<td><input type="text" id="neto" size="9" maxlength="9"  readonly="readonly" style="width:100px;height:28px;font-size:16px;"/></td>
	  		</tr>
			</table>