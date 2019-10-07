<?php
  include('./helpers/conexion.php');
  $conn = getConexion();
  session_start();
  $keyword = $_GET['keyword'];
  $sql = 'select p.id, p.nombre, p.habilidad, p.imagen as imagen, p.habilidad_oculta, g.descripcion as generacion, t.descripcion as tipo, gen.descripcion as genero from Pokemon p
  join Tipo t on t.id = p.tipo_id
  join Generacion g on g.id = p.generacion_id
  join Genero gen on gen.id = p.genero_id';

  $q = "select p.id, p.nombre, p.habilidad, p.imagen as imagen, p.habilidad_oculta, g.descripcion as generacion, t.descripcion as tipo, gen.descripcion as genero from Pokemon p
  join Tipo t on t.id = p.tipo_id
  join Generacion g on g.id = p.generacion_id
  join Genero gen on gen.id = p.genero_id
  where p.nombre LIKE '%$keyword%' ";

  $getSearchPokemones = $conn->query($q);
  $getPokemones = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>Pokemones</title>
</head>
<body>  
  <main>
    <?php include('./includes/header.php'); ?>
    <div class="container">
      <h1 class="text-center mt-4">Busca un Pokemon</h1>
      <div class="row justify-content-md-center mt-2 mb-5">
        <form class="form-inline my-2 my-lg-0" method="GET">
          <input class="form-control mr-sm-2" type="text" value="" name="keyword" placeholder="Ingrese el nombre" />
          <button class="btn btn-light" type="submit">Buscar</button>
        </form>
      </div>
      <?php 
        if(isset($_GET['keyword'])) {
          echo
          "<button style='display: flex; align-items: center;' type='button' class='close' aria-label='Close'>
          <h2 class='m-0'>
            <span class='badge badge-primary'>" .$_GET['keyword']. "</span>
          </h2>
            <a href='index.php' aria-hidden='true'>&times;</a>
          </button>";
        }
      ?>
    </div>
    <div class="container">
      <div class="row">
        <?php 
          if (isset($_GET['keyword'])) {
            if ($getSearchPokemones->num_rows !== 0) {
              foreach ($getSearchPokemones as $fila) {
                include('./includes/card.php');
              }
            } else {
              echo "Pokemon no encontrado!";
            }
          } else {
            foreach ( $getPokemones as $fila ) {
              include('./includes/card.php');
            }
          }
        ?>
      </div>
    </div>
    <?php include('./includes/footer.php'); ?>
  </main>
</body>
</html>