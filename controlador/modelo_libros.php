<?php 
	require "conexion.php";
 

	$cuentas="";
	$filtracodigo_cuenta="";
	$filtratitulo="";
	$filtramasa_patrimonial="";
	$filtragrado="";
	$filtradesarrollo="";
	$filtracon_enlace="";
	$codigo_cuentaActualizada="";
	$titulo_Actualizo=""; 
	$masa_patrimonialActualizada="";
	$gradoActualizado="";
	$desarrolloActualizado="";
	$con_enlaceActualizado="";
	
	$iaIDEliminada="";
	$nuevaCuenta="";
	$nuevoTitulo="";
	$nuevaMasaPatrimonial="";
	$nuevoGrado="";
	$nuevoDesarrollo="";
	$nuevoConEnlace="";
	$nuevaFecha="";
	$nuevoAsiento="";
	$acontar="no";
	$pagina=0;
	$num_paginas=0;
	$desde=0;
	$fechaHoy=0;
	$retrocedo="inicio";
	$libros="";
	$nuevoLibro="";
	$codigo_libroActualizado="";
	$idEliminado="";
	$nuevoUbicacion="";
	$borrar_libro="";
	$clasifica="ID";

	if (isset($_GET['libros'])) {
		$clasifica=$_GET['clasifica'];
		$libros = $_GET['libros'];
		$pagina=$_GET['pagina'];
		$num_paginas=$_GET['num_paginas'];
		}

	if (isset($_GET['acontar'])) {
		$acontar="si";
		} else {
			$acontar="no";
		}
	
	
	if (isset($_GET['nuevoLibro'])) {

		$nuevoLibro=$_GET['nuevoLibro'];
		$nuevoAutor=$_GET['nuevoAutor'];
		$nuevoEditorial=$_GET['nuevoEditorial'];
		$nuevoIsbn=$_GET['nuevoIsbn'];
		$nuevoUbicacion=$_GET['nuevoUbicacion'];
		$nuevoTitulo=$_GET['nuevoTitulo'];
		$nuevoGenero=$_GET['nuevoGenero'];
		$nuevoSubgenero=$_GET['nuevoSubgenero'];
		$nuevoPropiedad=$_GET['nuevoPropiedad'];

	}

	if (isset($_GET['param1'])) {
		$codigo_libroActualizado = $_GET['param1'];
		}
	if (isset($_GET['param2'])) {
		$autorActualizado = $_GET['param2'];
		}
	if (isset($_GET['param3'])){
		$editorialActualizada = $_GET['param3'];
		}
	if (isset($_GET['param4'])){
		$isbnActualizada = $_GET['param4'];
		}
	if (isset($_GET['param5'])){
		$ubicacionActualizada = $_GET['param5'];
		}
	if (isset($_GET['param6'])){
		$tituloActualizado = $_GET['param6'];
		}
if (isset($_GET['param7'])){
		$generoActualizado = $_GET['param7'];
		}
if (isset($_GET['param8'])){
		$sub_generoActualizado = $_GET['param8'];
		}
if (isset($_GET['param9'])){
		$propietarioActualizado = $_GET['param9'];
		}

