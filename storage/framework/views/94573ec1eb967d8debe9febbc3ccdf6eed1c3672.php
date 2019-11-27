<ul class="sidebar navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href=<?php echo e(route('admin.index')); ?>>
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span><?php echo e(trans('admin.dashboard')); ?></span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href=<?php echo e(route('admin.categories.index')); ?> >
            <i class="fas fa-fw fa-folder"></i>
            <span><?php echo e(trans('admin.category')); ?></span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href=<?php echo e(route('admin.products.index')); ?>>
            <i class="fab fa-product-hunt"></i>
            <span><?php echo e(trans('admin.product')); ?></span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href=#>
            <i class="fa fa-shopping-cart"></i>
            <span><?php echo e(trans('admin.order')); ?></span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href=#>
            <i class="fas fa-user-cog"></i>
            <span><?php echo e(trans('admin.user')); ?></span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="logoutAdmin" href=<?php echo e(route('logout')); ?> >
            <i class="fas fa-sign-out-alt"></i>
        </a>
        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
            <?php echo csrf_field(); ?>
        </form>
    </li>
</ul>

<?php /**PATH /home/cuong/mobileweb/resources/views/admin/layouts/sidebar.blade.php ENDPATH**/ ?>