<?php
//VARIABLES PARA ENVIAR DATOS 
$problema=(isset($_POST['problema']))?$_POST['problema']:"";
$descripcion=(isset($_POST['descripcion']))?$_POST['descripcion']:"";
$fecha=(isset($_POST['date']))?$_POST['date']:"";
$id=(isset($_POST['id']))?$_POST['id']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";
$error=array();
include ("../conexion/conexion.php");


switch($accion){
  case 'abrir':

    if($problema=="" ){
        $error['problema']="Escribe el problema";
    }
    if($descripcion=="" ){
        $error['descripcion']="Escribe la descripcion";
    }
    if($fecha=="" ){
        $error['date']="Escribe la fecha";
    }
    if($id=="" ){
      $error['id']="Escribe el carné";
    }

    $sentencia= ("INSERT INTO ticket(titulo, descripcion, creado, id_usuario) VALUES ('$problema','$descripcion','$fecha', '$id')");
    $query = mysqli_query($conectar, $sentencia);
    echo  "<script>window.alert('Ticket enviado');</script>";
    echo '<script type="text/javascript"> window.location="./";</script>';
  break; 
}
?>