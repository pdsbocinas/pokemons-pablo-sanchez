<?php
  include('./helpers/conexion.php');
  $conn = getConexion();
  if (isset($_POST["ingreso"])) {

    $email = $_POST["email"];
    $contrasenia = $_POST["password"];  
    $query = $conn->query("select * from Usuario where email = '$email' and contraseña = '$contrasenia'");
    $usuario = mysqli_fetch_assoc($query);

    $emailResult = $usuario['email'];
    $contraseniaResult = $usuario['contraseña'];
    $rol = $usuario['rol'];

    if (is_null($emailResult) || is_null($contraseniaResult)) {
      echo "<p>Usuario invalido</p>";
    }

    if (($emailResult == $email) and ($contraseniaResult == $contrasenia)) {
      session_start();
      $_SESSION['usuario'] = $email;
      $_SESSION['rol'] = $rol;
      header("location:index.php");
    } else {
      echo "<p>El Usuario no existe, <a href='index.php'>Vuelva a intentarlo</a></p>";
    }
  } else {
    header("location:index.php");
  }
?>