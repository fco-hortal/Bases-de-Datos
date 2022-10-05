<?php
include('../templates/header.html');
$id = $_POST["id"];
$name = $_POST["name"];
?>

<body>
  </br>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="../index.php">DATABASE OP</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor02">
      <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="main_miperfil.php">Mi Perfil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="main_navieras.php">Navieras</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="main_puertos.php">Puertos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="main_buscador_rut.php">Buscador</a>
      </li>
    </div>
  </nav>

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX-->

  <div class="card pl-3 pr-3 pt-4 pb-3"s>
    <span class="border border-primary">
      <h5 class="card-header"><?php echo "Capacidad de instalaciones del puerto: $name";?></h5>
      <div class="card-body">
        <form action="Capacidad_Consulta.php" method="post">
          <div class="form-group">
            <label>Selecciones una fecha de inicio:</label>
            <input type="date" id="birthday" class="form-control" name="fecha1">
          </div>
          <div class="form-group">
            <label>Selecciones una fecha de término:</label>
            <input type="date" id="birthday" class="form-control" name="fecha2">
          </div>
          <input type="hidden" class="form-control" name="id" value=<?php echo "$id"; ?>>
          <input type="hidden" class="form-control" name="name" value=<?php echo "$name"; ?>>
          <button type="input" class="btn btn-primary">Ver ocupación de instalaciones</button>
        </form>
      </div>
    </span>
  </div>

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX-->
  <br>

</body>
</html>
