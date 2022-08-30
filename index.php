<!DOCTYPE html>
<html>
<head>
	<title>ARNET</title> 
	<p> Parrafo agregado</p>
	<link rel="stylesheet" href="normalize.css">
	<link rel="shortcut icon" type="image/png" href="arnetico.png">
	<style type="text/css">

		 #principale {
			display:block;
			background-color:#DFECF0;
  			width:45%;
  			min-width:360px;
  			padding: 1%;
  			margin:0 auto;
  			border: groove #0084d1;
  			opacity:0.9;
			margin-top:10%;			
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
			width:12%;
			height:4.5%;
			font-size:16px;
			font-weight:bold;
			text-align:left;
			color: #000080;
			border:0.1% #000080 solid;
			border-radius:10%;
		}

		h4  {
				font-size:16px;
				color:#000080;
		}
		h5  	{
				font-size:16px;
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
				padding:1%;
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
<?php 
	session_start();
 ?>
<body background="fondo1.png">
	<div  id="principale">
 
		<img src="arnetlogo.png" width="30%">
		<p><h2>ADMINISTRACIÓN RECURROS ON LINE </h2></p>
		<p><h4>GESTION DE NEGOCIOS EN LA WEB</h4></p>
		<p><h4>COMERCIAL - LOGÍSTICA - CONTABILIDAD</h4></p>
		
			<div id="usuario">
				
				<h5>ACCESO RESTRINGIDO A USUARIOS DE LA ORGANIZACION</h5>
			
				<h2> Introduzca sus datos</h2>
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
								<td colspan="2"><input type="submit" class="boton" name="enviar" value="ENTRAR">
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
