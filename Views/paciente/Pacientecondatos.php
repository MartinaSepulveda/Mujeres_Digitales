<?php
require_once('../../Models/conexion.php');
require_once('../../Controllers/paciente/mostrarOrdenes.php');
require_once('../../Controllers/paciente/mostrarDetalleOrdenes.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard Paciente</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/resultado.png" rel="icon">
  <link href="../assets/img/resultado.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->

  <!-- CDN BOOTSTRAP -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- CDN BOOTSTRAP ICONOS-->
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <!-- CDN BOXICONS -->
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="../assets/img//resultado.png" alt="">
        <span class="d-none d-lg-block">ResulFast</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="../assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Kevin Anderson</h6>
              <span>Web Designer</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Barra al costado ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

      <!-- Item nav home -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="Paciente.html">
          <i class="bi bi-grid"></i>
          <span>Home</span>
        </a>
      </li><!-- Final del item nav home -->

      <!-- Item nav perfil -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="AdmiPerfil.html">
          <i class="bi bi-person"></i>
          <span>Perfil</span>
        </a>
      </li><!-- Final Item nav perfil  -->

      <li class="nav-item"></li>
        <a class="nav-link collapsed" href="index.html">
          <i class="bi bi-box-arrow-right"></i>
          <span>Cerrar Sesión</span>
        </a>
      </li><!-- End Cerrar sesion Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Ordenes de laboratorio</h1>
    </div>

    <section class="section">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4">
          <label for="ordenNum">Número de Orden:</label> <br>
          <input type="text" id="ordenNum" >
          <span id="limpiarOrden" style="cursor: pointer; display: none;">✖</span>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5">
          <label for="fechaInicio">Rango de fechas: </label> <br> 
          <input type="date" id="fechaInicio">
          <input type="date" id="fechaFin">
          <span id="limpiarFechas" style="cursor: pointer; display: none;">✖</span>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
          <label for="recordsPerPage">Registros por página:</label> <br> 
            <select id="recordsPerPage">
                <option value="5">5</option>
                <option value="10" selected>10</option>
            </select>
        </div>
      </div>
      <br>
      <hr>
      <div class="row card">
        <div class="col-lg-12">
          <table class="table">
            <thead>
                <tr>
                    <th>Fecha y hora de la orden</th>
                    <th>Documento de la orden</th>
                    <th>Número de la orden</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="dataBody">
                <!-- Los datos se llenarán dinámicamente -->
            </tbody>
        </table>

        <div id="pagination">
          <button id="prevButton" title="Anterior">
              <i class="bi bi-arrow-left"></i>
          </button>
          <span id="pageInfo"></span>
          <button id="nextButton" title="Siguiente">
              <i class="bi bi-arrow-right"></i>
          </button>
        </div>
      </div>
    </div>
    
    </section>

  </main><!-- End #main -->


  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

  <script>
    fetch('ruta/a/obtenerOrdenes.php') // Cambia a la ruta correcta
        .then(response => response.json())
        .then(data => {
            console.log(data); // Comprobar el contenido de data
            renderTable(data); // Llamar a tu función para renderizar la tabla
        })
        .catch(error => console.error('Error:', error));


  let currentPage = 1; // Página actual
  let recordsPerPage = 10; // Registros por página
  let sortAscending = false; // Orden ascendente o descendente

  // Función para renderizar la tabla
  function renderTable(filteredData) {
      const dataBody = document.getElementById('dataBody');
      dataBody.innerHTML = ''; // Limpiar el contenido previo

      const start = (currentPage - 1) * recordsPerPage; // Calcular el inicio
      const end = start + recordsPerPage; // Calcular el final

      // Agregar cada fila de datos
      filteredData.slice(start, end).forEach(item => {
          const row = document.createElement('tr');
          row.innerHTML = `
              <td>${item.date}</td>
              <td>${item.document}</td>
              <td>${item.ordenNum}</td>
              <td>
                  <a href="DetalleOrden.php?idOrden=${item.id}" class=".text-success-emphasis" title="Ver"><i class="bi bi-eye"></i></a>
              </td>
          `;

          dataBody.appendChild(row); // Agregar fila a la tabla
      });

      updatePagination(filteredData.length); // Actualizar la paginación
  }

  // Función para actualizar la paginación
  function updatePagination(totalRecords) {
      const pageInfo = document.getElementById('pageInfo');
      const totalPages = Math.ceil(totalRecords / recordsPerPage); // Calcular total de páginas

      pageInfo.textContent = `Página ${currentPage} de ${totalPages}`; // Mostrar información de la página

      document.getElementById('prevButton').disabled = currentPage === 1; // Deshabilitar botón "Anterior" si es la primera página
      document.getElementById('nextButton').disabled = currentPage === totalPages; // Deshabilitar botón "Siguiente" si es la última página
  }

  // Función para filtrar los datos
  function filterData() {
      const ordenNum = document.getElementById('ordenNum').value; // Obtener valor del campo "Número de orden"
      const fechaInicio = document.getElementById('fechaInicio').value; // Obtener valor de la fecha de inicio
      const fechaFin = document.getElementById('fechaFin').value; // Obtener valor de la fecha de fin

      const filteredData = data.filter(item => {
          const date = new Date(item.date); // Convertir la fecha del item a objeto Date
          const inDateRange = (!fechaInicio || date >= new Date(fechaInicio)) && (!fechaFin || date <= new Date(fechaFin)); // Comprobar rango de fechas
          const matchesordenNum = !ordenNum || item.ordenNum.includes(ordenNum); // Comprobar si coincide el número de orden
          return inDateRange && matchesordenNum; // Retornar verdadero si ambos filtros coinciden
      });

      // Renderizar tabla con datos filtrados y ordenados
      renderTable(filteredData.sort((a, b) => sortAscending ? new Date(a.date) - new Date(b.date) : new Date(b.date) - new Date(a.date)));
  }

  // Mostrar u ocultar la "X" según el contenido del input de número de orden
  document.getElementById('ordenNum').addEventListener('input', (event) => {
      const clearButton = document.getElementById('limpiarOrden');
      clearButton.style.display = event.target.value ? 'inline' : 'none'; // Mostrar "X" si hay valor
  });

  // Mostrar u ocultar la "X" de fechas según el contenido de los inputs
  function toggleDateClearButton() {
      const fechaInicio = document.getElementById('fechaInicio').value;
      const fechaFin = document.getElementById('fechaFin').value;
      const clearDateButton = document.getElementById('limpiarFechas');
      clearDateButton.style.display = (fechaInicio || fechaFin) ? 'inline' : 'none'; // Mostrar "X" si hay valor en al menos uno
  }

  // Función para limpiar todos los filtros
  function clearFilters() {
      document.getElementById('ordenNum').value = ''; // Limpiar número de orden
      document.getElementById('fechaInicio').value = ''; // Limpiar fecha de inicio
      document.getElementById('fechaFin').value = ''; // Limpiar fecha de fin
      currentPage = 1; // Resetear a la primera página
      filterData(); // Volver a cargar los datos sin filtros
      document.getElementById('limpiarOrden').style.display = 'none'; // Ocultar la "X"
      document.getElementById('limpiarFechas').style.display = 'none'; // Ocultar la "X" de fechas
  }

  // Función para limpiar filtros de fechas
  function limpiarFechas() {
      document.getElementById('fechaInicio').value = ''; // Limpiar fecha de inicio
      document.getElementById('fechaFin').value = ''; // Limpiar fecha de fin
      toggleDateClearButton(); // Ocultar la "X" de fechas
      currentPage = 1; // Resetear a la primera página
      filterData(); // Volver a cargar los datos sin filtros
  }

  // Event listeners para el rango de fechas
  document.getElementById('fechaInicio').addEventListener('input', () => {
      toggleDateClearButton(); // Mostrar u ocultar la "X"
  });

  document.getElementById('fechaFin').addEventListener('input', () => {
      toggleDateClearButton(); // Mostrar u ocultar la "X"
  });

  // Event listener para la "X" de fechas
  document.getElementById('limpiarFechas').addEventListener('click', limpiarFechas); // Limpiar filtros de fechas

  // Event listener para la "X" de número de orden
  document.getElementById('limpiarOrden').addEventListener('click', clearFilters); // Limpiar todos los filtros

  // Función para actualizar registros por página
  function updateRecordsPerPage() {
      recordsPerPage = parseInt(document.getElementById('recordsPerPage').value); // Obtener valor seleccionado
      currentPage = 1; // Resetear a la primera página al cambiar registros por página
      filterData(); // Filtrar los datos
  }

  // Event listeners para filtrar y actualizar registros por página
  document.getElementById('ordenNum').addEventListener('keypress', (event) => {
      if (event.key === 'Enter') {
          currentPage = 1; // Resetear a la primera página en un nuevo filtro
          filterData(); // Filtrar datos
      }
  });

  document.getElementById('fechaInicio').addEventListener('change', filterData); // Filtrar datos al cambiar fecha de inicio
  document.getElementById('fechaFin').addEventListener('change', filterData); // Filtrar datos al cambiar fecha de fin
  document.getElementById('recordsPerPage').addEventListener('change', updateRecordsPerPage); // Actualizar registros por página

  // Eventos para los botones de paginación
  document.getElementById('prevButton').addEventListener('click', () => {
      if (currentPage > 1) {
          currentPage--; // Reducir página actual
          filterData(); // Filtrar datos
      }
  });

  document.getElementById('nextButton').addEventListener('click', () => {
      currentPage++; // Aumentar página actual
      filterData(); // Filtrar datos
  });

  // Inicializar la tabla
  document.addEventListener('DOMContentLoaded', () => {
      sortAscending = false; // Asegurarse de que sea descendente
      renderTable(data.sort((a, b) => new Date(b.date) - new Date(a.date))); // Renderizar datos ordenados por fecha descendente
  });


  </script>

</body>

</html>