if (isset($_GET['borrarlibro'])) {
		$borrar_libro=$_GET['borrarlibro'];
		$idEliminado=$_GET['idEliminado'];
	 	}

	$codigo_libro = "ID";
	$autor = "Autor";
	$editorial = "Editorial";
	$isbn="isbn";
	$ubicacion="ubicacion";
	$titulo="titulo";
	$genero="genero";
	$sub_genero="sub_genero";
	$propietario="propietario";
	$actualizar ="ACTUALIZAR";
	$borrar = "BORRAR";
	$tamanio=10;
	
	if ($acontar=="si") {

		$resultado = mysqli_query($con, "SELECT * FROM libros");
		$num_filas = mysqli_num_rows($resultado);
		echo $num_filas;

	}


	if($libros==="libros") {

			
			$desde=(($pagina-1)*$tamanio);

		 	$resultado = mysqli_query($con, "SELECT * FROM libros ORDER BY $clasifica LIMIT $desde,$tamanio");


			$table = '<div class = "container">';
			$table .=  '<table class = "table table-striped table-bordered table-hover">';
			$table .= '<tr>';
			$table .= '<th class="col-sm-0">Libro Id</th>';
			$table .= '<th class="col-sm-1">Autor</th>';
			$table .= '<th class="col-sm-1">Editorial</th>';
			$table .= '<th class="col-sm-1">Isbn</th>';
			$table .= '<th class="col-sm-0">Ubicacion</th>';
			$table .= '<th class="col-sm-1">Titulo</th>';
		//	$table .= '<th class="col-sm-3"></th>';
			$table .= '<th class="col-sm-1">Genero</th>';
			$table .= '<th class="col-sm-1">S-Genero</th>';
			$table .= '<th class="col-sm-1">Propiedad</th>';
			$table .= '<th class="col-sm-0">Modificar</th>';
			$table .= '<th class="col-sm-0">Eliminar</th>';
			$table .= '</tr>';

			$onmouse="this.style.size='40'";

			while ($fila = mysqli_fetch_assoc($resultado)) {

			$table .= '<tr>'; 
			$table .= '<td id="'.$codigo_libro.$fila['ID'].'" style="white-space:nowrap" >' . $fila['ID'] . '</td>';
			$table .= '<td style="white-space:nowrap">'.$autor.$fila['ID'].'">' . $fila['Autor'] . ' </td>';

			$table .= '<td id="'.$editorial.$fila['ID'].'"style="white-space:nowrap" >' . $fila['Editorial'] . '</td>';

			$table .= '<td  id="'.$isbn.$fila['ID'].'">' . $fila['isbn'] . '</td>';

			$table .= '<td id="'.$ubicacion.$fila['ID'].'">' . $fila['ubicacion'] . '</td>';

			$table .= '<td style="white-space:nowrap">' . $fila['titulo'] . '</td>';
           // $table .= '<td></td>';
			$table .= '<td id="'.$genero.$fila['ID'].'"style="white-space:nowrap" >'. $fila['genero'] . '</td>';
			$table .= '<td id="'.$sub_genero.$fila['ID'].'">'. $fila['sub_genero'] . '</td>';

			$table .= '<td id="'.$propietario.$fila['ID'].'">'. $fila['propietario'] .'</td>';
			
			$table .= '<td><input id="'.$fila['ID'].'" onclick="editarLibros(this.id)" type = "button" value ="Editar" class = "btn btn-success"></td>';
			$table .= '<td><input  id="'.$borrar.$fila['ID'].'" onclick="borrarLibro('.$fila['ID'].')"  type = "button" value ="Borrar" class = "btn btn-danger"></td>';
			
 		$texto="'";
  		$table .= '<td><input id="'.$actualizar.$fila['ID'].'" onclick = "actualizarLibros('.$texto.$fila['ID'].$texto.')" type = "button" value ="Actualizar" class = "btn btn-primary" style="display:none;"></td>'; 
 
			$table .= '</tr>';
	}
		$desdehasta='1 - '.$num_paginas;
		$table.= '</table>';
		$table.= '<button onclick="ejecutarNuevaVentana()" class="btn btn-primary">Agregar Libro</button>';
		$table.="<br>";
		$table.="<h4 id=".'mostrarpagina'.">Mostrar Página:</h4>";
		$table.="<button class='botones' onclick="."retrocedoPagina(".'"inicio"'.")"." id=".">".'<<'."</button>";
		$table.="<button class='botones' onclick="."'retrocedoPagina()'>"."<"."</button>";
		$table.='<input type="text" id="avanzonpaginas" name="elplaceholder" size="3" maxlength="3" placeholder="'.$desdehasta.'">';
		$table.="<button  class='botones' onclick="."'avanzoNpaginas($num_paginas)'>"."go"."</button>";
		$table.="<button  class='botones' onclick="."'avanzoPagina()'>".">"."</button>";
		$table.="<button class='botones' onclick="."avanzoPagina(".'"final"' .','.$num_paginas.")"." id=".">".'>>'."</button>";
		$table.="<button  class='botones' onclick="."'porId()'>"."Id"."</button>";
		$table.="<button  class='botones' onclick="."'porA()'>"."Autor"."</button>";
		$table.="<button  class='botones' onclick="."'porE()'>"."Edita"."</button>";
		$table.="<button  class='botones' onclick="."'porT()'>"."Titul."."</button>";
		$table.="<button  class='botones' onclick="."'porP()'>"."Propi."."</button>";
		$table.= "</div>";
		echo $table;
		mysqli_close($con);
	} 



		if(!empty($codigo_libroActualizado)) {

		$query= "UPDATE libros SET Autor = '$autorActualizado',  Editorial= '$editorialActualizada', isbn = '$isbnActualizada', ubicacion = '$ubicacionActualizada', titulo = '$tituloActualizado', genero = '$generoActualizado',  sub_genero = '$sub_generoActualizado' , propietario = '$propietarioActualizado'  WHERE  ID = $codigo_libroActualizado";
		 

		if (mysqli_query($con, $query)) {
			echo "correcto";
		} else { 
			echo "No correcto". mysqli_error($con);
		}
		mysqli_close($con); 
	}
		
		
		if($borrar_libro=="si"){

		
		$resultado=mysqli_query($con, "DELETE FROM libros WHERE ID = $idEliminado");
		mysqli_close($con);

		} 
		
		if($nuevoLibro=="si") {


		$query="INSERT INTO libros (Autor, Editorial, isbn, ubicacion, titulo, genero, sub_genero, propietario) VALUES ('$nuevoAutor','$nuevoEditorial','$nuevoIsbn','$nuevoUbicacion','$nuevoTitulo','$nuevoGenero','$nuevoSubgenero','$nuevoPropiedad')";

		if (mysqli_query($con, $query)) {
			echo "correcto";
		} else { 
			echo "No ejecutado".mysqli_error($con);
		}

		mysqli_close($con);
	} 

?>

