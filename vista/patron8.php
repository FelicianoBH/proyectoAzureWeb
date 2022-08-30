<!DOCTYPE html>
<html>
<head>
	<title>Patron 8 PHP</title>
	<meta charset="utf-8">

	<link rel="shortcut icon" type="image/ico" href="favicon2.ico"/>
 	<link rel="stylesheet" href="fontawesome/css/all.css">
 	<style type="text/css">

 #body {

 	min-width:1200px;
 }

 #lateral {

 	margin-left:20px;
	position:fixed;
	border:1px solid;
	width:100px;
	height:98%;
	float:left;
	background-color:#679B9B;
}

	#lateral-marca{

		border:1px solid;
		width:98px;
		height:90px;

	}


 	#lateral-marca-centrar {

		text-align:center;
	} 


	.lateral-opciones {

		border-bottom:1px solid;
		width:98px;
		height:90px;

	}


 	.lateral-opciones-centrar {

 		padding-top:15px;
		width:98px;
		height:98%;
		text-align:center;
		color:white;
	} 
 	
 	.lateral-opciones:hover {
		
 		background-color:#AACFCF;
	} 

	#lateral-marca-centrar img {
		margin-top:15px;
		height:65px;
		width:85px;
	}

	.menu {
		font-size:14px;
	}
	#header-0 {

		min-width:840px;
		height:87px;
		margin-left:125px;
	}
	
	#header-01 {

		height:87px;
		border-bottom:5px solid;
		border-color:#679B9B;
		margin:0 auto;
		display:grid;
		grid-template-columns: 2fr 2fr;
	}

	
	#header-01-caja-1 {
		padding:1px;
		color:#679B9B;
		font-size:22px;
		text-align:center;
	}
	#header-01-caja-2 {


	}
	#header-01-caja-2 img {

		display:block;
		margin:auto;
		border:2px solid #679B9B;
		box-shadow:15px 5px #AACFCF;
		width:120px;
		height:75px;
	}

	#header-conta {

		width:700px;
		margin:auto;
		font-size:20px;
		text-align:center;
	}

	#header-conta ul {

		list-style:none;
	}
	
	.header-conta-nav > li {

		float:left;
	}

	.header-conta-nav li a{

		background:#679B9B;
		color:#fff;
		text-decoration:none;
		text-transform:uppercase;
		padding:10px 12px;
		display:block;
	}

	.header-conta-nav li a:hover{

		background-color:#AACFCF;
	}

	.header-conta-nav li ul {

		display:none;
		position:absolute;
		min-width:140px;
	}

	.header-conta-nav li:hover >ul {

		display:block;
	}

	.header-conta-nav li ul li {
		position:relative;
	}

	.header-conta-nav li ul li ul {
		right:-140px;
		top:0px;
	}

	.sidenav {

  		height: 92%;
 		width:  0;
 		position: fixed;
 		z-index: 1;
  		top: 0;
  		left: 0;
  		background-color: #AACFCF;
  		overflow-x: hidden;
  		transition: 0.5s;
 		padding-top: 60px;
 		margin-top:10px;
  		margin-left:130px;
	}

	.sidenav .closebtn {
  		position: absolute;
  		top: 25px;
  		right: 25px;
  		font-size: 20px;
  		margin-left: 80px;
	}

	.sidenav ul  {

		list-style:none;
	}
  	.sidenav ul li p {

  		text-align:center;
		font-size:20px;
		width:175px;
		background-color:#679B9B;
	}
  	.sidenav ul li p a {

  		color:white;
  		text-decoration:none;
  	}



 	</style>

  	<script type="text/javascript" src="../controlador/jquery/jquery-3.4.1.min.js"></script>
  	<script type="text/javascript" src="../controlador/jquery/jquery.js"></script>

</head>
<body>


 <div id="mySidenav1" class="sidenav">
  	
    <ul class="lorem">
		<li><p><a href="patron8.php&op=1">Ficheros Mestros</a></p></li>    	 
		<li><p><a href="patron8.php&op=2">Usuarios, Roles, Permisos</a></p></li>   	 
		<li><p><a href="patron8.php&op=3">Ejercicio</a></p></li>   	 
    </ul>

    <a href="javascript:void(0)" class="closebtn" onclick="closeNav('mySidenav1')">Cerrar</a> 
</div>


 <div id="mySidenav2" class="sidenav">
    <ul class="lorem">
		<li><p><a href="opcion1.html">Tarifas</a></p></li>    	 
		<li><p><a href="opcion2.html">Familias</a></p></li>    	 
		<li><p><a href="opcion3.html">Ofertas</a></p></li>   
		<li><p><a href="opcion1.html">Clientes</a></p></li>   	 
		<li><p><a href="opcion2.html">Facturación</a></p></li>    	 
    </ul> 
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav('mySidenav2')">Cerrar</a>
</div>

 <div id="mySidenav3" class="sidenav">
  
    <ul class="lorem">
		<li><p><a href="submenuconta.php">Ficheros Artículos, Almacén</a></p></li>   	 
		<li><p><a href="opcion2.html">Traslados</a></p></li>   	 
		<li><p><a href="opcion3.html">Inventarios</a></p></li>   
		<li><p><a href="opcion1.html">Faltas</a></p></li>    	 
    </ul> 

    <a href="javascript:void(0)" class="closebtn" onclick="closeNav('mySidenav3')">Cerrar</a>
