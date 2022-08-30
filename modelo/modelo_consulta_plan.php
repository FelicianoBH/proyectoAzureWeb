<?php 
	require "conexion.php";
 
 
	$cuentas="";
	$filtracodigo_cuenta="";
	$filtratitulo="";
	$filtramasa_patrimonial="";
	$filtragrado="";
	$filtradesarrollo="";
	$codigo_cuentaActualizada="";
	$titulo_Actualizo=""; 
	$masa_patrimonialActualizada="";
	$gradoActualizado="";
	$desarrolloActualizado="";
 	
	$referenciaIDEliminada="";
	$nuevaCuenta=""; 
	$nuevoTitulo=""; 
	$nuevaMasaPatrimonial="";
	$nuevoGrado="";
	$nuevoDesarrollo="";
	$nuevaFecha=""; 
	$nuevoAsiento="";
	$acontar="no";
	$pagina=0;
	$num_paginas=0;
	$desde=0;
	$fechaHoy=0;
	$retrocedo="inicio";
	$param_edicion="";
	$ordenado="CODIGO_CUENTA";
	$desdecodigo="";
	$desdetitulo="";

	if (isset($_GET['cuentas'])) {
		$cuentas = $_GET['cuentas'];
		$pagina=$_GET['pagina'];
		$num_paginas=$_GET['num_paginas'];
		$param_edicion=$_GET['edicion'];  
		$ordenado=$_GET['ordenado'];
		$desdecodigo=$_GET['desdecodigo'];
		$desdetitulo=$_GET['desdetitulo'];
		}

	if (isset($_GET['acontar'])) {
		$acontar="si";
		$desdecodigo=$_GET['desdecodigo'];
		$desdetitulo=$_GET['desdetitulo'];
		$ordenado=$_GET['ordenado'];
		} else {
			$acontar="no";
		}
		
	
	
	$codigo_cuenta = "CODIGO_CUENTA";
	$titulo = "TITULO";
	$seleccionar ="SELECCIONAR";
	$borrar = "BORRAR";
	$tamanio=12;
	
	if ($acontar=="si") {

		if ($ordenado=="TITULO") {

				$resultado = mysqli_query($con, "SELECT * FROM cuentas WHERE TITULO >= '$desdetitulo'" );
			} else {
				$resultado = mysqli_query($con, "SELECT * FROM cuentas WHERE CODIGO_CUENTA >= '$desdecodigo'" );
			}

		$num_filas = mysqli_num_rows($resultado);
		echo $num_filas;

	}

	if($cuentas==="cuentas") {

			$desde=(($pagina-1)*$tamanio);

			if ($ordenado=="TITULO") {

				 $resultado = mysqli_query($con, "SELECT * FROM cuentas WHERE TITULO >= '$desdetitulo' ORDER BY TITULO LIMIT $desde, $tamanio");
				} else {
				 $resultado = mysqli_query($con, "SELECT * FROM cuentas WHERE CODIGO_CUENTA >= '$desdecodigo' LIMIT $desde,$tamanio");
				}

			$table = '<div class = "container-fluid">';
			$table .=  '<table class = "table table-striped  table-hover table-condensed ">';
			$table .= '<tr>';
			if ($ordenado=="CODIGO_CUENTA") {
				$table .= '<th class="col-sm-2">Codigo Id</th>';
				$table .= '<th class="col-sm-6">Titulo</th>';
				$table .= '<th class="col-sm-3">Saldo</th>';
			 } else {
					$table .= '<th class="col-sm-6">Titulo</th>';
					$table .= '<th class="col-sm-2">Codigo Id</th>';
					$table .= '<th class="col-sm-3">Saldo</th>';

			 }

			$table .= '<th class="col-sm3">Seleccionar</th>';
			$table .= '</tr>';
			
			if(!$resultado) echo mysqli_error($con)."-".$desdecodigo."-".$desde."-".$tamanio;

			while ($fila = mysqli_fetch_assoc($resultado)) {

			$table .= '<tr>';
			$saldo=$fila['DEBE_ANIO']-$fila['HABER_ANIO'];
			if ($ordenado=="CODIGO_CUENTA") {
				$table .= '<td id="'.$codigo_cuenta.$fila['CODIGO_CUENTA'].'">' . $fila['CODIGO_CUENTA'] . '</td>';
				$table .= '<td id="'.$titulo.$fila['CODIGO_CUENTA'].'">' . $fila['TITULO'] . '</td>'; 
				$table .= '<td>' . number_format($saldo, 2, ',','.') . '</td>'; 


				
			} else {
				$table .= '<td id="'.$titulo.$fila['CODIGO_CUENTA'].'">' . $fila['TITULO'] . '</td>'; 
				$table .= '<td id="'.$codigo_cuenta.$fila['CODIGO_CUENTA'].'">' . $fila['CODIGO_CUENTA'] . '</td>';
				$table .= '<td>' . number_format($saldo, 2, ',','.') . '</td>'; 
			}

			$texto="'";
			if ($fila['GRADO']==3) {
			if ($param_edicion=="edicion"){
					$table .= '<td><input id="'.$seleccionar.$fila['CODIGO_CUENTA'].'" onclick = "seleccionarCuentaEdicion('.$texto.$fila['CODIGO_CUENTA'].$texto.')" type = "button" value ="Seleccionar" class = "btn btn-success" ></td>'; 
			} else if ($param_edicion=="consulta_extractos") {
					$table .= '<td><input id="'.$seleccionar.$fila['CODIGO_CUENTA'].'" onclick = "seleccionarCuentaExtractos('.$texto.$fila['CODIGO_CUENTA'].$texto.')" type = "button" value ="Seleccionar" class = "btn btn-success" ></td>'; 
			} else {
				  	$table .= '<td><input id="'.$seleccionar.$fila['CODIGO_CUENTA'].'" onclick = "seleccionarCuenta('.$texto.$fila['CODIGO_CUENTA'].$texto.')" type = "button" value ="Seleccionar" class = "btn btn-success" ></td>'; 
				  }
			}
			$table .= '</tr>';
	}
		$table.= '</table>';
		//$table.="<h4>Mostrar Página:<span id='mostrandopagina'> </span></h4>";
		$eligepagina="1-".$num_paginas;

		if ($param_edicion=="edicion") {

						if ($ordenado=="CODIGO_CUENTA") {

						$table.="<h4>Muestra Página:<span id='mostrandopagina'> </span> Desde código : ".$desdecodigo."</h4>";
						$table.="<button class='botones' onclick="."'retrocedoPaginaB()'>"."<"."</button>";
						$eligepagina="1-".$num_paginas;
						$table.=' Pagina: <input type="text" id="eligepagina" size="3" maxlength="3" placeholder="'.$eligepagina.'">';
						$table.="<button class='botones' onclick="."'iraPaginaB()'>"."Ir"."</button>";
						$table.="<button  class='botones' onclick="."'avanzoPaginaB()'>".">"."</button>";
						$table.='Desde codigo:<input type="text" id="desdecodigo" size="12" maxlength="12">';
						$table.="<button class='botones' onclick="."'desdeCodigo()'>"."Ir"."</button>";
					}
						if ($ordenado=="TITULO") {

						$table.="<h4>Muestra Página:<span id='mostrandopagina'> </span> Desde Título: ".$desdetitulo."</h4>";
						$table.="<button class='botones' onclick="."'retrocedoPaginaB()'>"."<"."</button>";
						$eligepagina="1-".$num_paginas;
						$table.=' Pagina: <input type="text" id="eligepagina" size="3" maxlength="3" placeholder="'.$eligepagina.'">';
						$table.="<button class='botones' onclick="."'iraPaginaB()'>"."Ir"."</button>";
						$table.="<button  class='botones' onclick="."'avanzoPaginaB()'>".">"."</button>";
						$table.='Desde título: <input type="text" id="desdetitulo" size="35" maxlength="35">';
						$table.="<button class='botones' onclick="."'desdeTitulo()'>"."Ir"."</button>";

					}
				
				} else if ($param_edicion=="consulta_extractos"){


						if ($ordenado=="CODIGO_CUENTA") {

						$table.="<h4>Muestra Página:<span id='mostrandopagina'> </span> Desde código : ".$desdecodigo."</h4>";
						$table.="<button class='botones' onclick="."'retrocedoPaginaCta()'>"."<"."</button>";
						$eligepagina="1-".$num_paginas;
						$table.=' Pagina: <input type="text" id="eligepagina" size="3" maxlength="3" placeholder="'.$eligepagina.'">';
						$table.="<button class='botones' onclick="."'iraPaginaCta()'>"."Ir"."</button>";
						$table.="<button  class='botones' onclick="."'avanzoPaginaCta()'>".">"."</button>";
						$table.='Desde codigo:<input type="text" id="desdecodigo" size="12" maxlength="12">';
						$table.="<button class='botones' onclick="."'desdeCodigo()'>"."Ir"."</button>";
					}
						if ($ordenado=="TITULO") {

						$table.="<h4>Muestra Página:<span id='mostrandopagina'> </span> Desde Título: ".$desdetitulo."</h4>";
						$table.="<button class='botones' onclick="."'retrocedoPaginaCta()'>"."<"."</button>";
						$eligepagina="1-".$num_paginas;
						$table.=' Pagina: <input type="text" id="eligepagina" size="3" maxlength="3" placeholder="'.$eligepagina.'">';
						$table.="<button class='botones' onclick="."'iraPaginaCta()'>"."Ir"."</button>";
						$table.="<button  class='botones' onclick="."'avanzoPaginaCta()'>".">"."</button>";
						$table.='Desde título: <input type="text" id="desdetitulo" size="35" maxlength="35">';
						$table.="<button class='botones' onclick="."'desdeTitulo()'>"."Ir"."</button>";

						}

				}  else {

						if ($ordenado=="CODIGO_CUENTA") {

						$table.="<h4>Muestra Página:<span id='mostrandopagina'> </span> Desde código : ".$desdecodigo."</h4>";
						$table.="<button class='botones' onclick="."'retrocedoPaginaC()'>"."<"."</button>";
						$eligepagina="1-".$num_paginas;
						$table.=' Pagina: <input type="text" id="eligepagina" size="3" maxlength="3" placeholder="'.$eligepagina.'">';
						$table.="<button class='botones' onclick="."'iraPaginaC()'>"."Ir"."</button>";
						$table.="<button  class='botones' onclick="."'avanzoPaginaC()'>".">"."</button>";
						$table.='Desde codigo:<input type="text" id="desdecodigo" size="12" maxlength="12">';
						$table.="<button class='botones' onclick="."'desdeCodigo()'>"."Ir"."</button>";
					}
						if ($ordenado=="TITULO") {

						$table.="<h4>Muestra Página:<span id='mostrandopagina'> </span> Desde Título: ".$desdetitulo."</h4>";
						$table.="<button class='botones' onclick="."'retrocedoPaginaC()'>"."<"."</button>";
						$eligepagina="1-".$num_paginas;
						$table.=' Pagina: <input type="text" id="eligepagina" size="3" maxlength="3" placeholder="'.$eligepagina.'">';
						$table.="<button class='botones' onclick="."'iraPaginaC()'>"."Ir"."</button>";
						$table.="<button  class='botones' onclick="."'avanzoPaginaC()'>".">"."</button>";
						$table.='Desde título: <input type="text" id="desdetitulo" size="35" maxlength="35">';
						$table.="<button class='botones' onclick="."'desdeTitulo()'>"."Ir"."</button>";

						}

				}
		

		$table.= "</div>";
		echo $table;
		mysqli_close($con);
	} 

?>

