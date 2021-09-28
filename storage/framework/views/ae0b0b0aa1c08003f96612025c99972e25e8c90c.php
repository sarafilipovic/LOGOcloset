

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <?php if(Session::has('success')): ?>
            <div class="alert alert-success"  role="alert">
                <strong>Success: </strong><?php echo Session::get('success'); ?>

            </div>
         <?php endif; ?>
            <div class="card">
                <div class="card-header"><?php echo e(__('Users')); ?></div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Role</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row">1</th>
                                <td><?php echo e($user->name); ?></td>
                                <td><?php echo e($user->email); ?></td>
                                <td><?php echo e($user->role); ?></td>
                                <td>
                                    <a href="<?php echo e(route('super-admin.users.edit', $user->id)); ?>">Edit</a>
                                    <a href="<?php echo e(route('super-admin.users.destroy', $user->id)); ?>">Delete</a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\example-app\resources\views/super-admin/users/index.blade.php ENDPATH**/ ?>