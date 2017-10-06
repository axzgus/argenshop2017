<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registrarse</title>
    <link href="reset.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
    <link rel="stylesheet" href="estilo_reg.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  </head>
  <body>
    <div class="cuerpo">


      <!-- *************************HEADER**************************** -->
          <?php include 'header.php'; ?>

          <!-- *******************FIN HEADER********************************* -->


<!-- ********************************* FORM ************************************* -->

<?php
         $name = null;
     $lastname = null;
      $username = null;
       $email = null;
       $phone = null;

       require_once("validacion.php");
 ?>

    <div class="Formulario">

        <form class="form-registro" action="registrarse.php" method="post" enctype="multipart/form-data">
            <h2 class="form-titulo">Crear una cuenta</h2>
            <div class="contenedor-input">
                <input type="text" name="name" placeholder="Nombre"
                value="<?php echo $name ?>"
                class="input-48" >


              <input type="text" name="lastname" placeholder="Apellido"
               value="<?php echo $lastname ?>"
                class="input-48" >

                <input type="email" name="email" placeholder="Correo"
                value="<?php echo $email ?>"
                 class="input-100" >

                <input type="text" name="username" placeholder="Usuario"
                value="<?php echo $username ?>"
                class="input-48" >

                <input
                type="file"
                name="profile_pic"
                id="profile_pic"
                class="input-48"
                placeholder="Foto de Perfil">


                <input type="text" name="phone" placeholder="Telefono"
                value="<?php echo $phone ?>"
                class="input-100" >

                <input type="password" name="password" placeholder="Clave"class="input-48" >

                <input type="submit" value="Registrar" class="boton-enviar">

                <p class="form-link">Ya tienes una cuenta? <a href="#">Ingresar</a></p>

            </div>
        </form>

        <p><?php if(isset($errores['name'])) echo $errores['name1']; ?></p>
        <p><?php if(isset($errores['name2'])) echo $errores['name2']; ?></p>

        <p><?php if(isset($errores['lastname1'])) echo $errores['lastname1']; ?></p>
        <p><?php if(isset($errores['lastname2'])) echo $errores['lastname2']; ?></p>

        <p><?php if(isset($errores['username1'])) echo $errores['username1']; ?></p>
        <p><?php if(isset($errores['username2'])) echo $errores['username2']; ?></p>

        <p><?php if(isset($errores['email1'])) echo $errores['email1']; ?></p>

        <p><?php if(isset($errores['pass1'])) echo $errores['pass1']; ?></p>
        <p><?php if(isset($errores['pass2'])) echo $errores['pass2']; ?></p>


        <p><?php if(isset($errores['phone1'])) echo $errores['phone1']; ?></p>


        <p><?php if(isset($errores['photo_error1'])) echo $errores['photo_error1']; ?></p>
        <p><?php if(isset($errores['photo_error2'])) echo $errores['photo_error2']; ?></p>

    </div>

<!-- ********************************* FROM ************************************* -->

<!-- ************************************FOOTER**************************** -->

      <?php include 'footer.php'; ?>

      <!-- ************************fin footer******************** -->
    </div>
  </body>
</html>
