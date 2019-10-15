<?php
  session_start();
  if($_SESSION["rol"] !== 'admin') {
    header("location:index.php");
  }
  include('./helpers/conexion.php');
  $conn = getConexion();
  $id = (int)$_POST['id'];
  $queryTipo = 'select * from Tipo';
  $queryGeneracion = 'select * from Generacion';
  $queryGenero = 'select * from Genero';
  $queryItem = "select p.id, t.id as tipo_id, g.id as generacion_id, gen.id as genero_id, p.nombre, p.habilidad, p.imagen as imagen, p.habilidad_oculta, g.descripcion as generacion, t.descripcion as tipo, gen.descripcion as genero from Pokemon p
  join Tipo t on t.id = p.tipo_id
  join Generacion g on g.id = p.generacion_id
  join Genero gen on gen.id = p.genero_id
  where p.id = '$id'";
  $getTipo = $conn->query($queryTipo);
  $getGeneracion = $conn->query($queryGeneracion);
  $getGenero = $conn->query($queryGenero);
  $getPokemon = $conn->query($queryItem);
  $pokemon = mysqli_fetch_assoc($getPokemon);
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
    <form action="actionModificar.php" method="POST" enctype="multipart/form-data">
      <input type='hidden' name='id' value="<?php echo $id ?>" />
      <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" value="<?php echo $pokemon['nombre'] ?>" required id="nombre" name="nombre" aria-describedby="nombre" placeholder="Ingresa un Nombre">
      </div>
      <div class="form-group">
        <label for="habilidad">Habilidad</label>
        <input type="text" class="form-control" value="<?php echo $pokemon['habilidad'] ?>" required name="habilidad" id="habilidad" placeholder="Habilidad">
      </div>
      <div class="form-group">
        <label for="habilidad">Habilidad Oculta</label>
        <input type="text" class="form-control" value="<?php echo $pokemon['habilidad_oculta'] ?>" required name="habilidad_oculta" id="habilidad" placeholder="Habilidad Oculta">
      </div>
      <div class="form-group">
        <label for="imagen">Imagen:</label>
        <input type="file" id="fileToUpload" class="form-control" value="<?php echo $pokemon['imagen'] ?>" required name="fileToUpload" placeholder="imagen">
      </div>
      <div class="form-group">
        <label for="tipo">Tipo:</label>
        <select class="form-control" required id="tipo" name="tipo">
          <option value="<?php echo $pokemon['tipo_id'] ?>" selected><?php echo $pokemon['tipo'] ?></option>
          <?php 
            foreach ( $getTipo as $fila ) {
              echo 
              "<option value=".$fila['id'].">" . $fila['descripcion'] . "</option>";
            }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label for="tipo">Generacion:</label>
        <select class="form-control" required id="tipo" name="generacion">
          <option value="<?php echo $pokemon['generacion_id'] ?>" selected><?php echo $pokemon['generacion'] ?></option>
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
          <option value="<?php echo $pokemon['genero_id'] ?>" selected><?php echo $pokemon['genero'] ?></option>
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