<?php include('../templates/header.html');   ?>

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
        <a class="nav-link" href="main_puertos.php">Puertos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="main_buscador_rut.php">Buscador</a>
      </li>
    </div>
  </nav>

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX-->

  <div class="card pl-3 pr-3 pt-4 pb-3"s>
    <span class="border border-primary">
      <h5 class="card-header">Buscador de personal</h5>
      <div class="card-body">
        <form action="../consultas/consulta_buscador_rut.php" method="post">
          <div class="form-group">
            <label>Ingrese RUT:</label>
            <input type="text" class="form-control" name="id">
          </div>
          <button type="input" class="btn btn-primary">Buscar</button>
        </form>
      </div>
    </span>
  </div>
<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX-->

<br>

</body>

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX-->
  <br>

</body>
</html>
