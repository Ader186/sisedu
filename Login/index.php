<?php
session_start();
if(isset($_SESSION['S_IDUSUARIO'])){
	header('Location: ../vista/index.php');
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>login</title>
    <link rel="stylesheet" href="login.css" />
    <link rel="stylesheet" type="text/css" href="css/plantilla.css">
</style>
</head>
<body>
  

      <fieldset>
        <div class="user-wrapper">
        <center><img src="vendor/images.png" width="80px" height="80px" alt=""></center>
          <div><br>
          <legend>Iniciar Sesi&oacute;n</legend>
          <p>sistema de gesti&oacute;n académico</p>
          <div class="loader" hidden>
            <img src="vendor/abc.gif" alt="" style="width: 50px;height:50px;">
          </div>
          <div id="incorecto" class="alert alert-danger sm" role="alert" hidden>
            contraseña/usurio no coisiden!
          </div>
          <div id="notif" class="alert alert-danger " role="alert" hidden>
            su cuenta esta inactivo!
          </div>
          <div id="llenecamp" class="alert alert-danger" role="alert" hidden>
            Llene los campos vacios!
          </div>
          <div id="conteoincorecto" class="alert alert-info" role="alert" hidden>
            Contantarse con el administrador!
          </div>
          <input type="text" name="email" placeholder="Usuario" autofocus id="txt_usu" autocomplete="null">
          <input type="password" name="contra" placeholder="password" id="txt_con">
          <select class="js-example-basic-single" name="state" id="cbm_rol" >
            <option value="" style="background-color:#81DAF5;"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;seleccione</b></option>
            <option value="ADMINISTRADOR">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ADMINISTRADOR</option>
            <option value="DOCENTE">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DOCENTE</option>
            <option value="ALUMNO">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ALUMNO</option>
          </select>
          <br>
          <input type="submit" name="login"  id="idbotonloging" value="INGRESAR" onclick="VerificarUsuario()" >

        </div>
      </fieldset>

  
 

	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="../Plantilla/plugins/select2/select2.min.js"></script>
<!--=================================================================-->
	<script src="../js/usuario.js"></script>



   <script>
txt_usu.focus();
// $('.js-example-basic-single').select2();
</script>

</body>

</html>