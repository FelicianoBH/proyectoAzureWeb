			if ($agrabar_debehaber=="DEBE") {
			
			$query="UPDATE referencias SET DEBE_ASIENTO_ACTUAL=(DEBE_ASIENTO_ACTUAL+'$agrabar_importe'), APUNTE_CONTABLE=(APUNTE_CONTABLE+'1') WHERE ID_USUARIO='$id_usuario'";

				$resultado=mysqli_query($con, $query);

			} else {

				$query="UPDATE referencias SET HABER_ASIENTO_ACTUAL=(HABER_ASIENTO_ACTUAL+'$agrabar_importe'), APUNTE_CONTABLE=(APUNTE_CONTABLE+'1') WHERE ID_USUARIO='$id_usuario'";

				$resultado=mysqli_query($con, $query);

			}

		