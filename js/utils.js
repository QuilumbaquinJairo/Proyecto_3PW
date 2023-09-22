
    // Función para cargar el archivo JSON y llenar el select con las empresas
    function loadEmpresaOptions() {
    // Crear una nueva instancia de XMLHttpRequest
    var xhr = new XMLHttpRequest();

    // Configurar la solicitud
    xhr.open('GET', '../json/proveedores.json', true);

    // Establecer el tipo de respuesta esperado a JSON
    xhr.responseType = 'json';

    // Función a ejecutar cuando la solicitud se complete
    xhr.onload = function() {
    if (xhr.status === 200) {
    // Obtener el elemento select
    var select = document.getElementById('fabricante');

    // Limpiar las opciones actuales del select
    select.innerHTML = '';

    // Iterar sobre los datos del archivo JSON y agregar las empresas al select
    xhr.response.forEach(function(item) {
    var option = document.createElement('option');
    option.value = item.empresa;
    option.textContent = item.empresa;
    select.appendChild(option);
});
} else {
    console.error('Error al cargar el archivo JSON:', xhr.status, xhr.statusText);
}
};

    // Enviar la solicitud
    xhr.send();
}

    // Llamar a la función cuando se cargue la página
    window.addEventListener('load', loadEmpresaOptions);

