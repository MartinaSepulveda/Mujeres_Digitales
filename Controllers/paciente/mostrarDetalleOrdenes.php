<?php
require_once('../../Models/conexion.php');
require_once('../../Models/consultasPaciente.php');

// Función para cargar detalles generales y principales de la orden
// function cargarDetalles1() {

//     $idOrden = $_GET['idOrden'];
//     $objConsultas = new ConsultasPaciente();
//     $result = $objConsultas->consultarDetalleOrdenPri($idOrden);

   
//     }

if (!empty($_GET['action']) && $_GET['action'] == 'traerDetalle') {
    
    $variableA = $_GET['tecla'];
    $variableB = $_GET['parametro'];
    $objConsultas = new ConsultasPaciente();
    $result = $objConsultas->traerDetalle($variableA, $variableB);
    echo json_encode($result);
}

    function cargarEncabezado(){

        $id_orden = $_GET['idOrden'];
        $objConsultas = new ConsultasPaciente();
        $result = $objConsultas->cargarEncabezado($id_orden);


        foreach ($result as $f) {
            echo '<option value="' . htmlspecialchars($f['nombregrupo'], ENT_QUOTES, 'UTF-8') . '"> ' . htmlspecialchars($f['nombregrupo'], ENT_QUOTES, 'UTF-8') . ' </option>';
        }
        


    }

    function cargarEncabezado2(){

        $objConsultas = new ConsultasPaciente();
        $result = $objConsultas->cargarEncabezado();


        foreach ($result as $f){
            echo'
            <option value='.$f['procedimiento'].'> '.$f['procedimiento'].' </option>
            ';

        }



    }
