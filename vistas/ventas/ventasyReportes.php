<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/Ventas.php";

	$c= new conectar();
	$conexion=$c->conexion();

	$obj= new ventas();

	$sql="SELECT id_venta,
				fechaCompra,
				id_cliente 
			from ventas group by id_venta";
	$result=mysqli_query($conexion,$sql); 
	?>

<h4 style="color:black;">Reportes y ventas</h4>
<div class="row">
	<div class="col-sm-1"></div>
	<div class="col-sm-10">
		<div class="table-responsive">
			<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
				<caption><label style="color:black;">Ventas</label></caption>
				<tr>
					<td bgcolor="brown" style="color:black;">Folio</td>
					<td bgcolor="brown" style="color:black;">Fecha</td>
					<td bgcolor="brown" style="color:black;">Cliente</td>
					<td bgcolor="brown" style="color:black;">Total de compra</td>
					<td bgcolor="brown" style="color:black;">Ticket</td>
					<!--<td bgcolor="brown" style="color:black;">Reporte</td>-->
				</tr>
		<?php while($ver=mysqli_fetch_row($result)): ?>
				<tr>
					<td bgcolor="brown" style="color:black;"><?php echo $ver[0] ?></td>
					<td bgcolor="brown" style="color:black;"><?php echo $ver[1] ?></td>
					<td bgcolor="brown" style="color:black;">
						<?php
							if($obj->nombreCliente($ver[2])==" "){
								echo "S/C";
							}else{
								echo $obj->nombreCliente($ver[2]);
							}
						 ?>
					</td>
					<td bgcolor="brown" style="color:black;">
						<?php 
							echo "$".$obj->obtenerTotal($ver[0]);
						 ?>
					</td>
					<td bgcolor="brown" style="color:black;">
						<a href="../procesos/ventas/crearTicketPdf.php?idventa=<?php echo $ver[0] ?>" class="btn btn-danger btn-sm">
							Ticket <span class="glyphicon glyphicon-list-alt"></span>
						</a>
					</td>
					<!--<td bgcolor="brown" style="color:black;">
						<a href="../procesos/ventas/crearReportePdf.php?idventa=<?php echo $ver[0] ?>" class="btn btn-danger btn-sm">
							Reporte <span class="glyphicon glyphicon-file"></span>-->
						</a>	
					</td>
				</tr>
		<?php endwhile; ?>
			</table>
		</div>
	</div>
	<div class="col-sm-1"></div>
</div>