<?php
  echo 
  "<div class='col-sm'>
    <div class='card mb-3' style='width: 18rem;'>
      <img src='./upload/". $fila['imagen'] ."' class='card-img-top' width='100%' height='auto' />
      <div class='card-body'>
        <h2 class='card-title'>" .$fila['nombre']. "</h2>
        <strong>Habilidad: </strong>
        <span>" .$fila['habilidad']. "</span><br>
        <strong>Habilidad Oculta: </strong>
        <span>" .$fila['habilidad_oculta']. "</span><br>
        <strong>Generacion: </strong>
        <span>" .$fila['generacion']. "</span><br>
        <strong>Genero: </strong>
        <span>" .$fila['genero']. "</span><br>
        <div class='d-block mb-2'> 
          <strong>Tipo: </strong>
          <span>" .$fila['tipo']. "</span>
        </div>";
        if(isset($_SESSION["rol"])) {
          echo 
          "<div class='row'>
            <form class='col' action='modificar.php' method='POST'>
              <input class='w-100' type='hidden' name='id' value=" .$fila['id']. " />
              <button type='submit' class='btn btn-primary' name='editar'>Editar</button>
            </form>
            <form class='col' action='actionEliminar.php' method='POST'>
              <input class='w-100' type='hidden' name='id' value=" .$fila['id']. " />
              <button type='submit' class='btn btn-danger' name='eliminar'>Eliminar</button>
            </form>
          </div>";
        }
  echo "
      </div>
    </div>
  </div>";
?>