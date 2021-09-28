

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <?php if(Session::has('success')): ?>
            <div class="alert alert-success"  role="alert">
                <strong>Success: </strong><?php echo e(Session::get('success')); ?>

            </div>
        <?php elseif(Session::has('warning')): ?>
            <div class="alert alert-warning"  role="alert">
                <strong>Warning: </strong><?php echo e(Session::get('warning')); ?>

            </div>
        <?php endif; ?>
            <div class="card">
                <div class="card-header"><?php echo e(__('Users')); ?></div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row"><?php echo e($user->id); ?></th>
                                <td><?php echo e($user->name); ?></td>
                                <td><?php echo e($user->email); ?></td>
                                <td><?php echo e($user->role); ?></td>
                                <td>
                                    <a href="<?php echo e(route('super-admin.users.edit', $user->id)); ?>" class="btn btn-warning">Edit</a>
                                </td>
                                <td>
                                <form action="<?php echo e(route('super-admin.users.destroy', $user->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo e(method_field('DELETE')); ?>

                                    <button type="submit" onclick="return confirm('Are you sure?');" class="btn btn-danger float-right">Delete</button>
                                </form>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\webshop_10.09\resources\views/super-admin/users/index.blade.php ENDPATH**/ ?>