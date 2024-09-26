<?php

// Incluir la clase de conexión y validación
require_once("../Models/conexion.php");
require_once("../Models/validarSesion.php");


        // Capturar y limpiar los datos del formulario
        $tipo = trim($_POST['tipo']);
        $identificacion = trim($_POST['identificacion']);
        $fechanac = trim($_POST['fechanac']);

        // Verificar que ninguno de los campos esté vacío
        if (!empty($tipo) && !empty($identificacion) && !empty($fechanac)) {

            // Formatear la fecha de nacimiento al formato YYYY-MM-DD si es necesario
            $fechanac = date('Y-m-d', strtotime($fechanac));

            // Crear un objeto de ValidarSesion
            $objvalidar = new ValidarSesion();

            // Ejecutar la validación de sesión
            $result = $objvalidar->iniciarSesion($tipo, $identificacion, $fechanac);

        } else {
            // Si algún campo está vacío, mostrar un mensaje de error
            echo "<script>alert('Por favor, complete todos los campos.');</script>";
            echo "<script>location.href='../Views/login.php';</script>";
        }


?>

