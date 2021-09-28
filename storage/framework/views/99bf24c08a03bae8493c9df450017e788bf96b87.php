

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Products
                    <a href="<?php echo e(route('admin.products.create')); ?>" class="btn btn-primary float-right">Add a new product</a>
                </div>

                <div class="row mx-auto">
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col">
                            <div class="card-body">
                                <div class="card" style="width: 18rem;">
                                    <img src="<?php echo e(asset('storage/'.$product->img)); ?>" class="card-img-top" height="200" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo e($product->name); ?></h5>
                                        <p class="card-text"><?php echo e($product->description); ?></p>
                                        <div class="row">
                                            <div class="col">
                                                <a href="<?php echo e(route('admin.products.edit', $product->id)); ?>" class="btn btn-warning">Edit</a>
                                            </div>
                                            <div class="col">
                                                <form action="<?php echo e(route('admin.products.destroy', $product->id)); ?>" method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo e(method_field('DELETE')); ?>

                                                    <button type="submit" onclick="return confirm('Are you sure?');" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\webshop_10.09\resources\views/admin/products/index.blade.php ENDPATH**/ ?>