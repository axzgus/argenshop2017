<?php
if ($_POST){
 //not EmptyIterator
 //at least 6 characters ldap_control_paged_result
 $errores = array();

 //start validation

 // $name = null;
 if (isset($_POST['name'])) {
   $name = $_POST['name'];
 }

 // $lastname = null;
 if (isset($_POST['lastname'])) {
   $lastname = $_POST['lastname'];
 }

 // $username = null;
 if (isset($_POST['username'])) {
   $username = $_POST['username'];
 }

 /////////// chequeo si el nombre de usuario ya existe

 // $email = null;
 if (isset($_POST['email'])) {
   $email = $_POST['email'];
 }

  /////////// chequeo si el mail ya existe

 // $phone = null;
 if (isset($_POST['phone'])) {
   $phone = $_POST['phone'];
 }



 if(empty($_POST['name']))
 { $errores['name']="Debes completar tu nombre";}
 elseif(strlen($_POST['name'])<2)
 { $errores['name']="Tu nombre debe tener al menos dos caracteres";}

 if(empty($_POST['lastname']))
 { $errores['lastname']="Debes completar tu apellido";}
 elseif(strlen($_POST['lastname'])<2)
 { $errores['lastname']="Tu apellido debe tener al menos dos caracteres";}

 if(empty($_POST['username']))
 { $errores['username']="Debes completar tu nombre de usuario";}
 elseif(strlen($_POST['username'])<6)
 { $errores['username']="Tu nombre de usuario debe tener al menos seis caracteres";}

 if(empty($_POST['email']))
 { $errores['email']="Debes completar tu correo electronico";}

 if(empty($_POST['phone']))
 { $errores['phone']="Debes completar tu telefono";}

 if(empty($_POST['password']))
 { $errores['pass']="Debes completar tu contraseña";}
 elseif(strlen($_POST['password'])<6)
 { $errores['pass']="Tu contraseña debe tener al menos seis caracteres";}



//verificacion de imagen

$errors_file = [
  "1" => "la foto de perfil excede el tamaño permitido",
  "2" => "la foto de perfil excede el tamaño permitido en el front",
  "3" => "la foto de perfil fue solo subida parcialmente",
  "4" => "la foto de perfil es requerida",
  "6" => "falta la carpeta temporal",
  "7" => "no se pudo escribir fichero en el disco, verificar permisos",
  "8" => "otra aplicacion a detenido la subida del archivo"
];

function savePhoto($photo, $errores) {
    global $errors_file;

    if  ($_FILES[$photo]["error"] == UPLOAD_ERR_OK){

      $pic_name = $_FILES[$photo]["name"];
      $picture = $_FILES[$photo]["tmp_name"];
      $ext= pathinfo($pic_name, PATHINFO_EXTENSION);

      if ( $ext == "jpg" || $ext == "jpeg" || $ext == "png"  ) {

        // $today = new DateTime("now");
        // $name_pic = date_format($today, "YmdHis")."_profile";

        $name_pic = $_POST["username"]."_profile";
        $path_and_name = dirname(__FILE__) . "/imagenes/usuario/" . $name_pic . "." .$ext;

        move_uploaded_file($picture, $path_and_name);

      } else {
        $errores["imagen"] = "El tipo de archivo no es valido (JPG,JPEG,PNG)";
      }
    }else{
      // return $errores['photo_error']= $errors_file[$photo["profile_pic"]["error"]];
      $errores["imagen"] = $errors_file[$_FILES["profile_pic"]["error"]];
    }

    return $errores;
}


 //check errors
 if(count($errores)==0){

   $errores = savePhoto("profile_pic", $errores);

   if(count($errores)==0){
     //save data in JSON
     $pic_name = $_FILES["profile_pic"]["name"];
     $ext= pathinfo($pic_name, PATHINFO_EXTENSION);
     $name_pic = "imagenes/usuario/".$_POST["username"]."_profile.$ext";

      $nuevo_usuario = array(
        'Nombre' =>($_POST['name']) ,
        'Apellido' => ($_POST['lastname']),
        'Nombre de usuario' =>($_POST['username']) ,
        'Email' => ($_POST['email']),
        'Telefono' => ($_POST['phone']),
        'Contrasenia' => (password_hash($_POST['password'], PASSWORD_DEFAULT)),
        'Foto perfil' => $name_pic
     );

     $json_user = json_encode($nuevo_usuario);
     $json_user = $json_user.PHP_EOL;

     $guardar_datos = fopen('usuarios.json','a');
     fwrite($guardar_datos,$json_user);
     fclose($guardar_datos);

     //redirect to success page
      header("location: success.php");
    }


 }



} ?>
