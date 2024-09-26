<?php

require_once('../../Models/conexion.php');
require_once('../../Models/consultasExternas.php');

$objConsultas = new consultasPaciente();

$tipos = $objConsultas->consultasTipos();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Inicio de sesión</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/resultado.png" rel="icon">
  <link href="../assets/img/resultado.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
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

  <main id="login">
    <div class="container">

      <section class="section min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-start">
            <div class="col-lg-5 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <!-- Logo -->
              <!-- Fin Logo -->

              <!-- Tarjeta inicio de sesión -->
              <div class="card mb-3">
                <div class="d-flex justify-content-center ">
                  <a href="index.html" class="logo d-flex align-items-center w-auto">
                    <img src="../assets/img/logo.png" alt="">
                  </a>
                </div>
                <div class="card-body">
                  <div class="pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Inicia sesión en el portal</h5>
                  </div>
                  <!-- Formulario inicio de sesión -->
                  <form action="../../Controllers/iniciarSesion.php" class="row g-3 needs-validation" method="post" novalidate>

                    <!-- Campo tipo de documento -->
                    <div class="col-12">
                      <label for="tipoDocumento" class="form-label">Tipo de documento</label>
                      <div class="input-group has-validation">
                          <select class="form-select" id="tipo" name="tipo" >
                              <option value="" selected >Seleccione...</option>
                              <?php
                              foreach ($tipos as $tipo) {
                                  echo '<option value="' . $tipo['id'] . '">' . $tipo['abreviacion'] . ' - ' . $tipo['nombre'] . ' </option>';
                              }
                            
                              ?>
                          </select>
                        <div class="invalid-feedback">Selecciona un tipo de documento</div>
                      </div>
                    </div>

                    <!-- Campo numéro de documento -->
                    <div class="col-12">
                      <label for="identificacion" class="form-label">Número de documento</label>
                      <div class="input-group has-validation">
                        <input type="text" name="identificacion" class="form-control" id="identificacion" required placeholder="Ej: 10605844">
                        <div class="invalid-feedback">Ingrese su número de documento </div>
                      </div>
                    </div>

                    <!-- Campo fecha de nacimiento -->
                    <div class="col-12">
                      <label for="fechaNaci" class="form-label">Fecha de nacimiento</label>
                      <input type="date" name="fechanac" class="form-control" id="fechaNaci" required>
                      <div class="invalid-feedback">Ingresa su fecha de nacimiento</div>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Ingresar</button>
                    </div>
                  </form><!-- Fin Formulario inicio de sesión -->

                </div>
              </div>
              <!-- Creditos plantilla -->
              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
              </div>
            </div><!-- Fin tarjeta inicio de sesión -->
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>