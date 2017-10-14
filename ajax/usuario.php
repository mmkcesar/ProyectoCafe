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
	case 'guardaryeditar'://valida si tiene id es usuario nuevo si no lo tiene entonces es modificar usuario
		if(empty($idUsuario))
		{
			$respuesta = $usuario->insertarUsuario($nombre,$apellidos,$cedula,$email,$telefono,$tipo,$fecha,$usuario,$password)
			echo $respuesta ? "Usuario Registrado" : "Categoria no se pudo registrar";
		}
		else{
			$respuesta = $usuario->insertarUsuario($idUsuario,$nombre,$apellidos,$cedula,$email,$telefono,$tipo,$fecha,$usuario,$password)
			echo $respuesta ? "Usuario Actualizado" : "Categoria no se pudo Actualizar";
		}
	break;
	case 'desactivar':
			$respuesta = $usuario->desactivar($idUsuario)
			echo $respuesta ? "Usuario Desactivado" : "Usuario no se puede desactivar";
	break;
	case 'activar':
			$respuesta = $usuario->activar($idUsuario)
			echo $respuesta ? "Usuario Activado" : "Usuario no se puede activar";
	break;
	case 'mostrar':
			$respuesta = $usuario->mostrar($idUsuario)
			echo json_decode($respuesta);
	break;
	case 'listar':
			$respuesta = $usuario->listar();
			$data = Array();

			while($reg=$respuesta->fetch_object()){
				$data[]=array(
					"0"=$reg->idUsuario,
					"1"=$reg->nombre,
					"2"=$reg->apellidos,
					"3"=$reg->cedula,
					"4"=$reg->email,
					"5"=$reg->telefono,
					"6"=$reg->tipo,
					"7"=$reg->fecha,
					"8"=$reg->usuario,
					"9"=$reg->password
					);


			}
			$restultado = array(
				"sEcho"=>1,  //Informacion para datatables
				"iTotalRecords"=>counts($data), //Enviamos el total de registros al datatable
				"iTotalDisplayRecords"=>count(data), //enviamos el total de registros a visualizar
				"aaData"=>$data
				);
			echo json_encode($resultado);
	break;

}

 ?>