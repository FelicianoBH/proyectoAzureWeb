<?php 

	$num_paginas=$_GET['num_paginas'];

	$muestra='<div class = "container">';
	$muestra.="<h4>Mostrar Página:</h4>";
	
	$muestra.="<button><</button>";
	for ($i=0; $i<=$num_paginas;$i++) {

			
			$muestra .= "<button onclick="."'mostrarReferencias(".($i+1).")'>".($i+1)."</button>";

	}
	$muestra.="<button>></button";
	$muestra.="</div>";

	echo $muestra;

 ?>

