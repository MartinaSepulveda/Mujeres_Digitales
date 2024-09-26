<?php
session_start();
require_once('../../Models/conexion.php');
require_once('../../Models/consultasPaciente.php');

function cargarOrdenesTodas() {
    if (isset($_SESSION['id'])) {
        $id = $_SESSION['id'];
    } else {
        return json_encode([]);
    }

    $objConsultas = new ConsultasPaciente();
    $result = $objConsultas->consultarListaOrdenes($id);

    if (!isset($result) || empty($result)) {
        return json_encode([]);
    } else {
        $output = [];
        foreach ($result as $f) {
            $output[] = [
                'date' => $f['fecha'],
                'document' => $f['id_documento'],
                'ordenNum' => $f['orden'],
                'id' => $f['id']
            ];
        }
        return json_encode($output);
    }
}


// Guardar el JSON en una variable
$data = cargarOrdenesTodas();
?>

<script>
    const data = <?php echo $data; ?>; // Usar los datos aquí
    console.log(data); // Comprobar el contenido de data
</script>
