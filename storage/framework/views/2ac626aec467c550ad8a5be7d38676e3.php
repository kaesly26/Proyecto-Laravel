<tr id="detalles-<?php echo e($pedido->id); ?>" class="detalles-row" style="display: none;">
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
                <tr>
                    <td>$<?php echo e($pedido->producto.nombre_producto); ?></td>
                    <td>$<?php echo e($pedido->producto.pivot.cantidad); ?></td>
                    <td>$$<?php echo e(producto.precio.toFixed(2)); ?></td>
                </tr>
            </tbody>
        </table>
    </td>
</tr><?php /**PATH C:\xampp\htdocs\proyecto_laravel\resources\views/pedidos_detalles.blade.php ENDPATH**/ ?>