<?php $__env->startSection('content'); ?>
<div class="form-container">
    <div class="form-categoria">
        <h2>Crear Pedido</h2>
        <form action="<?php echo e(route('pedidos.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <!-- Selección del cliente -->
            <div class="form-group">
                <label for="cliente_id">Cliente</label>
                <select name="cliente_id" id="cliente_id" class="form-control" required>
                    <option value="">Seleccione un cliente</option>
                    <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($cliente->id); ?>"><?php echo e($cliente->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <!-- Fecha del pedido -->
            <div class="form-group">
                <label for="fecha_pedido">Fecha del Pedido</label>
                <input type="date" name="fecha_pedido" id="fecha_pedido" class="form-control" required>
            </div>

            <!-- Estado del pedido -->
            <div class="form-group">
                <label for="estado">Estado</label>
                <select name="estado" id="estado" class="form-control" required>
                    <option value="Pendiente">Pendiente</option>
                    <option value="En proceso">En proceso</option>
                    <option value="Completado">Completado</option>
                </select>
            </div>

            <!-- Detalles del pedido -->
            <div class="form-group">
                <label for="detalles_pedido">Detalles del Pedido</label>
                <textarea name="detalles_pedido" id="detalles_pedido" class="form-control" rows="3"></textarea>
            </div>

            <div class="form-group">
                <label for="total_pedido">Total del Pedido</label>
                <input type="number" name="total_pedido" id="total_pedido" class="form-control" readonly>
            </div>
            <!-- Selección de productos y cantidad -->
            <h4>Productos</h4>
            <div id="productos-container">
                <div class="producto-item">
                    <div class="form-group">
                        <label>Producto</label>
                        <select name="productos[0][producto_id]" class="form-control producto-select" required onchange="updatePrecio(0)">
                            <option value="">Seleccione un producto</option>
                            <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($producto->id_producto); ?>" data-precio="<?php echo e($producto->precio); ?>">
                                <?php echo e($producto->nombre_producto); ?> - $<?php echo e($producto->precio); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Precio</label>
                        <input type="number" name="productos[0][precio]" class="form-control producto-precio" readonly>
                    </div>
                    <div class="form-group">
                        <label>Cantidad</label>
                        <input type="number" name="productos[0][cantidad]" class="form-control producto-cantidad" min="1" required oninput="calcularTotal()">
                    </div>
                </div>
            </div>

            <button type="button" onclick="agregarProducto()">Agregar otro producto</button>

            <!-- Botón de enviar -->
            <button type="submit" class="btn btn-primary">Guardar Pedido</button>
        </form>
    </div>

    <script>
        let productoIndex = 1;

        function agregarProducto() {
            const container = document.getElementById('productos-container');
            const productoHtml = `
            <div class="producto-item">
                <div class="form-group">
                    <label>Producto</label>
                    <select name="productos[${productoIndex}][producto_id]" class="form-control producto-select" required onchange="updatePrecio(${productoIndex})">
                        <option value="">Seleccione un producto</option>
                        <?php
                        foreach ($productos as $producto) {
                            echo '<option value="' . $producto->id_producto . '" data-precio="' . $producto->precio . '">' . $producto->nombre_producto . ' - $' . $producto->precio . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Precio</label>
                    <input type="number" name="productos[${productoIndex}][precio]" class="form-control producto-precio" readonly>
                </div>
                <div class="form-group">
                    <label>Cantidad</label>
                    <input type="number" name="productos[${productoIndex}][cantidad]" class="form-control producto-cantidad" min="1" required oninput="calcularTotal()">
                </div>
            </div>
        `;
            container.insertAdjacentHTML('beforeend', productoHtml);
            productoIndex++;
        }

        function updatePrecio(index) {
            const select = document.querySelectorAll('.producto-select')[index];
            const precioInput = document.querySelectorAll('.producto-precio')[index];
            const precio = select.options[select.selectedIndex].getAttribute('data-precio') || 0;
            precioInput.value = precio;
            calcularTotal();
        }

        function calcularTotal() {
            let total = 0;
            document.querySelectorAll('.producto-item').forEach(item => {
                const precio = parseFloat(item.querySelector('.producto-precio').value) || 0;
                const cantidad = parseInt(item.querySelector('.producto-cantidad').value) || 0;
                total += precio * cantidad;
            });
            document.getElementById('total_pedido').value = total.toFixed(2);
        }
    </script>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.principal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\proyecto_laravel\resources\views/pedidosCreate.blade.php ENDPATH**/ ?>