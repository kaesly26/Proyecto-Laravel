@extends('layouts.principal')

@section('content')
<div class="form-container">
    <div class="form-categoria">
        <h1>Pedidos Nuevos</h1>

        @if($pedidosNuevos->isEmpty())
        <p>No hay pedidos nuevos en este momento.</p>
        @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Pedido #</th>
                    <th>Fecha</th>
                    <th>Cliente</th>
                    <th>Total</th>
                    <th>Detalles</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pedidosNuevos as $pedido)
                <tr>
                    <td>{{ $pedido->id }}</td>
                    <td>{{ $pedido->fecha_pedido }}</td>
                    <td>{{ $pedido->cliente->name }} {{ $pedido->cliente->lastname }}</td>
                    <td>${{ number_format($pedido->total_pedido, 2) }}</td>
                    <td>
                        <button class="btn btn-primary" onclick="toggleDetails('{{$pedido->id }}')">Ver Detalles</button>
                    </td>
                </tr>
                <!-- Fila oculta con los detalles del pedido -->
                <tr id="detalles-{{ $pedido->id }}" style="display: none;">
                    <td colspan="5">
                        <h2>Productos</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                </tr>
                            </thead>
                            <tbody>
                                 
                            </tbody>
                        </table>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>

<!-- JavaScript para mostrar/ocultar detalles -->
<script>
    function toggleDetails(pedidoId) {
        const detallesRow = document.getElementById(`detalles-${pedidoId}`);

        // Verificar si los productos ya están cargados
        if (detallesRow.style.display === 'none') {
            // Crear la URL manualmente para evitar problemas con route()
            const url = `/pedidos/${pedidoId}`;

            // Hacer la solicitud AJAX para obtener los detalles del pedido
            fetch(url)
                .then(response => response.json())
                .then(productos => {
                    // Construir el HTML de los productos
                    let productosHtml = '';
                    productos.forEach(producto => {
                        productosHtml += `
    <tr>
        <td>${producto.nombre_producto}</td>
        <td>${producto.pivot.cantidad}</td>
        <td>$${producto.precio.toFixed(2)}</td>
    </tr>`;
                    });

                    // Insertar los productos en la tabla
                    detallesRow.querySelector('tbody').innerHTML = productosHtml;

                    // Mostrar la fila de detalles
                    detallesRow.style.display = 'table-row';
                })
                .catch(error => console.error('Error al cargar los detalles del pedido:', error));
        } else {
            // Ocultar la fila de detalles
            detallesRow.style.display = 'none';
        }
    }
</script>


@endsection