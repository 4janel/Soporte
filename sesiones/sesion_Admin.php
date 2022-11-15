<?php
 $accion=(isset($_POST['accion']))?$_POST['accion']:"";
 $error=array();
 $user=(isset($_POST['id']))?$_POST['id']:"";
 $pass=(isset($_POST['pass']))?$_POST['pass']:"";

switch($accion){
  case 'entrar':
      if($user == "adminUVG" && $pass == "2022"){
          echo '<script type="text/javascript"> window.location="../administrador/dashboard";</script>';
      }else{
        echo '<script>alert("Credenciales inválidos");</script>';
      }
  break;
    }
?>