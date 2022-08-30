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
	$facturas="";
	$num_factura="";
	$ver_cabecera="";
	$fac_lineas="";
	$acontar_faclineas="";

	if (isset($_GET['fac_lineas'])) {
		$fac_lineas = $_GET['fac_lineas'];
		$pagina=$_GET['pagina'];
		$numero_factura=$_GET['numero_factura'];
		$num_paginas=$_GET['num_paginas'];
		}

	if (isset($_GET['acontar_faclineas'])) {

		$acontar_faclineas="si";
		$numero_factura=$_GET['numero_factura'];

		} 
	if (isset($_GET['leer_ref'])){

		$leer_ref=$_GET['leer_ref'];
		$user=$_GET['user'];
	}
	if (isset($_GET['ver_cabecera'])){

		$ver_cabecera=$_GET['ver_cabecera'];
		
	}
	if (isset($_GET['facturas'])) { 
		$facturas = $_GET['facturas'];
		$pagina=$_GET['pagina'];
		$num_paginas=$_GET['num_paginas'];
		}

	if (isset($_GET['acontar'])) {
		$acontar="si";
		} else {
			$acontar="no";
		}
	
	
	$numero_p="FAC_NUMERO";
	$fecha_p="FAC_FECHA";
	$cliente_p="FAC_CLIENTE";
	$cliente_nombre_p="NOMBRE_CLIENTE";
	$neto_p="FAC_IMPORTE_NETO";
	$iva_p="FAC_IMPORTE_IVA";
	$descuento_p="FAC_IMPORTE_DESCUENTO";
	$total_p="FAC_IPMORTE_TOTAL";
	$almacen_p="FAC_ALMACEN_VENTA";
	$num_lineas_p="FAC_NUMERO_LINEAS";
	$detalle_p="DETALLE";
	
	$fcodigo="FLIN_CODIGO_ART";
	$fdescripcion="FLIN_DESCRIPCION";
	$funidades="FLIN_UNIDADES";
	$fprecio="FLIN_PRECIO";
	$fiva="FLIN_IVA_POR";
	$fimporte="FIMPORTE";
	$fdescuento="FLIN_DESCUENTO_POR";
	$fimporte="FLIN_IMPORTE_LINEA";
	$fdetalle="DETALLE";
	$feditar="EDITAR";
	$fborrar="BORRAR";

	$tamanio=12;
	
	
	if ($acontar=="si") {

		
		$resultado = mysqli_query($con, "SELECT * FROM factura_cab");
			
		if ($resultado) { $num_filas = mysqli_num_rows($resultado);
				echo $num_filas; } else { 
					echo "INEXISTENTE";
			 }
	}
	if ($facturas=="si") {

			$desde=(($pagina-1)*$tamanio);

			$resultado = mysqli_query($con, "SELECT *, CLI_CODIGO, CLI_NOMBRE FROM factura_cab  LEFT JOIN clientes ON FAC_CLIENTE = CLI_CODIGO ORDER BY FAC_NUMERO LIMIT $desde,$tamanio");


			$table = '<div class = "container-fluid">';
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
			$table .= '<th class="col-sm-2" style="white-space:nowrap">Lineas Fac.</th>';
			$table .= '<th class="col-sm-0">Detalle</th>';
			$table .= '</tr>';

				if ($resultado) {

					while ($fila = mysqli_fetch_assoc($resultado)) {

			
			$table .= '<tr>';
			$table .= '<td id="'.$numero_p.$fila['FAC_NUMERO'].'" style="white-space:nowrap">' . $fila['FAC_NUMERO'] . '</td>';
			$table .= '<td id="'.$fecha_p.$fila['FAC_NUMERO'].'" style="white-space:nowrap">' . $fila['FAC_FECHA'] . '</td>';
			$table .= '<td id="'.$cliente_p.$fila['FAC_NUMERO'].'" style="white-space:nowrap">' . $fila['FAC_CLIENTE'] . '</td>';
			$table .= '<td id="'.$cliente_nombre_p.$fila['FAC_NUMERO'].'" style="white-space:nowrap">' .$fila['CLI_NOMBRE'] . '</td>';
			$table .= '<td id="'.$neto_p.$fila['FAC_NUMERO'].'" style="white-space:nowrap">'.number_format($fila['FAC_IMPORTE_NETO'], 2, ',','.'). '</td>';
			$table .= '<td id="'.$iva_p.$fila['FAC_NUMERO'].'" style="white-space:nowrap">'.number_format($fila['FAC_IMPORTE_IVA'], 2, ',','.'). '</td>';
			$table .= '<td id="'.$descuento_p.$fila['FAC_NUMERO'].'" style="white-space:nowrap">'.number_format($fila['FAC_IMPORTE_DESCUENTO'], 2, ',','.'). '</td>';
			$table .= '<td id="'.$total_p.$fila['FAC_NUMERO'].' "style="white-space:nowrap">'.number_format($fila['FAC_IMPORTE_TOTAL'], 2, ',','.'). '</td>';
			$table .= '<td id="'.$almacen_p.$fila['FAC_NUMERO'].'" style="white-space:nowrap">' . $fila['FAC_ALMACEN_VENTA'] . '</td>';
			$table .= '<td id="'.$num_lineas_p.$fila['FAC_NUMERO'].'" style="white-space:nowrap">' . $fila['FAC_NUMERO_LINEAS'] . '</td>';
		$texto="'";

		$table .= '<td><input id="'.$fila['FAC_NUMERO'].'" onclick="verLineas(this.id)" type = "button" value ="Detalle" class = "btn btn-success"></td>';


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

	if ($acontar_faclineas=="si") {

		$resultado = mysqli_query($con, "SELECT * FROM factura_lineas WHERE FLIN_NUMERO_FACTURA = '$numero_factura'");

		if ($resultado) { echo mysqli_num_rows($resultado); } 
		else {echo mysqli_error($con);}
		mysqli_close($con);

	}

	if ($fac_lineas=="si") {
			
			$desde=(($pagina-1)*$tamanio);

		 	$resultado = mysqli_query($con, "SELECT  * FROM factura_lineas WHERE FLIN_NUMERO_FACTURA = '$numero_factura' ORDER BY FLIN_NUMERO_FACTURA DESC, FLIN_NUMERO_LINEA DESC LIMIT $desde,$tamanio");
		 	 
 			$table='<div style="margin-left:100px"><strong>LINEAS DE LA FACTURA:&nbsp&nbsp';
 			$table.=$numero_factura;
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
					$table .= '<td id="'.$fcodigo.$fila['FLIN_NUMERO_FACTURA'].$fila['FLIN_NUMERO_LINEA'].'">' . $fila['FLIN_CODIGO_ART'] . '</td>';
					$table .= '<td id="'.$fdescripcion.$fila['FLIN_NUMERO_FACTURA'].$fila['FLIN_NUMERO_LINEA'].'">' . $fila['FLIN_DESCRIPCION'] . '</td>';
					$table .= '<td id="'.$funidades.$fila['FLIN_NUMERO_FACTURA'].$fila['FLIN_NUMERO_LINEA'].'" style="white-space:nowrap">' . $fila['FLIN_UNIDADES']. '</td>';
					$table .= '<td id="'.$fprecio.$fila['FLIN_NUMERO_FACTURA'].$fila['FLIN_NUMERO_LINEA'].'">' . $fila['FLIN_PRECIO'] . '</td>';
					$table .= '<td id="'.$fiva.$fila['FLIN_NUMERO_FACTURA'].$fila['FLIN_NUMERO_LINEA'].'">' . $fila['FLIN_IVA_POR'] . '</td>';

				//	$importe_linea=$fila['FLIN_UNIDADES']*($fila['FLIN_PRECIO']+$fila['FLIN_IMPORTE_IVA']);
				//	$table .= '<td id="'.$fimporte.$fila['FLIN_NUMERO_PEDIDO'].['FLIN_NUMERO_LINEA'].'">' . $importe_linea . '</td>';

					$table .= '<td id="'.$fdescuento.$fila['FLIN_NUMERO_FACTURA'].$fila['FLIN_NUMERO_LINEA'].'">' . $fila['FLIN_DESCUENTO_POR'] . '</td>';
					$table .= '<td id="'.$fimporte.$fila['FLIN_NUMERO_FACTURA'].$fila['FLIN_NUMERO_LINEA'].'">' . $fila['FLIN_IMPORTE_LINEA'] . '</td>';
					
		 			$table .= '</tr>';
				}

				$table.= '</table>';
				
				$table.="<button class='botones' onclick="."'retrocedoPaginaFA()'>"."<"."</button>";
				$eligepagina="1-".$num_paginas;
				$table.=' Pagina: <input type="text" id="eligepagina" size="3" maxlength="3" placeholder="'.$eligepagina.'">12';
				$table.="<button class='botones' onclick="."'iraPaginaFA()'>"."Ir"."</button>";
				$table.="<button  class='botones' onclick="."'avanzoPaginaFA()'>".">"."</button>";
			
		} else { echo "error". mysqli_error($con);
					}
				echo $table." hasta aqui";
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

