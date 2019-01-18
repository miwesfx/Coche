<?PHP

include_once './clases.php';
include_once './conexion.php';

$usuario = new Usuario("miwesfx");
echo $usuario->mostrar_nombre()." ".$usuario->mostrar_apellidos();

?>