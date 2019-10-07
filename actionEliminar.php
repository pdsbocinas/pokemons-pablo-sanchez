<?php
  include('./helpers/conexion.php');
  $conn = getConexion();
  $id = $_POST['id'];
  if(isset($_POST['eliminar'])) {
    $sql="delete from Pokemon where id='$id'";
    $query = $conn->query($sql);
    if ($query) {
      header("location:index.php");
    } else {
      echo "<p>no se borro correctamente, <a href='index.php'>vuelva a intentarlo</a></p>";
    }
  }
?>