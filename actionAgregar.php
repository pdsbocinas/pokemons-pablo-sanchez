<?php
  include('./helpers/conexion.php');
  $conn = getConexion();
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  if(isset($_POST['guardar'])) {
    $nombre = $_POST['nombre'];
    $habilidad = $_POST['habilidad'];
    $habilidad_oculta = $_POST['habilidad_oculta'];
    $tipo = (int)$_POST['tipo'];
    $genero = (int)$_POST['genero'];
    $generacion = (int)$_POST['generacion'];
    // $imagen = $_POST['imagen'];
    $imagen = $_FILES['fileToUpload']["name"];

    if($imagen !== false) {
        echo "File is an image - " . $imagen["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    //var_dump($nombre, $habilidad, $habilidad_oculta, $tipo, $genero, $generacion);die();
    $sqlInsert ="insert into Pokemon (nombre, tipo_id, genero_id, habilidad, habilidad_oculta, generacion_id, imagen) values('$nombre','$tipo','$genero','$habilidad', '$habilidad_oculta', '$generacion', '$imagen')";  

    $query = $conn->query($sqlInsert);
    if($query) {
      header("location:index.php");
    } else {
      echo "<p>no se guardo correctamente, <a href='agregar.php'>vuelva a intentarlo</a></p>";
    }
  }
?>