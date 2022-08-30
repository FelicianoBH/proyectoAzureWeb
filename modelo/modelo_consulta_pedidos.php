<?php   
	require "conexion.php";
   
	 
	$acontar="no"; 
	$pagina=0; 
	$num_paginas=0;
	$desde=0;
	$fechaHoy=0;
	$retrocedo="inicio";
	$leer_ref="";
	$user="";
	$desdecodigo="";
	$desdetitulo="";
	$ordena="";
	$pedidos="";  
	$num_pedido="";
	$ver_cabecera="";
	$ped_lineas="";
	$acontar_pedlineas="";

	if (isset($_GET['ped_lineas'])) {
		$ped_lineas = $_GET['ped_lineas'];
		$pagina=$_GET['pagina'];
		$numero_pedido=$_GET['numero_pedido'];
		$num_paginas=$_GET['num_paginas'];
		}

	if (isset($_GET['acontar_pedlineas'])) {

		$acontar_pedlineas="si";
		$numero_pedido=$_GET['numero_pedido'];

		} 
	if (isset($_GET['leer_ref'])){

		$leer_ref=$_GET['leer_ref'];
		$user=$_GET['user'];
	}
	if (isset($_GET['ver_cabecera'])){

		$ver_cabecera=$_GET['ver_cabecera'];
		
	}
	if (isset($_GET['pedidos'])) { 
		$pedidos = $_GET['pedidos'];
		$pagina=$_GET['pagina'];
		$num_paginas=$_GET['num_paginas'];
		
		}

	if (isset($_GET['acontar'])) {
		$acontar="si";
		} else {
			$acontar="no";
		}
	
	
	$numero_p="PED_NUMERO";
	$fecha_p="PED_FECHA";
	$cliente_p="PED_CLIENTE";
	$cliente_nombre_p="NOMBRE_CLIENTE";
	$neto_p="PED_IMPORTE_NETO";
	$iva_p="PED_IMPORTE_IVA";
	$descuento_p="PED_IMPORTE_DESCUENTO";
	$total_p="PED_IPMORTE_TOTAL";
	$almacen_p="PED_ALMACEN_VENTA";
	$num_lineas_p="PED_NUMERO_LINEAS";
	$detalle_p="DETALLE";
	
	$fcodigo="PLIN_CODIGO_ART";
	$fdescripcion="PLIN_DESCRIPCION";
	$funidades="PLIN_UNIDADES";
	$fprecio="PLIN_PRECIO";
	$fiva="PLIN_IVA_POR";
	$fimporte="FIMPORTE";
	$fdescuento="PLIN_DESCUENTO_POR";
	$fimporte="PLIN_IMPORTE_LINEA";
	$fdetalle="DETALLE";
	$feditar="EDITAR";
	$fborrar="BORRAR";

	$tamanio=12;
	
	
	if ($acontar=="si") {

		
		$resultado = mysqli_query($con, "SELECT * FROM pedido_cab");
			
		if ($resultado) { $num_filas = mysqli_num_rows($resultado);
				echo $num_filas; } else { 
					echo "INEXISTENTE";
			 }
	}
	if($pedidos==="pedidos") {

			$desde=(($pagina-1)*$tamanio);

			$resultado = mysqli_query($con, "SELECT *, CLI_CODIGO, CLI_NOMBRE FROM pedido_cab  LEFT JOIN clientes ON PED_CLIENTE = CLI_CODIGO ORDER BY PED_NUMERO LIMIT $desde,$tamanio");


			$table = '<div class = "container">';
			$table .=  '<table class = "table table-striped table-bordered table-hover table-condensed table-responsive">';
			$table .= '<tr>';
			$table .= '<th class="col-sm-1" style="text-align:center;">Número</th>';
			$table .= '<th class="col-sm-4" style="text-align:center;">Fecha</th>';
			$table .= '<th class="col-sm-1" style="text-align:center;">Cliente</th>';
			$table .= '<th class="col-sm-1" style="text-align:center;">Nombre</th>';
			$table .= '<th class="col-sm-2" style="text-align:right;">Neto</th>';
			$table .= '<th class="col-sm-2" style="text-align:right;">Iva</th>';
			$table .= '<th class="col-sm-2" style="white-space:nowrap">Total</th>';
			$table .= '<th class="col-sm-2" style="white-space:nowrap">Alm. Vta</th>';
			$table .= '<th class="col-sm-2" style="white-space:nowrap">Lineas Ped.</th>';
			$table .= '<th class="col-sm-0">Detalle</th>';
			$table .= '</tr>';

				if ($resultado) {

					while ($fila = mysqli_fetch_assoc($resultado)) {

			
			$table .= '<tr>';
			$table .= '<td id="'.$numero_p.$fila['PED_NUMERO'].'" style="white-space:nowrap">' . $fila['PED_NUMERO'] . '</td>';
			$table .= '<td id="'.$fecha_p.$fila['PED_NUMERO'].'" style="white-space:nowrap">' . $fila['PED_FECHA'] . '</td>';
			$table .= '<td id="'.$cliente_p.$fila['PED_NUMERO'].'" style="white-space:nowrap">' . $fila['PED_CLIENTE'] . '</td>';
			$table .= '<td id="'.$cliente_nombre_p.$fila['PED_NUMERO'].'" style="white-space:nowrap">' .$fila['CLI_NOMBRE'] . '</td>';
			$table .= '<td id="'.$neto_p.$fila['PED_NUMERO'].'" style="white-space:nowrap">'.number_format($fila['PED_IMPORTE_NETO'], 2, ',','.'). '</td>';
			$table .= '<td id="'.$iva_p.$fila['PED_NUMERO'].'" style="white-space:nowrap">'.number_format($fila['PED_IMPORTE_IVA'], 2, ',','.'). '</td>';
			$table .= '<td id="'.$descuento_p.$fila['PED_NUMERO'].'" style="white-space:nowrap">'.number_format($fila['PED_IMPORTE_DESCUENTO'], 2, ',','.'). '</td>';
			$table .= '<td id="'.$total_p.$fila['PED_NUMERO'].' "style="white-space:nowrap">'.number_format($fila['PED_IMPORTE_TOTAL'], 2, ',','.'). '</td>';
			$table .= '<td id="'.$almacen_p.$fila['PED_NUMERO'].'" style="white-space:nowrap">' . $fila['PED_ALMACEN_VENTA'] . '</td>';
			$table .= '<td id="'.$num_lineas_p.$fila['PED_NUMERO'].'" style="white-space:nowrap">' . $fila['PED_NUMERO_LINEAS'] . '</td>';
		$texto="'";

		$table .= '<td><input id="'.$fila['PED_NUMERO'].'" onclick="verLineas(this.id)" type = "button" value ="Detalle" class = "btn btn-success"></td>';


			$table .= '</tr>';
			}
		} else $table.="NADA ".mysqli_error($con);
		$table.= '</table>';
		$table.="<br>";
		$table.="<h4>Mostrar Página:<span id='mostrandopagina'> </span> Desde código : ".$desdecodigo."</h4>";
		$table.="<button class='botones' onclick="."'retrocedoPagina()'>"."<"."</button>";
		$eligepagina="1-".$num_paginas;
		$table.=' Pagina: <input type="text" id="eligepagina" size="3" maxlength="3" placeholder="'.$eligepagina.'">';
		$table.="<button class='botones' onclick="."'iraPagina()'>"."Ir"."</button>";
		$table.="<button  class='botones' onclick="."'avanzoPagina()'>".">"."</button>";
		$table.= "</div>";
		$table.= "</div>";
		echo $table;
		mysqli_close($con);
	} 

	if ($acontar_pedlineas=="si") {

		$resultado = mysqli_query($con, "SELECT * FROM pedido_lineas WHERE PLIN_NUMERO_PEDIDO = '$numero_pedido'");

		if ($resultado) { echo mysqli_num_rows($resultado); } 
		else {echo mysqli_error($con);}
		mysqli_close($con);

	}

	if ($ped_lineas=="si") {
			
			$desde=(($pagina-1)*$tamanio);

		 	$resultado = mysqli_query($con, "SELECT  * FROM pedido_lineas WHERE PLIN_NUMERO_PEDIDO = '$numero_pedido' ORDER BY PLIN_NUMERO_PEDIDO DESC, PLIN_NUMERO_LINEA DESC LIMIT $desde,$tamanio");
		 	 
 			$table='<div style="margin-left:100px"><strong>LINEAS DEL PEDIDO:&nbsp&nbsp';
 			$table.=$numero_pedido;
 			$table.='</strong></div><br>';
			$table.= '<div class = "container-fluid">'; 
			$table .=  '<table class = "table table-striped table-hover table-bordered table-condensed table-responsive">';
			$table .= '<tr>';
			$table .= '<th class="col-sm-0">C.Articulo</th>';
			$table .= '<th class="col-sm-0">Descripcion</th>';
			$table .= '<th class="col-sm-0">Unidades</th>';
			$table .= '<th class="col-sm-0">Precio</th>';
			$table .= '<th class="col-sm-0">Iva %</th>';
			$table .= '<th class="col-sm-0">Dto %</th>';
			$table .= '<th class="col-sm-0">Total:</th>';
			
			$table .= '</tr>';

			if ($resultado) { 

				while ($fila = mysqli_fetch_assoc($resultado)) {

					$table .= '<tr>';
					$table .= '<td id="'.$fcodigo.$fila['PLIN_NUMERO_PEDIDO'].$fila['PLIN_NUMERO_LINEA'].'">' . $fila['PLIN_CODIGO_ART'] . '</td>';
					$table .= '<td id="'.$fdescripcion.$fila['PLIN_NUMERO_PEDIDO'].$fila['PLIN_NUMERO_LINEA'].'">' . $fila['PLIN_DESCRIPCION'] . '</td>';
					$table .= '<td id="'.$funidades.$fila['PLIN_NUMERO_PEDIDO'].$fila['PLIN_NUMERO_LINEA'].'" style="white-space:nowrap">' . $fila['PLIN_UNIDADES']. '</td>';
					$table .= '<td id="'.$fprecio.$fila['PLIN_NUMERO_PEDIDO'].$fila['PLIN_NUMERO_LINEA'].'">' . $fila['PLIN_PRECIO'] . '</td>';
					$table .= '<td id="'.$fiva.$fila['PLIN_NUMERO_PEDIDO'].$fila['PLIN_NUMERO_LINEA'].'">' . $fila['PLIN_IVA_POR'] . '</td>';

				//	$importe_linea=$fila['PLIN_UNIDADES']*($fila['PLIN_PRECIO']+$fila['PLIN_IMPORTE_IVA']);
				//	$table .= '<td id="'.$fimporte.$fila['PLIN_NUMERO_PEDIDO'].['PLIN_NUMERO_LINEA'].'">' . $importe_linea . '</td>';

					$table .= '<td id="'.$fdescuento.$fila['PLIN_NUMERO_PEDIDO'].$fila['PLIN_NUMERO_LINEA'].'">' . $fila['PLIN_DESCUENTO_POR'] . '</td>';
					$table .= '<td id="'.$fimporte.$fila['PLIN_NUMERO_PEDIDO'].$fila['PLIN_NUMERO_LINEA'].'">' . $fila['PLIN_IMPORTE_LINEA'] . '</td>';
					
		 			$table .= '</tr>';
				}

				$table.= '</table>';
				
				$table.="<button class='botones' onclick="."'retrocedoPaginaPL()'>"."<"."</button>";
				$eligepagina="1-".$num_paginas;
				$table.=' Pagina: <input type="text" id="eligepagina" size="3" maxlength="3" placeholder="'.$eligepagina.'">';
				$table.="<button class='botones' onclick="."'iraPaginaPL()'>"."Ir"."</button>";
				$table.="<button  class='botones' onclick="."'avanzoPaginaPL()'>".">"."</button>";
			
		} else { echo "error". mysqli_error($con);
					}
				echo $table;
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

