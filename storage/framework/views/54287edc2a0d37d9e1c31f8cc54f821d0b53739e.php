<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $__env->yieldContent('title'); ?></title>

    <!-- Custom fonts for this template-->
    <link href=<?php echo e(asset('bower_components/admin_template/vendor/fontawesome-free/css/all.min.css')); ?> rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href=<?php echo e(asset('bower_components/admin_template/vendor/datatables/dataTables.bootstrap4.css')); ?> rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href=<?php echo e(asset('bower_components/admin_template/css/sb-admin.css')); ?> rel="stylesheet">

</head>

<body id="page-top">
    <?php echo $__env->make('admin.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div id="wrapper">
        <?php echo $__env->make('admin.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>
        <?php echo $__env->make('admin.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
<!-- JavaScript-->
<!-- Bootstrap core JavaScript-->
<script src=<?php echo e(asset('bower_components/admin_template/vendor/jquery/jquery.min.js')); ?>></script>
<script src=<?php echo e(asset('bower_components/admin_template/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>></script>
<script src=<?php echo e(asset('bower_components/admin_template/vendor/jquery-easing/jquery.easing.min.js')); ?>></script>
<script src=<?php echo e(asset('bower_components/admin_template/vendor/datatables/jquery.dataTables.js')); ?>></script>
<script src=<?php echo e(asset('bower_components/admin_template/vendor/datatables/dataTables.bootstrap4.js')); ?>></script>
<script src=<?php echo e(asset('bower_components/admin_template/js/sb-admin.min.js')); ?>></script>
<script src=<?php echo e(asset('bower_components/admin_template/js/demo/datatables-demo.js')); ?>></script>
<script src=<?php echo e(asset('js/app.js')); ?>></script>
<script src=<?php echo e(asset('bower_components/admin_template/vendor/chart.js/Chart.min.js')); ?>></script>
<script src=<?php echo e(asset('bower_components/admin_template/js/demo/chart-area-demo.js')); ?>></script>
<script src=<?php echo e(asset('bower_components/admin_template/js/demo/chart-bar-demo.js')); ?>></script>
<script src=<?php echo e(asset('bower_components/admin_template/js/demo/chart-pie-demo.js')); ?>></script>

</body>

</html>
<?php /**PATH /home/cuong/mobileweb/resources/views/admin/layouts/master.blade.php ENDPATH**/ ?>