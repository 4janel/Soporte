<?php require 'sesiones/sesion_User.php'; ?>  
<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
  <link href="https://res.cloudinary.com/webuvg/image/upload/f_auto,q_auto,w_164,c_scale,fl_lossy,dpr_2.63/f_auto,q_auto,fl_lossy,c_scale,w_200/v1641328051/WEB/Nosotros/Imagen%20Institucional/Logotipo%20UVG/Logo%20UVG%20Altiplano/logo-uvg.altiplano-cuadrado-verde.jpg" rel="icon">
    <link href="https://res.cloudinary.com/webuvg/image/upload/f_auto,q_auto,w_164,c_scale,fl_lossy,dpr_2.63/f_auto,q_auto,fl_lossy,c_scale,w_200/v1641328051/WEB/Nosotros/Imagen%20Institucional/Logotipo%20UVG/Logo%20UVG%20Altiplano/logo-uvg.altiplano-cuadrado-verde.jpg" rel="apple-touch-icon">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
  <meta charset="utf-8">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" type="text/css" href="main.css"><link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap">
  <title>SOPORTE</title>
  </head>
  <body>

    <!-- CREAR CUENTA -->
    <div class="main">
      <div class="container a-container" id="a-container">
        <form class="form" id="a-form" action="" method="POST">
          <h2 class="form_title title">Únete</h2>
          <p>Regístrate a continuación</p>
          
          <span class="form__span">Carné</span>
          <input class="form__input <?php echo (isset($error['carnet']))?'is-invalid':"";?>" type="text"  name="carnet" required value="<?php echo $carnet; ?>" placeholder="Ingresa tu carné">
          <div class="invalid-feedback">
            <?php echo (isset($error['carnet']))?$error['carnet']:"";?>
          </div>

          <span class="form__span">Nombre</span>
          <input class="form__input <?php echo (isset($error['nombre']))?'is-invalid':"";?>" type="text" name="nombre" required value="<?php echo $nombre; ?>" placeholder="Ingresa tu nombre">
          <div class="invalid-feedback">
            <?php echo (isset($error['nombre']))?$error['carnet']:"";?>
          </div>

          <span class="form__span">Apellido</span>
          <input class="form__input <?php echo (isset($error['apellido']))?'is-invalid':"";?>" type="text" name="apellido" required value="<?php echo $apellido; ?>" placeholder="Ingresa tu apellido">
          <div class="invalid-feedback">
            <?php echo (isset($error['apellido']))?$error['carnet']:"";?>
          </div>

          <span class="form__span">Correo electrónico</span>
          <input class="form__input <?php echo (isset($error['correo']))?'is-invalid':"";?>" type="email" name="correo" required value="<?php echo $correo; ?>" placeholder="Ingresa tu correo">
          <div class="invalid-feedback">
            <?php echo (isset($error['contra']))?$error['carnet']:"";?>
          </div>

          <span class="form__span">Contraseña</span>
          <input class="form__input <?php echo (isset($error['contra']))?'is-invalid':"";?>" type="password" name="contra" required value="<?php echo $contra; ?>" placeholder="Ingresa una contraseña">
          <div class="invalid-feedback">
            <?php echo (isset($error['carnet']))?$error['carnet']:"";?>
          </div>

          <button class="button" type="submit" name="accion" value="unete">Crear Cuenta</button>
        </form>
      </div>

      <!-- INICIAR SESSION -->
      <div class="container b-container" id="b-container">
        <form class="form" id="b-form"  action="" method="POST">
          <h2 class="form_title title">Iniciar sesion</h2>
          <p>Por favor, ingresa tus credenciales</p>
          <span class="form__span">Carné</span>
          <input class="form__input <?php echo (isset($error['id']))?'is-invalid':"";?>" type="text" name="id" required value="<?php echo $id; ?>"  placeholder="Ingresa tu carné">

          <span class="form__span">Contraseña</span>
          <input class="form__input <?php echo (isset($error['pass']))?'is-invalid':"";?>" type="password" name="pass" required value="<?php echo $pass; ?>" placeholder="Ingresa una contraseña">

          <button class="button" type="submit" name="accion" value="entrar">Entrar</button>
        </form>
      </div>

       <!-- Cambiar entre ventanas -->
      <div class="switch" id="switch-cnt">
        <div class="switch__circle"></div>
        <div class="switch__circle switch__circle--t"></div>
        <div class="switch__container" id="switch-c1">
          <h2 class="switch__title title">¡Bienvenido!</h2>
          <h3 class="description">¿Ya tienes una cuenta?</h3>
        
          <button class="switch__button button switch-btn">Iniciar sesión</button>
          <br>
          
          <a href="./administrador">ADMINISTRADOR</a>
        </div>


        <div class="switch__container is-hidden" id="switch-c2">
          <h2 class="switch__title title">¡Hola!</h2>
          <h3 class="description">Si no tienes una cuenta ¡Créala!</h3>
          <button class="switch__button button switch-btn">Crear cuenta</button>
        </div>
        
      </div>
    </div>
    <script src="./js/main.js"></script>
  </body>
</html>
<!-- partial -->
  <script  src="./js/script.js"></script>
</body>
</html>
