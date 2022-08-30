<?php 
 
	$mysql_host='tatosqlserver.mysql.database.azure.com';
	$mysql_user='tato';
	$mysql_pass='Tapon_458';
	$mysql_db='arnet';
	$puerto='3306';
	$dbh = new PDO("mysql:host=tatosqlserver.mysql.database.azure.com; dbname=arnet", "tato", "Tapon_458", array (PDO::MYSQL_ATTR_SSL_CA => 'DigiCertGlobalRootCA.crt.pem' ));



/*
	$coninit=mysqli_init();

	mysqli_options($coninit, MYSQLI_OPT_CONNECT_TIMEOUT, 5);

	mysqli_ssl_set($coninit, NULL, NULL, 'DigiCertGlobalRootCA.crt.pem', NULL, NULL);

	
 	echo "inicio conexione "; 



	$con = mysqli_real_connect($coninit, $mysql_host, $mysql_user, $mysql_pass, $mysql_db, $puerto, MYSQLI_CLIENT_SSL);

	if (!$con) {

		die('<br /><br />Connectione Error (' . mysqli_connect_errno() . ') '.mysqli_connect_error());
	} else {

		echo 'conexion exitosa: ' . mysqli_get_host_info($coninit);

	}
*/

	/*
	if (mysqli_connect_errno()) {

		echo "Error de conexión a la Base de Datos" . mysqli_connect_error();
	}
	*/

	@mysqli_query("SET NAMES 'utf8'");




 ?>

