<?php

Class ConsultasPaciente{

    public function consultasTipos()
    {

        $objConexion = new Conexion();

        $conexion = $objConexion->get_conexion();

        $consultar = "SELECT * FROM gen_p_listaopcion 
                    WHERE variable = 'TipoIdentificacion' ";

        $result = $conexion->prepare($consultar);

        $result->execute();

        $f = null;

        while ($resultado = $result->fetch()) {
            $f[] = $resultado;
        }

        return $f;


    }


}

