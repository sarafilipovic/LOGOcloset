<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="container mt-4" style="width:40%">

    <ul class="list-group">
        <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <?php echo e($cart->name); ?> - <?php echo e($cart->price); ?> KM
                <span class="badge bg-primary rounded-pill"><?php echo e($cart->qty); ?></span>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    <hr>
    Total: <?php echo e(Gloudemans\Shoppingcart\Facades\Cart::subtotal()); ?>


    <hr>
    <?php if(auth()->guard()->check()): ?>
    <a href="<?php echo e(route('checkout')); ?>" class="btn btn-primary">Checkout</a>
    <?php endif; ?>
    <?php if(auth()->guard()->guest()): ?>
    <a href="<?php echo e(route('login')); ?>" class="btn btn-primary">Sign in</a>
    <?php endif; ?>

</div>


<?php /**PATH C:\xampp\htdocs\webshop_10.09\resources\views/cart.blade.php ENDPATH**/ ?>