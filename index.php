<?php 
	
	require_once "clases/Conexion.php";
	$obj= new conectar();
	$conexion=$obj->conexion();

	$sql="SELECT * from usuarios where email='admin'";
	$result=mysqli_query($conexion,$sql);
	$validar=0;
	if(mysqli_num_rows($result) > 0){
		$validar=1;
	}
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Login de usuario</title>
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	<script src="librerias/jquery-3.2.1.min.js"></script>
	<script src="js/funciones.js"></script>
</head>

<body background= img/Libro1.png>
	<br><br><br><br><br><br><br><br><br><br>
	<div class="container">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4"> 
				<div class="panel panel-primary" style="background-color:salmon;">
					<div class="panel panel-heading" style="background-color:darkred;">Inicia sesion</div>
					<div class="panel panel-body" style="background-color:salmon;">
						<p align="center">
						
						</p>
						<form id="frmLogin">
							<label style="color:black;">Usuario:</label>
							<input type="text" class="form-control input-sm" name="usuario" id="usuario" style="background-color:white;">
							<label style="color:black;">Contrase&ntildea:</label>
							<input type="password" name="password" id="password" class="form-control input-sm" style="background-color:white;">
							<p></p>
							<span class="btn btn-primary btn-sm" id="entrarSistema" style="background-color:darkred;">Entrar</span>
							<?php  if(!$validar): ?>
							<a href="registro.php" class="btn btn-danger btn-sm" style="background-color:darkred;">Registrar</a>
							<?php endif; ?>
						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>

</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#entrarSistema').click(function(){

		vacios=validarFormVacio('frmLogin');

			if(vacios > 0){
				alert("Debes llenar todos los campos!!");
				return false;
			}

		datos=$('#frmLogin').serialize();
		$.ajax({
			type:"POST",
			data:datos,
			url:"procesos/regLogin/login.php",
			success:function(r){

				if(r==1){
					window.location="vistas/inicio.php";
				}else{
					alert("No se pudo acceder :(");
				}
			}
		});
	});
	});
</script>