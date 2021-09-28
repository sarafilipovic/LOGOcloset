

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">

    
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div>
                        <a href="" class="ml-2">Home</a>
                        <a href="" class="ml-4">Users</a>
                    </div>
                </div>
                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    <?php echo e(__('You are logged in!')); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\example-app\resources\views/super-admin/home/index.blade.php ENDPATH**/ ?>