<?php

class Conexion {

    private $dsn = 'pgsql:host=localhost;port=5432;dbname=proyecto_senasoft';
    private $usuario = 'postgres';
    private $contraseña = 'Dana123';
    private $conexion;

    // Método para obtener la conexión
    public function get_conexion() {
        try {
            // Crear una instancia de PDO
            $this->conexion = new PDO($this->dsn, $this->usuario, $this->contraseña);

            // Establecer el modo de error de PDO a excepciones
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $this->conexion;  // Devolver la conexión para que pueda ser usada
        } catch (PDOException $e) {
            // Capturar y mostrar el error
            echo 'Error en la conexión: ' . $e->getMessage();
            return null;  // Retornar null en caso de error
        }
    }

}

?>

