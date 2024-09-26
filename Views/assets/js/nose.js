
document.getElementById("select_grupo").addEventListener("change", (e) => { 
        // Función para obtener parámetros de la URL
    function getParameterByName(name) {
        let url = window.location.href;
        name = name.replace(/[\[\]]/g, '\\$&');
        let regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)');
        let results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, ' '));
    }
    let idOrden = getParameterByName('idOrden');
    let letra = e.target.value;
    $.ajax({
        url: '../../Controllers/paciente/mostrarDetalleOrdenes.php', // URL a la que se enviará la solicitud
        type: 'GET', // Tipo de solicitud
        data: {
            tecla: letra,
            parametro: idOrden,
            action: "traerDetalle"
        },
        success: function(data) {
            let datos = JSON.parse(data);
            console.log('Datos recibidos:', datos);
            
            // Limpiar el tbody antes de agregar nuevos datos
            const tbody = document.querySelector("#pruebas tbody");
            tbody.innerHTML = '';

            // Iterar sobre los datos y crear filas en la tabla
            datos.forEach(item => {
                const tr = document.createElement("tr");
                
                // Crear las celdas con los datos de la prueba
                tr.innerHTML = `
                    <td>${item.codigo_prueba}</td>
                    <td>${item.nombre_prueba}</td>
                    <td>${item.resultado !== null ? item.resultado : 'N/A'}</td>
                    <td>${item.valor_ref_max_f}</td>
                    <td>${item.unidad !== "" ? item.unidad : 1}</td>
                `;
                
                // Agregar la fila al tbody
                tbody.appendChild(tr);
                document.getElementById("txtProcedimiento").innerHTML= datos[0].procedimiento
            });
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log('Error en la solicitud:', textStatus, errorThrown);
        }
    });
});
