<?php
      $id=(isset($_POST['id']))?$_POST['id']:"";
      $pass=(isset($_POST['pass']))?$_POST['pass']:"";
      $carnet=(isset($_POST['carnet']))?$_POST['carnet']:"";
      $nombre=(isset($_POST['nombre']))?$_POST['nombre']:"";
      $apellido=(isset($_POST['apellido']))?$_POST['apellido']:"";
      $correo=(isset($_POST['correo']))?$_POST['correo']:"";
      $contra=(isset($_POST['contra']))?$_POST['contra']:"";
      $accion=(isset($_POST['accion']))?$_POST['accion']:"";
      $error=array();
      include ("conexion/conexion.php");
      
      switch($accion){
        case 'unete':
          
        //validación lado del servidor
        if($carnet=="" ){
            $error['carnet']="Escribe el carné";
        }
        if($nombre=="" ){
            $error['nombre']="Escribe el nombre";
        }
        if($apellido=="" ){
            $error['apellido']="Escribe el apellido";
        }
        if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
            $error['correo']="Escribe el correo";
        }
        if($contra=="" ){
          $error['contra']="Escribe la contraseña";
        }
        //fin de la validación del servidor 
        $sentencia1=("SELECT Id FROM heroku_d69d189ad4903c0.usuario where Id='$carnet';");
        $query = mysqli_query($conectar, $sentencia1);
        if (mysqli_num_rows($query)>0) {
          echo "<script>window.alert('Ya existe un registro con esos datos.');</script>";
          echo '<script type="text/javascript"> window.location="../";</script>';
      } else {
        $sentencia= ("INSERT INTO usuario(id, nombre, apellido, correo, contra) VALUES ('$carnet','$nombre','$apellido','$correo', '$contra')");
        $query = mysqli_query($conectar, $sentencia);
        echo "<script>window.alert('Registro guardado correctamente');</script>";
        echo '<script type="text/javascript"> window.location="../";</script>';
      }
        break;

        case 'entrar':

            if($id=="" ){
                $error['id']="Escribe el carné";
            }
            if($pass=="" ){
                $error['pass']="Escribe la contraseña";
            }
          //Inicio de sesion 
          $query = mysqli_query($conectar, "SELECT * FROM usuario WHERE id = '$id' and contra='$pass'");
          $nr= mysqli_num_rows($query);

          if($nr==1){
            echo '<script type="text/javascript"> window.location="../Soporte/mis-tickets/";</script>';
          }else{
            echo "<script>window.alert('Credenciales inválidos');</script>";
          }
          break;
        }
    ?>