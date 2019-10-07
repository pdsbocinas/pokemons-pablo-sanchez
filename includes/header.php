<?php
  echo 
    "<header class='navbar navbar-expand-lg navbar-light bg-light'>
      <div class='container'>
        <div class='row'>";
          if (isset($_SESSION['usuario'])) {
            echo
            "
            <p class='col'> Bienvenido: " . $_SESSION["rol"] ." " . $_SESSION["usuario"] . "</p>
            <form class='col' action='actionLogout.php' method='POST'>
              <button type='submit' name='cerrar' class='btn btn-link'>Cerrar</button>
            </form>";
            if(isset($_SESSION['rol'])) {
              echo 
              "<a href='agregar.php' name='ingreso' class='btn btn-outline-success my-2 my-sm-0 align-self-center'>Agregar un pokemon</a>";
            }
          } else {
            echo 
            "<form class='form-inline my-2 my-lg-0' action='login.php' method='POST'>
              <div class='form-group'>
                <input class='form-control mr-sm-2' type='text' name='email' required class='form-control' placeholder='email'>
                <input class='form-control mr-sm-2' type='text' name='password' required class='form-control' placeholder='contraseña'>
              </div>
              <button type='submit' name='ingreso' class='btn btn-outline-success my-2 my-sm-0'>Entrar</button>
            </form>";
          }
      echo
      "</div>
    </div>
  </header>";
?>