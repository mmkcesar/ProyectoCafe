<?php 
require_once "../modelos.Usuario.php";

$usuario = new Usuario();

$idUsuario = isset($_POST["idUsuario"])?limpiarCadena($_POST["idUsuario"]):"";
$idNombre = isset($_POST["idNombre"])?limpiarCadena($_POST["idNombre"]):"";
$idApellidos = isset($_POST["idApellidos"])?limpiarCadena($_POST["idApellidos"]):"";
$idCedula = isset($_POST["idCedula"])?limpiarCadena($_POST["idCedula"]):"";
$idEmail = isset($_POST["idEmail"])?limpiarCadena($_POST["idEmail"]):"";
$idTelefono = isset($_POST["idTelefono"])?limpiarCadena($_POST["idTelefono"]):"";
$idTipo = isset($_POST["idTipo"])?limpiarCadena($_POST["idTipo"]):"";
$idFecha = isset($_POST["idFecha"])?limpiarCadena($_POST["idFecha"]):"";
$idUsuario = isset($_POST["idUsuario"])?limpiarCadena($_POST["idUsuario"]):"";
$idPassword = isset($_POST["idPassword"])?limpiarCadena($_POST["idPassword"]):"";

switch($_GET["op"])
{
	case 'guardaryeditar':
		if(empty($idUsuario))
		{
			$respuesta = $usuario->insertarUsuario($nombre,$apellidos,$cedula,$email,$telefono,$tipo,$fecha,$usuario,$password)
			echo $respuesta ? "Usuario Registrada" : "Categoria no se pudo registrar";
		}
		else{
			$respuesta = $usuario->insertarUsuario($idUsuario,$nombre,$apellidos,$cedula,$email,$telefono,$tipo,$fecha,$usuario,$password)
			echo $respuesta ? "Usuario Actualizado" : "Categoria no se pudo Actualizar";
		}
	break;
	case 'desactivar':

	break;
	case 'activar':

	break;
	case 'mostrar':

	break;
	case 'listar':

	break;

}

 ?>