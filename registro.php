<?php 
	
	require_once "clases/Conexion.php";
	$obj= new conectar();
	$conexion=$obj->conexion();

	$sql="SELECT * from usuarios where email='admin'";
	$result=mysqli_query($conexion,$sql);
	$validar=0;
	if(mysqli_num_rows($result) > 0){
		header("location:index.php");
	}
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>registro</title>
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	<script src="librerias/jquery-3.2.1.min.js"></script>
	<script src="js/funciones.js"></script>

</head>
<body background= img/Libro1.png>
	<br><br><br>
	<div class="container">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4"><br></br><br></br>
				<div class="panel panel-primary" style="background-color:salmon;">
					<div class="panel panel-heading" style="background-color:darkred;">Registro de usuarios</div>
					<div class="panel panel-body" style="background-color:salmon;">
						<form id="frmRegistro">
							<label style="color:black;">Nombres:</label>
							<input type="text" class="form-control input-sm" name="nombre" id="nombre" style="background-color:white;">
							<label style="color:black;">Apellidos:</label>
							<input type="text" class="form-control input-sm" name="apellido" id="apellido" style="background-color:white;">
							<label style="color:black;">Usuario:</label>
							<input type="text" class="form-control input-sm" name="usuario" id="usuario" style="background-color:white;">
							<label style="color:black;">Contrase&ntildea:</label>
							<input type="text" class="form-control input-sm" name="password" id="password" style="background-color:white;">
							<p></p>
							<span class="btn btn-primary" id="registro" style="background-color:darkred;">Registrar</span>
							<a href="index.php" class="btn btn-danger" style="background-color:darkred;">Iniciar Sesi&ograven</a>
						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#registro').click(function(){

			vacios=validarFormVacio('frmRegistro');

			if(vacios > 0){
				alert("Debes llenar todos los campos!!");
				return false;
			}

			datos=$('#frmRegistro').serialize();
			$.ajax({
				type:"POST",
				data:datos,
				url:"procesos/regLogin/registrarUsuario.php",
				success:function(r){
					alert(r);

					if(r==1){
						alert("Agregado con exito");
					}else{
						alert("Fallo al agregar :(");
					}
				}
			});
		});
	});
</script>

