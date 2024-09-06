

<?php $__env->startSection('title', 'Producto'); ?>

<?php $__env->startSection('content'); ?>

<div class="form-container">
    <div class="form-categoria">
        <form action="<?php echo e(route('productos.create')); ?>" method="get">
            <?php echo csrf_field(); ?>
            <button type="submit">Crear Producto</button>
        </form>
        <table class="table table-bordered table-striped">
            <thead>
                <h4>Lista de Productos</h4>

                <tr>
                    <th>Id Producto</th>
                    <th>Nombre Producto</th>
                    <th>Precio</th>
                    <th>Descripción</th>
                </tr>
            </thead>

            <tbody>
                <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($producto->id_producto); ?></td>
                    <td><?php echo e($producto->nombre_producto); ?></td>
                    <td><?php echo e($producto->precio); ?></td>
                    <td><?php echo e($producto->descripcion); ?></td>
                    <td>
                        <a href="">Editar</a>
                    </td>
                    <td>
                        <button type="submit" onclick="confirmDelete('<?php echo e($producto->id_producto); ?>')">Eliminar</button>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

    </div>
</div>
<script>
    function confirmDelete(id) {
        alertify.confirm("¿Deseas eliminar este registro?", function(e) {
            if (e) {
                let form = document.createElement('form');
                form.method = 'POST';
                form.action = '/productos/' + id;
                form.innerHTML = '<?php echo csrf_field(); ?> <?php echo method_field("DELETE"); ?>';
                document.body.appendChild(form);
                form.submit();
            } else {
                alertify.error('Cancelar');
                return false;
            }
        });
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.principal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\proyecto_laravel\resources\views/showProduct.blade.php ENDPATH**/ ?>