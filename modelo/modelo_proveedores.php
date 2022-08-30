<?php 
	require "conexion.php";
 

	$id_responsableActualizada="";
	$actualizar_fam="";
	$acontar="no";
	$pagina=0;
	$num_paginas=0;
	$desde=0;
	$fechaHoy=0;
	$codigo_buscar;
	$alta="";  
	$nuevoCodigo="";
	$nuevoNombre="";
	$nuevoDescuento1="";
	$nuevoDescuento2="";
	$borrar_pro="";
	$codigo_borrar="";
	$desdecodigo="";
	$formulario="";
	$proveedores="";
	$operacion="";
	$nifAc="";
	$nombreAc="";
	$direccionAc="";
	$telefonoAc="";
	$correoAc="";
	$bancoAc="";
	$actualizar_proveedor="";
	$codigo_actualizar="";
	$buscaproveedor="";
	$n_nif="";
	$n_nombre="";
	$n_direccion="";
	$n_telefono="";
	$n_correo="";
	$n_banco="";
	$n_codigo="";

	if (isset($_GET['actualizar_proveedor'])) {

		$codigo_actualizar=$_GET['codigo'];
		$actualizar_proveedor=$_GET['actualizar_proveedor'];
		$nifAc=$_GET['nif'];
		$nombreAc=$_GET['nombre'];
		$direccionAc=$_GET['direccion'];
		$telefonoAc=$_GET['telefono'];
		$correoAc=$_GET['correo'];
		$bancoAc=$_GET['banco'];
	}


	if (isset($_GET['buscaproveedor'])) {
		$buscaproveedor = $_GET['buscaproveedor'];
		$codigo_buscar= $_GET['id'];
		}

	if (isset($_GET['formulario'])) {
		$formulario = $_GET['formulario'];
		$operacion =$_GET['operacion'];
		}


	if (isset($_GET['proveedores'])) {
		$proveedores = $_GET['proveedores'];
		$pagina=$_GET['pagina'];
		$num_paginas=$_GET['num_paginas'];
		$desdecodigo=$_GET['desdecodigo'];
		}


	if (isset($_GET['acontar'])) {
		$acontar="si";
		$desdecodigo=$_GET['desdecodigo'];
		} else {
			$acontar="no";
		}
	

	if (isset($_GET['alta'])) {

		$alta=$_GET['alta'];
		$n_codigo=$_GET['codigo'];
		$n_nif=$_GET['nif'];
		$n_nombre=$_GET['nombre'];
		$n_direccion=$_GET['direccion'];
		$n_telefono=$_GET['telefono'];
		$n_correo=$_GET['correo'];
		$n_banco=$_GET['banco'];
	}

	if (isset($_GET['borrar'])) {
		$borrar_pro=$_GET['borrar'];
		$codigo_borrar=$_GET['proveedor_borrar'];
	 	}


	$codigo = "PRO_CODIGO";
	$nif="PRO_NIF";
	$nombre = "PRO_NOMBRE";
	$valor="VALOR";
	$direccion="PRO_DIRECCION";
	$telefono="PRO_TLF";
	$correo="PRO_EMAIL";
	$banco="PRO_BANCO_IBAN";

	$actualizar ="ACTUALIZAR";
	$borrar = "BORRAR";
	$tamanio=12;

	
	if ($acontar=="si") {

		$resultado = mysqli_query($con, "SELECT * FROM proveedor WHERE PRO_CODIGO >= '$desdecodigo'");
		$num_filas = mysqli_num_rows($resultado);
		echo $num_filas;

	}


	if($proveedores==="si") {

			$desde=(($pagina-1)*$tamanio);

		 	$resultado = mysqli_query($con, "SELECT * FROM proveedor WHERE PRO_CODIGO >= '$desdecodigo' ORDER BY PRO_CODIGO LIMIT $desde,$tamanio");

		 	
			$table = '<div class = "container">';
			$table .=  '<table class = "table table-striped table-hover table-condensed table-responsive">';
			$table .= '<tr>';
			$table .= '<th class="col-sm-0">Código</th>';
			$table .= '<th class="col-sm-0">Nombre</th>';
			$table .= '<th class="col-sm-0">Nif</th>';
			$table .= '<th class="col-sm-0">Dirección</th>';
			$table .= '<th class="col-sm-0">Tlf</th>';
			$table .= '<th class="col-sm-1">E-mail</th>';
			$table .= '<th class="col-sm-1">Banco, IBAN</th>';
			$table .= '<th class="col-sm-0">Editar </th>';
			$table .= '<th class="col-sm-0">Borrar </th>';
			$table .= '</tr>';


			while ($fila = mysqli_fetch_assoc($resultado)) {

			$table .= '<tr>';
			$table .= '<td id="'.$codigo.$fila['PRO_CODIGO'].'">' . $fila['PRO_CODIGO'] . '</td>';
			$table .= '<td id="'.$nombre.$fila['PRO_CODIGO'].'" style="white-space:nowrap">' . $fila['PRO_NOMBRE'] . '</td>';
			$table .= '<td id="'.$nif.$fila['PRO_CODIGO'].'" style="white-space:nowrap">' . $fila['PRO_NIF'] . '</td>';
			$table .= '<td id="'.$direccion.$fila['PRO_CODIGO'].'" style="white-space:nowrap" >' . $fila['PRO_DIRECCION'] . '  </td>';
			$table .= '<td id="'.$telefono.$fila['PRO_CODIGO'].'" style="white-space:nowrap" >' . $fila['PRO_TLF'] . ' </td>';
			$table .= '<td id="'.$correo.$fila['PRO_CODIGO'].'" style="white-space:nowrap">' . $fila['PRO_EMAIL'] . ' </td>';
			$table .= '<td id="'.$banco.$fila['PRO_CODIGO'].'" style="white-space:nowrap" >' . $fila['PRO_BANCO_IBAN'] . ' </td>';
			$table .= '<td><input id="'.$fila['PRO_CODIGO'].'" onclick="editarProveedor(this.id)" type = "button" value ="Editar" class = "btn btn-success"></td>';
			$table .= '<td><input  id="'.$borrar.$fila['PRO_CODIGO'].'" onclick="borrarProveedor('.$fila['PRO_CODIGO'].')"  type = "button" value ="Borrar" class = "btn btn-danger"></td>';
			$table .= '<td><input id="'.$actualizar.$fila['PRO_CODIGO'].'" onclick = "actualizarProveedor('.$fila['PRO_CODIGO'].')" type = "button" value ="Actualizar" class = "btn btn-primary" style="display:none;"></td>';
 			$table .= '</tr>';
			}
		$table.= '</table>';
		$table.= '<button onclick="ejecutarNuevaVentana()" class="btn btn-primary">Agregar Proveedor</button>';
		$table.="<br>";

		$table.="<h4>Mostrar Página:<span id='mostrandopagina'> </span> Desde código : ".$desdecodigo."</h4>";
		$table.="<button class='botones' onclick="."'retrocedoPagina()'>"."<"."</button>";
		$eligepagina="1-".$num_paginas;
		$table.=' Pagina: <input type="text" id="eligepagina" size="3" maxlength="3" placeholder="'.$eligepagina.'">';
		$table.="<button class='botones' onclick="."'iraPagina()'>"."Ir"."</button>";
		$table.="<button  class='botones' onclick="."'avanzoPagina()'>".">"."</button>";
		$table.='Desde codigo:<input type="text" id="desdecodigo" size="8" maxlength="8">';
		$table.="<button class='botones' onclick="."'desdeCodigo()'>"."Ir"."</button>";
		echo $table;
		mysqli_close($con);

	} 


	if ($formulario=="si") {

			$vista="<div>";
				$vista.'<form>';
			 
		      	$vista.='<div id="divac1">';
			      	$vista.='<p><label for="codigo" padding="15px">Código Proveedor : </label>';
			      	$vista.='<input type="text" id="codigo" size="3" maxlength="3" onfocus="colorTexto(this.id)""   onblur="noFoco(this.id)" style="width:110px;height:35px;padding:15px"/></p>';
		      	$vista.='</div>';
		      	
		      	$vista.='<div id="divac2">';
			      	$vista.='<p><label for="nombre">Nombre: </label>';
			      	$vista.='<input type="text" id="nombre" size="30" maxlength="30"  style="width:300px;height:35px;font-size:12px;padding:15px" onfocus="colorTexto(this.id)" onblur="noFoco(this.id)"/></p>';
		      	$vista.='</div>';
		      	$vista.='<div id="divac3">'; 
			      	$vista.='<p><label for="nif">Nif/Cif: </label>';
			      	$vista.='<input type="text" id="nif" size="12" maxlength="12"  style="width:150px;height:35px;font-size:12px;padding:15px" onfocus="colorTexto(this.id)"  onblur="noFoco(this.id)"/></p>';
		      	$vista.='</div>';
		      	$vista.='<div id="divac4">';
			      	$vista.='<p><label for="direccion">Direccion: </label>';
			      	$vista.='<input type="text" id="direccion" size="30" maxlength="30" style="width:300px;height:35px;font-size:12px;padding:15px" onfocus="colorTexto(this.id)" onblur="noFoco(this.id)"/></p>';
		      	$vista.='</div>';
		      	$vista.='<div id="divac5">';
			      	$vista.='<p><label for="telefono">Telefono: </label>';
			      	$vista.='<input type="text" id="telefono" size="10" maxlength="10" style="width:150px;height:35px;font-size:12px;padding:15px" onfocus="colorTexto(this.id)" onblur="noFoco(this.id)"/></p>';
		      	$vista.='</div>';
		      	$vista.='<div id="divac6">';
			      	$vista.='<p><label for="correo">Correo: </label>';
			      	$vista.='<input type="text" id="correo" size="30" maxlength="30" style="width:300px;height:35px;font-size:12px;padding:15px" onfocus="colorTexto(this.id)" onblur="noFoco(this.id)"/></p>';
		      	$vista.='</div>';
		      	$vista.='<div id="divac7">';
			      	$vista.='<p><label for="banco">Banco Iban: </label>';
			      	$vista.='<input type="text" id="banco" size="24" maxlength="24" style="width:300px;height:35px;font-size:12px;padding:15px" onfocus="colorTexto(this.id)" onblur="noFoco(this.id)"/></p>';
		      	$vista.='</div>';
		     $vista.='<div>';
		     if ($operacion=="alta"){
			 $vista.='<input type="button" class="btn btn-success upload" id="botonGrabar" value="Validar Alta" onclick="agregarProveedor()" style="margin-left:450px;">';
			 	}
			 if ($operacion=="edicion") {
			 $vista.='<input type="button" class="btn btn-success upload" id="botonGrabar" value="Actualizar Cambios" onclick="actualizarProveedor()" style="margin-left:450px;">';
			 } 
			  if ($operacion=="consulta"){
			 $vista.='<input type="button" class="btn btn-success upload" id="botonGrabar" value="CONSULTA" disabled style="margin-left:450px;">';
			 	}
			$vista.='</div>';  
			$vista.='</form>';
		    echo $vista;
	}

		if($actualizar_proveedor=="si") {
	
				$resultado=mysqli_query($con, "UPDATE proveedor SET PRO_NIF = '$nifAc', PRO_NOMBRE ='$nombreAc', PRO_DIRECCION = '$direccionAc', PRO_TLF = '$telefonoAc', PRO_EMAIL = '$correoAc',PRO_BANCO_IBAN = '$bancoAc'  WHERE PRO_CODIGO = '$codigo_actualizar'");
				if ($resultado) {
					echo "correcto". mysqli_affected_rows($con);
				} else { 
					echo "No correcto". mysqli_error($con);
				}
				mysqli_close($con); 
			}
				if($borrar_pro=="si"){
				$resultado=mysqli_query($con, "DELETE FROM proveedor WHERE PRO_CODIGO = $codigo_borrar");
				if ($resultado){
					echo " eliminado: ". mysqli_affected_rows($con);
				} else echo "error";
				mysqli_close($con);
	} 

		
		if($alta=="si") {

				$resultado = mysqli_query($con, "INSERT INTO proveedor (PRO_CODIGO, PRO_NIF, PRO_NOMBRE, PRO_DIRECCION, PRO_TLF, PRO_EMAIL, PRO_BANCO_IBAN) VALUES ('$n_codigo', '$n_nif', '$n_nombre', '$n_direccion', '$n_telefono', '$n_correo', '$n_banco')");

				if ($resultado) {
					echo "correcto ". mysqli_affected_rows($con)." registros";
				} else {echo "error " . mysqli_error($con);}

				mysqli_close($con);
	} 

	if ($buscaproveedor=="si") {


		$resultado = mysqli_query($con, "SELECT PRO_CODIGO, PRO_NOMBRE FROM proveedor WHERE PRO_CODIGO = '$codigo_buscar'");
			
		if ($resultado) { 

			$fila = mysqli_fetch_assoc($resultado);

			if (mysqli_num_rows($resultado)> 0) {
				
					echo $fila['PRO_NOMBRE'];
				} 

			  else {
			  		 echo "INEXISTENTE";
					}

		} else echo "INEXISTENTE"." ".mysqli_error($con);											   

		mysqli_close($con); 

	}

	

?>


