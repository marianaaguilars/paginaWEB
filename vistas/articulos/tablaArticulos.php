
<?php 
	require_once "../../clases/Conexion.php";
	$c= new conectar();
	$conexion=$c->conexion();
	$sql="SELECT art.nombre,
					art.descripcion,
					art.cantidad,
					art.precio,
					img.ruta,
					cat.nombreCategoria,
					art.id_producto
		  from articulos as art 
		  inner join imagenes as img
		  on art.id_imagen=img.id_imagen
		  inner join categorias as cat
		  on art.id_categoria=cat.id_categoria";
	$result=mysqli_query($conexion,$sql);

 ?>

<table  class="table table-hover table-condensed table-bordered" style="text-align: center;" bgcolor="darkgoldenrod">
	<caption ><label style="color:black;">Libros</label></caption>
	<tr>
		<td bgcolor="brown" style="color:black;">Libro</td>
		<td bgcolor="brown" style="color:black;">Descripcion</td>
		<td bgcolor="brown" style="color:black;">Cantidad</td>
		<td bgcolor="brown" style="color:black;">Precio</td>
		<td bgcolor="brown" style="color:black;">Imagen</td>
		<td bgcolor="brown" style="color:black;">Categoria</td>
		<td bgcolor="brown" style="color:black;">Editar</td>
		<td bgcolor="brown" style="color:black;">Eliminar</td>
	</tr>

	<?php while($ver=mysqli_fetch_row($result)): ?>

	<tr>
		<td bgcolor="white" style="color:black;"><?php echo $ver[0]; ?></td>
		<td bgcolor="white" style="color:black;"><?php echo $ver[1]; ?></td>
		<td bgcolor="white" style="color:black;"><?php echo $ver[2]; ?></td>
		<td bgcolor="white" style="color:black;"><?php echo $ver[3]; ?></td>
		<td bgcolor="white" style="color:black;">
			<?php 
			$imgVer=explode("/", $ver[4]) ; 
			$imgruta=$imgVer[1]."/".$imgVer[2]."/".$imgVer[3];
			?>
			<img width="80" height="80" src="<?php echo $imgruta ?>">
		</td>
		<td bgcolor="white" style="color:black;"><?php echo $ver[5]; ?></td>
		<td bgcolor="white" style="color:black;">
			<span  data-toggle="modal" data-target="#abremodalUpdateArticulo" class="btn btn-warning btn-xs" onclick="agregaDatosArticulo('<?php echo $ver[6] ?>')" style="background-color:blue;">
				<span class="glyphicon glyphicon-pencil" style="background-color:blue;"></span>
			</span>
		</td>
		<td bgcolor="white">
			<span class="btn btn-danger btn-xs" onclick="eliminaArticulo('<?php echo $ver[6] ?>')" style="background-color:darkred;">
				<span class="glyphicon glyphicon-remove" style="background-color:darkred;"></span>
			</span>
		</td>
	</tr>
<?php endwhile; ?>
</table>