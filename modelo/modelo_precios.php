<?php 
	//session_start();
	require "conexion.php";
   
	$precios="";
	
	$acontar="no";  
	$pagina=0; 
	$num_paginas=0;
	$desde=0;
	$fechaHoy=0;
	$leer_ref=""; 
	$user="";
	$desdecodigo=""; 
	$desdetitulo="";
	$ordena=""; 
	$eliminar="";
	$actualizar_precios="";
	$act__codigo="";
	$act_descripcion="";
	$act_proveedor="";
	$act_familia="";
	$act_costo="";
	$act_precio_1="";
	$act_precio_2="";
	$act_precio_3="";
	$act_foto="";
	$codigo_revisar="";
	$codigo_eliminar="";
	$revisar="";
	$altaprecios="";
	$buscaproducto="";
	$buscaproveedor="";
	$buscafamilia="";
	$buscasubfamilia="";
	$codigo_buscar="";
	$grabar_producto="";
	$codigo_grabar="";
	$descripcion_grabar="";
	$proveedor_grabar="";
	$familia_grabar="";
	$costo_grabar="";
	$precio_1_grabar="";
	$precio_2_grabar="";
	$precio_3_grabar="";
	$foto_grabar="";



	if (isset($_GET['grabar_producto'])) {

			$grabar_producto=$_GET['grabar_producto'];
			$codigo_grabar=$_GET['codigo'];
			$descripcion_grabar=$_GET['descripcion'];
			$costo_grabar=$_GET['costo'];
			$precio_1_grabar=$_GET['precio_1'];
			$precio_2_grabar=$_GET['precio_2'];
			$precio_3_grabar=$_GET['precio_3'];
			$foto_grabar=$_GET['foto'];
	}



	if (isset($_GET['buscaproducto'])) {

		$buscaproducto=$_GET['buscaproducto'];
		$codigo_buscar=$_GET['id'];
	}

	if (isset($_GET['buscasubfamilia'])) {

		$buscasubfamilia=$_GET['buscasubfamilia'];
		$codigo_buscar=$_GET['id'];
	}

	if (isset($_GET['buscafamilia'])) {

		$buscafamilia=$_GET['buscafamilia'];
		$codigo_buscar=$_GET['id'];
	}

	if (isset($_GET['buscaproveedor'])) {

		$buscaproveedor=$_GET['buscaproveedor'];
		$codigo_buscar=$_GET['id'];
	}

	if (isset($_GET['altaprecios'])) {
		$altaprecios=$_GET['altaprecios'];

	}

	if (isset($_GET['revisar'])) {
		$revisar=$_GET['revisar'];
		$codigo_revisar=$_GET['codigo_revisar'];
	}

	if (isset($_GET['actualizar_precios'])) {

		$actualizar_precios=$_GET['actualizar_precios'];
		$act_codigo=$_GET['pre_codigo'];
		$act_descripcion=$_GET['descripcion'];
		$act_costo=$_GET['costo'];
		$act_precio_1=$_GET['precio_1'];
		$act_precio_2=$_GET['precio_2'];
		$act_precio_3=$_GET['precio_3'];
		$act_foto=$_GET['foto'];
	}
	
	if (isset($_GET['eliminar'])){
		$eliminar="si";
		$codigo_eliminar=$_GET['codigo_eliminar'];
	}

	if (isset($_GET['leer_ref'])){

		$leer_ref=$_GET['leer_ref'];
		$user=$_GET['user'];
	}

	if (isset($_GET['precios'])) { 
		$precios = $_GET['precios'];
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
	
	if (isset($_GET['nuevaCuenta'])) {

		$nuevaCuenta=$_GET['nuevaCuenta'];
		$nuevoTitulo=$_GET['nuevoTitulo'];
		$nuevaMasaPatrimonial=$_GET['nuevaMasaPatrimonial'];
		$nuevoGrado=$_GET['nuevoGrado'];
	}

	if (isset($_GET['param1'])) {
		$codigo_cuentaActualizada = $_GET['param1'];
		}
	if (isset($_GET['param2'])){
		$tituloActualizado = $_GET['param2'];
		}
	if (isset($_GET['param3'])) {
		$masa_patrimonialActualizada = $_GET['param3'];
		}
	
	if (isset($_GET['refeliminada'])) {
		$referenciaIDEliminada=$_GET['refeliminada'];
		}


	$pre_codigo = "PRE_CODIGO";
	$descripcion = "PRE_DESCRIPCION";
	$proveedor="PRE_PROVEEDOR";
	$familia ="PRE_FAMILIA";
	$costo="PRE_COSTO";
	$precio_1="PRE_PRECIO_1";
	$precio_2="PRE_PRECIO_2";
	$precio_3="PRE_PRECIO_3";
	$foto="PRE_FOTO";
	$foto2="PRE_FOTO2";
	$borrar = "BORRAR";
	$actualizar="ACTUALIZAR";
	$lafoto="";
	$tamanio=12;
	
	

	if ($eliminar=="si"){


		$resultado=mysqli_query($con, "DELETE FROM precios WHERE PRE_CODIGO= '$codigo_eliminar'");

		if ($resultado) {

			echo "eliminadas: ".mysqli_affected_rows($con).$codigo_eliminar;
		} else {
			echo "No correcto";
		}

		mysqli_close($con);

		} 
		

	if ($acontar=="si") {

		
		$resultado = mysqli_query($con, "SELECT * FROM precios WHERE PRE_CODIGO >= '$desdecodigo'");
			
		if ($resultado) { $num_filas = mysqli_num_rows($resultado);
				echo $num_filas; } else { echo "no hay, el desdecodigo es:".$desdecodigo."---".mysqli_error($con);
													   }

	}


	if($precios==="si") {


			$mensaje="";

			$desde=(($pagina-1)*$tamanio);

			$resultado = mysqli_query($con, "SELECT PRE_CODIGO, PRE_DESCRIPCION, PRE_COSTO, PRE_PRECIO_1,
					PRE_PRECIO_2, PRE_PRECIO_3, PRE_FOTO, PRE_UNIDADES_ENTRADA, PRE_UNIDADES_SALIDA, PRO_CODIGO, PRO_NOMBRE, FAM_CODIGO, FAM_NOMBRE, SFAM_CODIGO, SFAM_NOMBRE
					FROM precios
					LEFT JOIN proveedor ON SUBSTR(PRE_CODIGO,1,3)= PRO_CODIGO
					LEFT JOIN familia ON SUBSTR(PRE_CODIGO,4,3)= FAM_CODIGO 
					LEFT JOIN subfamilia ON SUBSTR(PRE_CODIGO,4,6)= SFAM_CODIGO
						 WHERE PRE_CODIGO >= '$desdecodigo' ORDER BY PRE_CODIGO LIMIT $desde,$tamanio");

			$table = '<div class = "container">';
			$table .=  '<table class = "table table-striped table-bordered table-hover table-condensed table-responsive">';
			$table .= '<tr>';
			$table .= '<th class="col-sm-1" style="text-align:center;">Código</th>';
			$table .= '<th class="col-sm-4" style="text-align:center;">Descripcion</th>';
			$table .= '<th class="col-sm-1" style="text-align:center;">Proveedor</th>';
			$table .= '<th class="col-sm-2" style="text-align:right;">Familia</th>';
			$table .= '<th class="col-sm-2" style="text-align:right;">SubFamilia</th>';
			$table .= '<th class="col-sm-2" style="text-align:right;">Costo</th>';
			$table .= '<th class="col-sm-2" style="text-align:right;">PVP_1</th>';
			$table .= '<th class="col-sm-2" style="text-align:right;">PVP_2</th>';
			$table .= '<th class="col-sm-2" style="text-align:right;">PVP_2</th>';
			$table .= '<th class="col-sm-0" style="text-align:center;">Foto</th>';
			$table .= '<th class="col-sm-0">Mod</th>';
			$table .= '<th class="col-sm-0">Elim</th>';
			$table .= '</tr>';

			if ($resultado) {

				while ($fila = mysqli_fetch_assoc($resultado)) {

			$table .= '<tr>';
			$table .= '<td id="'.$pre_codigo.$fila['PRE_CODIGO'].'">' . $fila['PRE_CODIGO'] . '</td>';
			$table .= '<td id="'.$descripcion.$fila['PRE_CODIGO'].'" style="white-space:nowrap">' . htmlentities($fila['PRE_DESCRIPCION']) . '</td>';
			$table .= '<td id="'.$proveedor.$fila['PRE_CODIGO'].'" style="white-space:nowrap">' . $fila['PRO_NOMBRE']. '</td>';
			$table .= '<td id="'.$familia.$fila['PRE_CODIGO'].'" style="white-space:nowrap">' . $fila['FAM_NOMBRE']. '</td>';
			$table .= '<td id="'.$familia.$fila['PRE_CODIGO'].'"style="white-space:nowrap">' . $fila['SFAM_NOMBRE']. '</td>';
			$table .= '<td id="'.$costo.$fila['PRE_CODIGO'].'" align="right">' .number_format($fila['PRE_COSTO'], 2, ',','.'). '</td>';
			$table .= '<td id="'.$precio_1.$fila['PRE_CODIGO'].'" align="right">' .number_format($fila['PRE_PRECIO_1'], 2, ',','.'). '</td>';
			$table .= '<td id="'.$precio_2.$fila['PRE_CODIGO'].'" align="right">' .number_format($fila['PRE_PRECIO_2'], 2, ',','.'). '</td>';
			$table .= '<td id="'.$precio_3.$fila['PRE_CODIGO'].'" align="right">' .number_format($fila['PRE_PRECIO_3'], 2, ',','.'). '</td>';

			$envio_foto="'".$fila['PRE_CODIGO'].$fila['PRE_FOTO']."'";

			//$table .= '<td id="'.$foto.$fila['PRE_CODIGO'].'" ondblclick="muestraFoto('.$envio_foto.')"  style="white-space:nowrap; max-width:150px" maxlength="15">'.$fila['PRE_FOTO'].'</td>';
			$table .= '<td><input id="'.$foto.$fila['PRE_CODIGO'].'" onclick="muestraFoto('.$envio_foto.')" type = "button" value ="Imagen" class = "btn btn-info"></td>';
			$table .= '<td><input id="'.$fila['PRE_CODIGO'].'" onclick="editarPrecios(this.id)" type = "button" value ="Edi" class = "btn btn-success"></td>';
		$texto="'";	
			$table .= '<td><input  id="'.$borrar.$fila['PRE_CODIGO'].'" onclick="borrarPrecio('.$texto.$fila['PRE_CODIGO'].$texto.')"  type = "button" value ="Bor" class = "btn btn-danger"></td>';

		
		$table .= '<td><input id="'.$actualizar.$fila['PRE_CODIGO'].'" onclick = "actualizarPrecio('.$texto.$fila['PRE_CODIGO'].$texto.')" type = "button" value ="Actualizar" class = "btn btn-primary" style="display:none;"></td>'; 
			$table .= '</tr>';
		}
	} else { $mensaje = mysqli_error($con); }
		$table.= '</table>';
		$table.= '<button onclick="ejecutarNuevaVentana()" class="btn btn-primary">Agregar Producto</button>';
		$table.="<br>";
		$table.="<h4>Mostrar Página:<span id='mostrandopagina'> </span> Desde código : ".$desdecodigo."</h4>";
		$table.="<button class='botones' onclick="."'retrocedoPagina()'>"."<"."</button>";
		$eligepagina="1-".$num_paginas;
		$table.=' Pagina: <input type="text" id="eligepagina" size="3" maxlength="3" placeholder="'.$eligepagina.'">';
		$table.="<button class='botones' onclick="."'iraPagina()'>"."Ir"."</button>";
		$table.="<button  class='botones' onclick="."'avanzoPagina()'>".">"."</button>";
		$table.='Desde codigo:<input type="text" id="desdecodigo" size="12" maxlength="12">';
		$table.="<button class='botones' onclick="."'desdeCodigo()'>"."Ir"."</button>";
		$table.= "</div>";
		$table.= "</div>";

		echo $table." ".$mensaje;
		mysqli_close($con);
	} 

	if ($altaprecios=="si") {

			$vista="<div>";
				$vista.'<form>';
			 
		      	$vista.='<div id="divac1">';
			      	$vista.='<p><label for="codigo">Código Producto : </label>';
			      	$vista.='<input type="text" id="codigo" size="12" maxlength="12" onfocus="colorTexto(this.id)"   onblur="noFoco(this.id)" style="width:110px;height:35px"/></p>';
		      	$vista.='</div>';
		      	$vista.='<div id="divac2">'; 
			      	$vista.='<p><label for="descripcion">Descripcion: </label>';
			      	$vista.='<input type="text" id="descripcion" size="40" maxlength="40"  style="width:350px;height:35px;font-size:12px;"  /></p>';
		      	$vista.='</div>';
		      	$vista.='<div id="divac3">';
			      	$vista.='<p><label for="proveedor">Proveedor: </label>';
			      	$vista.='<input type="text" id="proveedor_des" size="3" maxlength="3" readonly="readonly" style="width:300px;height:35px;font-size:12px;"/></p>';
		      	$vista.='</div>';
		      	$vista.='<div id="divac4">';
			      	$vista.='<p><label for="familia">Familia: </label>';
			      	$vista.='<input type="text" id="familia_des" size="3" maxlength="3" readonly="readonly" style="width:300px;height:35px;font-size:12px;"/></p>';
		      	$vista.='</div>';
		      	$vista.='<div id="divac44">';
			      	$vista.='<p><label for="subfamilia">SubFamilia: </label>';
			      	$vista.='<input type="text" id="subfamilia_des" size="3" maxlength="3" readonly="readonly" style="width:300px;height:35px;font-size:12px;"/></p>';
		      	$vista.='</div>';
		      	$vista.='<div id="divac5">';
			      	$vista.='<p><label for="Costo">Precio Costo: </label>';
			      	$vista.='<input type="text" id="costo" size="12" maxlength="12" style="width:150px;height:35px;font-size:12px;"/></p>';
		      	$vista.='</div>';

		      	$vista.='<div id="divac6">';
			      	$vista.='<p><label for="precio_1">Precio 1: </label>';
			      	$vista.='<input type="text" id="precio_1" size="12" maxlength="12" style="width:150px;height:35px;font-size:12px;"/></p>';
		      	$vista.='</div>';

		      	$vista.='<div id="divac7">';
			      	$vista.='<p><label for="precio_2">Precio 2: </label>';
			      	$vista.='<input type="text" id="precio_2" size="12" maxlength="12" style="width:150px;height:35px;font-size:12px;"/></p>';
		      	$vista.='</div>';
		      	$vista.='<div id="divac8">';
			      	$vista.='<p><label for="precio_3">Precio 3: </label>';
			      	$vista.='<input type="text" id="precio_3" size="12" maxlength="12" style="width:150px;height:35px;font-size:12px;"/></p>';
		      	$vista.='</div>';
		     $vista.="</form>"; 
		     
		     $vista.="<br>";
		     $vista.='<div style="padding-left:180px;';
		     		 $vista.='<form method="post" action="#" enctype="multipart/form-data">';		
				     $vista.=	'<div class="card" style="display:block; margin: auto;" >';
				     $vista.='<img name="hereB" id ="aquiB" width="15%" class="card-img-top" src="/PROYECTO3/IMAGEN_SERVIDOR/'.$lafoto.'">';
				     $vista.='<div class="card-body">';
				     $vista.='<p class="card-text">  Seleccione una imagen...</p>';
					 $vista.='<div class="form-group">';
					 $vista.='<input type="file" class="form-control-file" name="imageB" id="imageB" required>';
					 $vista.='</div>';
					 $vista.='<div>';
					 $vista.='<input type="button" class="btn btn-primary upload" id="botonsubirB" value="Cargar Imágen">';
					 $vista.='<input type="button" class="btn btn-success upload" id="botonGrabar" value="GRABAR PRODUCTO" onclick="grabarProducto()">'; 
					 $vista.='</div>';  
				  	 $vista.="</form>";
		   $vista.="</div>";
		      	echo $vista;
	}

	if ($grabar_producto=="si"){

		$costo_float=(float)$costo_grabar;
		$precio_1_float=(float)$precio_1_grabar;
		$precio_2_float=(float)$precio_2_grabar;
		$precio_3_float=(float)$precio_3_grabar;

		$resultado = mysqli_query($con, "INSERT INTO precios (PRE_CODIGO, PRE_DESCRIPCION, PRE_COSTO, PRE_PRECIO_1, PRE_PRECIO_2, PRE_PRECIO_3, PRE_FOTO, PRE_UNIDADES_ENTRADA, PRE_UNIDADES_SALIDA) VALUES ('$codigo_grabar', '$descripcion_grabar', '$costo_float', '$precio_1_float', '$precio_2_float', '$precio_3_float', '$foto_grabar', '0', '0')");
			
		if ($resultado) {

			$msg= "CORRECTO " . mysqli_affected_rows($con);

				} else {
						 $msg= "NO CORRECTO ".mysqli_error($con);
						}
			echo " aqui estuvo ". $msg;
			mysqli_close($con); 


	} 


	if ($buscaproducto=="si") {

		//$_SESSION["producto"]=$codigo_buscar;

		$resultado = mysqli_query($con, "SELECT PRE_DESCRIPCION FROM precios WHERE PRE_CODIGO = '$codigo_buscar'");
			
		if ($resultado) { 

			if (mysqli_num_rows($resultado)> 0) {

				$fila = mysqli_fetch_assoc($resultado);

				echo $fila['PRE_DESCRIPCION'];

			} else echo "INEXISTENTE";

			
		} else echo "INEXISTENTE";											   

		mysqli_close($con); 

	}

	if ($buscaproveedor=="si") {

		$resultado = mysqli_query($con, "SELECT PRO_NOMBRE FROM proveedor WHERE PRO_CODIGO = '$codigo_buscar'");
			
		if ($resultado) { 

			if (mysqli_num_rows($resultado)> 0) {

				$fila = mysqli_fetch_assoc($resultado);

				echo $fila['PRO_NOMBRE'];

			} else echo "INEXISTENTE";

			
		} else echo "INEXISTENTE";	

		mysqli_close($con); 										   

	}

	if ($buscafamilia=="si") {

		$resultado = mysqli_query($con, "SELECT FAM_NOMBRE FROM familia WHERE FAM_CODIGO = '$codigo_buscar'");
			
		if ($resultado) { 

			if (mysqli_num_rows($resultado)> 0) {

				$fila = mysqli_fetch_assoc($resultado);

				echo $fila['FAM_NOMBRE'];

			} else echo "INEXISTENTE";

			
		} else echo "INEXISTENTE";

		mysqli_close($con); 										   

	}

	if ($buscasubfamilia=="si") {

		$resultado = mysqli_query($con, "SELECT SFAM_NOMBRE FROM subfamilia WHERE SFAM_CODIGO = '$codigo_buscar'");
			
		if ($resultado) { 

			if (mysqli_num_rows($resultado)> 0) {

				$fila = mysqli_fetch_assoc($resultado);

				echo $fila['SFAM_NOMBRE'];

			} else echo "INEXISTENTE";

			
		} else echo "INEXISTENTE";

		mysqli_close($con); 										   

	}
	if($actualizar_precios=="si") {

		$flo_costo=(float)$act_costo;
		$flo_precio_1=(float)$act_precio_1;
		$flo_precio_2=(float)$act_precio_2;
		$flo_precio_3=(float)$act_precio_3;

		$query="UPDATE precios SET PRE_DESCRIPCION = '$act_descripcion', PRE_COSTO='$flo_costo', PRE_PRECIO_1='$flo_precio_1', PRE_PRECIO_2 ='$flo_precio_2', PRE_PRECIO_3 ='$flo_precio_3', PRE_FOTO = '$act_foto' WHERE  PRE_CODIGO = '$act_codigo'";
  
		if (mysqli_query($con, $query)) {
			echo "correcto afectadas-> ".mysqli_affected_rows($con);
		} else { 
			echo "No correcto ". mysqli_error($con);
		}
		mysqli_close($con); 
	}
		
		
	if(!empty($referenciaIDEliminada)){

		$referencia=mysqli_real_escape_string($con, $referenciaIDEliminada);
		$resultado=mysqli_query($con, "DELETE FROM referencias WHERE ID_USUARIO = $referencia");
		mysqli_close($con);


		} 
		
	if(!empty($nuevaCuenta)) {

		$masa_id=$masa_id=substr($nuevaMasaPatrimonial,0,4);


		$query="INSERT INTO cuentas(CODIGO_CUENTA, TITULO, FECHA_ALTA, MASA_PATRIMONIAL, GRADO, MASA_ID) VALUES ('$nuevaCuenta', '$nuevoTitulo', '2020-10-23', '$nuevaMasaPatrimonial', '$nuevoGrado', '$masa_id')";

		if (mysqli_query($con, $query)) {
			echo "correcto";
		} else { 
			echo "No ejecutado".mysqli_error($con);
		}
		
		mysqli_close($con);
	} 

		if ($revisar=="si") {


		$resultado=mysqli_query($con, "SELECT * FROM precios WHERE PRE_CODIGO = '$codigo_revisar'");

		if ($resultado) { 
							$fila = mysqli_fetch_assoc($resultado);

							if ($fila['PRE_UNIDADES_ENTRADA']!=0 || $fila['PRE_UNIDADES_SALIDA']!=0 ) {

											echo "no";

									} else { 
												echo "si"; 
											} 
						} 

		
		mysqli_close($con);

	}


	if($leer_ref=="si") {


			$query="SELECT FECHA_CONTABLE FROM referencias WHERE ID_USUARIO = '$user'";

			$resultado = mysqli_query($con, $query);

			if($resultado) {

				$fila = mysqli_fetch_assoc($resultado);

			echo $fila['FECHA_CONTABLE'];

			}
			else {
					echo "INEXISTENTE ".$user;

					} 
		
			mysqli_close($con);
	}
		
	
		
?>

