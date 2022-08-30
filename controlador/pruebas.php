<!DOCTYPE html>
<html>
<head>
	<title>pruebas</title>
</head>
<body>

	<div>
		<form>
		<input id="entrada" type="" name="">Entre</div>
		<button onclick="valida()"> dele </button>
		</form>

<script type="text/javascript">
	
	function valida(){

		var numero=document.getElementById("entrada").value;

		var cifra=numero.toString();

		var trozo1=cifra.slice(0,3);
		var trozo2=cifra.slice(3,6);
		var trozo3=cifra.slice(6,12);

		if (cifra.length<12) { alert ("codigo invalido");}

		var completo=trozo1+"000000000";

		alert("primer grado: "+completo);
		

		alert("__"+cifra+"__ "+cifra.length);

		alert(trozo1+" - "+trozo2+" - "+trozo3);

	}



</script>

</body>
</html>