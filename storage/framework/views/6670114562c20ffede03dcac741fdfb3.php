

<?php $__env->startSection('title', 'Crear Producto'); ?>

<?php $__env->startSection('content'); ?>

<div class="form-container">
    <form action="<?php echo e(route('guardarProducto')); ?>" method ="post" class="form-categoria">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label class="form-label">Nombre Producto</label><br>
            <input type="text" name="nombre" value="<?php echo e(old('nombre_producto')); ?>" required>
            <?php if($errors->has('nombre_producto')): ?>
            <div class="text-danger"><?php echo e($errors->first('nombre_producto')); ?></div>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label class="form-label">Precio</label><br>
            <input type="text" name="precio" value="<?php echo e(old('precio')); ?>" required>
            <?php if($errors->has('precio')): ?>
            <div class="text-danger"><?php echo e($errors->first('precio')); ?></div>
            <?php endif; ?>
        </div>
    
        <div class="mb-3">
            <label class="form-label">Descripción</label><br>
            <textarea name="descripcion" rows="4" cols="20" required><?php echo e(old('descripcion')); ?></textarea>
            <?php if($errors->has('descripcion')): ?>
            <div class="text-danger"><?php echo e($errors->first('descripcion')); ?></div>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label for="id_categoria">Categoría:</label>
            <select name="id_categoria" required>
                <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($categoria->id_categoria); ?>" <?php echo e(old('id_categoria') == $categoria->id ? 'selected' : ''); ?>><?php echo e($categoria->nombre_categoria); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            
            <?php if($errors->has('id_categoria')): ?>
            <div class="text-danger"><?php echo e($errors->first('id_categoria')); ?></div>
            <?php endif; ?>
        </div>
        <button type="submit">Guardar</button>
    </form>
    <br>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.principal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\proyecto_laravel\resources\views/crearProducto.blade.php ENDPATH**/ ?>