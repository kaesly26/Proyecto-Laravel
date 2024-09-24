

<?php $__env->startSection('title', 'categorias'); ?>

<?php $__env->startSection('content'); ?>

<div class="form-container">
    <div class="form-categoria">
        <form action="<?php echo e(route('categoria.create')); ?>" method="get">
            <?php echo csrf_field(); ?>
            <button type="submit">Crear Categoria</button>
        </form>
        <table class="table table-bordered table-striped">
            <thead>
                <h4>Lista de categorias</h4>

                <tr>
                    <th>Id categoria</th>
                    <th>Nombre Categoria</th>
                    <th>Descripción</th>
                </tr>
            </thead>

            <tbody>
                <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($categoria->id_categoria); ?></td>
                    <td><?php echo e($categoria->nombre_categoria); ?></td>
                    <td><?php echo e($categoria->descripcion_categoria); ?></td>
                    <td>
                        <a href="<?php echo e(route('categoria.edit', $categoria->id_categoria)); ?>">Editar</a>
                    </td>
                    <td>
                        <button type="submit" onclick="confirmDelete('<?php echo e($categoria->id_categoria); ?>')">Eliminar</button>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

    </div>
</div>
<script>
    function confirmDelete(id) {
        alertify.confirm(" ¿Deseas eliminar este registro?", function(e) {
            if (e) {
                let form = document.createElement('form');
                form.method = 'POST';
                form.action = '/categoria/' + id;
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
<?php echo $__env->make('layouts.principal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\proyecto_laravel\resources\views/showCategory.blade.php ENDPATH**/ ?>