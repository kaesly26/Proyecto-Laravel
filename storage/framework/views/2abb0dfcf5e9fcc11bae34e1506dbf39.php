

<?php $__env->startSection('title', 'crear categoria'); ?>

<?php $__env->startSection('content'); ?>

<div class="form-conteiner">
    <form action="" method="post" class="form-categoria">
        <div class="mb-3">
            <label class="form-label">Nombre</label><br>
            <input type="text" name="nombre">
        </div>
        <div class="mb-3">
            <label class="form-label">Descripción</label><br>
            <textarea name="descripcion" rows="4" cols="20"></textarea>
        </div>
        <button type="submit">Guardar</button>

    </form>
    <p>
        <<<<<a href="<?php echo e(asset('/')); ?>">atras</a>
    </p>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.principal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\proyecto_laravel\resources\views/createCategoria.blade.php ENDPATH**/ ?>