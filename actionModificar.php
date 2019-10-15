<?php
  include('./helpers/conexion.php');
  $conn = getConexion();
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  $id = (int)$_POST['id'];
  $nombre = $_POST['nombre'];
  $habilidad = $_POST['habilidad'];
  $habilidad_oculta = $_POST['habilidad_oculta'];
  $imagen = $_FILES['fileToUpload']["name"];
  $tipo = $_POST['tipo'];
  $generacion = $_POST['generacion'];
  $genero = $_POST['genero'];
  
  if($imagen !== false) {
      echo "File is an image - " . $imagen["mime"] . ".";
      $uploadOk = 1;
  } else {
      echo "File is not an image.";
      $uploadOk = 0;
  }
  
  $sql = "update Pokemon set nombre='$nombre',imagen='$imagen',genero_id='$genero', tipo_id='$tipo', habilidad='$habilidad',
  habilidad_oculta='$habilidad_oculta', generacion_id='$generacion' where id='$id'";
  
  $query = $conn->query($sql);

  if($query) {
    header("location:index.php");
  } else {
    echo "<p>no se actualizo correctamente, <a href='modificar.php'>vuelva a intentarlo</a></p>";
  }
?>