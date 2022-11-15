<?php   
//Inicio de sesion 
$estado=(isset($_REQUEST['estado']))?$_REQUEST['estado']:"";
$categoria=(isset($_REQUEST['categoria']))?$_REQUEST['categoria']:"";
$prioridad=(isset($_REQUEST['prioridad']))?$_REQUEST['prioridad']:"";
$respuesta=(isset($_POST['respuesta']))?$_POST['respuesta']:"";
$ticket=(isset($_POST['ticket']))?$_POST['ticket']:"";
$carnet=(isset($_POST['carnet']))?$_POST['carnet']:"";



include ("../../conexion/conexion.php");
$sentencia= ("SELECT Id,nombre,apellido,correo,titulo,descripcion,creado,Idticket FROM usuario,ticket WHERE usuario.Id=ticket.id_usuario");
$listatickets = mysqli_query($conectar, $sentencia);

if (isset($_POST["enviar"])){
  $sentencia1=("SELECT respuesta FROM heroku_d69d189ad4903c0.informacion WHERE ID_ticket='$ticket' AND usuario_id='$carnet';");
  $query = mysqli_query($conectar, $sentencia1);
  if (mysqli_num_rows($query)>0) {
    echo "<script>window.alert('El ticket ya ha sido respondido.');</script>";
    echo '<script type="text/javascript"> window.location="./";</script>';
  } else {
    $sentencia2= ("INSERT INTO informacion(nestado, categoria, prioridad, respuesta, ID_ticket, usuario_id) VALUES ('$estado','$categoria','$prioridad', '$respuesta', '$ticket', '$carnet')");
    $query = mysqli_query($conectar, $sentencia2);
    echo '<script>alert("Se ha enviado la respuesta.");</script>';
    echo '<script type="text/javascript"> window.location="./";</script>';
  }
}
?>