

<?php $__env->startSection('content'); ?>
<div class="form-container">
    <div class="form-categoria">
        <h1>Pedidos Nuevos</h1>

        <?php if($pedidos->isEmpty()): ?>
        <p>No hay pedidos nuevos en este momento.</p>
        <?php else: ?>
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
                <?php $__currentLoopData = $pedidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pedido): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($pedido->id); ?></td>
                    <td><?php echo e($pedido->fecha_pedido); ?></td>
                    <td><?php echo e($pedido->cliente->name); ?> <?php echo e($pedido->cliente->lastname); ?></td>
                    <td>$<?php echo e(number_format($pedido->total_pedido, 2)); ?></td>
                    <td><?php echo e(ucfirst($pedido->estado)); ?></td>
                    <td>
                        <!-- Botón para mostrar/ocultar productos -->
                        <button class="btn btn-info" type="button" onclick="toggleProducts('<?php echo e($pedido->id); ?>')">
                            Ver Productos
                        </button>
                    </td>
                </tr>

                <!-- Fila oculta con los detalles del pedido (productos) -->
                <tr id="productos-<?php echo e($pedido->id); ?>" class="productos-row" style="display: none;">
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
                                <?php $__currentLoopData = $pedido->productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($producto->nombre_producto); ?></td>
                                    <td><?php echo e($producto->pivot->cantidad); ?></td>
                                    <td>$<?php echo e(number_format($producto->precio, 2)); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

        <!-- Paginación -->
        <?php echo e($pedidos->links()); ?>


        <?php endif; ?>
    </div>
</div>

<script>
    function toggleProducts(pedidoId) {
        const productosRow = document.getElementById(`productos-${pedidoId}`);
        // Alternar la visibilidad de la fila
        productosRow.style.display = (productosRow.style.display === 'none' || productosRow.style.display === '') ? 'table-row' : 'none';
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.principal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\proyecto_laravel\resources\views/pedidos.blade.php ENDPATH**/ ?>