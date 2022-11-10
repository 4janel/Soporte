<?php   
include ("conexion/conexion.php");
$sentencia= ("SELECT Id,nombre,apellido,correo,titulo,descripcion,creado,Idticket FROM usuario,ticket WHERE usuario.Id=ticket.id_usuario");
$listaempleados = mysqli_query($conectar, $sentencia);


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

  </main>

  <!-- JS archivo -->
  <script src="js/main.js"></script>

</body>

</html>