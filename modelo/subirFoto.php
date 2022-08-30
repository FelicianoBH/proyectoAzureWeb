<?php 
	require "conexion.php";

		if (($_FILES["file"]["type"] == "image/pjpeg")
		    || ($_FILES["file"]["type"] == "image/jpeg")
		    || ($_FILES["file"]["type"] == "image/png")
		    || ($_FILES["file"]["type"] == "image/gif")) {


			$carpeta_destino=$_SERVER['DOCUMENT_ROOT'].'/PROYECTO3/IMAGEN_SERVIDOR/';

			$carpeta_detidos='/PROYECTO3/IMAGEN_SERVIDOR/';

			$nombre_archivo=$_FILES['file']['name'];

			$tamanio_archivo=$_FILES['file']['size'];

			$tipo_archivo=$_FILES['file']['type'];

			

		    if (move_uploaded_file($_FILES["file"]["tmp_name"],$carpeta_destino.$nombre_archivo)) {
		        //more code here...
		        echo $carpeta_detidos.$nombre_archivo;
		    } else {
		        echo 0;
		    }
		} else {
		    echo 0;
		}


	/*$archivo_objetivo=fopen($carpeta_destino.$nombre_archivo, "r");

	$contenido=fread($archivo_objetivo, $tamanio_archivo);

	$contenido=addslashes($contenido);

	fclose($archivo_objetivo);

	$sql="INSERT INTO archivos (ID, NOMBRE, TIPO, CONTENIDO)  VALUES (0, '$nombre_archivo', '$tipo_archivo', NULL)";


	$resultado=mysqli_query($con, $sql);

	//if(mysqli_affected_rows($con)>0) {echo " Ok registro de archivo";} else echo mysqli_error($con);

	mysqli_close($con);
	*/


 ?>
