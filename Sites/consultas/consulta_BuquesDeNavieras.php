<?php
  require("../config/conexion1.php");
  #En caso de ser necesario se crean variables desde inputs en index ---------------------EDITAR-->
  #$id = $_POST["nombre_var1"];

  #Se construye la consulta SQL como un string--------------------------------------------EDITAR-->
  $query = "
  SELECT nombre, patente, pais, tipo FROM buques WHERE buques.nid = $id;
  ";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
  $result = $db -> prepare($query);
  $result -> execute();
  $resultados = $result -> fetchAll();
  ?>

  <!-- Se crea tabla -->
  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Patente</th>
        <th scope="col">País</th>
        <th scope="col">Tipo</th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach ($resultados as $r) {
          echo "<tr>
          <td>$r[0]</td>
          <td>$r[1]</td>
          <td>$r[2]</td>
          <td>$r[3]</td>
          </tr>";
      }
      ?>
    </tbody>
  </table>
