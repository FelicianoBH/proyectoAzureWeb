			<table class = "table table-condensed" id="cabecera-input">
	  			 	<tr>
	  				<td><label class="etiquetas">Usuario:</label> </td>
	  				<td><input id="usuario" readonly="readonly" size="5" placeholder="<?php echo $_SESSION["usuario"] ?>"></td>
	  				<td><label class="etiquetas">Fecha:</label></td>
	  				<td><input id="fecha" readonly="readonly" size="10"></td>
	  				<td><label class="etiquetas">Asiento</label></td>
	  				<td><input id="asiento" readonly="readonly" size="6"></td>
	  				</tr>	  			 
	  			 	<tr>
	  				<td><label class="etiquetas">Apunte</label></td>
	  				<td><input id="apunte" readonly="readonly" size="6"></td>
	  				<td><label class="etiquetas">Código :</label></td>
					<td><input id="codcuenta" type="text"  size="12"></td>
					<td><button type="button" onclick="buscaCuenta()">Buscar</button>
						<button type="button" onclick="buscaPlan()">Plan</button>
						<button type="button" onclick="buscaAlfa()">Alfa</button></td>
					</tr>
	  				<tr>
					<td><label class="etiquetas">Titulo:</label></td>
					<td><input id="titulo" type="text"  size="20"></td>
	  				<td><label class="etiquetas">Documento:</label></td>
	  				<td><input id="documento" size="20"></td>
	  				</tr>
	  				<tr>
	  				<td><label class="etiquetas">Clave:</label></td>
	  				<td><input type="number"  id="concepto_numero"></td>
					<td><button type="button" onclick="buscaConceptos()">Buscar</button></td>	 
					<td><input id="concepto_texto" size="20"></td>
					</tr>
	  				<tr>
					<td><label class="etiquetas">Importe</label></td><td><input id="importe" size="12"></td>
					<td><button type="button" onclick="alDebe">Debe</button>
						<button type="button" onclick="alDebe">Haber</button></td>
					<td><button type="button">Validar Asiento</button></td>
	  			 	</tr>