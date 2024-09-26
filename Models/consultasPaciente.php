<?php

Class ConsultasPaciente{

    public function consultarDatosPaciente($id)
    {
        if (!class_exists('Conexion')) {
            die('Error: La clase Conexion no fue encontrada.');
        }

        $objConexion = new Conexion();

        $conexion = $objConexion->get_conexion();

        $consultar = "SELECT p.id, p.numeroid, p.apellido1, p.apellido2, p.nombre1, p.nombre2, p.fechanac, p.direccion, p.tel_movil, p.email, l1.nombre AS tipoid_nombre, l2.nombre AS sexobiologico_nombre 
                        FROM gen_m_persona p
                        INNER JOIN gen_p_listaopcion l1 ON p.id_tipoid = l1.id 
                        INNER JOIN gen_p_listaopcion l2 ON p.id_sexobiologico = l2.id 
                        WHERE p.id = :id ";

        $result = $conexion->prepare($consultar);

        $result->bindParam(':id', $id);

        $result->execute();

        $f = null;

        while ($resultado = $result->fetch()) {
            $f[] = $resultado;
        }

        return $f;


    }

    public function consultarListaOrdenes($id)
    {
        if (!class_exists('Conexion')) {
            die('Error: La clase Conexion no fue encontrada.');
        }

        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $consultar = "SELECT o.id, o.id_documento, o.orden, o.fecha
                        FROM lab_m_orden o 
                        INNER JOIN fac_m_tarjetero t ON o.id_historia = t.id 
                        INNER JOIN gen_m_persona p ON t.id_persona = p.id
                        WHERE p.id = :id";

        $result = $conexion->prepare($consultar);
        $result->bindParam(':id', $id);
        $result->execute();

        $f = null;

        while ($resultado = $result->fetch()) {
            $f[] = $resultado;
        }

        return $f;
    }


public function cargarEncabezado($id_orden)
{

    $objConexion = new Conexion();
    $conexion = $objConexion->get_conexion();

    $consultar = "  SELECT 
    nombregrupo,
    MAX(procedimiento) AS procedimiento,
    MAX(codigo_prueba) AS codigo_prueba,
    MAX(nombre_prueba) AS nombre_prueba,
    MAX(resultado) AS resultado,
    MAX(valor_ref_max_f) AS valor_ref_max_f,
    MAX(id_orden) AS id_orden
    FROM vista_resultados_pruebas
    where id_orden = :id_orden
    GROUP BY nombregrupo;";

    $result = $conexion->prepare($consultar);
    $result -> bindparam(':id_orden', $id_orden);
    $result->execute();

    $f = null;

    while ($resultado = $result->fetch(PDO::FETCH_ASSOC)) {
        $f[] = $resultado;
    }
    
    // Si no hay resultados, inicializa $f como un array vacío
    if (!isset($f)) {
        $f = [];
    }

    return $f;
}

public function traerDetalle($parametro, $id_orden){
    $objConexion = new Conexion();
    $conexion = $objConexion->get_conexion();

    $consultar = "SELECT DISTINCT *
                    FROM vista_resultados_pruebas
                    WHERE nombregrupo = :parametro
                    AND id_orden= :id_orden";

    $result = $conexion->prepare($consultar);
    $result->bindParam(':parametro', $parametro);
    $result->bindParam(':id_orden', $id_orden);
    $result->execute();

    $f = array();

    while ($resultado = $result->fetch(PDO::FETCH_ASSOC)) {
        $f[] = $resultado;
    }
    
    // Si no hay resultados, inicializa $f como un array vacío
    if (!isset($f)) {
        $f = [];
    }

    return $f;
}

}

