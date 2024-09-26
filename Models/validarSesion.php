<?php

class ValidarSesion {

    public function iniciarSesion($tipo, $identificacion, $fechanac) {

        // Crear objeto de conexión
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        // Consulta SQL con parámetros
        $consulta = "SELECT * FROM gen_m_persona WHERE numeroid =:identificacion";

        $result = $conexion->prepare($consulta);


        $result->bindParam(':identificacion', $identificacion);

        // Ejecutar la consulta
        $result->execute();

        // Obtener el resultado de la consulta
        $f = $result->fetch(PDO::FETCH_ASSOC);

        // Verificar si se encontró el registro
        if ($f) {
            // Validar el tipo de identificación
            if ($f['id_tipoid'] == $tipo) {
                // Validar la fecha de nacimiento
                if ($f['fechanac'] == $fechanac) {
                    // Iniciar la sesión
                    session_start();
                    // Crear variables de sesión
                    $_SESSION['id'] = $f['id'];
                    $_SESSION['aut'] = "SI";

                    // Redirigir al home de bienvenida
                    echo "<script>alert('Ha ingresado con éxito. Bienvenido');</script>";
                    echo "<script>location.href='../Views/paciente/paciente.php';</script>";
                } else {
                    // Error en la fecha de nacimiento
                    echo "<script>alert('La fecha de nacimiento ingresada es incorrecta. Vuelva a ingresar.');</script>";
                    echo "<script>location.href='../Views/extras/login.php';</script>";
                }
            } else {
                // Error en el tipo de documento
                echo "<script>alert('Los datos no coinciden');</script>";
                echo "<script>location.href='../Views/extras/login.php';</script>";
            }
        } else {
            // No se encuentra en la base de datos
            echo "<script>alert('No se encuentra en el sistema. Verifique que haya escrito correctamente su número de identificación.');</script>";
            echo "<script>location.href='../Views/extras/login.php';</script>";
        }
    }
}
?>
