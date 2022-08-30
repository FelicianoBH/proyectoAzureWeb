<style type="text/css">
	
</style> 
<?php 
	
	session_start();

	try {


		//$base = new PDO("mysql:host=localhost; dbname=arnet", "feliciano", "feliciano1945");

		$base = new PDO("mysql:host=tatosqlserver.mysql.database.azure.com; dbname=arnet", "tato", "Tapon_458", array (PDO::MYSQL_ATTR_SSL_CA => 'DigiCertGlobalRootCA.crt.pem' ));

		$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
		$sql="SELECT * FROM USUARIOS WHERE NOMBRE = :login AND PASSWORD= :password";

		$resultado=$base->prepare($sql);

		$login=htmlentities(addslashes($_POST['login']));

		$password=htmlentities(addslashes($_POST['password']));

		$resultado->bindValue(":login", $login);

		$resultado->bindValue(":password", $password);

		$resultado->execute();



		$numero_registros=$resultado->rowCount();

		if ($numero_registros==0) {


			header("location:index.php?validacion=user");

		}  

		
		$registro=$resultado->fetch(PDO::FETCH_ASSOC);

		$id_usuario=$registro['ID_USUARIO'];
		


		$sql="SELECT * FROM empresa WHERE nombre = :empresa";

		$resultado=$base->prepare($sql);

		$empresa=htmlentities(addslashes($_POST['empresan']));
                                        

		$resultado->bindValue(":empresa", $empresa);

		$resultado->execute();

		$numero_registros=$resultado->rowCount();

		if ($numero_registros!=0) {


			session_start();

			$_SESSION["id_usuario"]=$id_usuario;

			$_SESSION["usuario"]=$_POST["login"];

			header("location:vista/gestion.php");

		} else {

			echo $_POST['empresan'];
			
			header("location:index.php?validacion=empresa");

		}


	} catch (exception $e) {

		die("Error:" . $e->getMessage());
	}










 ?>
