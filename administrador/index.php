<?php require '../sesiones/sesion_Admin.php'; ?>
<!DOCTYPE html>
<html lang="es" >
<head>
  <meta charset="UTF-8">
  <title>SOPORTE</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<!-- partial:index.partial.html -->
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="main.css"><link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap" rel="stylesheet">
  </head>
  <body>

    <!-- CREAR CUENTA -->
    <div class="main">
      <div class="container a-container" id="a-container">
        <form class="form" id="a-form" action="" method="POST">
          <h2 class="form_title title">Iniciar sesión</h2>
          <h3 class="description">¡Bienvenido!</h3>
          <p>Por favor, ingresa tus credenciales</p>
          <span class="form__span">Usuario</span>
          <input class="form__input <?php echo (isset($error['id']))?'is-invalid':"";?>" name="id" type="text" required value="<?php echo $user; ?>" placeholder="Ingresa tu usuario">

          <span class="form__span">Contraseña</span>
          <input class="form__input <?php echo (isset($error['id']))?'is-invalid':"";?>" name="pass" type="password" required value="<?php echo $pass; ?>" placeholder="Ingresa tu contraseña">

          <button class="button" type="submit" name="accion" value="entrar">Entrar</button>
          <button class="button" type="button" onclick="return regresar();" name="atras" value="atras">Regresar</button>
        </form>
      </div>

       <!-- Cambiar entre ventanas -->
      <div class="switch" id="switch-cnt">
        <div class="switch__circle"></div>
        <div class="switch__circle switch__circle--t"></div>
        <div class="switch__container" id="switch-c1">
          <h2 class="switch__title title">Administrador</h2>
        </div>
        
      </div>
    </div>
    <script src="../js/main.js"></script>
  </body>
</html>
<!-- partial -->
  <script  src="../js/script.js"></script>
  <script>
        function regresar(){
          window.location="../";
        }
    </script>
</body>
</html>
