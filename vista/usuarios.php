<div id="header-usuarios">
		
			<ul class="header-usuarios-nav">
				<!-- <li><button onclick="llamaUsuarios()">Fichero Usuarios</button> -->
					<li><button onclick="llamaUsuarios()">Fichero Usuarios</button>
				</li>
				<li><a href="">Configuracion Roles </a>
				</li>
				<li><a href="">Permisos</a>
				</li>
			</ul>
</div>
<div id="marco"></div>

	 
<script type="text/javascript">
	
	document.getElementById('lateral-opcion1').style.backgroundColor='#0A4A45';
	/*document.getElementById('screen').innerHTML+="  Ficheros Maestros";
	document.getElementById('screen').style.backgroundColor="#0A4A45";
	document.getElementById('screen').style.color="#fff";*/
	

	function llamaUsuarios() {

		document.getElementById('marco').innerHTML=
	//	"<iframe id='marcousuario' src='file:///C:/wamp64/www/CursoPHP/indexx.php'></iframe>";
		"<iframe id='marcousuario' src='gestion.php'></iframe>";
	}


</script>
	
	