

<?php $__env->startSection('content'); ?>
<div class="form-container">
    <div class="form-categoria">
        <h1>Pedidos Nuevos</h1>

        <?php if($pedidosNuevos->isEmpty()): ?>
        <p>No hay pedidos nuevos en este momento.</p>
        <?php else: ?>
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
                <?php $__currentLoopData = $pedidosNuevos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pedido): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($pedido->id); ?></td>
                    <td><?php echo e($pedido->fecha_pedido); ?></td>
                    <td><?php echo e($pedido->cliente->name); ?> <?php echo e($pedido->cliente->lastname); ?></td>
                    <td>$<?php echo e(number_format($pedido->total_pedido, 2)); ?></td>
                    <td>
                        <button class="btn btn-primary" onclick="toggleDetails('<?php echo e($pedido->id); ?>')">Ver Detalles</button>
                    </td>
                </tr>
                <!-- Fila oculta con los detalles del pedido -->
                <tr id="detalles-<?php echo e($pedido->id); ?>" style="display: none;">
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
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php endif; ?>
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


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.principal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\proyecto_laravel\resources\views/pedidos.blade.php ENDPATH**/ ?>