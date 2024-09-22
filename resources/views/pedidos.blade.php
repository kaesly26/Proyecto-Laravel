@extends('layouts.principal')

@section('content')
<div class="form-container">
    <div class="form-categoria">
        <h1>Pedidos Nuevos</h1>

        @if($pedidos->isEmpty())
        <p>No hay pedidos nuevos en este momento.</p>
        @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Pedido #</th>
                    <th>Fecha</th>
                    <th>Cliente</th>
                    <th>Total</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pedidos as $pedido)
                <tr>
                    <td>{{ $pedido->id }}</td>
                    <td>{{ $pedido->fecha_pedido }}</td>
                    <td>{{ $pedido->cliente->name }} {{ $pedido->cliente->lastname }}</td>
                    <td>${{ number_format($pedido->total_pedido, 2) }}</td>
                    <td>{{ ucfirst($pedido->estado) }}</td>
                    <td>
                        <!-- Botón para mostrar/ocultar productos -->
                        <button class="btn btn-info" type="button" onclick="toggleProducts('{{ $pedido->id }}')">
                            Ver Productos
                        </button>
                    </td>
                </tr>

                <!-- Fila oculta con los detalles del pedido (productos) -->
                <tr id="productos-{{ $pedido->id }}" class="productos-row" style="display: none;">
                    <td colspan="6">
                        <h5>Productos</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pedido->productos as $producto)
                                <tr>
                                    <td>{{ $producto->nombre_producto }}</td>
                                    <td>{{ $producto->pivot->cantidad }}</td>
                                    <td>${{ number_format($producto->precio, 2) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Paginación -->
        {{ $pedidos->links() }}

        @endif
    </div>
</div>

<script>
    function toggleProducts(pedidoId) {
        const productosRow = document.getElementById(`productos-${pedidoId}`);
        // Alternar la visibilidad de la fila
        productosRow.style.display = (productosRow.style.display === 'none' || productosRow.style.display === '') ? 'table-row' : 'none';
    }
</script>
@endsection