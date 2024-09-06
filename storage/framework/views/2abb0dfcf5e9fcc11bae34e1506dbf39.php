

<?php $__env->startSection('title', 'crear categoria'); ?>

<?php $__env->startSection('content'); ?>

<div class="form-container">
    <div class="form-categoria">
        <form action="<?php echo e(route('categoria.store')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label class="form-label">Nombre Categoria</label><br>
                <input type="text" name="nombre_categoria" value="<?php echo e(old('nombre_categoria')); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Descripción</label><br>
                <textarea name="descripcion_categoria" value="<?php echo e(old( 'descripcion_categoria' )); ?>" rows="4" cols="20" required></textarea>
            </div>
            <button type="submit">Guardar</button>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.principal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\proyecto_laravel\resources\views/createCategoria.blade.php ENDPATH**/ ?>