<?php 
	requie_once '../config/conexion.php'
 
Class Usuario
{
public function __construct()
{

}

public function insertarUsuario($nombre,$apellidos,$cedula,$email,$telefono,$tipo,$fecha,$usuario,$password)
{
	$sql = "INSERT INTO usuario (nombre,apellidos,cedula,email,telefono,tipo,fecha,usuario,password)
	VALUES ('$nombre','$apellidos','$cedula','$email','$telefono','$tipo','fecha','$usuario','$password')";
	return ejecutarConsulta($sql);
} 

public function editarUsuario($idUsuario,$nombre,$apellidos,$cedula,$email,$telefono,$tipo,$fecha,$usuario,$password)
{
	$sql = "UPDATE usuario SET nombre='$nombre',apellidos='$apellidos',cedula='$cedula',email='$email',telefono='$telefono',tipo='$tipo',fecha='fecha',usuario='$usuario',password='$password' WHERE idUsuario='$idUsuario'";
	return ejecutarConsulta($sql);
}

public function inactivarUsuario($idUsuario)
{
	$sql = "UPDATE usuario SET activo='0' WHERE idUsuario='$idUsuario'";
	return ejecutarConsulta($sql);
}  

public function activarUsuario($idUsuario)
{
	$sql = "UPDATE usuario SET activo='1' WHERE idUsuario='$idUsuario'";
	return ejecutarConsulta($sql);
} 

public function mostrar($idUsuario)
{
	$sql = "SELECT * FROM usuario WHERE idUsuario='$idUsuario'";
	return ejecutarConsultaSimpleFila($sql);
}

public function listar()
{
	$sql = "SELECT * FROM usuario";
	return ejecutarConsulta($sql);
}

}


 ?>

