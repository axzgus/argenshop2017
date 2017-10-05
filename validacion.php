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
   $email = $_POST['phone'];
 }



 if(empty($_POST['name']))
 { $errores['name1']="Debes completar tu nombre";}
 if(strlen($_POST['name'])<2)
 { $errores['name2']="Tu nombre debe tener al menos dos caracteres";}

 if(empty($_POST['lastname']))
 { $errores['lastname1']="Debes completar tu apellido";}
 if(strlen($_POST['lastname'])<2)
 { $errores['lastname2']="Tu apellido debe tener al menos dos caracteres";}

 if(empty($_POST['username']))
 { $errores['username1']="Debes completar tu nombre de usuario";}
 if(strlen($_POST['username'])<6)
 { $errores['username2']="Tu nombre de usuario debe tener al menos seis caracteres";}

 if(empty($_POST['email']))
 { $errores['email1']="Debes completar tu correo electronico";}

 if(empty($_POST['phone']))
 { $errores['phone1']="Debes completar tu telefono";}

 if(empty($_POST['password']))
 { $errores['pass1']="Debes completar tu contraseña";}
 if(strlen($_POST['password'])<6)
 { $errores['pass2']="Tu contraseña debe tener al menos seis caracteres";}



//verificacion de imagen

// $errors_file = [
// 1=> "la foto de perfil excede el tamaño permitido",
// 2=> "la foto de perfil excede el tamaño permitido en el front",
// 3=>"la foto de perfil fue solo subida parcialmente",
// 4=>"la foto de perfil es requerida",
// 6=>"falta la carpeta temporal",
// 7=>"no se pudo escribir fichero en el disco, verificar permisos",
// 8=>"otra aplicacion a detenido la subida del archivo"
// ];
//
// function savePhoto($photo) {
//       global $errors_file;
//
//     if  ($photo["profile_pic"]["error"] == 0){
//
//       $pic_name = $photo["profile_pic"]["name"];
//       $picture = $photo["profile_pic"]["temp_name"];
//       $ext= pathinfo($pic_name, PATHINFO_EXTENSION);
//
//   if ( $ext == "jpg" ||$ext == "jpeg" ||$ext == "png"  ) {
//
//     $today = new DateTime("now");
//     $name_pic = date_format($today, "YmdHis")."_profile";
//     $path_and_name = dirname(__FILE__)."/img/".$name_pic.$ext;
//     move_uploaded_file($picture,$path_and_name);
//     return $name_pic.".".$ext;
//
//   }else{
//
//   return [
//       $errores['photo_error1']="El tipo de archivo no es valido (JPG,JPEG,PNG)"
//             ];
//           }
//     }else{
//
//   return[ $errores['photo_error2']= $errors_file[$photo["profile_pic"]["error"]]; ]
//
//         }
// }


 //check errors
 if(count($errores)==0){

   //save data in JSON
    $nuevo_usuario = array(
      'Nombre' =>($_POST['name']) ,
      'Apellido' => ($_POST['lastname']),
      'Nombre de usuario' =>($_POST['username']) ,
      'Email' => ($_POST['email']),
      'Telefono' => ($_POST['phone']),
      'Contrasenia' => (password_hash($_POST['password'], PASSWORD_DEFAULT))
   );

   $json_user = json_encode($nuevo_usuario);
   $json_user = $json_user.PHP_EOL;

   $guardar_datos = fopen('usuarios.json','a');
   fwrite($guardar_datos,$json_user);
   fclose($guardar_datos);




   //redirect to success page
    header("location: success.php");
 }



} ?>
