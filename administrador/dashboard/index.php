<?php require 'respuesta.php'?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta charset="utf-8">

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tickets UVG</title>
  <link href="https://res.cloudinary.com/webuvg/image/upload/f_auto,q_auto,w_164,c_scale,fl_lossy,dpr_2.63/f_auto,q_auto,fl_lossy,c_scale,w_200/v1641328051/WEB/Nosotros/Imagen%20Institucional/Logotipo%20UVG/Logo%20UVG%20Altiplano/logo-uvg.altiplano-cuadrado-verde.jpg" rel="icon">
    <link href="https://res.cloudinary.com/webuvg/image/upload/f_auto,q_auto,w_164,c_scale,fl_lossy,dpr_2.63/f_auto,q_auto,fl_lossy,c_scale,w_200/v1641328051/WEB/Nosotros/Imagen%20Institucional/Logotipo%20UVG/Logo%20UVG%20Altiplano/logo-uvg.altiplano-cuadrado-verde.jpg" rel="apple-touch-icon">
  <link rel="stylesheet" href="../../css/bootstrap.min.css">
  <link rel="stylesheet" href="../../css/style.css">
  <link rel="stylesheet" href="../../css/scroll.css">
  <script src="../../js/jquery.js"></script>    
  <script src="../../js/popper.min.js"></script> 

  <link rel="stylesheet" type="text/css" href="main.css"><link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap">
      <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!--Vendor CSS-->
  <link href="../../css/bootstrap.min.css" rel="stylesheet">
  <link href="../../css/dashbord.css" rel="stylesheet">
</head>

<body>
  <!-- ======= Encabezado ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <a href="./" class="logo d-flex align-items-center">
        <span class="d-none d-lg-block">Tickets UVG</span>
      </a>
    </div>
  </header>
                              <!-- FORMS -->
<div class="main">

<div class="form_title title" >
      <h1>Panel de administración</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="description title"><a href="../../">Cerrar sesión</a></li>
        </ol>
      </nav>
    </div>
<!-- Tablas -->
  <h5 class="card-title">Tickets</h5>
  <div style="   height: 80%; overflow-y: auto; overflow-x: scroll;">

  <table class="table table-hover table-responsive-lg" >
  <caption>Lista de tickets</caption>
    <thead class="thead-light">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre</th>
        <th scope="col">Correo</th>
        <th scope="col">Titulo</th>
        <th scope="col">Descripción</th>
        <th scope="col">Fecha creación</th>
        <th scope="col">ID Ticket</th>
        <th scope="col">Respuesta</th>
      </tr>
    </thead>
    <tbody>
    <?php    //CONSULTA DE DATOS 
                      $sentencia= ("SELECT usuario.Id as Carnet, usuario.nombre as Nombre, usuario.apellido as Apellido, usuario.correo ,ticket.titulo as Titulo, ticket.descripcion as Descripcion, ticket.creado as Creado, ticket.Idticket, informacion.respuesta
                      FROM usuario
                      left JOIN ticket On usuario.Id=ticket.id_usuario
                      left JOIN informacion On usuario.Id=informacion.usuario_id and ticket.Idticket = informacion.ID_ticket");
                      $listaempleados = mysqli_query($conectar, $sentencia);
                      foreach ($listaempleados as $registro){?>
                        <tr class="bg-light">
                            <td><?php echo $registro['Carnet']; ?></td>
                            <td><?php echo $registro['Nombre']; ?> <br> <?php echo $registro['Apellido'];?></td>  
                            <td><?php echo $registro['correo']; ?></td> 
                            <td><?php echo $registro['Titulo']; ?></td>
                            <td><?php echo $registro['Descripcion']; ?></td>
                            <td><?php echo $registro['Creado']; ?></td>
                            <td><?php echo $registro['Idticket']; ?></td>
                            <td><?php echo $registro['respuesta']; ?></td>
                        </tr>
                        <?php }; 
                    ?>
    </tbody>
  </table>

  </div>
</div>
  


  <div class="switch switch__container" >
  <!-- General Form Elements -->
  <form class="form" action="" method="POST" enctype="multipart/form-data">
  <h2 class="form_title title">Respuesta tickets</h2>

    <div class="row mb-3">
    <span class="form__span">Estado</span>
      <div class="col-sm-10">
      <select class="form__input" aria-label="Default select example" name="estado">
        <option selected>Estado</option>
        <option value="Abierto">Abierto</option>
        <option value="Cerrado">Cerrado</option>
    </select>
      </div>
    </div>


    <div class="row mb-3">
    <span class="form__span">Categoría</span>
      <div class="col-sm-10">
      <select class="form__input" aria-label="Default select example" name="categoria">
        <option selected>Categoria</option>
        <option value="Soporte técnico">Soporte técnico</option>
        <option value="Ayuda">Ayuda</option>
    </select>
      </div>
    </div>

    <div class="row mb-3">
    <span class="form__span">Prioridad</span>
      <div class="col-sm-10">
      <select class="form__input" aria-label="Default select example" name="prioridad">
        <option selected>Prioridad</option>
        <option value="Alta">Alta</option>
        <option value="Baja">Baja</option>
    </select>
      </div>
    </div>

    <div class="row mb-3">
    <span class="form__span">Respuesta</span>
      <div class="col-sm-10">
        <textarea class="form__input <?php echo (isset($error['respuesta']))?'is-invalid':"";?>" type="text"  name="respuesta" required value="<?php echo $respuesta; ?>" placeholder="Ingresa una respuesta"></textarea>
      </div>
    </div>
    <div class="row mb-3">
    <span class="form__span">ID Ticket</span>
      <div class="col-sm-10">
      <input class="form__input <?php echo (isset($error['ticket']))?'is-invalid':"";?>" type="text"  name="ticket" required value="<?php echo $ticket; ?>" placeholder="Ingresa el ID del ticket">
      </div>
    </div>
    <div class="row mb-3">
    <span class="form__span">Carné</span>
      <div class="col-sm-10">
      <input class="form__input <?php echo (isset($error['carnet']))?'is-invalid':"";?>" type="text"  name="carnet" required value="<?php echo $carnet; ?>" placeholder="Ingresa el carné">
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-sm-10">
        <button type="submit" class="button" name="enviar">Responder</button>
      </div>
    </div>
  </form><!-- End General Form Elements -->
  </div>
  <!-- JS archivo -->
  <script src="../../js/main.js"></script>
  <!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
  <script src='https://unpkg.com/popper.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js'></script>

</body>

</html>
