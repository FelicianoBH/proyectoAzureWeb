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
	$albaranes="";
	$num_albaran="";
	$ver_cabecera="";
	$alb_lineas="";
	$acontar_alblineas="";

	if (isset($_GET['alb_lineas'])) {
		$alb_lineas = $_GET['alb_lineas'];
		$pagina=$_GET['pagina'];
		$numero_albaran=$_GET['numero_albaran'];
		$num_paginas=$_GET['num_paginas'];
		}

	if (isset($_GET['acontar_alblineas'])) {

		$acontar_alblineas="si";
		$numero_albaran=$_GET['numero_albaran'];

		} 
	if (isset($_GET['leer_ref'])){

		$leer_ref=$_GET['leer_ref'];
		$user=$_GET['user'];
	}
	if (isset($_GET['ver_cabecera'])){

		$ver_cabecera=$_GET['ver_cabecera'];
		
	}
	if (isset($_GET['albaranes'])) { 
		$albaranes = $_GET['albaranes'];
		$pagina=$_GET['pagina'];
		$num_paginas=$_GET['num_paginas'];
		}

	if (isset($_GET['acontar'])) {
		$acontar="si";
		} else {
			$acontar="no";
		}
	
	
	$numero_p="ALB_NUMERO";
	$fecha_p="ALB_FECHA";
	$cliente_p="ALB_CLIENTE";
	$cliente_nombre_p="NOMBRE_CLIENTE";
	$neto_p="ALB_IMPORTE_NETO";
	$iva_p="ALB_IMPORTE_IVA";
	$descuento_p="ALB_IMPORTE_DESCUENTO";
	$total_p="ALB_IPMORTE_TOTAL";
	$almacen_p="ALB_ALMACEN_VENTA";
	$num_lineas_p="ALB_NUMERO_LINEAS";
	$detalle_p="DETALLE";
	
	$fcodigo="ALIN_CODIGO_ART";
	$fdescripcion="ALIN_DESCRIPCION";
	$funidades="ALIN_UNIDADES";
	$fprecio="ALIN_PRECIO";
	$fiva="ALIN_IVA_POR";
	$fimporte="FIMPORTE";
	$fdescuento="ALIN_DESCUENTO_POR";
	$fimporte="ALIN_IMPORTE_LINEA";
	$fdetalle="DETALLE";
	$feditar="EDITAR";
	$fborrar="BORRAR";

	$tamanio=12;
	
	
	if ($acontar=="si") {

		
		$resultado = mysqli_query($con, "SELECT * FROM albaran_cab");
			
		if ($resultado) { $num_filas = mysqli_num_rows($resultado);
				echo $num_filas; } else { 
					echo "INEXISTENTE";
			 }
	}
	if ($albaranes=="si") {

			$desde=(($pagina-1)*$tamanio);

			$resultado = mysqli_query($con, "SELECT *, CLI_CODIGO, CLI_NOMBRE FROM albaran_cab  LEFT JOIN clientes ON ALB_CLIENTE = CLI_CODIGO ORDER BY ALB_NUMERO LIMIT $desde,$tamanio");


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
			$table .= '<th class="col-sm-2" style="white-space:nowrap">Lineas Alb.</th>';
			$table .= '<th class="col-sm-0">Detalle</th>';
			$table .= '</tr>';

				if ($resultado) {

					while ($fila = mysqli_fetch_assoc($resultado)) {

			
			$table .= '<tr>';
			$table .= '<td id="'.$numero_p.$fila['ALB_NUMERO'].'" style="white-space:nowrap">' . $fila['ALB_NUMERO'] . '</td>';
			$table .= '<td id="'.$fecha_p.$fila['ALB_NUMERO'].'" style="white-space:nowrap">' . $fila['ALB_FECHA'] . '</td>';
			$table .= '<td id="'.$cliente_p.$fila['ALB_NUMERO'].'" style="white-space:nowrap">' . $fila['ALB_CLIENTE'] . '</td>';
			$table .= '<td id="'.$cliente_nombre_p.$fila['ALB_NUMERO'].'" style="white-space:nowrap">' .$fila['CLI_NOMBRE'] . '</td>';
			$table .= '<td id="'.$neto_p.$fila['ALB_NUMERO'].'" style="white-space:nowrap">'.number_format($fila['ALB_IMPORTE_NETO'], 2, ',','.'). '</td>';
			$table .= '<td id="'.$iva_p.$fila['ALB_NUMERO'].'" style="white-space:nowrap">'.number_format($fila['ALB_IMPORTE_IVA'], 2, ',','.'). '</td>';
			$table .= '<td id="'.$descuento_p.$fila['ALB_NUMERO'].'" style="white-space:nowrap">'.number_format($fila['ALB_IMPORTE_DESCUENTO'], 2, ',','.'). '</td>';
			$table .= '<td id="'.$total_p.$fila['ALB_NUMERO'].' "style="white-space:nowrap">'.number_format($fila['ALB_IMPORTE_TOTAL'], 2, ',','.'). '</td>';
			$table .= '<td id="'.$almacen_p.$fila['ALB_NUMERO'].'" style="white-space:nowrap">' . $fila['ALB_ALMACEN_VENTA'] . '</td>';
			$table .= '<td id="'.$num_lineas_p.$fila['ALB_NUMERO'].'" style="white-space:nowrap">' . $fila['ALB_NUMERO_LINEAS'] . '</td>';
		$texto="'";

		$table .= '<td><input id="'.$fila['ALB_NUMERO'].'" onclick="verLineas(this.id)" type = "button" value ="Detalle" class = "btn btn-success"></td>';


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

	if ($acontar_alblineas=="si") {

		$resultado = mysqli_query($con, "SELECT * FROM albaran_lineas WHERE ALIN_NUMERO_ALBARAN = '$numero_albaran'");

		if ($resultado) { echo mysqli_num_rows($resultado); } 
		else {echo mysqli_error($con);}
		mysqli_close($con);

	}

	if ($alb_lineas=="si") {
			
			$desde=(($pagina-1)*$tamanio);

		 	$resultado = mysqli_query($con, "SELECT  * FROM albaran_lineas WHERE ALIN_NUMERO_ALBARAN = '$numero_albaran' ORDER BY ALIN_NUMERO_ALBARAN DESC, ALIN_NUMERO_LINEA DESC LIMIT $desde,$tamanio");
		 	 
 			$table='<div style="margin-left:100px"><strong>LINEAS DEL ALBARAN:&nbsp&nbsp';
 			$table.=$numero_albaran;
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
					$table .= '<td id="'.$fcodigo.$fila['ALIN_NUMERO_ALBARAN'].$fila['ALIN_NUMERO_LINEA'].'">' . $fila['ALIN_CODIGO_ART'] . '</td>';
					$table .= '<td id="'.$fdescripcion.$fila['ALIN_NUMERO_ALBARAN'].$fila['ALIN_NUMERO_LINEA'].'">' . $fila['ALIN_DESCRIPCION'] . '</td>';
					$table .= '<td id="'.$funidades.$fila['ALIN_NUMERO_ALBARAN'].$fila['ALIN_NUMERO_LINEA'].'" style="white-space:nowrap">' . $fila['ALIN_UNIDADES']. '</td>';
					$table .= '<td id="'.$fprecio.$fila['ALIN_NUMERO_ALBARAN'].$fila['ALIN_NUMERO_LINEA'].'">' . $fila['ALIN_PRECIO'] . '</td>';
					$table .= '<td id="'.$fiva.$fila['ALIN_NUMERO_ALBARAN'].$fila['ALIN_NUMERO_LINEA'].'">' . $fila['ALIN_IVA_POR'] . '</td>';

				//	$importe_linea=$fila['ALIN_UNIDADES']*($fila['ALIN_PRECIO']+$fila['ALIN_IMPORTE_IVA']);
				//	$table .= '<td id="'.$fimporte.$fila['ALIN_NUMERO_PEDIDO'].['ALIN_NUMERO_LINEA'].'">' . $importe_linea . '</td>';

					$table .= '<td id="'.$fdescuento.$fila['ALIN_NUMERO_ALBARAN'].$fila['ALIN_NUMERO_LINEA'].'">' . $fila['ALIN_DESCUENTO_POR'] . '</td>';
					$table .= '<td id="'.$fimporte.$fila['ALIN_NUMERO_ALBARAN'].$fila['ALIN_NUMERO_LINEA'].'">' . $fila['ALIN_IMPORTE_LINEA'] . '</td>';
					
		 			$table .= '</tr>';
				}

				$table.= '</table>';
				
				$table.="<button class='botones' onclick="."'retrocedoPaginaAL()'>"."<"."</button>";
				$eligepagina="1-".$num_paginas;
				$table.=' Pagina: <input type="text" id="eligepagina" size="3" maxlength="3" placeholder="'.$eligepagina.'">';
				$table.="<button class='botones' onclick="."'iraPaginaAL()'>"."Ir"."</button>";
				$table.="<button  class='botones' onclick="."'avanzoPaginaAL()'>".">"."</button>";
			
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

