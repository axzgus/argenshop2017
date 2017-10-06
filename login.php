<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="reset.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
    <link rel="stylesheet" href="estilo_reg.css">
    <link rel="stylesheet" href="css/estilo.css">
  </head>
  <body>
    <div class="cuerpo">


      <!-- *************************HEADER**************************** -->
          <?php include 'header.php'; ?>

          <!-- *******************FIN HEADER********************************* -->

<!-- ********************************* FORM ************************************* -->

    <div class="Formulario">

        <form class="form-registro" action="registrar.php" method="post">
            <h2 class="form-titulo">Ingresa al futuro</h2>
                <div class="contenedor-input">
                    <input type="text" name="nombre de usuario" placeholder="Nombre de usuario"class="input-100" required>
                    <input type="password" name="clave" placeholder="Contrasena"class="input-100" require>
                    <input type="submit" value="Entrar" class="boton-enviar">
                    <p class="form-link"> <a href="#">Olvidé mi maldita contraseña!</a></p>
                </div>
        </form>

    </div>
<!-- ********************************* FORM ************************************* -->


<!-- ************************************FOOTER**************************** -->

      <?php include 'footer.php'; ?>

      <!-- ************************fin footer******************** -->
    </div>
  </body>
</html>
