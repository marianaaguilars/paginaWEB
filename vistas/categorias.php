<?php 
session_start();
if(isset($_SESSION['usuario'])){

	?>


	<!DOCTYPE html>
	<html>
	<head>
		<title>Crear categoria</title>
		<?php require_once "menu.php"; ?>
	</head>
	<body >

		<div class="container">
			<h1 align="center" style="color:black;">Ingresa la categoria de tu producto.</h1><br></br>
			<div class="row">
				<div class="col-sm-4">
					<form id="frmCategorias">
						<label style="color:black;">Categoria</label>
						<input type="text" class="form-control input-sm" name="categoria" id="categoria" style="background-color:white;" style="color:black;">
						<p></p>
						<span class="btn btn-primary" id="btnAgregaCategoria">Agregar</span>
					</form>
				</div>
				<div class="col-sm-6">
					<div id="tablaCategoriaLoad"></div>
				</div>
			</div>
		</div>

		<!-- Button trigger modal -->

		<!-- Modal -->
		<div class="modal fade" id="actualizaCategoria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Actualiza categorias</h4>
					</div>
					<div class="modal-body">
						<form id="frmCategoriaU">
							<input type="text" hidden="" id="idcategoria" name="idcategoria">
							<label style="color:black;">Categoria</label>
							<input type="text" id="categoriaU" name="categoriaU" class="form-control input-sm" style="background-color:white;">
						</form>


					</div>
					<div class="modal-footer">
						<button type="button" id="btnActualizaCategoria" class="btn btn-warning" data-dismiss="modal">Guardar</button>

					</div>
				</div>
			</div>
		</div>

	</body>
	</html>
	<script type="text/javascript">
		$(document).ready(function(){

			$('#tablaCategoriaLoad').load("categorias/tablaCategorias.php");

			$('#btnAgregaCategoria').click(function(){

				vacios=validarFormVacio('frmCategorias');

				if(vacios > 0){
					alertify.alert("Debes llenar todos los campos!!");
					return false;
				}

				datos=$('#frmCategorias').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/categorias/agregaCategoria.php",
					success:function(r){
						if(r==1){
					//esta linea nos permite limpiar el formulario al insetar un registro
					$('#frmCategorias')[0].reset();

					$('#tablaCategoriaLoad').load("categorias/tablaCategorias.php");
					alertify.success("Categoria agregada");
				}else{
					alertify.error("No se agrego");
				}
			}
		});
			});
		});
	</script>

	<script type="text/javascript" style="color:white;">
		$(document).ready(function(){
			$('#btnActualizaCategoria').click(function(){

				datos=$('#frmCategoriaU').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/categorias/actualizaCategoria.php",
					success:function(r){
						if(r==1){
							$('#tablaCategoriaLoad').load("categorias/tablaCategorias.php");
							alertify.success("Cambio Realizado");
						}else{
							alertify.error("No se pudo actualizar");
						}
					}
				});
			});
		});
	</script>

	<script type="text/javascript">
		function agregaDato(idCategoria,categoria){
			$('#idcategoria').val(idCategoria);
			$('#categoriaU').val(categoria);
		}

		function eliminaCategoria(idcategoria){
			alertify.confirm('¿Desea eliminar esta categoria?', function(){ 
				$.ajax({
					type:"POST",
					data:"idcategoria=" + idcategoria,
					url:"../procesos/categorias/eliminarCategoria.php",
					success:function(r){
						if(r==1){
							$('#tablaCategoriaLoad').load("categorias/tablaCategorias.php");
							alertify.success("Se elimino");
						}else{
							alertify.error("No se pudo eliminarse(");
						}
					}
				});
			}, function(){ 
				alertify.error('Cancelo')
			});
		}
	</script>
	<?php 
}else{
	header("location:../index.php");
}
?>