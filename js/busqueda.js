//obtener datos del archivo json
fetch('../json/productos.json')
  .then(response => response.json())
  .then(data => {
    //inserta salto de línea en el json
    const jsonStr = JSON.stringify(data, null, 4);

    // crear tabla y agregar datos
    const tableBody = document.querySelector('#productos-table tbody');
    const busquedaInput = document.querySelector('#busqueda');
    const filas = [];
    data.forEach(producto => {
      const row = document.createElement('tr');
      const nombreCell = document.createElement('td');
      nombreCell.textContent = producto.nombre;
      row.appendChild(nombreCell);
      const cantidadCell = document.createElement('td');
      cantidadCell.textContent = producto.cantidad;
      row.appendChild(cantidadCell);
        const unidadCell = document.createElement('td');
        unidadCell.textContent = producto.unidad;
        row.appendChild(unidadCell);
      const fabricanteCell = document.createElement('td');
      fabricanteCell.textContent = producto.fabricante;
      row.appendChild(fabricanteCell);
      const fechaCell = document.createElement('td');
      fechaCell.textContent = producto.fecha_elaboracion;
      row.appendChild(fechaCell);
      filas.push(row);
      tableBody.appendChild(row);
    });

    // función para filtrar las filas de la tabla según el valor de búsqueda
    function filtrar() {
      const valorBusqueda = busquedaInput.value.toLowerCase().trim();
      filas.forEach(fila => {
        const ocultar = !fila.textContent.toLowerCase().includes(valorBusqueda);
        fila.style.display = ocultar ? 'none' : '';
      });
    }

    // agregar evento de entrada a la barra de búsqueda para filtrar la tabla
    busquedaInput.addEventListener('input', filtrar);
  });
// JavaScript Document