<style>

	
	#main table table{
		width:95%;
	}
	/*.dotacion td table td{
    background-color: white;
}*/
	#main table table tr th{
		background-color:#555;
	}
	.disabled {
		background-color:#bbb !important;
		border: 2px solid white !important;
		cursor :no-drop !important;
	}
	.btndesactivado{
		background-color:#bbb !important;
		border: 2px solid white !important;
		cursor :no-drop !important;
	}
	.verif-no-iniciada{ color:red;}
	.verif-pausada{ color:orange;}
	.verif-iniciada{ color:green;}
	.dotacion {
		width:65%;
		height:35%;
		padding:5%;
		display:none;
		position: fixed;
    font-family: helvetica;
    top: 130px;
    left: 240px;
    padding-bottom: 100px;
    /*background: linear-gradient(45deg, black, transparent);*/
		background-color:white !important;
    box-shadow: 0px 0px 70px black;
		border-radius:7px;
	}
	.dotacion td{
		background-color: lightgoldenrodyellow;
	}
	.dotacion table{
		width: 100% !important;
		margin-bottom:30px;
	}
	.dotacion table td h2{
		padding-top:20px;
		color:#490000 !important;
	}
</style>
<script>
function verDotacion(id){
	document.getElementById("dotacion"+id).style.display="block";
}
	function cerrarDotacion(id){
	document.getElementById("dotacion"+id).style.display="none";
	}
</script>


<h2>
	Listado Contratistas
</h2>
<?php
include "filtro_contratistas.php";
?>
<hr>
<table>
	<thead>
		<tr>
			<th>Rut<br>Razon Social</th>
			
			<th>Cant Trabajadores</th>
			<th>Auditores</th>
			<th>Asignacion</th>
			<th>Estado</th>
			<th>Dotacion</th>
			<th>Verificacion</th>
		</tr>
	</thead>
	<tbody id="results">
	
	</tbody>
</table>
<hr>
<input class="boton" value="<< Volver" type="button" onclick="location.href='./?inc=listado_principales.php';"/>



<?php include "load-contratistas.php"; ?>