 <div id="mySidenav1" class="sidenav" onclick="closeNav('mySidenav1');">
  	
    <ul class="lorem">
		<li><p><a href="gestion.php?op=11">Ficheros Maestros</a></p></li>    	 
		<li><p><a href="gestion.php?op=12">Usuarios, Roles, Permisos</a></p></li>   	 
		<li><p><a href="gestion.php?op=13">Ejercicio</a></p></li>   	 
    </ul>
    <i class="fas fa-toggle-on fa-3x"></i>
    <p>cerrar</p>
</div>
 

 <div id="mySidenav2" class="sidenav" onclick="closeNav('mySidenav2');">
    <ul class="lorem">
		<li><p><a href="gestion.php?op=21">Tarifas</a></p></li>    	 
		<li><p><a href="gestion.php?op=22">Familias</a></p></li>    	 
		<li><p><a href="gestion.php?op=23">Ofertas</a></p></li>   
		<li><p><a href="gestion.php?op=24">Clientes</a></p></li>   	 
		<li><p><a href="gestion.php?op=25">Facturación</a></p></li>
		<li><p><a href="gestion.php?op=26">Historico Venta</a></p></li>    	 
    </ul> 
    <i class="fas fa-toggle-on fa-3x"></i>
    <p>cerrar</p>
</div>

 <div id="mySidenav3" class="sidenav" onclick="closeNav('mySidenav3');">
  
    <ul class="lorem">
		<li><p><a href="gestion.php?op=31.php"> Artículos, Almacen </a></p></li>  
		<li><p><a href="gestion.php?op=32.php">Histórico</a></p></li>   	 
		<li><p><a href="gestion.php?op=33.php">Traslados</a></p></li>   	 
		<li><p><a href="gestion.php?op=34.php">Inventarios</a></p></li>   
		<li><p><a href="gestion.php?op=35.php">Faltas</a></p></li>    	 
    </ul> 
	<i class="fas fa-toggle-on fa-3x"></i>
    <p>cerrar</p>
</div>

 <div id="mySidenav4" class="sidenav" onclick="closeNav('mySidenav4');">
  
    <ul class="lorem">
		<li><p><a href="gestion.php?op=41.php">Fichero Proveedores</a></p></li>  
		<li><p><a href="gestion.php?op=42.php">Confección de Pedidos</a></p></li>   
		<li><p><a href="gestion.php?op=43.php">Recepción de Pedidos</a></p></li>   
		<li><p><a href="gestion.php?op=44.php">Devolución a Proveedores</a></p></li> 
    </ul> 
    </ul> 
	<i class="fas fa-toggle-on fa-3x"></i>
    <p>cerrar</p>
</div>

 <div id="mySidenav5" class="sidenav" onclick="closeNav('mySidenav5');">

    <ul class="lorem">
		<li><p><a href="gestion.php?op=51.php">Plan de Cuentas</a></p></li>    	 
		<li><p><a href="gestion.php?op=52.php">Asientos</a></p></li>   	 
		<li><p><a href="gestion.php?op=53.php">Extractos</a></p></li>   
		<li><p><a href="gestion.php?op=54.php">Balances</a></p></li>   	 
		<li><p><a href="gestion.php?op=55.php">Impuestos</a></p></li>     	 
    </ul> 
	<i class="fas fa-toggle-on fa-3x"></i>
    <p>cerrar</p>
</div>

<div id="mySidenav6" class="sidenav" onclick="closeNav('mySidenav6');">
 	<ul class="lorem">
		<li><p><a href="gestion.php?op=61.php">Estadísticas Ventas</a></p></li>   	 
		<li><p><a href="gestion.php?op=62.php">Informes Clientes</a></p></li>    	 
		<li><p><a href="gestion.php?op=63.php">Historial de Compras</a></p></li>  
    </ul> 
    </ul> 
	<i class="fas fa-toggle-on fa-3x"></i>
    <p>cerrar</p>   
</div>



			<!-- ************** Caja lateral con menu nav ********* --> 


	<nav id="lateral">                        	<!-- columna vertical -->
		<div id="lateral-marca" onclick="location.href='gestion.php';">              	<!-- cajita superior -->
			<div id="lateral-marca-centrar">  	<!-- div para centrar en cajita -->  
			<i class="fa fa-home fa-2x"></i>
			<p class="menu">INICIO</p>	

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
			 	<i class="fa  fa-door-open fa-2x"></i>
			 	<a href="cerrar_sesion.php" id="cerrarSesion">
				CERRAR SESION</a>	
			</div>
		 </div>
				
	
	</nav>

<div id="header-0">
	<header id="header-01">
		<div id="header-01-caja-1">
			<img src="arnetlogo.png">
			<div id="caja-autor">
				<p id="autor">
					<strong>GESTIÓN EN LA WEB</strong>
					<?php echo "<p id='usuario' >" . "Usuario: " . $_SESSION["usuario"] . "</p>"; ?>
				</p>		
			</div>
			

		</div>
		<div id="header-01-caja-2">
			<img  src="logolg.jpg">
			<div id="caja-empresa">
				<p id="empresa">Distribuciones Insulares S.A. Electrodomesticos y demás enseres para el hogar y el deporte</p>
			</div>
		</div>
	</header>
</div>




