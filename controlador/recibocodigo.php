<?php 
		session_start();
		
		$_SESSION["producto"]=$_GET['elcodigo'];

		echo "codigo en la sesion: ->".$_SESSION['producto']."<-";
			
	}	

 
 ?>
