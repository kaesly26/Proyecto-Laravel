

<?php $__env->startSection('title', 'Iniciar Sesión'); ?>

<?php $__env->startSection('content'); ?>
<center>
    <div class="div">
        <form action="<?php echo e(route('login')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label class="form-label">Email</label><br>
                <input type="text" name="email" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Contraseña</label><br>
                <input type="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Ingresar</button><br>
            <p class="message">¿No registrado? <a href="<?php echo e(route('show.register')); ?>">Registrarse</a></p>
        </form>
    </div>
</center>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\proyecto_laravel\resources\views\components\login.blade.php ENDPATH**/ ?>