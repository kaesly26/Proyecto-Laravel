

<?php $__env->startSection('title', 'Registrarse'); ?>

<?php $__env->startSection('content'); ?>
<center>
    <div class="div">
        <form action="<?php echo e(route('validar.register')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <legend>REGISTRO</legend>
            <div class="mb-3">
                <label class="form-label">Usuario</label><br>
                <input type="text" name="name_user" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label><br>
                <input type="text" name="email" required><br>
                <?php if($errors->has('email')): ?>
                <span><?php echo e($errors->first('email')); ?></span>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Contraseña</label><br>
                <input type="password" name="password" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Confirmar Contraseña</label><br>
                <input type="password" name="password_confirmation" required>
            </div>
            <button type="submit" class="btn btn-color">registrarse</button><br>
            <p class="message">¿Ya tienes cuenta?<a href="<?php echo e(route('admin.show.login')); ?>">iniciar sesion</a>
        </form>
    </div>
</center>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\proyecto_laravel\resources\views/components/register.blade.php ENDPATH**/ ?>