<?php
  session_start();
  if($_SESSION["rol"] !== 'admin') {
    header("location:index.php");
  }
  include('./helpers/conexion.php');
  $conn = getConexion();
  $queryTipo = 'select * from Tipo';
  $queryGeneracion = 'select * from Generacion';
  $queryGenero = 'select * from Genero';
  $getTipo = $conn->query($queryTipo);
  $getGeneracion = $conn->query($queryGeneracion);
  $getGenero = $conn->query($queryGenero);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Pokemones</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
  <main>
    <?php include('./includes/header.php'); ?>
    <div class="container">
    <form action="actionAgregar.php" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" required id="nombre" name="nombre" aria-describedby="nombre" placeholder="Ingresa un Nombre">
      </div>
      <div class="form-group">
        <label for="habilidad">Habilidad</label>
        <input type="text" class="form-control" required name="habilidad" id="habilidad" placeholder="Habilidad">
      </div>
      <div class="form-group">
        <label for="habilidad">Habilidad Oculta</label>
        <input type="text" class="form-control" required name="habilidad_oculta" id="habilidad" placeholder="Habilidad Oculta">
      </div>
      <div class="form-group">
        <label for="imagen">Imagen:</label>
        <input type="file" id="fileToUpload" class="form-control" required name="fileToUpload" placeholder="imagen">
      </div>
      <div class="form-group">
        <label for="tipo">Tipo:</label>
        <select class="form-control" required id="tipo" name="tipo">
          <?php 
            foreach ( $getTipo as $fila ) {
              echo "<option value=".$fila['id'].">" . $fila['descripcion'] . "</option>";
            }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label for="tipo">Generacion:</label>
        <select class="form-control" required id="tipo" name="generacion">
          <?php 
            foreach ( $getGeneracion as $fila ) {
              echo "<option value=" . $fila['id'] . ">" . $fila['descripcion'] . "</option>";
            }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label for="tipo">Genero:</label>
        <select class="form-control" required id="tipo" name="genero">
          <?php 
            foreach ( $getGenero as $fila ) {
              echo "<option value=" . $fila['id'] . ">" . $fila['descripcion'] . "</option>";
            }
          ?>
        </select>
      </div>
      <button type="submit" name="guardar" class="btn btn-primary">Guardar</button>
    </form>
    </div>
    <?php include('./includes/footer.php'); ?>
  </main>
</body>
</html>