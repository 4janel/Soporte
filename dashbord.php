<?php   
//Inicio de sesion 
$info=(isset($_POST['info']))?$_POST['info']:"";
$estado=(isset($_REQUEST['estado']))?$_REQUEST['estado']:"";
$categoria=(isset($_REQUEST['messi']))?$_REQUEST['messi']:"";
$prioridad=(isset($_REQUEST['prioridad']))?$_REQUEST['prioridad']:"";
$respuesta=(isset($_POST['respuesta']))?$_POST['respuesta']:"";
$ticket=(isset($_POST['ticket']))?$_POST['ticket']:"";
$carnet=(isset($_POST['carnet']))?$_POST['carnet']:"";



include ("conexion/conexion.php");
$sentencia= ("SELECT Id,nombre,apellido,correo,titulo,descripcion,creado,Idticket FROM usuario,ticket WHERE usuario.Id=ticket.id_usuario");
$listaempleados = mysqli_query($conectar, $sentencia);

if (isset($_POST["enviar"])){
  $sentencia= ("INSERT INTO informacion(Idinfo, nestado, categoria, prioridad, respuesta, ID_ticket, usuario_id) VALUES ('$info','$estado','$categoria','$prioridad', '$respuesta', '$ticket', '$carnet')");
  $query = mysqli_query($conectar, $sentencia);
  echo '<div class="alert alert-danger">REGISTRO INGRESADO</div>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta charset="utf-8">

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tickets UVG</title>

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!--Vendor CSS-->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/dashbord.css" rel="stylesheet">
</head>

<body>
  <!-- ======= Encabezado ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <span class="d-none d-lg-block">Tickets UVG</span>
      </a>
    </div>
  </header>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Panel de administración</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Cerrrar sesión</a></li>
        </ol>
      </nav>
    </div>

    <!-- Tablas -->
    <section class="section dashboard">
      <div class="row">

        <div class="col-lg-8">
          <div class="row">


            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="card-body">
                  <h5 class="card-title">Tickets</h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Fecha de envio</th>
                        <th scope="col">Id Ticket</th>
                        <th scope="col">Consulta</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($listaempleados as $registro){?>
                    <tr class="bg-light">
                        <td><?php echo $registro['Id']; ?></td>
                        <td><?php echo $registro['nombre']; ?><?php echo $registro['apellido']; ?></td>  
                        <td><?php echo $registro['correo']; ?></td>
                        <td><?php echo $registro['titulo']; ?></td>  
                        <td><?php echo $registro['descripcion']; ?></td> 
                        <td><?php echo $registro['creado']; ?></td>
                        <td><?php echo $registro['Idticket']; ?></td>

                        <td>
                        <form action="" method="POST">
                        <input value="Seleccionar" type="submit" class="btn btn-info"  name="accion">             
                        </td>

                    </tr>
                    <?php }; ?>
                    </tbody>
                  </table>
                </div>

              </div>
            </div>

        </div>

      </div>
    </section>

      <!-- FORMS -->
    <section class="section">
      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Respuesta tickets</h5>

              <!-- General Form Elements -->
              <form action="" method="POST" enctype="multipart/form-data">
                <div class="row mb-3">
                  <label for="inputText">No información</label>
                  <div class="col-sm-10">
                    <input type="text" name="info" id="info" class="form-control">
                  </div>
                </div>

                <label for="inputText">Estado</label>
                <select class="form-select" aria-label="Default select example" name="estado">
                    <option selected>Estado</option>
                    <option value="Abierto">Abierto</option>
                    <option value="Cerrado">Cerrado</option>
                </select>

                <label for="inputText">Categoria</label>
                <select class="form-select" aria-label="Default select example" name="messi">
                    <option selected>Categoria</option>
                    <option value="Soporte técnico">Soporte técnico</option>
                    <option value="Ayuda">Ayuda</option>
                </select>

                <label for="inputText">Prioridad</label>
                <select class="form-select" aria-label="Default select example" name="prioridad">
                    <option selected>Prioridad</option>
                    <option value="Alta">Alta</option>
                    <option value="Baja">Baja</option>
                </select>

                <div class="row mb-3">
                  <label for="inputNumber">Respuesta</label>
                  <div class="col-sm-10">
                    <textarea name="respuesta" id="respuesta" cols="30" rows="10" class="form-control"></textarea>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber">Id ticket</label>
                  <div class="col-sm-10">
                    <input name="ticket" id="ticket" class="form-control" type="text" id="formFile">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber">Carnet</label>
                  <div class="col-sm-10">
                    <input name="carnet" id="carnet" class="form-control" type="text" id="formFile">
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary" name="enviar">Enviar respuesta</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>
      </div>
    </section>
  </main>

  <!-- JS archivo -->
  <script src="js/main.js"></script>

</body>

</html>
