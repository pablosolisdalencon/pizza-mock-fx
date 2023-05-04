<h2> 
	Listado Principales
</h2>

<?php
include "filtro_principales.php";
?>
<hr>


<table>
	<thead>
		<tr>
			<th>Nivel<br><span syle="text-style:italic;">Principal<br>Rut</span></th>
			<th>Cant Contratistas</th>
			<th>Cant Trabajadores</th>
			<th>Cant Contratistas <br> Asignados/No Asignados</th>
			<th>Listar</th>
		</tr>
	</thead>
	<tbody id="results">
		<tr>
			<td><span class="razon">Principal A</span><br>11.111.111-k</td>
			<td>17</td>
			<td>155</td>
			<td>5/4</td>
			<td><input type="button" value="IR" onclick="location.href='./?inc=listado_contratistas.php';"/></td>
		</tr>
		
			<tr>
			<td><span  class="razon">Principal A SUb 1</span><br>11.111.111-k</td>
			<td>9</td>
			<td>112</td>
			<td>5/4</td>
			<td><input type="button" value="IR" onclick="locatoion.href='./?inc=listado_contratistas.php');"/></td>
		</tr>
		
			<tr>
			<td><span  class="razon">Principal A Sub 2</span><br>11.111.111-k</td>
			<td>32</td>
			<td>122</td>
			<td>5/4</td>
			<td><input type="button" value="IR" onclick="locatoion.href='./?inc=listado_contratistas.php');"/></td>
		</tr>
		
			<tr>
			<td><span  class="razon">Principal B</span><br>11.111.111-k</td>
			<td>9</td>
			<td>133</td>
			<td>5/4</td>
			<td><input type="button" value="IR" onclick="locatoion.href='./?inc=listado_contratistas.php');"/></td>
		</tr>
		
			<tr>
			<td><span  class="razon">Principal B sub x</span><br>11.111.111-k</td>
			<td>12</td>
			<td>114</td>
			<td>5/4</td>
			<td><input type="button" value="IR" onclick="locatoion.href='./?inc=listado_contratistas.php');"/></td>
		</tr>
	</tbody>
</table>
<?php include "load-principales.php"; ?>