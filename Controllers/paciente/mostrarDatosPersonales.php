<?php

session_start(); // Asegúrate de que la sesión esté iniciada

require_once('../../Models/consultasPaciente.php');

function cargarDatosPersonales() {

    // Extraer el ID de la sesión
    if (isset($_SESSION['id'])) {
        $id = $_SESSION['id']; // Variable de sesión que contiene el ID del usuario
    } else {
        // Si no hay sesión, redirigir al login o mostrar un mensaje
        echo "<h2>No se ha iniciado sesión.</h2>";
        echo "<script>location.href='../Views/login.html';</script>";
        return; // Detener la ejecución si no hay sesión
    }

    // Consultar los datos del paciente con el ID de sesión
    $objConsultas = new ConsultasPaciente();
    $result = $objConsultas->consultarDatosPaciente($id);

    if (!isset($result) || empty($result)) {
        // Si no hay resultados
        echo "<h2>No hay datos registrados</h2>";
    } else {
        // Mostrar los datos obtenidos
        foreach ($result as $f) {
            echo '
            <div class="col-lg-6">
              <div class="card bienvenida">
                <h3>Bienvid@ al portal</h3>
              <h5>Siempre es un placer tenerte de vuelta</h5>
              <br>
              <img src="../assets/img/user-profile.jpg" alt="">
              </div>
            </div>
            
        <div class="col-lg-6">
          <div class="row">
            <div class="col-lg-6">
              <div class="card datosPerfil dp">
                <h5 class="card-title">Tipo de identificación</h5>
                
                <p>'.$f['tipoid_nombre'].'</p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="card datosPerfil dp">
                <h5 class="card-title">Número de identificación</h5>
                <p>'.$f['numeroid'].'</p>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-6">
              <div class="card datosPerfil dp">
                <h5 class="card-title">Nombre completos</h5>
                <p>'.$f['nombre1'].' '.$f['nombre2'].' '.$f['apellido1'].' '.$f['apellido2'].'</p>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="card datosPerfil dp">
                <h5 class="card-title">Sexo de nacimiento</h5>
                <p>'.$f['sexobiologico_nombre'].'</p>
            </div>
          </div>

            <div class="row">
              <div class="col-lg-6">
                <div class="card datosPerfil dp">
                  <h5 class="card-title">Fecha de nacimiento </h5>
                  <p>'.$f['fechanac'].'</p>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="card datosPerfil dp">
                  <h5 class="card-title">Direccion de residencia</h5>
                  <p>'.$f['direccion'].'</p>
                </div>
              </div>
            </div>
            </div>
            ';
        }
    }
}

function cargarDatosPersonalesUl() {

  // Extraer el ID de la sesión
  if (isset($_SESSION['id'])) {
      $id = $_SESSION['id']; // Variable de sesión que contiene el ID del usuario
  } else {
      // Si no hay sesión, redirigir al login o mostrar un mensaje
      echo "<h2>No se ha iniciado sesión.</h2>";
      echo "<script>location.href='../Views/login.html';</script>";
      return; // Detener la ejecución si no hay sesión
  }

  // Consultar los datos del paciente con el ID de sesión
  $objConsultas = new ConsultasPaciente();
  $result = $objConsultas->consultarDatosPaciente($id);

  if (!isset($result) || empty($result)) {
      // Si no hay resultados
      echo "<h2>No hay datos registrados</h2>";
  } else {
      // Mostrar los datos obtenidos
      foreach ($result as $f) {
          echo '
          <div class="col-lg-6">
            <div class="card dp">
                <h5 class="card-title"> Número de celular</h5>
                <p>'.$f['tel_movil'].'</p>
            </div>

          </div>

          <div class="col-lg-6">

            <div class="card dp">
                <h5 class="card-title">Correo Electrónico</h5>
                <p>'.$f['email'].'</p>
            </div>
          ';
      }
  }
}