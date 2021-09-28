
<ul class="nav justify-content-end py-2" style="background-color:#E9CAC3">
  <li class="nav-item">
  <input type="text" id="search" name="search" class="form-control" placeholder="Search...">

  </li>
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="<?php echo e(route('welcome')); ?>">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo e(route('cart.show')); ?>">Cart (<?php echo e(Gloudemans\Shoppingcart\Facades\Cart::content()->count()); ?>)</a>
  </li>
  <?php if(auth()->guard()->check()): ?>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo e(route('order')); ?>">Order</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo e(route('logout')); ?>"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
            <?php echo e(__('Logout')); ?>

        </a>
    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
        <?php echo csrf_field(); ?>
    </form>
  </li>
  <?php endif; ?>
  <?php if(auth()->guard()->guest()): ?>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo e(route('login')); ?>">Sign in</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo e(route('register')); ?>">Sign up</a>
  </li>
  <?php endif; ?>
</ul><?php /**PATH C:\xampp\htdocs\webshop_10.09\resources\views/layouts/navbar.blade.php ENDPATH**/ ?>