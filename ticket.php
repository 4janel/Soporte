<!-- PHP -->
<?php
            //Inicio de sesion 
            $carnet=(isset($_POST['carnet']))?$_POST['carnet']:"";
            $problema=(isset($_POST['problema']))?$_POST['problema']:"";
            $descripcion=(isset($_POST['descripcion']))?$_POST['descripcion']:"";
            $fecha=(isset($_POST['date']))?$_POST['date']:"";
            $id=(isset($_POST['id']))?$_POST['id']:"";

            //VERIFICAR SI NO ESTAN VACIOS   
            include ("conexion/conexion.php");

            if (isset($_POST["abrir"])){
              $sentencia= ("INSERT INTO ticket(Idticket, titulo, descripcion, creado, id_usuario) VALUES ('$carnet','$problema','$descripcion','$fecha', '$id')");
              $query = mysqli_query($conectar, $sentencia);
              echo '<div class="alert alert-success">REGISTRO INGRESADO</div>';
            }

            if (isset($_POST["cerrar"])){
                echo '<script type="text/javascript"> window.location="index.php";</script>';
              }
?>




<!DOCTYPE html>
<html lang="es" >
<head>
  <meta charset="UTF-8">
  <title>Ticket</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css'>

</head>
<body>
<!-- partial:index.partial.html -->
<div class="container py-5">
  <div class="row">
    <div class="col border-right">
      <p class="lead">Nuevo Ticket</p>
      
      <form action="" method="POST">      

        <div class="form-group">
          <label for="">No Ticket</label>
          <input type="text" class="form-control" name="carnet" placeholder="Ingrese el numero de su ticket">
        </div>
        <div class="form-group">
          <label for="">Problema</label>
          <input type="text" class="form-control" name="problema" placeholder="Ingrese su problema">
        </div>
        <div class="form-group">
          <label for="">Descripción</label>
          <textarea type="text" rows="7" class="form-control" name="descripcion" placeholder="Ingrese la descripción del problema"></textarea>
        </div>
        <div class="form-group">
          <label for="">Fecha</label>
          <input type="date" class="form-control" name="date" placeholder="Ingrese la fecha de creación">
        </div>
        <div class="form-group">
          <label for="">Carnet</label>
          <input type="text" class="form-control" name="id" placeholder="Ingrese el numero de su carnet">
        </div>
        

            
        <div class="form-group d-flex align-items-center">
          <button class="btn btn-success mx-1" type="submit" name="abrir">Abrir Ticket</button>
          <button class="btn btn-success mx-1">Consulta Ticket</button>
        </div>
      </form>
    </div>

    <form action="" method="POST">

    <div class="col">
      <p class="lead">Problemas mas frecuentes</p>
      <div class="list-group list-group-flush">
        <a href="#" class="px-2 py-1 list-group-item list-group-item-action">
          <strong class="d-block">No puedo ingresar al portal UVG.</strong>
          <small>Verificar que su contraseña sea actual.</small>
        </a>
        <a href="#" class="px-2 py-1 list-group-item list-group-item-action">
          <strong class="d-block">No puedo ingresar a los servicio de UVG.</strong>
          <small class="text-muted">Revisar si los servicio se encuentran en funcionamiento o en mantenimiento.</small>
        </a>
        <a href="#" class="px-2 py-1 list-group-item list-group-item-action">
          <strong class="d-block">No puedo ingresar a las computadoras del laboratorio.</strong>
          <small class="text-muted">Verificar si esta ingresando con sus correo institucional</small>
          <br>
          <br>
          <center><button class="btn btn-danger mx-1" name="cerrar" type="submit">Cerrar sesión</button></center>
        </a>
      </div>
    </div>
  </div>
  
    </form>

  
  
</div>
</body>
</html>
