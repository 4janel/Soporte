<?php 
require './envioticket.php'; ?>  
<!DOCTYPE html>
<html lang="es" >
<head>
  <meta charset="UTF-8">
  <title>Ticket</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/style.css">
  <script src="../js/jquery.js"></script>    
  <script src="../js/popper.min.js"></script> 
  <link rel="stylesheet" type="text/css" href="main.css"><link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap">
      <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</head>
<body>
<!-- partial:index.partial.html -->
<div class="main container py-5">
  <div class="row">
    <div class="form col border-right">
    <h1 class="form_title title">¿Tienes problemas?</h1>
    <p>Si tienes algún problema, pulsa el botón:</p>
    <form action="" method="POST" enctype="multipart/form-data" class="was-validated">
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo ticket</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <input type="hidden" required name="txtid"  value="<?php echo $txtid; ?>" placeholder="" id="txtid"><br>
                    <div class="form-group col-md-6">
                    <span class="form__span">Problema</span>
                    <input class="form__input" type="text" class="form-control <?php echo (isset($error['problema']))?'is-invalid':"";?>" required value="<?php echo $problema; ?>" name="problema" placeholder="Ingresa el problema">
                        <div class="invalid-feedback">
                            <?php echo (isset($error['problema']))?$error['problema']:"";?>
                        </div>

                    </div>
                    <div class="form-group col-md-6">
                    <span class="form__span">Descripción</span>
                    <textarea class="form__input" type="text" class="form-control <?php echo (isset($error['descripcion']))?'is-invalid':"";?>" rows="10" required value="<?php echo $descripcion; ?>" name="descripcion" placeholder="Ingresa la descripción del problema"></textarea>
                        <div class="invalid-feedback">
                            <?php echo (isset($error['descripcion']))?$error['descripcion']:""; ?>

                        </div>
                    </div>
                    <div class="form-group col-md-6">
                    <span class="form__span">Fecha</span>
                    <input class="form__input" type="date" class="form-control <?php echo (isset($error['date']))?'is-invalid':"";?>" name="date" required value="<?php echo $fecha; ?>" placeholder="Ingresa la fecha de creación">
                        <div class="invalid-feedback">
                            <?php echo (isset($error['date']))?$error['date']:""; ?>

                        </div>
                    </div>

                    <div class="form-group col-md-12">
                    <span class="form__span">Carné</span><br>
                    <input class="form__input" type="text"class="form-control <?php echo (isset($error['id']))?'is-invalid':"";?>" name="id" required value="<?php echo $id; ?>" placeholder="Ingresa tu carné">
                        <div class="invalid-feedback">
                            <?php echo (isset($error['id']))?$error['id']:""; ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">    
                <button class="button" type="submit" name="accion" value="abrir">Enviar</button>                         
            </div>
            </div>
        </div>
        </div>
              <!-- Button trigger modal -->
              <button type="button" class="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Nuevo ticket</button>
      </form>
    </div>
    <div class="col">
      <h3 class="d-block">Problemas más frecuentes</h3>
      <div class="body">
        <a href="#" class="px-2 py-1 list-group-item list-group-item-action">
          <strong class="description">No puedo ingresar al portal UVG.</strong><br>
          <small class="span">Verificar que su contraseña sea actual.</small>
        </a>
        <a href="#" class="px-2 py-1 list-group-item list-group-item-action">
          <strong class="description">No puedo ingresar a los servicio de UVG.</strong><br>
          <small class="span">Revisar si los servicio se encuentran en funcionamiento o en mantenimiento.</small>
        </a>
        <a href="#" class="px-2 py-1 list-group-item list-group-item-action">
          <strong class="description">No puedo ingresar a las computadoras del laboratorio.</strong><br>
          <small class="span">Verificar si esta ingresando con sus correo institucional</small>
          <br>
          <br>
        </a>
      </div>

      <form action="" method="POST">
        <div class="form">
          <div class="form-group">
            <h2 class="form_title title">Consulta tus tickets</h2>
            <span class="form__span">Carné</span><br>
            <input class="form__input" type="text"class="form-control <?php echo (isset($error['carnet']))?'is-invalid':"";?>" name="carnet" required value="<?php echo $id; ?>" placeholder="Ingresa tu carné">
            <br><button class="button" name="ticket">Consultar</button>
            <button class="button-cancel" onclick="return regresar();" name="atras">Cerrar sesión</button><br>
            <br>
          </div>
          <table class="table table-borderless datatable">
                    <thead class="table-dark">
                      <tr>
                        <th scope="col">Carné</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Respuesta</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php    //CONSULTA DE DATOS 
                    $consulta=(isset($_POST['carnet']))?$_POST['carnet']:"";
                    if (isset($_POST["ticket"])){
                      $sentencia= ("SELECT ticket.id_usuario as Carnet,ticket.titulo,ticket.descripcion,informacion.respuesta
                      FROM ticket
                      left JOIN informacion
                      on ticket.id_usuario=informacion.usuario_id and ticket.Idticket=informacion.ID_ticket where ticket.id_usuario=$consulta");
                      $listaempleados = mysqli_query($conectar, $sentencia);
                      foreach ($listaempleados as $registro){?>
                        <tr class="bg-light">
                            <td><?php echo $registro['Carnet']; ?></td>
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
<script>
        function regresar(){
          window.location="../";
        }
    </script>
    <script  src="./js/script.js"></script>
    <script src="./js/main.js"></script>
</body>
</html>
