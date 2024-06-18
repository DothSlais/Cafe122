document.addEventListener('DOMContentLoaded', function () {
    const tipoReporteSelect = document.getElementById('tipoReporte');
    const elementosFiltro = document.querySelectorAll('.filtro-campos');
    const formularios = document.querySelectorAll('form');

    // Manejar el cambio en el select utilizando JavaScript puro
    tipoReporteSelect.addEventListener('change', function () {
        const tipoReporte = tipoReporteSelect.value;

        // Ocultar todos los elementos de filtro
        elementosFiltro.forEach(function (elemento) {
            elemento.style.display = 'none';
        });

        // Mostrar el elemento de filtro correspondiente
        const elementoMostrar = document.getElementById(tipoReporte);
        if (elementoMostrar) {
            elementoMostrar.style.display = 'block';
        }

        // No ocultar los formularios, solo los elementos de filtro
    });

    // Mostrar el elemento inicial al cargar la página
    const tipoReporteInicial = tipoReporteSelect.value;
    const formularioInicial = document.getElementById('formulario-' + tipoReporteInicial);
    if (formularioInicial) {
        formularioInicial.style.display = 'block';
    }

    // Manejar el evento submit del formulario
    document.getElementById('reporteForm').addEventListener('submit', function (event) {
        // Puedes agregar lógica de validación aquí si es necesario

        // El formulario se enviará sin recargar la página
    });
});