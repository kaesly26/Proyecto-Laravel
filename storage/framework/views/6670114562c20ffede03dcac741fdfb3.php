

<?php $__env->startSection('title', isset($update) ? 'Editar Producto' : 'Crear Producto'); ?>

<?php $__env->startSection('content'); ?>

<div class="form-container">
    <form action="<?php echo e(isset($update) ? route('productos.update', $update->id_producto) : route('productos.store')); ?>" method="POST" class="form-categoria">
        <?php echo csrf_field(); ?>
        <?php if(isset($update)): ?>
        <?php echo method_field('PUT'); ?>
        <?php endif; ?>

        <div class="mb-3">
            <label class="form-label">Nombre Producto</label><br>
            <input type="text" name="nombre" value="<?php echo e(old('nombre', isset($update) ? $update->nombre_producto : '')); ?>" required>
            <?php if($errors->has('nombre')): ?>
            <div class="text-danger"><?php echo e($errors->first('nombre')); ?></div>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label class="form-label">Precio</label><br>
            <input type="number" step="0.01" name="precio" value="<?php echo e(old('precio', isset($update) ? $update->precio : '')); ?>" required>
            <?php if($errors->has('precio')): ?>
            <div class="text-danger"><?php echo e($errors->first('precio')); ?></div>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label class="form-label">Descripción</label><br>
            <textarea name="descripcion" rows="4" cols="20" required><?php echo e(old('descripcion', isset($update) ? $update->descripcion : '')); ?></textarea>
            <?php if($errors->has('descripcion')): ?>
            <div class="text-danger"><?php echo e($errors->first('descripcion')); ?></div>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label for="id_categoria">Categoría:</label>
            <select name="id_categoria" required>
                <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($categoria->id_categoria); ?>" <?php echo e(old('id_categoria', isset($update) ? $update->id_categoria : '') == $categoria->id_categoria ? 'selected' : ''); ?>>
                    <?php echo e($categoria->nombre_categoria); ?>

                </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php if($errors->has('id_categoria')): ?>
            <div class="text-danger"><?php echo e($errors->first('id_categoria')); ?></div>
            <?php endif; ?>
        </div>

        <button type="submit" class="btn btn-primary"><?php echo e(isset($update) ? 'Actualizar' : 'Guardar'); ?></button>
    </form>
    <br>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.principal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\proyecto_laravel\resources\views/crearProducto.blade.php ENDPATH**/ ?>