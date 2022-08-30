<?php 
		
		if (isset ($_FILES["file"])) {

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
		       
		        echo $nombre_archivo;
		       
		    } else {
		        echo 0;
		    }
		} else {
		    echo 0; 
		}
	}	



 ?>
