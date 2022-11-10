<!-- PHP -->
<?php
//VARIABLES PARA ENVIAR DATOS 
$problema=(isset($_POST['problema']))?$_POST['problema']:"";
$descripcion=(isset($_POST['descripcion']))?$_POST['descripcion']:"";
$fecha=(isset($_POST['date']))?$_POST['date']:"";
$id=(isset($_POST['id']))?$_POST['id']:"";


//ENVIAR DATOS    
include ("conexion/conexion.php");

if (isset($_POST["abrir"])){
  $sentencia= ("INSERT INTO ticket(titulo, descripcion, creado, id_usuario) VALUES ('$problema','$descripcion','$fecha', '$id')");
  $query = mysqli_query($conectar, $sentencia);
  echo '<div class="alert alert-success">REGISTRO INGRESADO</div>';
}

//CERRAR SESION  
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
          <center><button class="btn btn-success mx-1" type="submit" name="abrir">Abrir Ticket</button></center>
          <center><button class="btn btn-danger mx-1" name="cerrar" type="submit">Cerrar sesión</button></center>
        </div>

      </form>
    </div>

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

        </a>
      </div>

      <form action="" method="POST">
        <div class="form-group">
          <div class="form-group">
            <p class="lead">Consulta tus tickets</p>
            <label for="">Carnet</label>
            <input type="text" class="form-control" name="carnet" placeholder="Ingrese el numero de su carnet">
            <br>
            <center><button class="btn btn-info mx-1" name="ticket">Consultar Tickets</button></center>
          </div>
          <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Respuesta</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php    //CONSULTA DE DATOS 
                    $consulta=(isset($_POST['carnet']))?$_POST['carnet']:"";

                    if (isset($_POST["ticket"])){
                      $sentencia= ("SELECT Id,titulo,descripcion,respuesta  FROM usuario,ticket,informacion WHERE Id=$consulta and usuario.Id=ticket.id_usuario and  usuario.Id=informacion.usuario_id and ticket.Idticket=informacion.ID_ticket");
                      $listaempleados = mysqli_query($conectar, $sentencia);
                      foreach ($listaempleados as $registro){?>
                        <tr class="bg-light">
                            <td><?php echo $registro['Id']; ?></td>
                            <td><?php echo $registro['titulo']; ?></td>  
                            <td><?php echo $registro['descripcion']; ?></td> 
                            <td><?php echo $registro['respuesta']; ?></td>
                        </tr>
                        <?php }; 
                    }
                    ?>
                    </tbody>
                  </table>
        </div>
      </form>

    </div>
  </div>
</div>
</body>
</html>
