<?php include('../templates/header.html');   ?>

<body>
<?php
  require("../config/conexion2.php");

  #En caso de ser necesario se crean variables desde inputs en index ---------------------EDITAR-->
  $var1 = $_POST["nombre_var1"];

  #Se construye la consulta SQL como un string--------------------------------------------EDITAR-->
  $query = "
  SELECT XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX;
  ";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
  $result = $db -> prepare($query);
  $result -> execute();
  $resultados = $result -> fetchAll();
  ?>

  <!-- Se crea tabla -->
  <table>
    <tr>
      <!-- Se crea columnas de tabla -----------------------------------------------------EDITAR-->
      <th>TITULO COLUMNA 1</th>
      <th>TITULO COLUMNA 2</th>
    </tr>
  
      <?php
        #Se itera echo en tabla para mostrar resultados segun las columnas de la tabla ---EDITAR-->
        foreach ($resultados as $r) {
          echo "<tr>
          <td>$r[0]</td>
          <td>$r[1]</td>
          </tr>";
      }
      ?>
      
  </table>

<?php include('../templates/footer.html'); ?>
