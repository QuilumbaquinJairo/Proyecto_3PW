<!DOCTYPE html>
<html>
<head>
    <title>Modificar Productos</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/estilo1.css">
     <link rel="stylesheet" href="../css/estilo2.css">
    <link rel="icon" type="image/png" href="../img/image.png"/>
  </head>
  <body>
  <div id="sideNavigation" class="sidenav navbar">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <div>
          <center><img src="../img/MUEBLESONLIBNE.png" alt="Logo" style="width: 150px; margin-left: 20px;"></center>
      </div>
      <div class="navcontainer">
          <a href="../html/inicio.html">Inicio</a>

          <div class="dropdown__content">
              <div class="sub_drop">
                  <button class="dropbtn">Componentes</button>
                  <img src="../img/down.svg" class="dropdown__arrow">
                  <input type="checkbox" class="dropdown__check">
              </div>
              <ul class="dropdown__sub">

                  <li class="dropdown__li">
                      <a href="../html/mPrima.html" class="dropdown__anchor">Agregar Componente</a>
                  </li>
                  <li class="dropdown__li">
                      <a href="../html/productos.html" class="dropdown__anchor">Ver Componentes</a>
                  </li>
                  <li class="dropdown__li">
                      <a href="../php/obtenerTabla.php" class="dropdown__anchor">Editar Componentes</a>
                  </li>

              </ul>

          </div>

          <div class="dropdown__content">
              <div class="sub_drop">
                  <button class="dropbtn">Proveedores</button>
                  <img src="../img/down.svg" class="dropdown__arrow">
                  <input type="checkbox" class="dropdown__check">
              </div>
              <ul class="dropdown__sub">

                  <li class="dropdown__li">
                      <a href="../html/proveedores.html" class="dropdown__anchor">Agregar Proveedor</a>
                  </li>
                  <li class="dropdown__li">
                      <a href="../html/verproveedores.html" class="dropdown__anchor">Ver Proveedores</a>
                  </li>
                  <li class="dropdown__li">
                      <a href="../php/modificar_p.php" class="dropdown__anchor">Editar Proveedores</a>
                  </li>

              </ul>

          </div>


          <a href="../html/recetas.html">Productos</a>
          <a href="../php/oProduccion.php">Ordenes de Produccion</a>
      </div>
  </div>
  <nav class="topnav">
      <a href="#" onclick="openNav()">
          <svg width="30" height="30" id="icoOpen">
              <path d="M0,5 30,5" stroke="#000" stroke-width="5"/>
              <path d="M0,14 30,14" stroke="#000" stroke-width="5"/>
              <path d="M0,23 30,23" stroke="#000" stroke-width="5"/>
          </svg>
      </a>
      <div class="titulo-menu">
          <h1>TusMueblesOnline</h1>
      </div>
      <div>
          <br>
          <button type="submit" class="button-3" onclick="logout()">Salir</button>
      </div>
  </nav>
<br>

  <br>

  <?php
  //Conexión a la base de datos
  $db = new PDO("mysql:host=localhost;dbname=materiaprima", "admin", "admin");

  //Consulta para obtener los productos
  $query = "SELECT * FROM productos";
  $result = $db->query($query);

  //Imprimir los resultados en una tabla
  echo "<table class='tabla'>";
  echo "<tr><th>ID</th><th>Nombre</th><th>Cantidad</th><th>Descripcion</th><th>Fabricante</th><th>Fecha de elaboracion</th><th> </th><th> </th></tr>";
  while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    echo "<td>".$row['id']."</td>";
    echo "<td>".$row['nombre']."</td>";
    echo "<td>".$row['cantidad']."</td>";
    echo "<td>".$row['descripcion']."</td>";
    echo "<td>".$row['proveedor']."</td>";
    echo "<td>".$row['fecha_elaboracion']."</td>";
    echo "<td><a href='editar.php?id=".$row['id']."'>Editar</a></td>";
    echo "<td><a href='eliminar.php?id=".$row['id']."'>Eliminar</a></td>";
    echo "</tr>";
  }
  echo "</table>";

  //Cerrar la conexión a la base de datos
  $db = null;
  ?>
  
  
    <footer id="pie">
        
    </footer>
    <script src="../js/menu-desplegable.js"></script>
    <script src="../js/profile.js"></script>
    <script src="../js/logout.js"></script>
</body>
</html>