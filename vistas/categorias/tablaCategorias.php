

	<?php 
			require_once "../../clases/Conexion.php";
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="SELECT id_categoria,nombreCategoria 
					FROM categorias";
			$result=mysqli_query($conexion,$sql);
	 ?>


<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
	<caption><label></label></caption>
	<tr>
		<td bgcolor="brown" style="color:black;">Categoria</td>
		<td bgcolor="brown" style="color:black;">Editar</td>
		<td bgcolor="brown" style="color:black;">Eliminar</td>
	</tr>

	<?php
	while ($ver=mysqli_fetch_row($result)):
	 ?>

	<tr>
		<td bgcolor="white" style="color:black;"><?php echo $ver[1] ?></td>
		<td bgcolor="white">
			<span class="btn btn-warning btn-xs" data-toggle="modal" data-target="#actualizaCategoria" onclick="agregaDato('<?php echo $ver[0] ?>','<?php echo $ver[1] ?>')" style="background-color:blue;">
				<span class="glyphicon glyphicon-pencil" style="background-color:blue;"></span>
			</span>
		</td>
		<td bgcolor="white">
			<span class="btn btn-danger btn-xs" onclick="eliminaCategoria('<?php echo $ver[0] ?>')" style="background-color:darkred;">
				<span class="glyphicon glyphicon-remove" style="background-color:darkred;"></span>
			</span>
		</td>
	</tr>

<?php endwhile; ?>
</table>