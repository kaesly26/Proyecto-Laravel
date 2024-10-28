

<?php $__env->startSection('title', isset($update) ? 'Editar categoria' : 'Crear categoria'); ?>

<?php $__env->startSection('content'); ?>

<div class="form-container">
    <div class="form-categoria">
        <form action="<?php echo e(isset($update) ? route('categoria.update', $update->id_categoria) : route('categoria.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php if(isset($update)): ?>
            <?php echo method_field('PUT'); ?>
            <?php endif; ?>
            <div class="mb-3">
                <label class="form-label">Nombre Categoria</label><br>
                <input type="text" name="nombre_categoria" value="<?php echo e(old('nombre_categoria', isset($update) ? $update->nombre_categoria : '')); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Descripción</label><br>
                <textarea name="descripcion_categoria" rows="4" cols="20" required><?php echo e(old('descripcion_categoria', isset($update) ? $update->descripcion_categoria : '')); ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary"><?php echo e(isset($update) ? 'Actualizar' : 'Guardar'); ?></button>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.principal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\proyecto_laravel\resources\views/createCategoria.blade.php ENDPATH**/ ?>