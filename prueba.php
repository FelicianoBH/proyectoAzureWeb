<!DOCTYPE html>
<html>
<head>
	<title>Prueba de fondos</title>
	<link rel="stylesheet" href="normalize.css">
	<style type="text/css">

		#principale {
			display:block;
			background-color:#DFECF0;
  			width:400px;
  			padding: 5px;
  			margin:0 auto;
  			border:0.5px #0084d1 solid;
  			opacity:0.9;
  			margin-top:5%;
		 	text-align:center;
 			
		} 
		#usuario{

		
			background-color:#DEECF0;
			
		}

		h2	{

				font-size:22px;
				color:#000080;
			}
		button {
			margin-left: 20%;
			display:block;
			width:110px;
			height:40px;
			font-size:16px;
			font-weight:bold;
			text-align:left;
			color: #000080;
			border:1px #000080 solid;
			border-radius:10%;
		}

		h4  {
				font-size:14px;
				color:#000080;
		}
		h5  	{
				font-size:14px;
				color:#000080;
		}



		table {

			
			
			margin:auto;

		}

			.izq {
				color:#000080;
				font-size:22px;
				text-align:right;
			}
			.der {
				color:#000080;
				text-align:left;
			}

			td {
				text-align:center;
				padding:10px;
			}
			#i1, #i2 {
				color:#000080;
				
			}

			.boton {

				font-size:18px;
				background-color:white;
				color:#000080;
			}

 
		
	</style>
</head>
<body background="fondo1.png">
	<div  id="principale">
		<img src="arnetlogo.png" width="200px" height="60">
		
		<p><h2>ADMINISTRACIÓN Y EXPLOTACIÓN DE RECURSOS</h2></p>
		<p><h4>GESTION DE NEGOCIOS EN LA WEB</h4></p>
		<p><h4>COMERCIAL - LOGÍSTICA - CONTABILIDAD</h4></p>
		
			<div id="usuario">
				<img src="logolg.jpg" width="120px" height="100">
				<h5>ACCESO RESTRINGIDO A USUARIOS DE LA ORGANIZACION</h5>
			
				<h2> Introduce tus Datos</h2>
					<form action="comprueba_login.php" method="post">
						<table>
							<tr>
								<td class="izq">Empresa:</td>
								<td class="der"><input  id="i01" type="text" name="empresan"></td>
							</tr>
							<tr>
								<td class="izq">Login:</td>
								<td class="der"><input  id="i1" type="text" name="login"></td>
							</tr>
							<tr>
								<td class="izq">Password:</td>
								<td class="der"><input id="i2" type="password" name="password"></td>
							</tr>
							<tr>
								<td colspan="2"><input type="submit" class="boton" name="enviar" value="LOGIN">
								</td>
							</tr>
							<tr>
								<td colspan="2">

						<?php

						$valida="";

						if (isset($_GET['validacion'])) { 

							$valida=$_GET['validacion'];

						}

						

						if ($valida == 'user') {

						 	echo "<h2 style='color:red;'> Usuario o Pasword Incorrecto </h2>";

						 } 

						if ($valida =='empresa') { 

						 	echo "<h3> Empresa incorrecta </h3>";
						}
				 		 ?>
								</td>
							</tr>
						</table>
					</form>
			</div>
	</div>

	
		
</body>
</html>