</div>

 <div id="mySidenav4" class="sidenav">
  
    <ul class="lorem">
		<li><p><a href="opcion1.html">Ficheros Proveedor</a></p></li>    	 
		<li><p><a href="opcion3.html">Recepción de Pedidos</a></p></li>   
		<li><p><a href="opcion1.html">Devolución a Proveedores</a></p></li> 
    </ul> 
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav('mySidenav4')">Cerrar</a>
</div>

 <div id="mySidenav5" class="sidenav">

    <ul class="lorem">
		<li><p><a href="opcion1.html">Plan de Cuentas</a></p></li>    	 
		<li><p><a href="opcion2.html">Asientos</a></p></li>   	 
		<li><p><a href="opcion3.html">Extractos</a></p></li>   
		<li><p><a href="opcion1.html">Balances</a></p></li>   	 
		<li><p><a href="opcion1.html">Impuestos</a></p></li>     	 
    </ul> 

      <a href="javascript:void(0)" class="closebtn" onclick="closeNav('mySidenav5')">Cerrar</a>
</div>

<div id="mySidenav6" class="sidenav">
 	<ul class="lorem">
		<li><p><a href="opcion1.html">Ventas</a></p></li>   	 
		<li><p><a href="opcion2.html">Clientes</a></p></li>    	 
		<li><p><a href="opcion3.html">Compras</a></p></li>  
    </ul> 
  	<a href="javascript:void(0)" class="closebtn" onclick="closeNav('mySidenav6')">Cerrar</a>
   
</div>



			<!-- ************** Caja lateral con menu nav ********* --> 


	<nav id="lateral">                        	<!-- columna vertical -->
		<div id="lateral-marca">              	<!-- cajita superior -->
			<div id="lateral-marca-centrar">  	<!-- div para centrar en cajita -->  
				<img src="logo.png">
				   <!-- AQUI VA ICONO CON LA "MARCA"-->
			</div>
		</div>	
		<div id="lateral-opcion1" class="lateral-opciones">			  
			 <div id="lateral-opcion1-centrar" class="lateral-opciones-centrar" onclick="openNav('mySidenav1')" >
			 	<i class="fas fa-user-cog fa-2x"></i>
				<p class="menu">DATOS FIJOS</p>	
			 </div>
				
		</div>
		<div id="lateral-opcion2" class="lateral-opciones">			  
			 <div id="lateral-opcion2-centrar" class="lateral-opciones-centrar"  onclick="openNav('mySidenav2')">
			 	<i class="fas fa-gifts fa-2x"></i>
				<p class="menu">COMERCIAL</p>	
			 </div>
				
		</div>
		<div id="lateral-opcion3" class="lateral-opciones">			  
			 <div id="lateral-opcion3-centrar" class="lateral-opciones-centrar" onclick="openNav('mySidenav3')">
			 	<i class="fas fa-boxes fa-2x"></i>
				<p class="menu">STOCKS</p>	
			 </div>
				
		</div>
		<div id="lateral-opcion4" class="lateral-opciones">			  
			 <div id="lateral-opcion4-centrar" class="lateral-opciones-centrar" onclick="openNav('mySidenav4')">
			 	<i class="fas fa-dolly-flatbed fa-2x"></i>
				<p class="menu">COMPRAS</p>	
			 </div>
		</div> 
		<div id="lateral-opcion5" class="lateral-opciones">			  
			 <div id="lateral-opcion5-centrar" class="lateral-opciones-centrar" onclick="openNav('mySidenav5')">
			 	<i class="fa fa-cash-register fa-2x"></i>
				<p class="menu">CONTABLE</p>	
			 </div>
		</div>
		<div id="lateral-opcion6" class="lateral-opciones">			  
			 <div id="lateral-opcion6-centrar" class="lateral-opciones-centrar" onclick="openNav('mySidenav6')">
			 	<i class="fa fa-chart-area fa-2x"></i>
				<p class="menu">INFORMES</p>	
			 </div>
		</div>
			<div id="lateral-opcion7" class="lateral-opciones">			  
			 <div id="lateral-opcion7-centrar" class="lateral-opciones-centrar">
			 	<i class="far fa-id-card fa-2x"></i>
				<p class="menu">LOGIN</p>	
		 </div>
				
	
	</nav>

<div id="header-0">
	<header id="header-01">
		<div id="header-01-caja-1">
			<h1> Gestión en la Web</h1>
		</div>
		<div id="header-01-caja-2">
			<img src="logolg.jpg">
		</div>
	</header>
</div>

	<?php 

 		 if (isset($_GET['op'])) {
 
 	
 		switch ($_GET['op']){


 			case 1: 
 				 include "ficherosmaestros.php";
 				 break;
 			case 2: 
 				 include "usuarios.php";
 				 break; 
 			case 3: 
 				 include "ejercicios.php"; 
 				 break;
 			#default:
 				# include "patron8.php"; 
 		}

 	?>
 	
<script>

	var abierto=false;

	function openNav(cual) {

		if (!abierto){
  		document.getElementById(cual).style.width = "250px";
  		abierto=true;
  			} else closeNav(cual);
		}

	function closeNav(cuala) {
  		document.getElementById(cuala).style.width = "0px";
  		abierto=false;
		}

</script>

</body>
</html>
