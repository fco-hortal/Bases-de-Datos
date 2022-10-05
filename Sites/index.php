<?php
session_start();
include('templates/header.html');
?>

<body>
  </br>
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4">GRUPO 133+72</h1>
      <p class="lead">Master Piece</p>
    </div>
  </div>

  <div class="mx-auto pl-5 pr-5 col-5">
    <div class="card text-center">
    <div class="card-header">
      <ul class="nav nav-pills card-header-pills justify-content-center">
        <li class="nav-item">
          <a class="nav-link active" href="#">Log in</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index_register.php">Sign in</a>
        </li>
      </ul>
    </div>
    <div class="card-body">
      <form action="inc/log_in-inc.php" action="main/main_miperfil" method="post">
        <div class="form-group">
          <label>Usuario</label>
          <input type="text" class="form-control" name="user">
        </div>
        <div class="form-group">
          <label>Contraseña</label>
          <input type="password" class="form-control" id="exampleInputPassword1" name="pass">
        </div>
        <button type="input" class="btn btn-primary">Ingresar</button>
      </form>
    </div>
  </div>
</div>
<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX-->

<br>

</body>
</html>
